<template>
    <Link :href="url" class="st-menu__link">
        <i v-if="icon" class="st-menu__icon" :class="['fa-fw', icon]"></i>
        <span class="st-menu__text" v-text="text"></span>
        <i v-if="toggle" class="st-menu__caret fad fa-chevron-down"></i>
    </Link>
</template>

<script setup>
const props = defineProps({
    url: {
        type: [Object, String],
        default: "#",
    },
    icon: String,
    text: {
        type: String,
        required: true,
    },
    toggle: {
        type: Boolean,
        default: false,
    },
});
</script>