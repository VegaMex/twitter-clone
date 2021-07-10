<template>
    <div class="form">
        <div>
            <div class="logo" style="display: block; padding-left: 0px;">
                <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 3.01006C23 3.01006 20.9821 4.20217 19.86 4.54006C19.2577 3.84757 18.4573 3.35675 17.567 3.13398C16.6767 2.91122 15.7395 2.96725 14.8821 3.29451C14.0247 3.62177 13.2884 4.20446 12.773 4.96377C12.2575 5.72309 11.9877 6.62239 12 7.54006V8.54006C10.2426 8.58562 8.50127 8.19587 6.93101 7.4055C5.36074 6.61513 4.01032 5.44869 3 4.01006C3 4.01006 -1 13.0101 8 17.0101C5.94053 18.408 3.48716 19.109 1 19.0101C10 24.0101 21 19.0101 21 7.51006C20.9991 7.23151 20.9723 6.95365 20.92 6.68006C21.9406 5.67355 23 3.01006 23 3.01006Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>        
            <div class="form-text">
                Iniciar sesión en Twitter
            </div>            
            <form @submit.prevent="submit">
                <label for="username">Usuario o correo:</label>
                <input class="form-input" type="text" id="username" v-model="form.username" />
                <div v-if="errors.username">{{ errors.username }}</div>
                <label for="password">Contraseña:</label>
                <input class="form-input" type="password" id="password" v-model="form.password" />
                <div v-if="errors.password">{{ errors.password }}</div>
                <button class="left-bar-button" style="width: 300px;" type="submit">Iniciar sesión</button>
                <div v-if="errors.loginFail">{{ errors.loginFail[0] }}</div>
            </form>
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    props: {
        errors: Object
    },
    setup () {
        const form = reactive({
            username: null,
            password: null
        })

        function submit() {
            Inertia.post('/login', form)
        }

        return { form, submit }
    },
}
</script>