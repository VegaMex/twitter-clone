<template>
    <div>
        <form @submit.prevent="submit">
            <label for="username">Usuario o correo:</label>
            <input id="username" v-model="form.username" />
            <div v-if="errors.username">{{ errors.username }}</div>
            <label for="password">Contraseña:</label>
            <input id="password" type="password" v-model="form.password" />
            <div v-if="errors.password">{{ errors.password }}</div>
            <button type="submit">Iniciar sesión</button>
            <div v-if="errors.loginFail">{{ errors.loginFail[0] }}</div>
        </form>
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