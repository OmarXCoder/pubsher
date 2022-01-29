<template>
    <article class="bg-white border rounded-lg mb-3 p-5" :id="post.id">
        <header class="mb-2">
            <div class="flex items-center">
                <OxAvatar size="10" :src="post.author.avatar_url" class="border" />
                <div class="ml-2">
                    <h6 class="text-base leading-none">
                        <div
                            v-if="!post.author.is_current_user"
                            class="relative"
                            @mouseenter="showProfilePreviewCard = true"
                            @mouseleave="showProfilePreviewCard = false"
                        >
                            <Link :href="route('profile', post.author)" class="text-gray-700 hover:underline">
                                {{ post.author.name }}
                            </Link>
                            <ProfilePreviewCard v-if="showProfilePreviewCard" :user="post.author" class="absolute" />
                        </div>
                        <Link v-else :href="route('profile', post.author)" class="text-gray-700 hover:underline">
                            {{ post.author.name }}
                        </Link>
                    </h6>
                    <span class="text-gray-400 text-sm leading-3">{{ post.published_at }}</span>
                </div>
            </div>
        </header>

        <!-- Post Body -->
        <div class="pl-12">
            <h3 class="font-bold text-2xl leading-8">
                <Link :href="route('posts.show', post)" class="text-gray-900 hover:text-primary-600 transition-colors">
                    {{ post.title }}
                </Link>
            </h3>

            <div class="my-2 -mx-2">
                <a href="#" class="btn btn-sm btn-ghost hover:border hover:border-gray-200">#javascript</a>
                <a href="#" class="btn btn-sm btn-ghost hover:border hover:border-gray-200">#webdev</a>
            </div>

            <div class="flex items-center -ml-2">
                <!-- Likes Button -->
                <Link class="btn btn-ghost btn-sm" :href="route('posts.show', post)">
                    <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"
                        />
                    </svg>
                    <span v-if="post.likes_count > 0">{{ post.likes_count }} Likes</span>
                    <span v-else>Like</span>
                </Link>
                <!-- Comments Button -->
                <Link class="btn btn-ghost btn-sm" :href="route('posts.show', post)">
                    <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                        />
                    </svg>
                    <span v-if="post.comments_count > 0">{{ post.comments_count }} Comments</span>
                    <span v-else>Add Comment</span>
                </Link>

                <!-- More Button -->
                <button class="btn btn-sm btn-secondary ml-auto">
                    <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                        />
                    </svg>
                    <span>Save</span>
                </button>
            </div>
        </div>
    </article>
</template>

<script setup>
import OxAvatar from '@/Components/OxAvatar.vue';
import ProfilePreviewCard from '@/Components/ProfilePreviewCard.vue';
import { ref } from 'vue';

const props = defineProps({
    post: Object,
});

const showProfilePreviewCard = ref(false);
</script>
