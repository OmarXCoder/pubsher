<template>
    <div class="flex mt-8">
        <OxAvatar size="10" :src="commentData.user.avatar_url" />
        <div class="flex-1 ml-3">
            <div class="rounded-lg border p-4">
                <div class="mb-1 flex items-start">
                    <div class="flex items-center">
                        <h6 class="text-base font-semibold leading-4">
                            <a href="#" class="text-gray-900 hover:underline">{{ commentData.user?.name }}</a>
                        </h6>
                        <span class="mx-2 text-xs text-gray-300 font-bold">•</span>
                        <span class="text-gray-400 text-sm">{{ commentData.published_at_diff }}</span>
                    </div>
                    <button
                        v-if="commentData.by_current_user"
                        class="btn btn-sm btn-circle btn-ghost !text-gray-400 hover:!text-gray-700 ml-auto -mr-2 -mt-2"
                        @click.prevent="deleteComment"
                    >
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
                <div class="text-gray-500">{{ commentData.body }}</div>
            </div>
            <div class="flex mt-2">
                <LikeButton
                    :likes-count="commentData.likes_count"
                    :is-liked="commentData.is_liked_by"
                    @like="like"
                    @remove-like="removeLike"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import OxAvatar from '@/Components/OxAvatar.vue';
import LikeButton from '@/Components/LikeButton.vue';
import { ref } from 'vue';

const props = defineProps({
    comment: Object,
});

const commentData = ref(props.comment);

const emit = defineEmits(['delete']);

const deleteComment = () => {
    confirmAction(
        'Are you sure you want to delete this comment?',
        'You cannot undo this action, perhaps you just want to Edit instead?',
        {
            okVariant: 'danger',
            okText: 'Delete',
        }
    ).then(() => {
        Inertia.delete(route('comments.destroy', props.comment), {
            preserveScroll: true,
            only: ['posts'],
            onSuccess: () => {
                emit('delete', props.comment);
            },
        });
    });
};

const like = async () => {
    const res = await axios.post(route('comments.likes.store', props.comment));
    commentData.value = { ...commentData.value, ...res.data.data };
};

const removeLike = async () => {
    const res = await axios.delete(route('comments.likes.destroy', props.comment));
    commentData.value = { ...commentData.value, ...res.data.data };
};
</script>
