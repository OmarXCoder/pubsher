<template>
    <OxWidget>
        <template #header>
            <span class="mr-1">More from</span>
            <Link :href="route('profile', author)" class="text-primary-600">{{ author.name }}</Link>
        </template>

        <Link
            v-for="(post, index) in posts"
            :key="index"
            :href="route('posts.show', post)"
            class="block p-4 text-gray-700 hover:bg-white hover:text-primary-600 transition-colors"
            :class="{ 'border-t': index !== 0 }"
        >
            <h5 class="text-lg leading-6 mb-2">{{ post.title }}</h5>
            <div class="space-x-3 text-gray-500">
                <span>#php</span>
                <span>#javascript</span>
                <span>#rust</span>
            </div>
        </Link>
    </OxWidget>
</template>

<script setup>
import OxWidget from '@/Components/OxWidget.vue';

const props = defineProps({
    author: Object,
    posts: Array,
});
</script>
