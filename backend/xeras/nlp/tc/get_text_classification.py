import pandas as pd
from .libs import SVMModel

class GetTextClassification(object):
    train_data_df = []
    model_predict = {}
    model = None

    def __init__(self):
        self.test = None

    def load_train_data(self, tc_train_data = []):
        # Add train data to data frame
        print("--- TC: Loading train data ---")
        self.train_data_df = pd.DataFrame(tc_train_data)

    def train_model(self):
        print("--- TC: Building model ---")
        # Build model from train data
        model = SVMModel()
        self.model_predict = model.clf.fit(
            self.train_data_df.feature, self.train_data_df.target)

    def setup(self, tc_train_data = []):
        self.load_train_data(tc_train_data)
        self.train_model()

    # Pass the input sentence to predict
    def get_predict(self, input_sentence='Bản màu vàng còn hàng ở Q9 TPHCM ko shop'):
        predict_data = []
        predict_data.append({"feature": input_sentence, "target": ""})
        to_predict = pd.DataFrame(predict_data)

        print("--- TC: Predicting ---")
        # Get predict result of input
        predict_result = self.model_predict.predict(to_predict.feature)

        return predict_result[0]


if __name__ == '__main__':
    tcp = GetTextClassification()
    tcp.setup()

    print(tcp.get_predict("Bản màu vàng còn hàng ở Q9 TPHCM ko shop"))
