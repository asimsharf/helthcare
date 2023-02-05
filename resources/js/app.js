import "./bootstrap";
import { createApp } from "vue";

const app = createApp({});

import router from "./router";

import AppStorage from "../helpers/AppStorage";
import User from "../helpers/User";
import Token from "../helpers/Token";

app.config.globalProperties.$appStorage = AppStorage;
app.config.globalProperties.$user = User;
app.config.globalProperties.$token = Token;



app.use(router);
app.mount("#app");
