<template>
    <div class="form-check form-check--with-img">
        <input :id="id" :name="name" :type="type" class="form-check-input" />
        <label class="form-check-label" :for="id">
            <img :src="src" alt="image" />
        </label>
    </div>
</template>

<script setup>
const props = defineProps({
    id: { type: String, required: true },
    name: { type: String, required: true },
    src: { type: String, required: true },
    alt: { type: String, default: 'image' },
    type: { type: String, default: 'checkbox' },
});
</script>
