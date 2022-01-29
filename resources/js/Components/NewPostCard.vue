<template>
    <div
        class="bg-white overflow-hidden shadow rounded-lg mb-4 p-4 border border-transparent cursor-pointer transition-colors duration-300 hover:border-gray-100 hover:bg-gray-50"
        @click="showNewPostModal = true"
    >
        <div class="flex items-center">
            <OxAvatar size="6" :src="$page.props.auth.user.avatar_url" />
            <h6 class="font-semibold ml-2 text-gray-600">Omar Ali</h6>
        </div>
        <div class="mt-4">
            <h2 class="text-2xl text-gray-400">What's in your mind?</h2>
        </div>
    </div>
    <PostModal :show="showNewPostModal" @close="showNewPostModal = false" />
</template>

<script setup>
import OxAvatar from '@/Components/OxAvatar.vue';
import PostModal from '@/Components/PostModal.vue';
import { ref } from 'vue';

const showNewPostModal = ref(false);
</script>

<style></style>
