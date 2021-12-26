<template>
    <div class="card post-card shadow-sm" :id="post.id">
        <header class="d-flex align-items-center p-3">
            <div class="avatar rounded-circle me-3">
                <img src="/img/avatar.png" alt="" />
            </div>
            <div>
                <h6 class="mb-0 fw-600">{{ post.author.name }}</h6>
                <span class="text-muted fs-sm">{{ post.published_at }}</span>
            </div>
        </header>
        <div class="p-3">
            <h5>{{ post.title }}</h5>
            <div class="text-secondary">{{ post.excerpt }}</div>
        </div>
        <footer class="bg-light p-3">
            <div>
                <button class="btn btn-sm">
                    <i class="far fa-comments"></i>
                </button>
            </div>
        </footer>
    </div>
</template>

<script setup>
const props = defineProps({
    post: {
        type: Object,
    },
});
</script>
