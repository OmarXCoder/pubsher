<template>
    <aside class="side-panel">
        <div v-for="topic in topics" :key="topic.id">
            <Link :href="route('topics.show', topic)" class="topic-item">
                <i class="fas fa-thumbtack me-3"></i>
                <span>{{ topic.name }}</span>
            </Link>
        </div>
    </aside>
</template>

<script setup>
const props = defineProps({ topics: Object });
</script>

<style lang="scss">
.topic-item {
    color: var(--bs-secondary);
    display: flex;
    align-items: center;
    padding: 8px 12px;
    border-radius: 3px;
    text-decoration: none;
    &:hover {
        background: #ccc;
    }
}
</style>
