<template>
    <OxModal :show="show">
        <template #title>
            <h5 class="text-lg mb-4 leading-6 font-semibold text-gray-900">New Post</h5>
        </template>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" class="form-control" v-model="form.title" placeholder="Post Title" />
                <p v-if="form.errors.title" class="text-sm text-danger-600">{{ form.errors.title }}</p>
            </div>

            <div class="mb-4">
                <label for="topic" class="form-label">Choose Topic</label>
                <select id="topic" class="form-control" v-model="form.topic_id">
                    <option v-for="topic in topics" :key="topic.id" :value="topic.id">{{ topic.name }}</option>
                </select>
                <p v-if="form.errors.topic_id" class="text-sm text-danger-600">{{ form.errors.topic_id }}</p>
            </div>

            <div class="mb-4">
                <label for="content" class="form-label">Content</label>
                <textarea
                    id="content"
                    class="form-control"
                    v-model="form.content"
                    rows="4"
                    placeholder="Post content"
                ></textarea>
                <p v-if="form.errors.content" class="text-sm text-danger-600">{{ form.errors.content }}</p>
            </div>
        </form>

        <template #footer>
            <div class="space-x-3">
                <button type="button" class="btn btn-ghost" @click="$emit('close')">Cancel</button>
                <button
                    type="submit"
                    class="btn btn-primary"
                    @click="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Publish
                </button>
            </div>
        </template>
    </OxModal>
</template>

<script setup>
import OxModal from '@/Components/OxModal.vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const props = defineProps({
    show: false,
});

const emit = defineEmits(['close']);

const page = usePage();
const form = useForm({
    title: '',
    content: '',
    topic_id: '',
});

const topics = page.props.value.topics.data;

const submit = () => {
    console.log('submiting...');
    form.post(route('posts.store'), {
        onSuccess: (page) => {
            emit('close');
        },
    });
};
</script>
