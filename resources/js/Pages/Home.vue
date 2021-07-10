<template lang="">
    <div>
        Página principal del home
        <form @submit.prevent="submit">
            <inertia-link href="/logout" method="post">Logout</inertia-link>
        </form>
        <activity :tweetList="this.tweets"></activity>
    </div>
</template>
<script>
import Activity from './Activity.vue'

export default {
    components: {
        'activity': Activity,
    },
    props: {
        tweets: Object
    },
}
</script>