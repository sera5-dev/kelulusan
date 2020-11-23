import os
import numpy
import pandas
import json

from csv import writer
from csv import DictWriter

from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix
from sklearn.metrics import classification_report

from sklearn.preprocessing import LabelEncoder

from sklearn.model_selection import KFold
from sklearn.model_selection import cross_val_score
from sklearn.model_selection import train_test_split

from sklearn import tree
from sklearn.svm import SVC as SVM
from sklearn.naive_bayes import GaussianNB as NVB
from sklearn.linear_model import SGDClassifier as SGD
from sklearn.tree import DecisionTreeClassifier as DTR
from sklearn.neighbors import KNeighborsClassifier as KNN
from sklearn.ensemble import RandomForestClassifier as RFR
from sklearn.linear_model import LogisticRegression as LGR
from sklearn.discriminant_analysis import LinearDiscriminantAnalysis as LDA

class Model:
    def __init__(self, dataset, excludes, transforms, target):
        self.dataset = dataset
        self.excludes = excludes
        self.transforms = transforms
        self.target = target
        self.splits = []
        self.df = []
        self.model = RFR()

    def data_frame(self):
        df = pandas.read_csv(self.dataset)
        df.dropna(0, inplace=True)
        df = df.drop(self.excludes, axis=1)
        for attr in self.transforms :
            df[attr] = LabelEncoder().fit_transform(df[attr])
        self.df = df
        return df

    def train_data(self):
        df = self.data_frame()
        X = df.drop(self.target, axis='columns')
        Y = df[self.target]
        self.splits = train_test_split(X,Y)
        return train_test_split(X,Y)

    def feature_importances(self):
        self.model.fit(self.splits[0], self.splits[2])
        return dict(zip(self.df.columns, self.model.feature_importances_))

    def compare_algo(self):
        models = []

        models.append(('SVM', SVM()))
        models.append(('NVB', NVB()))
        models.append(('DTR', DTR()))
        models.append(('SGD', SGD()))
        models.append(('KNN', KNN()))
        models.append(('LDA', LDA()))
        models.append(('LGR', LGR(max_iter=200)))
        models.append(('RFR', RFR()))

        cross_validation = []

        for name, model in models:
            model.fit(self.splits[0], self.splits[2])
            cv_results = cross_val_score(model, self.splits[0], self.splits[2], cv=KFold(n_splits=10))
            cv = {}
            cv["name"] = name
            cv["mean"] = round(cv_results.mean()*100,2)
            cv["acc"] = round(accuracy_score(self.splits[3], model.predict(self.splits[1]))*100)
            cross_validation.append(cv)

        return cross_validation

    def report(self):
        self.train_data()
        self.model.fit(self.splits[0], self.splits[2])
        predictions = self.model.predict(self.splits[1])
        report = classification_report(self.splits[3], predictions, output_dict=True)
        self.export_image()
        return pandas.DataFrame(report).transpose()

    def predict(self, data):
        self.train_data()
        self.model.fit(self.splits[0], self.splits[2])
        labels = ["TEPAT","TERLAMBAT"]
        return self.model.predict(data)

    def export_image(self, estimators=49, columns=13, file='tree') :
        self.train_data()
        self.model.fit(self.splits[0], self.splits[2])
        tree.export_graphviz(
            self.model.estimators_[estimators], 
            out_file='output/'+file+'.dot',  
            feature_names=self.df.columns[0:columns],
            class_names = ['LULUS TEPAT','LULUS TERLAMBAT'],
        )
        os.system('dot -Tpng '+ 'output/'+file+'.dot -o ' + 'output/'+file+'.png')

def to_str(var):
    if type(var) is list:
        return str(var)[1:-1]
    if type(var) is numpy.ndarray:
        try:
            return str(list(var[0]))[1:-1]
        except TypeError:
            return str(list(var))[1:-1]
    return str(var)

def append_list_as_row(file_name, list_of_elem):
    with open(file_name, 'a+', newline='') as write_obj:
        csv_writer = writer(write_obj)
        csv_writer.writerow(list_of_elem)

def serialize(data, action):
    if action == "predict" :
        return [
            data.jenis_kelamin, data.status_mahasiswa, data.umur, data.status_nikah, data.ips1, data.ips2, data.ips3, data.ips4, data.ips5, data.ips6, data.ips7, data.ips8, data.ipk 
        ]
    elif action == "validate" :
        if data.jenis_kelamin == 1 :
            jenis_kelamin = "PEREMPUAN"
        elif data.jenis_kelamin == 0 :
            jenis_kelamin = "LAKI - LAKI"

        if data.status_mahasiswa == 1 :
            status_mahasiswa = "MAHASISWA"
        elif data.status_mahasiswa == 0 :
            status_mahasiswa = "BEKERJA"

        if data.status_nikah == 1 :
            status_nikah = "MENIKAH"
        elif data.status_nikah == 0 :
            status_nikah = "BELUM MENIKAH"

        if data.status_kelulusan == 1 :
            status_kelulusan = "TERLAMBAT"
        elif data.status_kelulusan == 0 :
            status_kelulusan = "TEPAT"

        return [
            data.nama, jenis_kelamin, status_mahasiswa, data.umur, status_nikah, data.ips1, data.ips2, data.ips3, data.ips4, data.ips5, data.ips6, data.ips7, data.ips8, data.ipk, status_kelulusan
        ]

def run(
        uri  = '../dataset/datakelulusanmahasiswa.csv',
        exc  = ['NAMA'],
        tfm  = ['JENIS KELAMIN', 'STATUS MAHASISWA', 'STATUS NIKAH', 'STATUS KELULUSAN'],
        trg  = 'STATUS KELULUSAN',
        data = [0,0,25,0,2.5,2.5,3,3,2.7,2.8,2.9,3,3],
        action = 'predict'
    ):
    x = Model(uri, exc, tfm, trg)
    x.train_data()

    if action == 'predict' :
        data = serialize(data, action)
        return to_str(x.predict([data]))

    elif action == 'performance' :
        return x.report()

    elif action == 'compare' :
        return x.compare_algo()

    elif action == 'importances' :
        return x.feature_importances()

    elif action == 'export' :
        return x.export_image()

    elif action == 'validate' :
        data = serialize(data, action)
        append_list_as_row(uri, data)
