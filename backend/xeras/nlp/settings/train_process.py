import re
import pandas as pd
import xeras.nlp.settings.nlp_settings as Settings


class TrainProcess:
    def load_train(self, nlp):
        self.nlp_train_data = []

        csv_file_pd = pd.read_csv(Settings.PATH_FILE_TRAIN, sep=';')
        print("--- NLP: Get " + str(len(csv_file_pd)) + " sentences from file train ---")
        for index, row in csv_file_pd.iterrows():
            if index == nlp.lines_limitation:
                break
            # First, convert other word to be the true word
            row['sentence'] = nlp.same_words.replace_same_word(row['sentence'].lower())
            row['sentence'] = re.sub('[!@#$]', '', row['sentence'])
            train_data = {}
            train_data["sentence"] = row["sentence"]

            # Load train data for TC, check if having type or not
            if row["type"]:
                nlp.tc_train_data.append(
                    {"feature": row["sentence"], "target": row["type"]})
                train_data["type_ask"] = row["type"]

            # Load train data for NER
            sentence = row["sentence"].lower()

            temp_entities = row["entities"]
            
            # Check if there is no entities, just skip
            if not temp_entities:
                continue

            temp_entities = temp_entities.split("|")

            entities = []
            train_data["entities"] = []

            for entity in temp_entities:
                two_str = entity.split(":")
                # Convert the enity to be true word
                two_str[1] = nlp.same_words.replace_same_word(two_str[1].strip().lower())
                index_start = sentence.find(two_str[1])
                index_end = index_start + len(two_str[1])
                
                # Only append train data if entity is in sentence
                if index_start != -1:
                    entities.append((index_start, index_end, two_str[0]))
                    train_data["entities"].append((two_str[0], two_str[1]))

            self.nlp_train_data.append(train_data)

            # Only append train data if there is at lease an entity
            if (entities):
                nlp.ner_train_data.append((sentence, {'entities': entities}))