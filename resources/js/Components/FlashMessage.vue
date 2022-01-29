<template>
    <transition name="slide" @after-leave="$emit('hide', message)">
        <div
            v-show="show"
            class="st-callout p-3"
            :class="colorClass"
            @mouseover="mouseIsOver = true"
            @mouseleave="mouseIsOver = false"
        >
            <h5 v-if="message.title" class="mb-1">{{ message.title }}</h5>
            <div v-if="message.body">{{ message.body }}</div>
        </div>
    </transition>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue';

const props = defineProps({
    message: {
        type: Object,
    },
});

const show = ref(false);
const mouseIsOver = ref(false);

const emit = defineEmits(['hide']);

const hide = () => {
    setTimeout(() => {
        if (mouseIsOver.value === true) {
            hide();
            return;
        }
        show.value = false;
    }, props.message.timeout);
};

const colorClass = computed(() => {
    return {
        primary: 'bg-primary-100',
        success: 'bg-success-100',
        warning: 'bg-warning-100',
        danger: 'bg-danger-100',
        info: 'bg-info-100',
    }[props.message.type];
});

onMounted(() => {
    show.value = true;

    hide();
});
</script>

<style scoped>
.st-callout {
    box-shadow: 0 4px 4px #ccc;
    border-radius: 10px;
    margin-bottom: 12px;
    width: 100%;
    transform: translateX(0);
}

.st-callout:last-of-type {
    margin-bottom: 0;
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.5s ease;
}

.slide-enter-from,
.slide-leave-to {
    transform: translateX(300px);
}
</style>
