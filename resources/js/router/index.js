import { createRouter, createWebHistory } from "vue-router";
import Home from "../components/home/Home.vue";
import Login from "../components/auth/Login.vue";
import Register from "../components/auth/Register.vue";
import ListAppointment from "../components/appointment/index.vue";
import CreateAppointment from "../components/appointment/create.vue";
import ListAdmin from "../components/admin/index.vue";
import CreateAdmin from "../components/admin/create.vue";
import ListDoctor from "../components/doctor/index.vue";
import CreateDoctor from "../components/doctor/create.vue";

const routes = [
    { path: "/home", name: "Home", component: Home },
    { path: "/login", name: "Login", component: Login },
    { path: "/register", name: "Register", component: Register },
    { path: "/admins/list", name: "ListAdmin", component: ListAdmin },
    { path: "/admins/create", name: "CreateAdmin", component: CreateAdmin },
    { path: "/appointments/list",  name: "ListAppointment", component: ListAppointment  },
    { path: "/appointments/create", name: "CreateAppointment", component: CreateAppointment },
    { path: "/doctors/list", name: "ListDoctor", component: ListDoctor },
    { path: "/doctors/create", name: "CreateDoctor", component: CreateDoctor },
];

const router = createRouter({
    history: createWebHistory(),
    routes,

});

export default router;
