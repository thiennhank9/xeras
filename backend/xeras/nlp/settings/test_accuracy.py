import pandas as pd
from pandas import DataFrame
import numpy as np
import xeras.nlp.settings.nlp_settings as Settings

class TestAccuracy:

    def test_accuracy(self, nlp):
        count_wrong_total = 0
        count_wrong_type_ask = 0
        count_wrong_entities = 0

        correct_sentences = []
        correct_type_asks = []
        correct_entities = []

        wrong_sentences = []
        wrong_at = []
        expected_type_ask = []
        actual_type_ask = []
        expected_entites = []
        actual_entities = []

        csv_file_pd = pd.read_csv(Settings.PATH_FILE_TRAIN, sep=';')
        print("--- Test Accuracy: Doing ---")
        with open(Settings.PATH_TEST_ACCURACY, "w", encoding="utf-8") as test_accuracy:
            for index, row in csv_file_pd.iterrows():
                if index == nlp.lines_limitation:
                    break
                
                result_nlp = nlp.get_predict(row['sentence'])

                is_type_ask_wrong = result_nlp["type_ask"] != nlp.nlp_train_data[index]["type_ask"]
                is_entities_wrong = set(result_nlp["entities"]) != set(nlp.nlp_train_data[index]["entities"])
                
                if is_type_ask_wrong or is_entities_wrong:
                    count_wrong_total += 1

                    test_accuracy.write("Wrong line at: " + str(index) + "\n")
                    test_accuracy.write("Wrong sentence: " + row['sentence'] + "\n")
                    wrong_sentences.append(row['sentence'])

                    if is_entities_wrong and is_type_ask_wrong:
                        wrong_at.append("Type Ask + Entities")
                    elif is_type_ask_wrong:
                        wrong_at.append("Type Ask")
                    elif is_entities_wrong:
                        wrong_at.append("Entities")

                    if is_type_ask_wrong:
                        test_accuracy.write("Wrong type ask - Result NLP: " + result_nlp["type_ask"] + "\n")
                        test_accuracy.write("Expected by train: " + nlp.nlp_train_data[index]["type_ask"] + "\n")
                        
                        actual_type_ask.append(result_nlp["type_ask"])
                        expected_type_ask.append(nlp.nlp_train_data[index]["type_ask"])
                        
                        count_wrong_type_ask += 1
                    else:
                        actual_type_ask.append("")
                        expected_type_ask.append("")

                    if is_entities_wrong:
                        test_accuracy.write("Wrong entities - Result NLP: " + str(result_nlp["entities"]) + "\n")
                        test_accuracy.write("Expected by train: " + str(nlp.nlp_train_data[index]["entities"]) + "\n")
                        
                        actual_entities.append(result_nlp["entities"])
                        expected_entites.append(nlp.nlp_train_data[index]["entities"])
                        count_wrong_entities += 1
                    else:
                        actual_entities.append("")
                        expected_entites.append("")

                else:
                    correct_sentences.append(row['sentence'])
                    correct_type_asks.append(result_nlp["type_ask"])
                    correct_entities.append(result_nlp["entities"])

            total_accuracy = round(100*(1 - count_wrong_total/len(nlp.nlp_train_data)), 2)
            type_ask_accuracy = round(100*(1 - count_wrong_type_ask/len(nlp.tc_train_data)), 2)
            entities_accuracy = round(100*(1 - count_wrong_entities/len(nlp.ner_train_data)), 2)

            print("Total wrong lines: " + str(count_wrong_total))
            print("Total accuracy is: " + str(total_accuracy) + "%")
            test_accuracy.write("Total wrong lines: " + str(count_wrong_total) + "\n")
            test_accuracy.write("Total accuracy is: " + str(total_accuracy) + "%" + "\n")

            print("Type ask wrong lines: " + str(count_wrong_type_ask))
            print("Type ask accuracy is: " + str(type_ask_accuracy) + "%")
            test_accuracy.write("Type ask wrong lines: " + str(count_wrong_type_ask) + "\n")
            test_accuracy.write("Type ask accuracy is: " + str(type_ask_accuracy) + "%\n")

            print("Entities wrong lines: " + str(count_wrong_entities))
            print("Entities accuracy is: " + str(entities_accuracy) + "%")
            test_accuracy.write("Entities wrong lines: " + str(count_wrong_entities) + "\n")
            test_accuracy.write("Entities accuracy is: " + str(entities_accuracy) + "%\n")

            data_frame = DataFrame({'Correct sentences': correct_sentences, 'Type ask': correct_type_asks, 'Entities': correct_entities})
            data_frame.index = np.arange(1, len(data_frame) + 1)
            data_frame.to_excel(Settings.PATH_CORRECT_SENTENCES, sheet_name='sheet1', index=True)

            data_frame = DataFrame({'Wrong sentences': wrong_sentences, 'Wrong at': wrong_at, 'Actual Type Ask': actual_type_ask, 'Expected Type Ask': expected_type_ask, 'Actual Entities': actual_entities, 'Expected Entities': expected_entites})
            data_frame.index = np.arange(1, len(data_frame) + 1)
            data_frame.to_excel(Settings.PATH_WRONG_SENTENCES, sheet_name='sheet1', index=True)

            print("--- Test Accuracy: Done ---")