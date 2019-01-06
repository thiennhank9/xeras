from xeras.nlp.nlp import NLP


SAMPLE_SENTENCE = 'Bản màu vàng còn hàng ở Q9 TPHCM ko shop'


if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(True)
    nlp.setup()
    # nlp.test_accuracy()
    # print(nlp.get_predict(SAMPLE_SENTENCE))