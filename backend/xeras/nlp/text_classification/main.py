import pandas as pd
from libs import SVMModel

class TextClassificationPredict(object):
    train_data_df = []
    model_predict = {}

    def __init__(self):
        self.test = None

    def pre_train(self):
        train_data = []

        # Read data train from file train.csv
        csv_file_pd = pd.read_csv('data/train_data.csv', sep=';')
        for index, row in csv_file_pd.iterrows():
            train_data.append(
                {"feature": row["sentence"], "target": row["type"]})
        
        # Add train data to data frame
        self.train_data_df = pd.DataFrame(train_data)

    def build_model(self):
        # Build model from train data
        model = SVMModel()
        self.model_predict = model.clf.fit(
            self.train_data_df.feature, self.train_data_df.target)

    def setup(self):
        self.pre_train()
        self.build_model()

    # Pass the input sentence to predict
    def get_predict(self, input_sentence):
        predict_data = []
        predict_data.append({"feature": input_sentence, "target": ""})
        to_predict = pd.DataFrame(predict_data)

        # Get predict result of input
        predict_result = self.model_predict.predict(to_predict.feature)

        return predict_result

if __name__ == '__main__':
    tcp = TextClassificationPredict()
    tcp.setup()

    print(tcp.get_predict("Còn khuyến mãi ko shop ơi"))
