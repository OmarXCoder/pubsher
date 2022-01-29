<template>
    <div class="flex">
        <h3 class="text-2xl font-bold text-gray-900">Discussion ({{ comments.length }})</h3>
        <button class="btn btn-md btn-outline-secondary ml-auto">Subscribe</button>
    </div>

    <CommentForm :post="post" @add-comment="addComment" class="mt-8" :focus="focus" @lose-focus="$emit('lose-focus')" />

    <div v-if="comments.length > 0">
        <PostComment v-for="comment in comments" :key="comment.id" :comment="comment" @delete="deleteComment" />

        <button
            v-if="links.next !== null"
            class="py-2 px-4 flex w-full border-t justify-center font-semibold bg-gray-50 text-gray-400 hover:bg-gray-100 transition-colors"
            @click.prevent="fetchComments(links.next)"
        >
            Load More
        </button>
    </div>
</template>

<script setup>
import CommentForm from '@/Components/CommentForm.vue';
import PostComment from '@/Components/Comment.vue';
import { Inertia } from '@inertiajs/inertia';
import { ref, watch } from 'vue';
import { comment } from 'postcss';

const props = defineProps({
    post: Object,
    focus: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['update-comments-count', 'lose-focus']);

const comments = ref([]);
const links = ref({});

const fetchComments = (url) => {
    Inertia.get(
        url,
        {},
        {
            preserveState: true,
            preserveScroll: true,
            onSuccess: (page) => {
                comments.value = [...comments.value, ...page.props.xhrRes?.data];
                links.value = page.props.xhrRes?.links;
            },
        }
    );
};

const addComment = (comment) => {
    comments.value.unshift(comment);
    emit('add-comment');
};

const deleteComment = (comment) => {
    comments.value = comments.value.filter((cmnt) => cmnt.id !== comment.id);
    emit('delete-comment');
};

fetchComments(route('posts.comments.index', props.post));
// watch(
//     () => props.show,
//     () => {
//         loading.value = true;

//         setTimeout(() => {
//             fetchComments(route('posts.comments.index', props.post));
//             loading.value = false;
//         }, 200);
//     }
// );
</script>
