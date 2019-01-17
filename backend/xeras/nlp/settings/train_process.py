import re
import pandas as pd
import xeras.nlp.settings.nlp_settings as Settings


class TrainProcess:
    type_asks = []
    entities = {}
    indexs_lines_wrong = []

    def reset(self, nlp):
        self.type_asks = []
        self.entities = {}
        self.indexs_lines_wrong = []

        nlp.nlp_train_data = []
        nlp.ner_train_data = []
        nlp.tc_train_data = []

    def load_train(self, nlp):
        self.reset(nlp)

        csv_file_pd = pd.read_csv(Settings.PATH_FILE_TRAIN, sep=';')
        print("--- NLP: There are " + str(len(csv_file_pd)) + " sentences from file train ---")
        print(f"--- NLP: LIMITATION LINES: {nlp.lines_limitation} ---")
        with open(Settings.PATH_VALIDATE_DATA_TRAIN, "w", encoding="utf-8") as validate_data_train:

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

                    if row["type"].lower() not in self.type_asks:
                        self.type_asks.append(row["type"].lower())
                else:
                    # Write line wrong type ask - missing type ask
                    validate_data_train.write(f"Line {index}: Missing Type Ask\n")
                    self.indexs_lines_wrong.append(index)

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
                    entity_key = two_str[0]
                    entity_word = two_str[1]

                    # Convert the enity to be true word
                    two_str[1] = nlp.same_words.replace_same_word(two_str[1].strip().lower())
                    index_start = sentence.find(two_str[1])
                    index_end = index_start + len(two_str[1])
                    
                    # Only append train data if entity is in sentence
                    if index_start != -1:
                        entities.append((index_start, index_end, two_str[0]))
                        train_data["entities"].append((two_str[0], two_str[1]))

                        if entity_key not in self.entities:
                            self.entities[entity_key] = []

                        self.entities[entity_key].append(entity_word)       
                        self.entities[entity_key] = list(set(self.entities[entity_key]))
                    else:
                        # write line wrong entity - can not find entity in sentence
                        validate_data_train.write(f"Line {index}: Wrong Entity with ({entity})\n")
                        if index not in self.indexs_lines_wrong:
                            self.indexs_lines_wrong.append(index)

                nlp.nlp_train_data.append(train_data)

                # Write a seperate line wrong
                if index in self.indexs_lines_wrong:
                    validate_data_train.write("---------\n")

                # Only append train data if there is at lease an entity
                if (entities):
                    nlp.ner_train_data.append((sentence, {'entities': entities}))

            total_wrong_lines_train = len(self.indexs_lines_wrong)
            total_types_ask = len(self.type_asks)
            validate_data_train.write(f"Total wrong lines in data train: {total_wrong_lines_train}\n")
            validate_data_train.write(f"Total Type Asks: {total_types_ask}\n")

            if total_wrong_lines_train != 0:
                print("--- Validate train: THERE ARE SOME WRONG DATA TRAIN LINES ---\n--- PLEASE CHECK IN xeras/nlp/train/validate_data_train.txt ---")
            else:
                print("--- Validate train: NO WRONG DATA TRAIN LINES - WONDERFUL! ---")