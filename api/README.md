pip install -r requirements.txt

uvicorn main:app

route

+ GET "/" info page
+ GET "/performance" return model performance score
+ GET "/comparison" return score of algorithm comparison 
+ GET "/importances" return importances score of each feature
+ GET "/graphic" return base64 image tree
+ POST "/" return prediction score
+ POST "/validate" save valid prediction
