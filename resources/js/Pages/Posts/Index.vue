<template>
    <div class="app-content container">
        <TopicsPanel :topics="topics.data" />
        <div class="main-content">
            <PostCard v-for="post in posts.data" :key="post.id" :post="post" class="mb-3" />
        </div>
    </div>
</template>

<script setup>
import TopicsPanel from '@/Components/TopicsPanel.vue';
import PostCard from '@/Components/PostCard.vue';

const props = defineProps({
    topics: Object,
    posts: Object,
});
</script>
