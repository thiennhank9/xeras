import re
import pandas as pd
from xeras.nlp.tc.get_text_classification import GetTextClassification as TC
from xeras.nlp.ner.get_name_entites import GetNameEntities as NER
import xeras.nlp.nlp_settings as Settings
from xeras.nlp.test_accuracy import TestAccuracy
from xeras.nlp.same_words import SameWords


class NLP:
    tc = None
    ner = None
    accuracy = None
    same_words = None

    nlp_train_data = []
    tc_train_data = []
    ner_train_data = []

    is_used_model = False
    is_used_same_words = True
    ner_tiers = 50
    lines_limitation = 100

    def __init__(self):
        self.tc = TC()
        self.ner = NER()
        self.accuracy = TestAccuracy()
        self.same_words = SameWords()
        self.same_words.set_is_used_same_words(self.is_used_same_words)

    def set_is_used_model(self, is_used_model=False):
        self.is_used_model = is_used_model

    def set_is_used_same_words(self, is_used_same_words=False):
        self.is_used_same_words = is_used_same_words
        self.same_words.set_is_used_same_words(is_used_same_words)

    def load_train(self):
        self.nlp_train_data = []

        csv_file_pd = pd.read_csv(Settings.PATH_FILE_TRAIN, sep=';')
        print("--- NLP: Get " + str(len(csv_file_pd)) + " sentences from file train ---")
        for index, row in csv_file_pd.iterrows():
            if index == self.lines_limitation:
                break
            # First, convert other word to be the true word
            row['sentence'] = self.same_words.replace_same_word(row['sentence'].lower())
            row['sentence'] = re.sub('[!@#$]', '', row['sentence'])
            train_data = {}
            train_data["sentence"] = row["sentence"]

            # Load train data for TC, check if having type or not
            if row["type"]:
                self.tc_train_data.append(
                    {"feature": row["sentence"], "target": row["type"]})
                train_data["type_ask"] = row["type"]

            # Load train data for NER
            sentence = row["sentence"].lower()

            temp_entities = row["entities"]
            
            # Check if there is no entities, just skip
            if not temp_entities:
                continue

            temp_entities = temp_entities.split("|")

            entities = []
            train_data["entities"] = []

            for entity in temp_entities:
                two_str = entity.split(":")
                # Convert the enity to be true word
                two_str[1] = self.same_words.replace_same_word(two_str[1].strip().lower())
                index_start = sentence.find(two_str[1])
                index_end = index_start + len(two_str[1])
                
                # Only append train data if entity is in sentence
                if index_start != -1:
                    entities.append((index_start, index_end, two_str[0]))
                    train_data["entities"].append((two_str[0], two_str[1]))

            self.nlp_train_data.append(train_data)

            # Only append train data if there is at lease an entity
            if (entities):
                self.ner_train_data.append((sentence, {'entities': entities}))

    def setup(self):
        self.tc = TC()
        self.ner = NER()
        self.same_words = SameWords()

        if (self.is_used_same_words):
            self.same_words.load_same_words()
        
        self.load_train()

        self.tc.setup(self.tc_train_data)
        self.ner.setup(self.ner_train_data, self.is_used_model)

    def get_predict(self, sentence=Settings.SAMPLE_SENTENCE):
        sentence = self.same_words.replace_same_word(sentence.lower().strip())

        type_ask = self.tc.get_predict(sentence)
        entities = self.ner.get_predict(sentence)

        return {'type_ask': type_ask, 'entities': entities}
        
    def test_accuracy(self):
        self.accuracy = TestAccuracy()
        self.accuracy.test_accuracy(self)

if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(False)
    nlp.setup()
    print(nlp.get_predict(Settings.SAMPLE_SENTENCE))
