<template>
    <div class="app-flash">
        <FlashMessage v-for="message in messages" :key="message.id" :message="message" @hide="removeMessage" />
    </div>
</template>

<script setup>
import FlashMessage from '@/Components/FlashMessage.vue';
import { usePage } from '@inertiajs/inertia-vue3';
import { ref, watch } from 'vue';

const page = usePage();

const messages = ref([]);

const removeMessage = (message) => {
    messages.value.splice(messages.value.indexOf(message), 1);
    if (message.type === 'success') {
        page.props.value.flash.success = null;
    } else if (message.type === 'error') {
        page.props.value.flash.error = null;
    }
};

const typeTitleMap = {
    info: 'Info',
    primary: 'Action Required',
    success: 'Success',
    warning: 'Warning',
    danger: 'Error',
};

const addMessage = (type, message) => {
    messages.value.push({
        id: messages.value.length + 1,
        type: type,
        title: typeTitleMap[type],
        body: message,
        timeout: 3000,
    });
};

watch(
    () => page.props.value.flash,
    (flash) => {
        if (flash.success) {
            addMessage('success', flash.success);
        }
        if (flash.error) {
            addMessage('danger', flash.error);
        }
    }
);

window.mitt.on('flash', ({ type, message }) => {
    addMessage(type, message);
});
</script>

<style lang="scss" scoped>
.app-flash {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    width: 320px;
    overflow: hidden;
    padding: 10px;
}
</style>
