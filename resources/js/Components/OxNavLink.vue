<template>
    <Link
        :href="href"
        class="text-base font-semibold text-gray-500 hover:text-gray-900"
        :class="{ 'text-gray-900': active }"
    >
        <slot />
    </Link>
</template>

<script setup>
defineProps(['href', 'active']);
</script>
