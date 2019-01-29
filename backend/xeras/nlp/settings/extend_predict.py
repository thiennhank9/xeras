import pandas as pd
from pandas import DataFrame
import numpy as np
import xeras.nlp.settings.nlp_settings as Settings

class ExtendPredict:
    def get_predict_type_ask_from_file(self, nlp, path_file_in=Settings.PATH_INPUT_TYPE_ASKS, path_file_out=Settings.PATH_OUTPUT_TYPE_ASKS):
        file_in = pd.read_csv(path_file_in, sep=';')

        sentences = []
        type_asks = []

        # Predict then append to array
        for index, row in file_in.iterrows():
            sentences.append(row["sentence"])
            type_asks.append(nlp.get_predict(row["sentence"])["type_ask"])
        
        # Print to file excel
        data_frame = DataFrame({"sentences":sentences, "type_asks":type_asks})
        data_frame.index = np.arange(1, len(data_frame) + 1)
        data_frame.to_excel(path_file_out, sheet_name='sheet1', index=True)
