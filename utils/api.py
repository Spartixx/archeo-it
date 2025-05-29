from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel


app = FastAPI()


app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

class TestReq(BaseModel):
    size:int
    mode:int


@app.post("/api/test")
async def passReturn(req: TestReq):
    return {"password": req.size * req.mode}
