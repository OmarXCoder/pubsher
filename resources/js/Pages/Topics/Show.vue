<template>
    <OxContainer class="flex">
        <TopicsPanel :topics="topics.data" />
        <div class="px-6 max-w-2xl">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="flex p-3">
                    <OxAvatar size="24" :src="topic.data.avatar_url" square />
                    <div class="ml-4">
                        <h4 class="text-gray-700 font-semibold mb-3 text-3xl">{{ topic.data.name }}</h4>
                        <button
                            class="btn btn-md"
                            :class="[topic.data.is_followed_by ? 'btn-outline-secondary' : 'btn-primary']"
                            @click="toggleFollow"
                        >
                            {{ followButtonText }}
                        </button>
                    </div>
                </div>
            </div>
            <PostCard v-for="post in posts.data" :key="post.id" :post="post" />
        </div>
    </OxContainer>
</template>

<script setup>
import OxContainer from '@/Components/OxContainer.vue';
import TopicsPanel from '@/Components/TopicsPanel.vue';
import PostCard from '@/Components/PostCard.vue';
import OxAvatar from '@/Components/OxAvatar.vue';
import { Inertia } from '@inertiajs/inertia';
import { computed } from 'vue';
0;

const props = defineProps({
    topic: Object,
    topics: Object,
    posts: Object,
});

const followButtonText = computed(() => {
    const text = props.topic.data.is_followed_by ? `Following` : 'Follow';
    const count = props.topic.data.followers_count > 0 ? props.topic.data.followers_count : '';

    return `${text} ${count}`.trim();
});

const toggleFollow = () => {
    Inertia.visit(route('topic.followers', props.topic.data), {
        method: props.topic.data.is_followed_by ? 'delete' : 'post',
        data: {},
        preserveState: true,
        preserveScroll: true,
    });
};
</script>
