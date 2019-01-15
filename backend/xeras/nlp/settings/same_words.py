import re
import pandas as pd
import xeras.nlp.settings.nlp_settings as Settings

def get_other_word_len(element):
    return element[0]

def get_true_word_len(element):
    return element[0]

class SameWords:
    same_words_dict = {}
    same_words_array = []
    true_words_array = []
    is_used_same_words = Settings.DEFAULT_IS_USED_SAME_WORDS

    def set_is_used_same_words(self, is_used_same_words=Settings.DEFAULT_IS_USED_SAME_WORDS):
        self.is_used_same_words = is_used_same_words

    def load_same_words(self):
        csv_file_pd = pd.read_csv(Settings.PATH_FILE_SAME_WORDS, sep=';')

        if not self.is_used_same_words:
            return
        
        for index, row in csv_file_pd.iterrows():
            true_word = row["true_word"].lower().strip()
            other_words_array = row["other_words"].split(',')
            self.true_words_array.append((len(true_word), true_word))

            for other_word in other_words_array:
                # Lower and remove front and back spaces
                other_word = other_word.lower().strip()

                # Don't append if other word is as same as true word, to prevent bugs
                if other_word == true_word:
                    continue

                # Add to dictionary. EX: same_words_dict['ip X'] = Iphone X
                self.same_words_dict[other_word] = true_word
                self.same_words_array.append((len(other_word), other_word, true_word))
        
        # Remove duplicates
        self.same_words_array = list(set(self.same_words_array))
        self.true_words_array = list(set(self.true_words_array))
        # Sort by other word by length, descending
        self.same_words_array.sort(key=get_other_word_len, reverse=True)
        self.true_words_array.sort(key=get_true_word_len, reverse=True)
    
    def replace_same_word(self, sentence=Settings.SAMPLE_SENTENCE):
        if not self.is_used_same_words:
            return sentence
        
        sentence = sentence.lower().strip()
        sentence = re.sub('[!@#$]', '', sentence)
        replaced_words = []
        replaced_indexs = []

        # Search by true word
        for true_word_ele in self.true_words_array:
            (true_word_len, true_word) = true_word_ele
            re_finditer = re.finditer(r"\b{0}\b".format(true_word), sentence)

            if re_finditer:
                for match_true_word in re_finditer:
                    for replaced_word in replaced_words:
                        word_indexs = re.finditer(r"\b{0}\b".format(replaced_word), sentence)
                        if word_indexs:
                            for word_index in word_indexs:
                                replaced_indexs.append((word_index.start(), word_index.end()))
                    
                    is_in = False
                    replaced_indexs = list(set(replaced_indexs))

                    index_start = match_true_word.start()
                    index_end = match_true_word.start() + len(true_word)

                    for (index_previous_start, index_previous_end) in replaced_indexs:
                        if (index_previous_start <= index_start and index_start <= index_previous_end) or (index_previous_start <= index_end and index_end <= index_previous_end) or (index_start <= index_previous_start and index_previous_end <= index_end):
                            is_in = True
                            break
                    
                    if is_in:
                        continue
                    
                    replaced_words.append(true_word)
                    replaced_words = list(set(replaced_words))

        # Search by other word
        for same_words_ele in self.same_words_array:
            (other_word_len, other_word, true_word) = same_words_ele
            re_finditer = re.finditer(r"\b{0}\b".format(other_word), sentence)
            
            if re_finditer:
                plus = 0
                
                for match_other_word in re_finditer:
                    # Get the previous index replaced
                    for replaced_word in replaced_words:
                        
                        word_indexs = re.finditer(r"\b{0}\b".format(replaced_word), sentence)
                        if word_indexs:
                            for word_index in word_indexs:
                                replaced_indexs.append((word_index.start(), word_index.end()))

                    is_in = False
                    replaced_indexs = list(set(replaced_indexs))

                    index_start = match_other_word.start() + plus
                    index_end = match_other_word.start() + plus + len(other_word)

                    # Check if current other word is in replaced index
                    for (index_previous_start, index_previous_end) in replaced_indexs:
                        if (index_previous_start <= index_start and index_start <= index_previous_end) or (index_previous_start <= index_end and index_end <= index_previous_end) or (index_start <= index_previous_start and index_previous_end <= index_end):
                            is_in = True
                            break
                    
                    # If is in, then switch to the next match
                    if is_in:
                        continue

                    # Replace true word at the index start
                    sentence_start = ""
                    sentence_end = ""

                    if index_start != 0:
                        sentence_start = sentence[:index_start]

                    if index_end != (len(sentence) - 1):
                        sentence_end = sentence[index_end:]

                    sentence = sentence_start + true_word + sentence_end

                    # Append true word to replaced word
                    replaced_words.append(true_word)
                    replaced_words = list(set(replaced_words))

                    replaced_indexs = []
                    plus += (len(true_word) - len(other_word))

        sentence = sentence.lower().strip()
        sentence = re.sub(' +', ' ',sentence)
        sentence = re.sub('[!@#$]', '', sentence)
       
        return sentence