<template>

    <div class="page-header">
        <h1 class="page-title">Auth</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <router-link to="/home">Dashboard</router-link>
            </li>
            <li class="breadcrumb-item">
                <router-link to="/home">Home</router-link>
            </li>
            <li class="breadcrumb-item active">Home</li>
        </ol>

        <dev class="page-content">
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Basic</h3>
                </header>
                <div class="panel-body">
                    <h1>Auth</h1>
                </div>
            </div>
        </dev>
    </div>
</template>


<script>
import { userInfo } from 'os';

export default {
    name: 'Login',
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            axiox.post('/api/login', this.form)
                .then(res => User.responseAfterLogin(res))
                .catch(error => console.log(error.response.data))
        }
    }
}

</script>
