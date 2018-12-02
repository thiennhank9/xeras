# Comment these two lines below when run python main
from .tc.main import TextClassificationPredict as TC
from .ner.get_name_entites import GetNameEntities as NER

# Un-comment these two line below when run python main
# from tc.get_text_classification import GetTextClassification as TC
# from ner.get_name_entites import GetNameEntities as NER

import pandas as pd

PATH_FILE_TRAIN = 'train_data.csv'
SAMPLE_SENTENCE = 'Bản màu vàng còn hàng ở Q9 TPHCM ko shop'


class NLP:
    tc = None
    ner = None
    tc_train_data = []
    ner_train_data = []

    def load_train(self):
        csv_file_pd = pd.read_csv(PATH_FILE_TRAIN, sep=';')

        for index, row in csv_file_pd.iterrows():
            # Load train data for TC
            self.tc_train_data.append(
                {"feature": row["sentence"], "target": row["type"]})
            
            # Load train data for NER
            sentence = row["sentence"].lower()
            temp_entities = row["entities"]

            temp_entities = temp_entities.split("|")

            entities = []
            for entity in temp_entities:
                two_str = entity.split(":")
                two_str[1] = two_str[1].strip().lower()
                index_start = sentence.find(two_str[1])
                index_end = index_start + len(two_str[1])
                entities.append((index_start, index_end, two_str[0]))

            self.ner_train_data.append((sentence, {'entities': entities}))

    def setup(self):
        self.tc = TC()
        self.ner = NER()

        self.load_train()

        self.tc.setup(self.tc_train_data)
        self.ner.setup(self.ner_train_data)
    
    def get_predict(self, sentence=SAMPLE_SENTENCE):
        type_ask = self.tc.get_predict(sentence)
        entities = self.ner.get_predict(sentence)
        return {'type_ask': type_ask, 'entities': entities}


if __name__ == '__main__':
    nlp = NLP()
    nlp.setup()
    print(nlp.get_predict(SAMPLE_SENTENCE))
