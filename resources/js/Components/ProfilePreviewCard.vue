<template>
    <div class="rounded-lg overflow-hidden border bg-white w-80 z-50">
        <div class="h-10 bg-gray-900"></div>
        <div class="px-4 pb-4">
            <div class="flex items-end -mt-4">
                <OxAvatar size="12" :src="user.avatar_url" />
                <h5 class="font-bold text-xl leading-7 ml-3">
                    <Link :href="route('profile', user)">{{ user.name }}</Link>
                </h5>
            </div>
            <div class="my-4">
                <FollowButton
                    :user="user"
                    class="btn btn-md w-full"
                    :class="[user.is_followed_by ? 'btn-outline-secondary' : 'btn-primary']"
                />
            </div>
            <div>
                <p class="text-gray-500">Team lead and Software Engineer at Spantags&reg;. From Cairo, Egypt</p>
                <div class="mt-4">
                    <h5 class="text-gray-400 uppercase font-bold text-sm mb-1">Location</h5>
                    <h6>Cairo, Egypt</h6>
                </div>
                <div class="mt-4">
                    <h5 class="text-gray-400 uppercase font-bold text-sm mb-1">Work</h5>
                    <h6>Software Engineer at Spantags&reg;</h6>
                </div>
                <div class="mt-4">
                    <h5 class="text-gray-400 uppercase font-bold text-sm mb-1">Joined</h5>
                    <h6>Aug 10, 2018</h6>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import OxAvatar from '@/Components/OxAvatar.vue';
import FollowButton from '@/Components/FollowButton.vue';

defineProps({
    user: {
        type: Object,
        required: true,
    },
});
</script>

<style></style>
