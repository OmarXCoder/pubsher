<template>
    <aside class="side-panel w-52 shrink-0">
        <div v-for="topic in topics" :key="topic.id">
            <Link
                :href="route('topics.show', topic)"
                class="flex items-center py-2 px-3 rounded-lg text-gray-500 hover:text-primary-600 hover:bg-primary-50 transition-colors duration-300"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                    />
                </svg>
                <span class="ml-3">{{ topic.name }}</span>
            </Link>
        </div>
        <OxModal :show="showModal" @close="showModal = false" title="Modal Prop Title" size="6xl">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus perspiciatis tempore sint doloremque
            sapiente cumque alias incidunt odit maiores tenetur aspernatur consequuntur architecto recusandae
            exercitationem nihil molestiae, temporibus suscipit qui.
            <template #footer>
                <div class="space-x-4">
                    <button class="btn btn-ghost" @click="showModal = false">Cancel</button>
                    <button class="btn btn-danger">Deactivate</button>
                </div>
            </template>
        </OxModal>
    </aside>
</template>

<script setup>
import OxModal from '@/Components/OxModal.vue';
import { ref } from 'vue';
const props = defineProps({ topics: Object });

const showModal = ref(false);

const showTheModal = () => {
    showModal.value = true;
    console.log('showing...');
};

const confirm = () => {
    confirmAction('Test Action', 'Prompt message').then(() => {
        console.log('confirmed action');
    });
};
</script>
