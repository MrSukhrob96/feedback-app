import axios from "axios";

export const APP_URL = "http://localhost:8000/api";

export default axios.create({
    baseURL: APP_URL,
    headers: {
        "Content-type": "application/json",
        "Accept": "application/json",
    }
});