import re
import pandas as pd
import xeras.nlp.nlp_settings as Settings

def get_other_word_len(element):
    return element[0]

class SameWords:
    same_words_dict = {}
    same_words_array = []
    is_used_same_words = True

    def set_is_used_same_words(self, is_used_same_words=True):
        self.is_used_same_words = is_used_same_words

    def load_same_words(self):
        csv_file_pd = pd.read_csv(Settings.PATH_FILE_SAME_WORDS, sep=';')

        for index, row in csv_file_pd.iterrows():
            true_word = row["true_word"].lower().strip()
            other_words_array = row["other_words"].split(',')

            for other_word in other_words_array:
                # Lower and remove front and back spaces
                other_word = other_word.lower().strip()

                # Add to dictionary. EX: same_words['ip X'] = Iphone X
                self.same_words_dict[other_word] = true_word
                self.same_words_array.append((len(other_word), other_word, true_word))

        self.same_words_array = list(set(self.same_words_array))
        self.same_words_array.sort(key=get_other_word_len, reverse=True)
    
    def replace_same_word(self, sentence=Settings.SAMPLE_SENTENCE):
        sentence = sentence.lower().strip()
        sentence = re.sub('[!@#$]', '', sentence)
        replaced_index = []
        replaced_word = []

        for same_words_ele in self.same_words_array:
            (other_word_len, other_word, true_word) = same_words_ele
            re_finditer = re.finditer(r'\b{0}\b'.format(other_word), sentence)

            if re_finditer:
                for match in re_finditer:
                    for (word in replaced_word):
                        

                    plus = 0
                    for (index_previous_start, index_previous_end) in replaced_index:
                        if (index_previous_start <= match.start() and match.start() < index_previous_end) 
                        or (index_previous_start <= match.end() and match.end() < index_previous_end)
                        or (match.start() <= index_previous_start and index_previous_end <= match.end()):
                            continue
                        
                        sentence = re.sub(r'\b{0}\b'.format(other_word), true_word, sentence, 1)
                        plus += (len(true_word) - len(other_word))

                    # if index_start:
                    #     print((index_start))

        if self.is_used_same_words:
            for other_word, true_word in self.same_words_dict.items():
                # Replace other word with the true word defined
                if other_word in sentence:
                    sentence = re.sub(r'\b{0}\b'.format(other_word), true_word, sentence)

        return sentence