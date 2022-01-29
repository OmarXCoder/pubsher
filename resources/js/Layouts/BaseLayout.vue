<template>
    <main class="h-full">
        <slot />
    </main>
    <AppFlashMessages />
    <ConfirmActionDialog />
</template>

<script setup>
import AppFlashMessages from '@/Components/AppFlashMessages.vue';
import ConfirmActionDialog from '@/Components/ConfirmActionDialog.vue';
</script>

<style>
html,
body,
#app {
    height: 100%;
}
</style>
