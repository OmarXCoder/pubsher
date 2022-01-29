<template>
    <OxContainer class="flex py-5">
        <TopicsPanel :topics="topics.data" />
        <div class="px-6 max-w-2xl flex-1">
            <template v-if="posts.data.length > 0">
                <PostCard v-for="post in posts.data" :key="post.id" :post="post" />

                <Link
                    v-if="posts.links.next !== null"
                    :href="posts.links.next"
                    class="py-2 px-4 flex w-full rounded-lg justify-center shadow font-semibold bg-gray-50 text-gray-400 hover:bg-gray-100 transition-colors"
                >
                    Nex Page
                </Link>
            </template>
        </div>
    </OxContainer>
</template>

<script setup>
import OxContainer from '@/Components/OxContainer.vue';
import TopicsPanel from '@/Components/TopicsPanel.vue';
import PostCard from '@/Components/PostCard.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    topics: Object,
    posts: Object,
});

// const postsList = ref(props.posts.data);
// const links = ref(props.posts.links);

// const loadMorePosts = async (url) => {
//     Inertia.get(
//         url,
//         {},
//         {
//             onSuccess: (page) => {
//                 postsList.value = [...postsList.value, ...page.props.posts?.data];
//                 links.value = page.props.posts?.links;
//             },
//             preserveScroll: true,
//             preserveState: true,
//             only: ['posts'],
//         }
//     );
// };
</script>
