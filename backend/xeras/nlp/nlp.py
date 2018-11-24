from .text_classification.main import TextClassificationPredict as TC
from .ner.get_name_entites import GetNameEntities as NER

class NLP:
    tc = None
    ner = None

    def setup(self):
        self.tc = TC()
        self.ner = NER()

        self.tc.setup()
        self.ner.setup()
    
    def get_predict(self, sentence='Bản màu vàng còn hàng ở Q9 TPHCM ko shop'):
        type_ask = self.tc.get_predict(sentence)
        entities = self.ner.get_predict(sentence)
        return {'type_ask': type_ask, 'entities': entities}

if __name__ == '__main__':
    nlp = NLP()
    nlp.setup()
    print(nlp.get_predict('Bản màu vàng còn hàng ở Q9 TPHCM ko shop'))