import re
import pandas as pd
import xeras.nlp.nlp_settings as Settings

class SameWords:
    same_words_dict = {}
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
    
    def replace_same_word(self, sentence=Settings.SAMPLE_SENTENCE):
        sentence = sentence.lower().strip()

        if self.is_used_same_words:
            for other_word, true_word in self.same_words_dict.items():
                # Replace other word with the true word defined
                if other_word in sentence:
                    sentence = re.sub(r'\b{0}\b'.format(other_word), true_word, sentence)

        return sentence