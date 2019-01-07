import pandas as pd
import xeras.nlp.nlp_settings as Settings

class TestAccuracy:

    def test_accuracy(self, nlp):
        count_wrong_total = 0
        count_wrong_type_ask = 0
        count_wrong_entities = 0

        csv_file_pd = pd.read_csv(Settings.PATH_FILE_TRAIN, sep=';')
        print("--- Test Accuracy: Doing ---")
        with open("test_accuracy.txt", "w", encoding="utf-8") as test_accuracy:
            for index, row in csv_file_pd.iterrows():
                if index == nlp.lines_limitation:
                    break
                # row['sentence'] = nlp.same_words.replace_same_word(row['sentence'].lower().strip())

                result_nlp = nlp.get_predict(row['sentence'])

                is_type_ask_wrong = result_nlp["type_ask"] != nlp.nlp_train_data[index]["type_ask"]
                is_entities_wrong = set(result_nlp["entities"]) != set(nlp.nlp_train_data[index]["entities"])

                if is_type_ask_wrong or is_entities_wrong:
                    count_wrong_total += 1

                    test_accuracy.write("Wrong line at: " + str(index) + "\n")
                    test_accuracy.write("Wrong sentence: " + row['sentence'] + "\n")
                    if is_type_ask_wrong:
                        test_accuracy.write("Wrong type ask - Result NLP: " + result_nlp["type_ask"] + "\n")
                        test_accuracy.write("Expected by train: " + nlp.nlp_train_data[index]["type_ask"] + "\n")
                        count_wrong_type_ask += 1

                    if is_entities_wrong:
                        test_accuracy.write("Wrong entities - Result NLP: " + str(result_nlp["entities"]) + "\n")
                        test_accuracy.write("Expected by train: " + str(nlp.nlp_train_data[index]["entities"]) + "\n")
                        count_wrong_entities += 1

            total_accuracy = round(100*(1 - count_wrong_total/len(nlp.nlp_train_data)), 2)
            type_ask_accuracy = round(100*(1 - count_wrong_type_ask/len(nlp.tc_train_data)), 2)
            entities_accuracy = round(100*(1 - count_wrong_entities/len(nlp.ner_train_data)), 2)

            print("Total wrong lines: " + str(count_wrong_total))
            print("Total accuracy is: " + str(total_accuracy) + "%\n")
            test_accuracy.write("Total wrong lines: " + str(count_wrong_total) + "\n")
            test_accuracy.write("Total accuracy is: " + str(total_accuracy) + "%" + "\n\n")

            print("Type ask wrong lines: " + str(count_wrong_type_ask))
            print("Type ask accuracy is: " + str(type_ask_accuracy) + "%\n")
            test_accuracy.write("Type ask wrong lines: " + str(count_wrong_type_ask) + "\n")
            test_accuracy.write("Type ask accuracy is: " + str(type_ask_accuracy) + "%\n\n")

            print("Entities wrong lines: " + str(count_wrong_entities))
            print("Entities accuracy is: " + str(entities_accuracy) + "%\n")
            test_accuracy.write("Entities wrong lines: " + str(count_wrong_entities) + "\n")
            test_accuracy.write("Entities accuracy is: " + str(entities_accuracy) + "%\n\n")

            print("--- Test Accuracy: Done ---")