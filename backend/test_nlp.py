import re
from xeras.nlp.nlp import NLP
from xeras.nlp.settings.same_words import SameWords


SAMPLE_SENTENCE = 'Bản màu vàng còn hàng ở Q9 TPHCM ko shop'
TEST_SAME_WORD = "Anh ơi, em muốn mua iphone 6s 32gb vào cuối tuần này, không biết cửa hàng ở 4B cộng hoà còn nhiều hàng để xem không vậy?"

def test_accuracy():
    nlp = NLP()
    nlp.setup()
    nlp.test_accuracy()
    # print(nlp.get_predict(SAMPLE_SENTENCE))

def test_same_word():
    same_words = SameWords()
    same_words.load_same_words()
    # print(TEST_SAME_WORD)
    # print(same_words.replace_same_word(TEST_SAME_WORD))

def test_validate_data_train():
    nlp = NLP()
    nlp.only_validate_train_data()

def get_predict_type_ask_from_file():
    nlp = NLP()
    nlp.get_predict_type_ask_from_file()

if __name__ == '__main__':
    # test_validate_data_train()
    # test_accuracy()
    # test_same_word()
    get_predict_type_ask_from_file()
