<template>
    <aside class="app-sidebar" id="js-st-sidebar" data-backdrop="true">
        <div class="st-logo">
            <Link href="/" class="text-light text-decoration-none">
                <i class="fab fa-wordpress fa-2x me-2"></i>
                <span class="fs-4">Inertia</span>
            </Link>
        </div>
        <div class="st-nav">
            <div class="scrollable">
                <div class="scrollable__container">
                    <StMenu :items="menuItems" />
                </div>
                <!-- .scrollable__container -->
            </div>
            <!-- .scrollable -->
        </div>
        <!-- .st-nav -->
    </aside>
</template>

<script setup>
import { ref } from 'vue';
import StMenu from '@/Components/StMenu.vue';

const menuItems = ref([
    {
        url: '/',
        icon: 'fad fa-house-flood',
        text: 'dashboard',
    },
    {
        url: '/posts',
        icon: 'fad fa-newspaper',
        text: 'posts',
    },
]);
</script>
