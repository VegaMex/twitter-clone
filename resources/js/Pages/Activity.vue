<template lang="">
    <div>
        <tweet-box></tweet-box>
        <li v-for="tweet in tweetList" :key="tweet.id">
            <tweet :tweet="tweet"></tweet>
        </li>
    </div>
</template>
<script>
import Tweet from './Tweet.vue';
import TweetBox from './TweetBox.vue';

export default {
    components: {
        'tweet-box': TweetBox,
        'tweet': Tweet
    },
    props: {
        tweetList: Object
    }
}
</script>