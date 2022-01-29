<template>
    <teleport to="body">
        <transition leave-active-class="duration-200">
            <div v-show="show" class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" scroll-region>
                <!-- Modal Backdrop -->
                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
                        <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
                    </div>
                </transition>

                <!-- Modal Dialog -->
                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div v-show="show" class="h-full flex justify-center" :class="dialogClasses">
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all flex-1"
                            :class="sizeClass"
                        >
                            <div v-if="show">
                                <div class="px-6 py-4">
                                    <slot name="title">
                                        <h5
                                            class="text-lg mb-2 leading-6 font-semibold text-gray-800"
                                            v-if="title"
                                            v-text="title"
                                        ></h5>
                                    </slot>
                                    <slot />
                                </div>

                                <footer v-if="$slots.footer" class="px-6 py-4 bg-gray-50 text-right">
                                    <slot name="footer" />
                                </footer>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>

<script setup>
import { computed, watch, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    show: { default: false },
    title: { type: String },
    size: { default: '2xl' },
    static: { type: Boolean, default: false },
    centered: { type: Boolean, default: false },
});

const emit = defineEmits(['close']);

const sizeClass = computed(() => {
    return {
        sm: 'sm:max-w-sm',
        md: 'sm:max-w-md',
        lg: 'sm:max-w-lg',
        xl: 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
        '3xl': 'sm:max-w-3xl',
        '4xl': 'sm:max-w-4xl',
        '5xl': 'sm:max-w-5xl',
        '6xl': 'sm:max-w-6xl',
    }[props.size];
});

const dialogClasses = computed(() => {
    let classes = ['items-start'];

    if (props.centered) {
        classes.pop();
        classes.push('items-center');
    }

    return classes;
});

const close = () => {
    if (!props.static) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close();
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});

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
</script>
