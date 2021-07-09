<template lang="">
    <div>
        Página principal del home
        <form @submit.prevent="submit">
            <!-- <button type="submit">Cerrar sesión</button> -->
            <inertia-link href="/logout" method="post">Logout</inertia-link>
        </form>
    </div>
</template>
<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    setup() {
        function submit() {
            Inertia.post('/logout', form)
        }

        return { submit }
    }
}
</script>