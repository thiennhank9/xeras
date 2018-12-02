import random
import pandas as pd
import spacy
from spacy.util import minibatch, compounding

PATH_MODEL_NER = 'ner/model'

class GetNameEntities:
    TRAIN_DATA = []
    nlp = None

    def load_train_data(self, ner_train_data = []):
        print("--- NER: Loading file train ---")
        self.TRAIN_DATA = ner_train_data

    def load_model(self):
        self.nlp = spacy.load(PATH_MODEL_NER)

    def train_model(self, n_iter=100):
        print("--- NER: Building model ---")
        """Load the model, set up the pipeline and train the entity recognizer."""
        self.nlp = spacy.blank('en')  # Just leave en, not vi

        self.nlp.vocab.vectors.name = 'spacy_pretrained_vectors'
        # create the built-in pipeline components and add them to the pipeline
        # nlp.create_pipe works for built-ins that are registered with spaCy
        if 'ner' not in self.nlp.pipe_names:
            ner = self.nlp.create_pipe('ner')
            self.nlp.add_pipe(ner, last=True)
        # otherwise, get it so we can add labels
        else:
            ner = self.nlp.get_pipe('ner')

        # add labels
        for _, annotations in self.TRAIN_DATA:
            for ent in annotations.get('entities'):
                ner.add_label(ent[2])

        # get names of other pipes to disable them during training
        other_pipes = [pipe for pipe in self.nlp.pipe_names if pipe != 'ner']
        with self.nlp.disable_pipes(*other_pipes):  # only train NER
            optimizer = self.nlp.begin_training()
            for itn in range(n_iter):
                random.shuffle(self.TRAIN_DATA)
                losses = {}
                # batch up the examples using spaCy's minibatch
                batches = minibatch(self.TRAIN_DATA, size=compounding(4., 32., 1.001))
                for batch in batches:
                    texts, annotations = zip(*batch)
                    self.nlp.update(
                        texts,  # batch of texts
                        annotations,  # batch of annotations
                        drop=0.5,  # dropout - make it harder to memorise data
                        sgd=optimizer,  # callable to update weights
                        losses=losses)

    def setup(self, ner_train_data = [], is_used_model=False):
        self.load_train_data(ner_train_data)
        if is_used_model:
            self.load_model()
        else:
            self.train_model()

    def get_predict(self, sentence='Bản màu vàng còn hàng ở Q9 TPHCM ko shop'):
        print("--- NER: Predicting ---")
        # self.nlp.to_disk(PATH_MODEL_NER)
        doc = self.nlp(sentence)
        return [(ent.label_, ent.text) for ent in doc.ents]

if __name__ == '__main__':
    ner = GetNameEntities()
    ner.setup()
    ner.get_predict('Bản màu vàng còn hàng ở Q9 TPHCM ko shop')