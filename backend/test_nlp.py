from xeras.nlp.nlp import NLP
from xeras.nlp.same_words import SameWords


SAMPLE_SENTENCE = 'Bản màu vàng còn hàng ở Q9 TPHCM ko shop'


if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(True)
    nlp.setup()
    nlp.test_accuracy()
    same_words = SameWords()
    same_words.load_same_words()
    print(same_words.replace_same_word("xs max la dien thoai"))
    # print(nlp.get_predict(SAMPLE_SENTENCE))