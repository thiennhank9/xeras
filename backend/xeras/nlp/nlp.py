from xeras.nlp.tc.get_text_classification import GetTextClassification as TC
from xeras.nlp.ner.get_name_entites import GetNameEntities as NER
import pandas as pd
import re

PATH_FILE_TRAIN = 'xeras/nlp/train_data.csv'
SAMPLE_SENTENCE = 'Ipx giá nhiêu nhỉ'
PATH_FILE_SAME_WORDS = 'xeras/nlp/same_words.csv'


class NLP:
    tc = None
    ner = None
    tc_train_data = []
    ner_train_data = []
    same_words = {}
    is_used_model = False
    nlp_train_data = []

    def set_is_used_model(self, is_used_model=False):
        self.is_used_model = is_used_model

    def load_train(self):
        self.nlp_train_data = []

        csv_file_pd = pd.read_csv(PATH_FILE_TRAIN, sep=';')
        print("--- NLP: Get " + str(len(csv_file_pd)) + " sentences from file train ---")
        for index, row in csv_file_pd.iterrows():
            # First, convert other word to be the true word
            row['sentence'] = self.replace_same_word(row['sentence'].lower())

            train_data = {}
            train_data["sentence"] = row["sentence"]

            # Load train data for TC, check if having type or not
            if row["type"]:
                self.tc_train_data.append(
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
                two_str[1] = self.replace_same_word(two_str[1].strip().lower())
                index_start = sentence.find(two_str[1])
                index_end = index_start + len(two_str[1])
                
                # Only append train data if entity is in sentence
                if index_start != -1:
                    entities.append((index_start, index_end, two_str[0]))
                    train_data["entities"].append((two_str[0], two_str[1]))
                    
            self.nlp_train_data.append(train_data)
            # Only append train data if there is at lease an entity
            if (entities):
                self.ner_train_data.append((sentence, {'entities': entities}))

    def setup(self):
        self.tc = TC()
        self.ner = NER()

        self.load_same_words()
        self.load_train()

        self.tc.setup(self.tc_train_data)
        self.ner.setup(self.ner_train_data, self.is_used_model)

    def get_predict(self, sentence=SAMPLE_SENTENCE):
        sentence = self.replace_same_word(sentence.lower().strip())

        type_ask = self.tc.get_predict(sentence)
        entities = self.ner.get_predict(sentence)
        return {'type_ask': type_ask, 'entities': entities}
    
    def load_same_words(self):
        csv_file_pd = pd.read_csv(PATH_FILE_SAME_WORDS, sep=';')

        for index, row in csv_file_pd.iterrows():
            true_word = row["true_word"].lower().strip()
            other_words_array = row["other_words"].split(',')

            for other_word in other_words_array:
                # Lower and remove front and back spaces
                other_word = other_word.lower().strip()

                # Add to dictionary. EX: same_words['ip X'] = Iphone X
                self.same_words[other_word] = true_word
    
    def replace_same_word(self, sentence=SAMPLE_SENTENCE):
        sentence = sentence.lower().strip()
        for other_word, true_word in self.same_words.items():
            # Replace other word with the true word defined
            if other_word in sentence:
                sentence = re.sub(r'\b{0}\b'.format(other_word), true_word, sentence)

        return sentence
    
    def test_accuracy(self):
        count_wrong = 0
        csv_file_pd = pd.read_csv(PATH_FILE_TRAIN, sep=';')

        with open("test_accuracy.txt", "w", encoding="utf-8") as test_accuracy:
            for index, row in csv_file_pd.iterrows():
                row['sentence'] = self.replace_same_word(row['sentence'].lower())
                result_nlp = self.get_predict(row['sentence'])

                if (result_nlp["type_ask"] != self.nlp_train_data[index]["type_ask"]) or (result_nlp["entities"] != self.nlp_train_data[index]["entities"]):
                    count_wrong += 1

                    print("Wrong line at: " + str(index))
                    test_accuracy.write("Wrong line at: " + str(index) + "\n")

                    if (result_nlp["type_ask"] != self.nlp_train_data[index]["type_ask"]):
                        print("Wrong type ask - Result NLP: " + result_nlp["type_ask"])
                        print("Expected by train: " + self.nlp_train_data[index]["type_ask"])
                        test_accuracy.write("Wrong type ask - Result NLP: " + result_nlp["type_ask"] + "\n")
                        test_accuracy.write("Expected by train: " + self.nlp_train_data[index]["type_ask"] + "\n")

                    if (result_nlp["entities"] != self.nlp_train_data[index]["entities"]):
                        print("Wrong entities - Result NLP: " + str(result_nlp["entities"]))
                        print("Expected by train: " + str(self.nlp_train_data[index]["entities"]))
                        test_accuracy.write("Wrong entities - Result NLP: " + str(result_nlp["entities"]) + "\n")
                        test_accuracy.write("Expected by train: " + str(self.nlp_train_data[index]["entities"]) + "\n")

            print("Total wrong lines: " + str(count_wrong))
            print("Accuracy is: " + str(100*(1 - count_wrong/len(self.nlp_train_data))) + "%")
            test_accuracy.write("Total wrong lines: " + str(count_wrong) + "\n")
            test_accuracy.write("Accuracy is: " + str(round(100*(1 - count_wrong/len(self.nlp_train_data)), 2)) + "%" + "\n")


if __name__ == '__main__':
    nlp = NLP()
    # nlp.set_is_used_model(False)
    nlp.setup()
    print(nlp.get_predict(SAMPLE_SENTENCE))
