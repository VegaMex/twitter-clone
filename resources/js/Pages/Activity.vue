<template>
    <div class="activity-container">
        <div class="activity-header">
            <h2>Inicio</h2>
        </div>
        <tweet-box></tweet-box>
        <div class="tweets-container">
            <div class="tweets" v-for="tweet in tweetList.slice().reverse()" :key="tweet.id">
                <tweet :tweet="tweet"></tweet>
            </div>
        </div>
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