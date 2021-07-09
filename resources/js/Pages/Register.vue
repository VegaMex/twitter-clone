<template>
    <div>
        <form @submit.prevent="submit">
            <label for="name">Nombre:</label>
            <input id="name" v-model="form.name" />
            <div v-if="errors.name">{{ errors.name }}</div>
            <label for="username">Usuario:</label>
            <input id="username" v-model="form.username" />
            <div v-if="errors.username">{{ errors.username }}</div>
            <label for="email">Correo:</label>
            <input id="email" v-model="form.email" />
            <div v-if="errors.email">{{ errors.password }}</div>
            <label for="password">Contraseña:</label>
            <input id="password" type="password" v-model="form.password" />
            <div v-if="errors.password">{{ errors.password }}</div>
            <button type="submit">Registrar</button>
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
            name: null,
            username: null,
            email: null,
            password: null
        })

        function submit() {
            Inertia.post('/register', form)
        }

        //console.log(form);

        return { form, submit }
    },
}
</script>