<template>
    <div class="tweet-box">
        <form @submit.prevent="submit">
            <div class="tweet-box-input">
                <img class="avatar" src="https://www.danoneinstitute.org/wp-content/uploads/2020/06/logo-rond-twitter.png" alt="Logo"/>
                <input id="message" v-model="form.message" type="text" placeholder="¿Qué está pasando?" />
            </div>
            <div class="tweet-input-bottom">
                <p>{{ remaining }}</p>
                <button :disabled="isDisabled" class="tweet-box-button" type="submit">Tweet</button>
            </div>
        </form>
    </div>
</template>
<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    setup () {
        const form = reactive({
            message: "",
        })

        function submit() {
            Inertia.post('/home', form)
        }

        return { form, submit }
    },
    computed: {
        isDisabled() {
            return this.form.message.length < 1 || this.form.message.length > 250;
        },
        remaining() {
            if (this.form.message.length >= 250) {
                return 'No te quedan caracteres'
            } else {
                return `Te quedan ${250 - this.form.message.length} caracteres`
            }
        }
    }
}    
</script>