<template>
    <OxModal :show="show" :title="actionTitle" size="lg" @close="show = false" :static="!config.closeable">
        <div v-html="content"></div>
        <template #footer>
            <div class="space-x-3">
                <button :class="cancelClass" v-text="config.cancelText" @click="cancel" ref="cancelBtnRef" />
                <button :class="confirmClass" v-text="config.okText" @click="confirm" ref="okBtnRef" />
            </div>
        </template>
    </OxModal>
</template>

<script setup>
import OxModal from '@/Components/OxModal.vue';
import { computed, ref, watch } from 'vue';

const okBtnRef = ref(null);
const cancelBtnRef = ref(null);

const show = ref(false);
const actionTitle = ref('');
const content = ref('');
const config = ref({
    okVariant: 'primary',
    cancelVariant: 'ghost',
    okText: 'Ok',
    cancelText: 'Cancel',
    buttonSize: 'md',
    focusOnCancel: false,
    closeable: false,
});

const cancelClass = computed(() => `btn btn-md btn-${config.value.cancelVariant}`);
const confirmClass = computed(() => `btn btn-md btn-${config.value.okVariant}`);

const cancel = () => {
    show.value = false;
    window.mitt.emit('confirm-action-cancel');
};

const confirm = () => {
    show.value = false;
    window.mitt.emit('confirm-action-ok');
};

window.mitt.on('confirm-action', ({ title, body, options }) => {
    show.value = true;
    actionTitle.value = title;
    content.value = body;
    config.value = { ...config.value, ...options };
});

watch(
    () => show.value,
    (show) => {
        if (show) {
            setTimeout(() => {
                if (config.value.focusOnCancel) {
                    cancelBtnRef.value.focus();
                } else {
                    okBtnRef.value.focus();
                }
            }, 150);
        }
    }
);
</script>
