from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import random


app = FastAPI()


app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class PasswordReq(BaseModel):
    size:int
    mode:str


@app.post("/api/password")
def generate_password(passwordSettings: PasswordReq):
    uppercase_letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
    lowercase_letters = "abcdefghijklmnopqrstuvwxyz"
    digits = "123456789"
    special_characters = "!@#$%^&*()-=+[]{|;:,.<>?/"

    modes = [uppercase_letters, lowercase_letters]

    if passwordSettings.mode == "1":
        modes = [uppercase_letters, lowercase_letters]
    elif passwordSettings.mode == "2":
        modes = [uppercase_letters, lowercase_letters, digits]
    elif passwordSettings.mode == "3":
        modes = [uppercase_letters, lowercase_letters, digits, special_characters]


    password = [random.choice(mode) for mode in modes]
    used_chars = ''.join(modes)
    password += random.choices(used_chars, k=passwordSettings.size - len(password))

    random.shuffle(password)
    passwordStr = ''.join(password)
    print(passwordStr)

    return {"password": passwordStr}
