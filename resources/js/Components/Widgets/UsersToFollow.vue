<template>
    <OxWidget>
        <template #header>
            <span>Who To Follow</span>
        </template>

        <div
            v-for="(user, index) in users"
            :key="index"
            class="flex items-center p-4 hover:bg-white transition-colors"
            :class="{ 'border-t': index !== 0 }"
        >
            <OxAvatar size="12" :src="user.avatar_url" />
            <div class="ml-3 flex-1">
                <h4 class="text-lg leading-6 font-semibold">
                    <Link :href="route('profile', user)" class="text-gray-700 hover:text-primary-600 hover:underline">
                        {{ user.name }}
                    </Link>
                </h4>
                <p class="text-gray-400 text-sm">@{{ user.name }}</p>
            </div>
            <button class="btn btn-sm btn-primary">Follow</button>
        </div>
    </OxWidget>
</template>

<script setup>
import OxWidget from '@/Components/OxWidget.vue';
import OxAvatar from '@/Components/OxAvatar.vue';

const props = defineProps({
    users: Array,
});
</script>
