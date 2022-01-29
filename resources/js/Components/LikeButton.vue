<template>
    <button class="btn btn-ghost btn-sm" :class="{ '!text-danger-500 !bg-danger-100': isLiked }" @click="toggle">
        <svg v-if="isLiked" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path
                fill-rule="evenodd"
                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                clip-rule="evenodd"
            />
        </svg>
        <svg v-else class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
            />
        </svg>
        <span v-if="likesCount > 0" class="text-gray-600">{{ likesCount }} Likes</span>
        <span v-else>Like</span>
    </button>
</template>

<script setup>
const props = defineProps({
    likesCount: Number,
    isLiked: Boolean,
});

const emit = defineEmits(['like', 'remove-like']);

const toggle = () => {
    if (props.isLiked) {
        emit('remove-like');
    } else {
        emit('like');
    }
};
</script>
