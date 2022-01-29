<template>
    <OxContainer class="flex relative">
        <aside class="w-16 flex flex-col items-center space-y-6 md:pt-16">
            <div class="flex flex-col items-center">
                <button
                    class="btn btn-sm btn-circle text-gray-500 !border-2 hover:bg-danger-100 hover:text-danger-500"
                    :class="{ 'text-danger-500 !border-danger-500 bg-danger-100': post.data.is_liked_by }"
                    @click="toggleLike"
                >
                    <svg v-if="post.data.is_liked_by" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <svg v-else class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                        />
                    </svg>
                </button>
                <span :class="{ 'text-danger-500': post.data.is_liked_by }">
                    {{ post.data.likes_count }}
                </span>
            </div>
            <div class="flex flex-col items-center">
                <a
                    href="#comments"
                    @click="focusOnCommentInput = true"
                    class="btn btn-sm btn-circle text-gray-500 hover:bg-primary-100 hover:text-primary-500"
                >
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                        />
                    </svg>
                </a>
                <span>{{ post.data.comments_count }}</span>
            </div>
        </aside>
        <article class="bg-white overflow-hidden border rounded-lg flex-1 mx-4">
            <header class="px-16 pt-8">
                <div class="flex items-center mb-6">
                    <OxAvatar size="12" :src="post.data.author.avatar_url" class="border" />
                    <div class="ml-3">
                        <h4 class="text-lg mb-1 font-semibold leading-5">
                            <a href="#" class="text-gray-700 hover:underline">{{ post.data.author.name }}</a>
                        </h4>
                        <span class="text-gray-400 text-sm leading-3">{{ post.data.published_at }}</span>
                    </div>
                </div>
                <h1 class="text-5xl font-extrabold mb-4">{{ post.data.title }}</h1>

                <div class="my-2 -mx-2">
                    <a href="#" class="btn btn-sm !text-base btn-ghost hover:border hover:border-gray-200">#php</a>
                    <a href="#" class="btn btn-sm !text-base btn-ghost hover:border hover:border-gray-200">#webdev</a>
                </div>
            </header>
            <div class="px-16 py-8">
                <div v-html="post.data.content"></div>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam non, dolore illo obcaecati vero
                aspernatur explicabo sint commodi ipsam tenetur deserunt ex vitae perferendis quibusdam, vel repudiandae
                est. Aliquam, accusantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis magni
                dolorum, nemo esse soluta ab amet, error praesentium vero a aut expedita, explicabo tenetur! Sequi
                dolorum praesentium quod porro in. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis
                dicta non expedita impedit odio perferendis necessitatibus voluptates eligendi saepe suscipit? Quis
                maiores officiis alias voluptates distinctio corrupti harum, inventore aliquam.
            </div>
            <section class="border-t px-16 py-8" id="comments">
                <CommentsSection
                    :show="true"
                    :post="post.data"
                    :focus="focusOnCommentInput"
                    @lose-focus="focusOnCommentInput = false"
                />
            </section>
        </article>
        <aside class="w-80 flex-grow-0">
            <ProfilePreviewCard :user="post.data.author" class="!bg-gray-50 !w-full mb-4" />
            <AuthorRelatedPostsWidget :author="post.data.author" :posts="authorRelatedPosts.data" />
        </aside>
    </OxContainer>
</template>

<script setup>
import OxContainer from '@/Components/OxContainer.vue';
import OxAvatar from '@/Components/OxAvatar.vue';
import ProfilePreviewCard from '@/Components/ProfilePreviewCard.vue';
import CommentsSection from '@/Components/CommentsSection.vue';
import AuthorRelatedPostsWidget from '@/Components/Widgets/AuthorRelatedPosts.vue';

import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    post: {
        type: Object,
        default: {},
    },
    authorRelatedPosts: {
        type: Object,
        default: {},
    },
});

const focusOnCommentInput = ref(false);

const toggleLike = () => {
    Inertia.visit(route('post.likes', props.post.data), {
        method: props.post.data.is_liked_by ? 'delete' : 'post',
        data: null,
        preserveScroll: true,
        preserveState: true,
    });
};
</script>
