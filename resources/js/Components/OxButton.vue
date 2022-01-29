<template>
    <component
        :is="tag"
        class="inline-flex items-center justify-center border border-transparent ease-in-out focus:outline-none disabled:opacity-25 transition"
        :class="dynamicClass"
    >
        <slot />
    </component>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    tag: {
        type: String,
        default: 'button',
    },
    size: {
        type: String,
        default: 'md',
    },
    variant: {
        type: String,
        default: 'light',
    },
});

const dynamicClass = computed(() => {
    let cls = '';
    if (props.size === 'md') {
        cls = 'py-2 px-4 text-base leading-5 font-medium rounded-md';
    } else if (props.size === 'sm') {
        cls = 'py-1 px-2 text-sm leading-4 font-medium rounded-md';
    } else if (props.size === 'lg') {
        cls = 'py-3 px-6 text-lg leading-6 font-semibold rounded-lg';
    }

    switch (props.variant) {
        case 'primary':
            return `${cls} bg-primary-600 text-white shadow-sm hover:bg-primary-700 focus:ring-2 focus:ring-offset-2 focus:ring-primary-500`;
        case 'danger':
            return `${cls} bg-danger-600 text-white shadow-sm hover:bg-danger-700 focus:ring-2 focus:ring-offset-2 focus:ring-danger-500`;
        case 'dark':
            return `${cls} bg-gray-800 text-white shadow-sm hover:bg-gray-900 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700`;
        case 'outline-primary':
            return `${cls} text-primary-700 border-primary-600 hover:bg-primary-600 hover:text-white focus:bg-primary-700 focus:text-white`;
        case 'outline-danger':
            return `${cls} text-danger-700 border-danger-600 hover:bg-danger-600 hover:text-white focus:bg-danger-700 focus:text-white`;
        case 'outline-dark':
            return `${cls} text-gray-800 border-gray-800 hover:bg-gray-700 hover:text-white focus:bg-gray-800 focus:text-white`;
        case 'light':
        default:
            return `${cls} bg-transparent text-gray-700 hover:bg-gray-100 focus:bg-gray-200`;
    }
});
</script>
