import pandas as pd
import xeras.nlp.nlp_settings as Settings

class TestAccuracy:

    def test_accuracy(self, nlp):
        count_wrong = 0
        csv_file_pd = pd.read_csv(Settings.PATH_FILE_TRAIN, sep=';')
        print("--- Test Accuracy: Doing ---")
        with open("test_accuracy.txt", "w", encoding="utf-8") as test_accuracy:
            for index, row in csv_file_pd.iterrows():
                row['sentence'] = nlp.same_words.replace_same_word(row['sentence'].lower())
                result_nlp = nlp.get_predict(row['sentence'])

                if (result_nlp["type_ask"] != nlp.nlp_train_data[index]["type_ask"]) or (result_nlp["entities"] != nlp.nlp_train_data[index]["entities"]):
                    count_wrong += 1

                    # print("Wrong line at: " + str(index))
                    test_accuracy.write("Wrong line at: " + str(index) + "\n")

                    if (result_nlp["type_ask"] != nlp.nlp_train_data[index]["type_ask"]):
                        # print("Wrong type ask - Result NLP: " + result_nlp["type_ask"])
                        # print("Expected by train: " + self.nlp_train_data[index]["type_ask"])
                        test_accuracy.write("Wrong type ask - Result NLP: " + result_nlp["type_ask"] + "\n")
                        test_accuracy.write("Expected by train: " + nlp.nlp_train_data[index]["type_ask"] + "\n")

                    if (set(result_nlp["entities"]) != set(nlp.nlp_train_data[index]["entities"])):
                        # print("Wrong entities - Result NLP: " + str(result_nlp["entities"]))
                        # print("Expected by train: " + str(self.nlp_train_data[index]["entities"]))
                        test_accuracy.write("Wrong entities - Result NLP: " + str(result_nlp["entities"]) + "\n")
                        test_accuracy.write("Expected by train: " + str(nlp.nlp_train_data[index]["entities"]) + "\n")

            print("Total wrong lines: " + str(count_wrong))
            print("Accuracy is: " + str(100*(1 - count_wrong/len(nlp.nlp_train_data))) + "%")
            test_accuracy.write("Total wrong lines: " + str(count_wrong) + "\n")
            test_accuracy.write("Accuracy is: " + str(round(100*(1 - count_wrong/len(nlp.nlp_train_data)), 2)) + "%" + "\n")
            
            print("--- Test Accuracy: Done ---")