<template>
    <AppNavbar />
    <main class="app-main">
        <slot />
    </main>

    <AppFlashMessages />
    <ConfirmActionDialog />
</template>

<script setup>
import AppNavbar from '@/Components/AppNavbar.vue';
import AppFlashMessages from '@/Components/AppFlashMessages.vue';
import ConfirmActionDialog from '@/Components/ConfirmActionDialog.vue';
</script>
