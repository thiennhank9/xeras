import re
import pandas as pd
from xeras.nlp.tc.get_text_classification import GetTextClassification as TC
from xeras.nlp.ner.get_name_entites import GetNameEntities as NER
import xeras.nlp.settings.nlp_settings as Settings
from xeras.nlp.settings.test_accuracy import TestAccuracy
from xeras.nlp.settings.same_words import SameWords
from xeras.nlp.settings.train_process import TrainProcess
from xeras.nlp.settings.extend_predict import ExtendPredict


class NLP:
    is_used_ner = True
    is_used_tc = True

    tc = None
    ner = None
    accuracy = None
    same_words = None
    train_process = None
    extend_predict = None

    nlp_train_data = []
    tc_train_data = []
    ner_train_data = []

    is_used_model = Settings.DEFAULT_IS_USED_MODEL
    ner_tiers = Settings.DEFAULT_NER_TIERS
    is_used_same_words = Settings.DEFAULT_IS_USED_SAME_WORDS
    lines_limitation = Settings.DEFAULT_LINES_LIMITATION

    def __init__(self):
        self.tc = TC()
        self.ner = NER()
        self.accuracy = TestAccuracy()
        self.same_words = SameWords()
        self.train_process = TrainProcess()

        self.same_words.set_is_used_same_words(self.is_used_same_words)

    def set_lines_limitation(self, lines_limitation=Settings.DEFAULT_LINES_LIMITATION):
        self.lines_limitation = lines_limitation
        
    def set_is_used_model(self, is_used_model=Settings.DEFAULT_IS_USED_MODEL):
        self.is_used_model = is_used_model

    def set_is_used_same_words(self, is_used_same_words=Settings.DEFAULT_IS_USED_SAME_WORDS):
        self.is_used_same_words = is_used_same_words
        self.same_words.set_is_used_same_words(is_used_same_words)

    def set_ner_tiers(self, ner_tiers=Settings.DEFAULT_NER_TIERS):
        self.ner_tiers = ner_tiers

    def only_validate_train_data(self):
        self.tc = TC()
        self.ner = NER()
        self.same_words = SameWords()

        if self.is_used_same_words:
            self.same_words.load_same_words()
        
        self.load_train()

    def load_train(self):
        self.train_process.load_train(self)

    def setup(self):
        self.tc = TC()
        self.ner = NER()
        self.same_words = SameWords()

        if self.is_used_same_words:
            self.same_words.load_same_words()
        
        self.load_train()

        if self.is_used_tc:
            self.tc.setup(self.tc_train_data)

        if self.is_used_ner:
            self.ner.setup(self.ner_train_data, self.is_used_model, self.ner_tiers)

    def get_predict(self, sentence=Settings.SAMPLE_SENTENCE):
        if self.is_used_same_words:
            sentence = self.same_words.replace_same_word(sentence.lower().strip())
        else:
            sentence = sentence.lower().strip()
            sentence = re.sub(' +', ' ',sentence)
            sentence = re.sub('[!@#$]', '', sentence)

        type_ask = ""
        entities = []

        if self.is_used_tc:
            type_ask = self.tc.get_predict(sentence)

        if self.is_used_ner:
            entities = self.ner.get_predict(sentence)

        return {'type_ask': type_ask, 'entities': entities}

    def get_predict_type_ask_from_file(self, path_file_in=Settings.PATH_INPUT_TYPE_ASKS, path_file_out=Settings.PATH_OUTPUT_TYPE_ASKS):
        self.is_used_tc = True
        self.is_used_ner = False

        self.setup()

        extend_predict = ExtendPredict()
        extend_predict.get_predict_type_ask_from_file(self, path_file_in, path_file_out)

    def test_accuracy(self):
        self.accuracy = TestAccuracy()
        self.accuracy.test_accuracy(self)


if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(False)
    nlp.setup()
    print(nlp.get_predict(Settings.SAMPLE_SENTENCE))
