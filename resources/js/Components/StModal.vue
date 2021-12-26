<template>
    <teleport to="body">
        <transition leave-active-class="duration-300" @after-enter="afterEnter" @before-leave="beforeLeave" @after-leave="$emit('closed')">
            <div :id="id" v-show="show" class="st-modal modal" :class="modalClass" tabindex="-1" ref="modalRef" scroll-region>
                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    leave-active-class="ease-in duration-300"
                >
                    <div v-show="show" class="st-backdrop" @click="close"></div>
                </transition>
                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 scale-75"
                    leave-to-class="opacity-0 scale-75"
                    leave-active-class="ease-in duration-300"
                >
                    <div v-show="show" :class="['modal-dialog', ...dialogClasses]" ref="dialogRef">
                        <div class="modal-content" :class="contentClass">
                            <header class="modal-header" v-if="!noHeader" :class="headerClass">
                                <slot name="header">
                                    <slot name="title">
                                        <h5 class="modal-title" v-if="title" v-text="title"></h5>
                                    </slot>
                                    <button v-if="showCloseX" type="button" class="btn-close" @click="close"></button>
                                </slot>
                            </header>
                            <slot name="tabs" />
                            <div class="modal-body" :class="bodyClass">
                                <slot />
                            </div>

                            <footer class="modal-footer" v-if="$slots.footer" :class="footerClass">
                                <slot name="footer"></slot>
                            </footer>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>

<script setup>
import { ref, onMounted, computed, watch, onUnmounted } from 'vue';

const props = defineProps({
    id: { type: String, required: true },
    show: { type: Boolean, default: false },
    title: { type: String, default: null },
    modalClass: { type: [String, Object, Array], default: null },
    headerClass: { type: [String, Object, Array], default: null },
    contentClass: { type: [String, Object, Array], default: null },
    footerClass: { type: [String, Object, Array], default: null },
    bodyClass: { type: [String, Object, Array], default: null },
    size: {
        type: String,
        default: null,
        validator: (value) => ['sm', 'lg', 'xl'].includes(value),
    },
    centered: { type: Boolean, default: false },
    scrollable: { type: Boolean, default: false },
    fullscreen: { type: [Boolean, String], default: false },
    // Toggling components
    noHeader: { type: Boolean, default: false },
    static: { type: Boolean, default: false },
    showCloseX: { type: Boolean, default: false },
});

const emit = defineEmits(['close', 'closed']);

const modalRef = ref(null);
const dialogRef = ref(null);

const dialogClasses = computed(() => {
    let classes = [];
    if (props.size) {
        classes.push(`modal-${props.size}`);
    }
    if (props.centered) {
        classes.push(`modal-dialog-centered`);
    }
    if (props.scrollable) {
        classes.push(`modal-dialog-scrollable`);
    }
    if (props.fullscreen) {
        classes.push(typeof props.fullscreen === 'string' ? `modal-fullscreen-${props.fullscreen}-down` : 'modal-fullscreen');
    }
    return classes;
});

const afterEnter = () => {
    if (props.static) {
        dialogRef.value.classList.add('modal-dialog-static');
    }
};

const beforeLeave = () => {
    if (props.static) {
        dialogRef.value.classList.remove('modal-dialog-static');
    }
};

const close = () => {
    if (!props.static) {
        emit('close');
    } else {
        modalRef.value.classList.add('modal-static');
        setTimeout(() => {
            modalRef.value.classList.remove('modal-static');
        }, 200);
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close();
    }
};

watch(
    () => props.show,
    (show) => {
        if (show) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = null;
        }
    },
    {
        immediate: true,
    }
);

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));
</script>
