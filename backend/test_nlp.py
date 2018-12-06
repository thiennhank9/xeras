from xeras.nlp.nlp import NLP


SAMPLE_SENTENCE = 'Ko lấy quà được giảm bao nhiêu v ạ'


if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(False)
    nlp.setup()
    print(nlp.get_predict(SAMPLE_SENTENCE))