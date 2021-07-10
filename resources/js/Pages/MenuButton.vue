<template>
    <button class="menu-button">
        <slot></slot>
        <span>{{ text }}</span>
    </button>
</template>
<script>
export default {  
    props: {
        text: String
    }
}
</script>