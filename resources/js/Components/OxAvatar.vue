<template>
    <div class="text-gray-400 w-" :class="[sizeClass, radiusClass]">
        <img :src="srcAttr" alt="avatar" :class="radiusClass" />
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    src: String,
    size: {
        type: [Number, String],
        default: 10,
    },
    square: {
        type: Boolean,
        default: false,
    },
    radius: {
        type: String,
        default: 'md',
    },
});

const srcAttr = computed(() => `${props.src}&size=${props.size * 4}`);

const sizeClass = computed(() => {
    return {
        6: 'w-6 h-6',
        8: 'w-8 h-8',
        10: 'w-10 h-10',
        12: 'w-12 h-12',
        14: 'w-14 h-14',
        16: 'w-16 h-16',
        20: 'w-20 h-20',
        24: 'w-24 h-24',
        28: 'w-28 h-28',
    }[props.size];
});

const radiusClass = computed(() => (props.square ? `rounded-${props.radius}` : 'rounded-full'));
</script>
