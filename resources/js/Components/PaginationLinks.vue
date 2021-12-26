<template>
    <nav v-if="showLinks" aria-label="Page navigation">
        <ul class="pagination mb-0">
            <li
                v-for="(link, index) in pagination.links"
                :key="index"
                class="page-item"
                :class="{ disabled: link.url === null, active: link.active }"
            >
                <a
                    class="page-link"
                    :href="link.url"
                    v-html="link.label"
                    @click.prevent="navigate(link)"
                ></a>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
    pagination: { type: Object, required: true },
});

const emit = defineEmits(["page-changed"]);

const showLinks = computed(() => {
    return props.pagination.total > props.pagination.per_page;
});

const isDisabled = (link) => link.url === null || link.active;

const navigate = (link) => {
    if (link.active === true) {
        return;
    }

    if (link.url !== null && typeof link.url === "string") {
        let page = null;
        const matches = link.url.match(/page=(\d+)/);

        if (matches !== null) {
            page = parseInt(matches[1]);
        }
        emit("page-changed", { link, page });
    }
};
</script>
