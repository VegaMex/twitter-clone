<template lang="">
    <div>
        {{ tweet.id }}
        {{ tweet.message }}
        {{ tweet.name[0].name }}
        {{ tweet.username[0].username }}
        {{ tweet.date }}
    </div>
</template>
<script>
export default {
    props: {
        tweet: Object
    }
}
</script>