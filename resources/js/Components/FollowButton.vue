<template>
    <button @click="toggleFollow">
        {{ user.is_followed_by ? 'Following' : 'Follow' }}
    </button>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});

const emit = defineEmits(['follow', 'unfollow']);

const toggleFollow = async () => {
    if (props.user.is_followed_by) {
        await confirmAction(
            'Unfollow',
            `If you unfollow <b>${props.user.name}</b> You will not see their posts in your feed or news letter.`,
            {
                okText: 'Unfollow',
                okVariant: 'danger',
            }
        );
    }

    Inertia.visit(route('user.followers', props.user), {
        method: props.user.is_followed_by ? 'delete' : 'post',
        data: null,
        preserveScroll: true,
        preserveState: true,
    });
};
</script>
