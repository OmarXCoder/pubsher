<template>
    <OxContainer width="4xl" class="h-full flex flex-col">
        <form @submit.prevent="submit" class="bg-white rounded-lg flex-1 flex flex-col border">
            <div class="px-12 py-8">
                <div class="mb-4">
                    <textarea
                        type="text"
                        id="title"
                        class="text-5xl border-0 font-bold focus:ring-0 p-0 w-full resize-none overflow-hidden h-14"
                        v-model="form.title"
                        placeholder="New post title here..."
                        ref="titleRef"
                        @input="resize"
                    ></textarea>
                    <p v-if="form.errors.title" class="text-sm text-danger-600">{{ form.errors.title }}</p>
                </div>
            </div>

            <TipTap class="flex-1" v-model="form.content" />
        </form>
        <div class="space-x-3 mt-4">
            <button
                type="submit"
                class="btn btn-md btn-primary"
                @click="submit"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Publish
            </button>
            <button type="button" class="btn btn-md btn-secondary" @click="$emit('close')">Cancel</button>
        </div>
    </OxContainer>
</template>

<script>
import BaseLayout from '@/Layouts/BaseLayout.vue';

export default {
    layout: BaseLayout,
};
</script>

<script setup>
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import OxContainer from '@/Components/OxContainer.vue';
import TipTap from '@/Components/TipTap.vue';
import { ref, watch } from 'vue';

const props = defineProps({
    topics: Object,
});
const emit = defineEmits(['close']);

const form = useForm({
    title: '',
    content: '',
});

const areaRef = ref();
const titleRef = ref();

const submit = () => {
    console.log('submiting...');
    form.post(route('posts.store'), {
        onSuccess: (page) => {
            console.log(page.props);
        },
    });
};

const resize = (e) => {
    if (e.target.scrollHeight > e.target.offsetHeight) {
        console.log('called');
        e.target.style.height = `${e.target.scrollHeight}px`;
    }
};

// watch(
//     () => form.title,
//     (val, oldVal) => {
//         if (val.length > oldVal.length && titleRef.value.scrollHeight > titleRef.value.offsetHeight) {
//             console.log('increase');
//             titleRef.value.style.height = `${titleRef.value.scrollHeight}px`;
//         }
//         if (val.length < oldVal.length) {
//             console.log('decrease');
//             titleRef.value.style.height = `${titleRef.value.scrollHeight}px`;
//         }
//     }
// );
</script>

<style>
[contenteditable='true']:empty:before {
    content: attr(placeholder);
    pointer-events: none;
    display: block; /* For Firefox */
}
</style>
