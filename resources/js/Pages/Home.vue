<template>
    <div class="wrap">
        <left-bar :name="this.userInfo[0].name" :username="this.userInfo[0].username"></left-bar>
        <activity :tweetList="this.tweets"></activity>
        <right-bar></right-bar>
    </div>
</template>
<script>
import LeftBar from './LeftBar.vue'
import Activity from './Activity.vue'
import RightBar from './RightBar.vue'

export default {
    components: {
        'left-bar': LeftBar,
        'activity': Activity,
        'right-bar': RightBar
    },
    props: {
        tweets: Object,
        userInfo: Object
    },
}
</script>