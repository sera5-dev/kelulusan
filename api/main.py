import base64
from fastapi import FastAPI
from fastapi.responses import FileResponse 
from pydantic import BaseModel
from model import *

class Prediction(BaseModel):
    nama: str
    jenis_kelamin: int
    status_mahasiswa: int
    umur: int
    status_nikah: int
    ips1: float
    ips2: float
    ips3: float
    ips4: float
    ips5: float
    ips6: float
    ips7: float
    ips8: float
    ipk: float
    status_kelulusan: int

app = FastAPI()

@app.get("/")
async def root():
    return {"message": "API Sistem Prediksi Kelulusan"}

@app.post("/")
async def create_prediction(prediction: Prediction):
    return {"result": run(data=prediction)}

@app.get("/comparison")
async def get_comparison():
    return run(action="compare") 

@app.get("/importances")
async def get_importances():
    return run(action="importances") 

@app.get("/performances")
async def get_performance():
    return run(action="performance")

@app.get("/graphic")
async def get_graphic():
    with open("./output/tree.png", "rb") as image_file:
       encoded_image_string = base64.b64encode(image_file.read())
    return { "mime" : "image/png", "image": encoded_image_string}

@app.post("/validate")
async def validate(prediction: Prediction):
    run(action="validate", data=prediction)
    return {"status" : 1, "message" : "data successfully saved"}
