import random
import pandas as pd
import spacy
from spacy.util import minibatch, compounding
import datetime
import xeras.nlp.settings.nlp_settings as Settings


PATH_MODEL_NER = Settings.PATH_MODEL_NER
PATH_LOGS_NER = Settings.PATH_LOGS_NER


class GetNameEntities:
    TRAIN_DATA = []
    nlp = None
    is_used_model = Settings.DEFAULT_IS_USED_MODEL
    ner_tiers = Settings.DEFAULT_NER_TIERS

    def load_train_data(self, ner_train_data = []):
        print("--- NER: Loading file train ---")
        self.TRAIN_DATA = []
        self.TRAIN_DATA = ner_train_data

        self.print_log_file_df()

    def print_log_file_df(self):
        print("--- NER: Print file log ---")
        with open(PATH_LOGS_NER, 'w', encoding="utf-8-sig") as file:
            for train_data in self.TRAIN_DATA:
                file.write(str(train_data))
                file.write("\n")
        print("--- NER: Processed " + str(len(self.TRAIN_DATA)) + " sentences train ---")

    def load_model(self):
        print("--- NER: Saving model ---")
        self.nlp = spacy.load(PATH_MODEL_NER)

    def save_model(self):
        self.nlp.to_disk(PATH_MODEL_NER)

    def train_model(self):
        print("--- NER: Building model ---")
        time_start = datetime.datetime.now()
        print("--- NER: Start building model at " + str(time_start) + " ---")
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
            for itn in range(self.ner_tiers):
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
        
        time_end = datetime.datetime.now()
        print("--- NER: End building model at " + str(time_end) + " ---")

        time_amount = time_end - time_start
        print("--- NER: Amount time is " + str(time_amount) + " ---")

    def setup(self, ner_train_data = [], is_used_model=Settings.DEFAULT_IS_USED_MODEL, ner_tiers=Settings.DEFAULT_NER_TIERS):
        self.is_used_model = is_used_model
        self.ner_tiers = ner_tiers

        self.load_train_data(ner_train_data)
        if is_used_model:
            self.load_model()
        else:
            self.train_model()
            self.save_model()

    def get_predict(self, sentence='Bản màu vàng còn hàng ở Q9 TPHCM ko shop'):
        # print("--- NER: Predicting ---")

        doc = self.nlp(sentence)
        return [(ent.label_, ent.text) for ent in doc.ents]

if __name__ == '__main__':
    ner = GetNameEntities()
    ner.setup()
    ner.get_predict('Bản màu vàng còn hàng ở Q9 TPHCM ko shop')