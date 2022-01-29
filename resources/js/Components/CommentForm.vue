<template>
    <form @submit.prevent="addComment" class="flex items-start">
        <OxAvatar size="10" :src="$page.props.auth.user.avatar_url" />
        <div class="flex-1 ml-3">
            <textarea
                class="form-control block"
                placeholder="Add a comment"
                rows="3"
                v-model="form.comment"
                ref="textarea"
                @focusout="$emit('lose-focus')"
            ></textarea>

            <div class="flex mt-3">
                <button class="btn btn-md btn-primary">Comment</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import OxAvatar from '@/Components/OxAvatar.vue';
import { ref, watch } from 'vue';

const props = defineProps({
    post: Object,
    focus: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['add-comment', 'lose-focus']);

const form = useForm({
    comment: '',
});

const textarea = ref();

const addComment = () => {
    if (!form.comment) {
        return;
    }

    form.post(route('posts.comments.store', props.post), {
        onSuccess: (res) => {
            emit('add-comment', res.props.xhrRes?.data);
            form.reset();
        },
        preserveScroll: true,
        preserveState: true,
        only: ['xhrRes', 'posts'],
    });
};

watch(
    () => props.focus,
    (focus) => setTimeout(() => focus && textarea.value.focus(), 500)
);
</script>
