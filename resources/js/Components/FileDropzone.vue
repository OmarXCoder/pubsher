<template>
    <div id="droparea" ref="droparea" class="st-dropzone dropzone"></div>
</template>

<script setup>
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";
import { onMounted, ref } from "vue";
Dropzone.autoDiscover = false;

const props = defineProps({
    uploadsUrl: {
        type: String,
        required: true,
    },
    maxFiles: {
        type: Number,
        default: null,
    },
    selectSingle: {
        type: Boolean,
        default: false,
    },
});
const emit = defineEmits(["gen-thumbnail", "added-file", "uploaded"]);

let dropzone = null;
const droparea = ref(null);

onMounted(() => {
    dropzone = new Dropzone(droparea.value, {
        url: props.uploadsUrl,
        maxFiles: props.selectSingle ? 1 : props.maxFiles,
    });

    const CSRF_TOKEN = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    dropzone.on("sending", function (file, xhr, formData) {
        formData.append("_token", CSRF_TOKEN);
    });

    dropzone.on("thumbnail", function (file) {
        emit("gen-thumbnail", file);
    });

    dropzone.on("addedfile", function (file) {
        let _i, _len;

        for (_i = 0, _len = this.files.length; _i < _len - 1; _i++) {
            if (
                this.files[_i].name === file.name &&
                this.files[_i].size === file.size &&
                this.files[_i].lastModified === file.lastModified
            ) {
                this.removeFile(file);
                console.log("removed a dublicate file");
                return;
            }
        }

        emit("added-file", file);
    });

    dropzone.on("success", function (file, response) {
        console.log(response.data);
        emit("uploaded", response.data, file);
    });
});
</script>

<style lang="scss" scoped>
.st-dropzone.dropzone {
    width: 100%;
    height: 300px;
    max-height: 100%;
    border-radius: 10px;
    border: 2px dashed var(--bs-primary);
    font-size: 20px;
    font-weight: 600;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    overflow-y: auto;
    padding: 24px;
    .dz-preview {
        margin: 8px;
    }
}
</style>