from pyvi import ViTokenizer, ViPosTagger
from sklearn.base import TransformerMixin, BaseEstimator
from sklearn.pipeline import Pipeline
from sklearn.feature_extraction.text import CountVectorizer, TfidfTransformer
from sklearn.linear_model import SGDClassifier

class FeatureTransformer(BaseEstimator, TransformerMixin):
    def __init__(self):
        self.tokenizer = ViTokenizer
        self.pos_tagger = ViPosTagger

    def fit(self, *_):
        return self

    def transform(self, X, y=None, **fit_params):
        result = X.apply(lambda text: self.tokenizer.tokenize(text))
        return result

class SVMModel(object):
    def __init__(self):
        self.clf = self._init_pipeline()

    @staticmethod
    def _init_pipeline():
        pipe_line = Pipeline([
            ("transformer", FeatureTransformer()),
            ("vect", CountVectorizer()),
            ("tfidf", TfidfTransformer()),
            ("clf-svm", SGDClassifier(loss='log', penalty='l2', alpha=1e-3, max_iter=5, random_state=None))
        ])

        return pipe_line