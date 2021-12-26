<template>
    <div class="app-content container">
        <TopicsPanel :topics="topics.data" />
        <div class="main-content">
            <div class="card">
                <div class="d-flex p-3">
                    <div class="avatar avatar--lg">
                        <img src="http://placeimg.com/64/64/any" alt="" />
                    </div>
                    <div>
                        <h4>{{ topic.data.name }}</h4>
                    </div>
                </div>
            </div>
            <PostCard v-for="post in posts.data" :key="post.id" :post="post" />
        </div>
    </div>
</template>

<script setup>
import PostCard from '@/Components/PostCard.vue';
import TopicsPanel from '@/Components/TopicsPanel.vue';

const props = defineProps({
    topic: Object,
    topics: Object,
    posts: Object,
});
</script>
