<template>
    <li class="st-menu__item" :class="{ open: open }">
        <StMenuLink
            :url="item.url"
            :icon="item.icon"
            :text="item.text"
            :toggle="item.submenu ? true : false"
            @click.prevent="openSubmenu"
        />
        <template v-if="item.submenu">
            <transition name="slide" @enter="slideDown" @leave="slideUp">
                <div v-if="open" style="height: 0">
                    <div class="st-menu__submenu">
                        <template v-for="(link, i) in item.submenu" :key="i">
                            <StMenuLink
                                :url="link.url"
                                :icon="link.icon"
                                :text="link.text"
                            />
                        </template>
                    </div>
                </div>
            </transition>
        </template>
    </li>
</template>

<script setup>
import { computed, inject, ref } from "vue";
import StMenuLink from "./StMenuLink.vue";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
});

const index = ref(false);
const menu = inject("menu");
const open = computed(() => menu.value.active === index.value);

const slideDown = (el, done) => {
    el.style.height = el.scrollHeight + "px";
};

const slideUp = (el, done) => {
    el.style.height = 0;
};

const openSubmenu = () => {
    if (open.value) {
        menu.value.active = null;
    } else {
        menu.value.active = index.value;
    }
};

index.value = menu.value.count++;
</script>

<style lang="scss" scoped>
.slide-enter-active,
.slide-leave-active {
    will-change: height;
    transition: height 0.3s ease;
    overflow: hidden;
}
</style>