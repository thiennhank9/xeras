import random
import pandas as pd
import spacy
from spacy.util import minibatch, compounding

class GetNameEntities:
    TRAIN_DATA = []
    nlp = None

    def load_train_data(self):
        self.TRAIN_DATA = []
        # csv_file_pd = pd.read_csv('ner/data/spacy_ner_train.csv', sep=';')
        csv_file_pd = pd.read_csv('xeras/nlp/ner/data/spacy_ner_train.csv', sep=';')

        for index, row in csv_file_pd.iterrows():
            sentence = row["sentence"]
            temp_entities = row["entities"]

            temp_entities = temp_entities.split("|")

            entities = []
            for entity in temp_entities:
                two_str = entity.split(":")
                two_str[1] = two_str[1].strip()
                index_start = sentence.find(two_str[1])
                index_end = index_start + len(two_str[1])
                entities.append((index_start, index_end, two_str[0]))

            self.TRAIN_DATA.append((sentence, {'entities': entities}))

    def train_model(self, n_iter=100):
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

    def setup(self):
        self.load_train_data()
        self.train_model()

    def get_predict(self, sentence='Bản màu vàng còn hàng ở Q9 TPHCM ko shop'):
        doc = self.nlp(sentence)
        return [(ent.label_, ent.text) for ent in doc.ents]

if __name__ == '__main__':
    ner = GetNameEntities()
    ner.setup()
    ner.get_predict('Bản màu vàng còn hàng ở Q9 TPHCM ko shop')