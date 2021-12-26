<template>
    <StModal id="confirmActionDialog" :show="show" :title="actionTitle" static>
        {{ content }}
        <template #footer>
            <button :class="cancelClass" v-text="config.cancelText" @click="cancel" ref="cancelBtnRef" />
            <button :class="confirmClass" v-text="config.okText" @click="confirm" ref="okBtnRef" />
        </template>
    </StModal>
</template>

<script setup>
import StModal from '@/Components/StModal.vue';
import { computed, ref, watch } from 'vue';

const okBtnRef = ref(null);
const cancelBtnRef = ref(null);

const show = ref(false);
const actionTitle = ref('');
const content = ref('');
const config = ref({
    okVariant: 'primary',
    cancelVariant: 'secondary',
    okText: 'Ok',
    cancelText: 'Cancel',
    buttonSize: 'md',
    focusOnCancel: false,
});

const cancelClass = computed(() => `btn btn-${config.value.cancelVariant} btn-${config.value.buttonSize}`);
const confirmClass = computed(() => `btn btn-${config.value.okVariant} btn-${config.value.buttonSize}`);

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
