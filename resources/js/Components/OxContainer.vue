<template>
    <div class="container mx-auto p-4" :class="[widthClass]">
        <slot />
    </div>
</template>

<script setup>
import { computed } from 'vue';
const props = defineProps({
    width: {
        type: String,
        default: '7xl',
    },
});

const widthClass = computed(() => {
    return {
        '4xl': 'max-w-4xl',
        '5xl': 'max-w-5xl',
        '7xl': 'max-w-7xl',
    }[props.width];
});
</script>
