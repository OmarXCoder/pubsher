<template>
    <OxContainer class="flex">
        <AppMenu :topics="topics.data" />
        <div class="px-6 max-w-2xl flex-1">
            <nav class="mb-2">
                <Link
                    href="#"
                    class="btn btn-md text-gray-500 hover:bg-gray-200 active:bg-gray-200 !font-semibold"
                    :class="{ '!font-bold text-gray-800': true }"
                >
                    Relevant
                </Link>
                <Link
                    href="#"
                    class="btn btn-md text-gray-500 hover:bg-gray-200 active:bg-gray-200 !font-semibold"
                    :class="{ '!font-bold text-gray-800': false }"
                >
                    Latest
                </Link>
                <Link
                    href="#"
                    class="btn btn-md text-gray-500 hover:bg-gray-200 active:bg-gray-200 !font-semibold"
                    :class="{ '!font-bold text-gray-800': false }"
                >
                    Trending
                </Link>
            </nav>
            <template v-if="postsList.length > 0">
                <PostCard v-for="post in postsList" :key="post.id" :post="post" />

                <button
                    v-if="links.next !== null"
                    @click="loadMorePosts(links.next)"
                    class="py-2 px-4 flex w-full rounded-lg justify-center shadow font-semibold bg-gray-50 text-gray-400 hover:bg-gray-100 transition-colors"
                >
                    Nex Page
                </button>
            </template>
        </div>
        <aside class="w-80 flex-grow-0">
            <OxWidget>
                <div class="p-4">
                    <img src="/img/banner.png" class="rounded-lg" alt="abnner" />
                    <h4 class="text-xl leading-6 font-semibold mt-3 text-gray-800">Join Our 2022's Bootcamp</h4>
                    <p class="text-gray-500 mt-3">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea mollitia et praesentium.
                    </p>
                </div>
            </OxWidget>
            <UsersToFollowWidget :users="usersToFollow.data" />
        </aside>
    </OxContainer>
</template>

<script setup>
import OxContainer from '@/Components/OxContainer.vue';
import OxWidget from '@/Components/OxWidget.vue';
import UsersToFollowWidget from '@/Components/Widgets/UsersToFollow.vue';
import AppMenu from '@/Components/AppMenu.vue';
import PostCard from '@/Components/PostCard.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    topics: Object,
    posts: Object,
    usersToFollow: Object,
});

const postsList = ref(props.posts.data);
const links = ref(props.posts.links);

const loadMorePosts = (url) => {
    Inertia.get(
        url,
        {},
        {
            onSuccess: (page) => {
                postsList.value = [...postsList.value, ...page.props.posts?.data];
                links.value = page.props.posts?.links;
            },
            preserveScroll: true,
            preserveState: true,
            only: ['posts'],
        }
    );
};
</script>
