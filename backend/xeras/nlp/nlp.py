from xeras.nlp.tc.get_text_classification import GetTextClassification as TC
from xeras.nlp.ner.get_name_entites import GetNameEntities as NER
import pandas as pd


PATH_FILE_TRAIN = 'xeras/nlp/train_data.csv'
SAMPLE_SENTENCE = 'Ipx giá nhiêu nhỉ'
PATH_FILE_SAME_WORDS = 'xeras/nlp/same_words.csv'


class NLP:
    tc = None
    ner = None
    tc_train_data = []
    ner_train_data = []
    same_words = {}
    is_used_model = False

    def set_is_used_model(self, is_used_model=False):
        self.is_used_model = is_used_model

    def load_train(self):
        csv_file_pd = pd.read_csv(PATH_FILE_TRAIN, sep=';')
        print("--- NLP: Get " + str(len(csv_file_pd)) + " sentences from file train ---")
        for index, row in csv_file_pd.iterrows():
            # First, convert other word to be the true word
            row['sentence'] = self.replace_same_word(row['sentence'].lower())

            # Load train data for TC, check if having type or not
            if row["type"]:
                self.tc_train_data.append(
                    {"feature": row["sentence"], "target": row["type"]})
            
            # Load train data for NER
            sentence = row["sentence"].lower()

            temp_entities = row["entities"]
            
            # Check if there is no entities, just skip
            if not temp_entities:
                continue

            temp_entities = temp_entities.split("|")

            entities = []
            for entity in temp_entities:
                two_str = entity.split(":")
                # Convert the enity to be true word
                two_str[1] = self.replace_same_word(two_str[1].strip().lower())
                index_start = sentence.find(two_str[1])
                index_end = index_start + len(two_str[1])
                
                # Only append train data if entity is in sentence
                if index_start != -1:
                    entities.append((index_start, index_end, two_str[0]))

            # Only append train data if there is at lease an entity
            if (entities):
                self.ner_train_data.append((sentence, {'entities': entities}))

    def setup(self):
        self.tc = TC()
        self.ner = NER()

        self.load_same_words()
        self.load_train()

        self.tc.setup(self.tc_train_data)
        self.ner.setup(self.ner_train_data, self.is_used_model)

    
    def get_predict(self, sentence=SAMPLE_SENTENCE):
        sentence = self.replace_same_word(sentence.lower().strip())

        type_ask = self.tc.get_predict(sentence)
        entities = self.ner.get_predict(sentence)
        return {'type_ask': type_ask, 'entities': entities}
    
    def load_same_words(self):
        csv_file_pd = pd.read_csv(PATH_FILE_SAME_WORDS, sep=';')

        for index, row in csv_file_pd.iterrows():
            true_word = row["true_word"].lower().strip()
            other_words_array = row["other_words"].split(',')

            for other_word in other_words_array:
                # Lower and remove front and back spaces
                other_word = other_word.lower().strip()

                # Add to dictionary. EX: same_words['ip X'] = Iphone X
                self.same_words[other_word] = true_word
    
    def replace_same_word(self, sentence=SAMPLE_SENTENCE):
        sentence = sentence.lower().strip()
        for other_word, true_word in self.same_words.items():
            # Replace other word with the true word defined
            if other_word in sentence:
                sentence = sentence.replace(other_word, true_word)

        return sentence


if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(False)
    nlp.setup()
    print(nlp.get_predict(SAMPLE_SENTENCE))
