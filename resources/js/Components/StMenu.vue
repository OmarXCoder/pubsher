<template>
    <ul class="st-menu">
        <template v-for="(item, index) in items" :key="index">
            <StMenuItem :item="item" />
        </template>
    </ul>
    <!-- menu -->
</template>

<script setup>
import { provide, ref } from "vue";
import StMenuItem from "./StMenuItem.vue";

const props = defineProps({
    items: {
        type: Array,
        required: true,
    },
});

const menu = ref({
    count: null,
    active: null,
});

provide("menu", menu);
</script>
