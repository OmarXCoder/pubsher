<template>
    <textarea
        class="
            border-gray-300
            focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50
            rounded-md
            shadow-sm
            w-full
        "
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    ></textarea>
</template>

<script setup>
const { ref } = require('vue');

defineProps(['modelValue']);
defineEmits(['update:modelValue']);

const input = ref('');

const focus = () => {
    input.value.focus();
};
</script>
