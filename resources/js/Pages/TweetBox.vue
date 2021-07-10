<template>
    <div>
        <form @submit.prevent="submit">
            <div>
                <input v-model="form.message" type="text" placeholder="¿Qué está pasando?" />
            </div>
            <button type="submit">Tweet</button>
        </form>        
    </div>
</template>
<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    setup () {
        const form = reactive({
            message: null,
        })

        function submit() {
            Inertia.post('/home', form)
        }

        return { form, submit }
    },
}    
</script>