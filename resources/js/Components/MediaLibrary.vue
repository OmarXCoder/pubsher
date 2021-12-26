<template>
    <!-- Button trigger modal -->
    <slot name="trigger" :open-library="open">
        <button class="fake-dropzone" @click.prevent="open" style="height: 120px">
            <i class="fad fa-image me-2"></i>
            <span>Open Media Library</span>
        </button>
    </slot>

    <!-- Modal -->
    <StModal
        :id="id"
        :show="isOpen"
        title="Media Library"
        content-class="h-100"
        size="xl"
        @close="isOpen = false"
        static
        fullscreen="lg"
        centered
        scrollable
    >
        <template #tabs>
            <nav class="modal-tabs">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button
                        class="nav-link active"
                        id="nav-upload-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-upload"
                        type="button"
                        role="tab"
                        aria-controls="nav-upload"
                        aria-selected="true"
                    >
                        Upload
                    </button>
                    <button
                        class="nav-link"
                        id="nav-library-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#nav-library"
                        type="button"
                        role="tab"
                        aria-controls="nav-library"
                        aria-selected="false"
                        @click="loadLibraryFiles('/uploads')"
                    >
                        Library
                    </button>
                </div>
            </nav>
        </template>

        <div class="tab-content h-100" id="nav-tabContent">
            <div
                class="tab-pane h-100 fade show active"
                id="nav-upload"
                role="tabpanel"
                aria-labelledby="nav-upload-tab"
            >
                <FileDropzone
                    uploads-url="/uploads"
                    @uploaded="fileUploaded"
                    :select-single="selectSingle"
                    :max-files="maxFiles"
                />
                <!-- Uploaded Files -->
                <div class="st-gallery mt-4">
                    <div class="st-gallery__item" style="height: 220px" v-for="file in uploadedFiles" :key="file.id">
                        <ImgCheckbox
                            :id="`uploaded-file-${file.id}`"
                            :name="selectSingle ? 'uploads' : 'uploads[]'"
                            :type="selectSingle ? 'radio' : 'checkbox'"
                            :src="file.path"
                            @change="fileSelected(file, $event)"
                        />
                    </div>
                    <!-- .st-gallery__item -->
                </div>
                <!-- .st-gallery -->
            </div>
            <div class="tab-pane h-100 fade" id="nav-library" role="tabpanel" aria-labelledby="nav-library-tab">
                <div class="st-gallery">
                    <div class="st-gallery__item" style="height: 220px" v-for="file in libraryFiles" :key="file.id">
                        <ImgCheckbox
                            :id="`file-check-${file.id}`"
                            :name="selectSingle ? 'lib_item' : 'lib_item[]'"
                            :type="selectSingle ? 'radio' : 'checkbox'"
                            :src="file.path"
                            @change="fileSelected(file, $event)"
                        />
                    </div>
                    <!-- .st-gallery__item -->
                </div>
                <!-- .st-gallery -->

                <div class="d-flex justify-content-center">
                    <PaginationLinks class="my-4" :pagination="pagination" @page-changed="pageChanged" />
                </div>
            </div>
        </div>
        <!-- .tab-content -->

        <template #footer>
            <button class="btn btn-secondary" @click="cancel">Cancel</button>
            <button class="btn btn-primary" @click="ok" :disabled="selectedFiles.length === 0">Select And Close</button>
        </template>
    </StModal>
</template>

<script setup>
import FileDropzone from '@/Components/FileDropzone.vue';
import StModal from '@/Components/StModal.vue';
import PaginationLinks from '@/Components/PaginationLinks.vue';
import ImgCheckbox from '@/Components/ImgCheckbox.vue';
import { ref } from 'vue';
import { composeQueryString } from '@/utils/helpers';
import { ENDPOINT_UPLOADS } from '@/utils/constants';

const props = defineProps({
    id: { type: String, default: 'MediaLibrary' },
    selectSingle: { type: Boolean, default: false },
    maxFiles: { type: Number, default: null },
});

const emit = defineEmits(['file-selected', 'cancel', 'ok']);

const isOpen = ref(false);
const libraryFiles = ref([]);
const pagination = ref({});
const uploadedFiles = ref([]);
const selectedFiles = ref([]);

const open = () => {
    isOpen.value = true;
};

const close = () => {
    isOpen.value = false;
};

const ok = () => {
    emit('ok', selectedFiles.value);
    close();
};

const cancel = () => {
    selectedFiles.value = [];
    emit('cancel');
    close();
};

const fileUploaded = (file) => {
    uploadedFiles.value.push(file);
};

const fileSelected = (file, event) => {
    // Add or remove the file according to the check state of the target checkbox
    if (event.target.checked === false) {
        selectedFiles.value = selectedFiles.value.filter((sF) => sF.id != file.id);
        return;
    }

    if (selectedFiles.value.includes(file)) {
        return;
    }

    if (props.selectSingle) {
        selectedFiles.value = [file];
    } else {
        selectedFiles.value.push(file);
    }

    emit('file-selected', file);
};

// Load library images
const loadLibraryFiles = (endpoint) => {
    axios.get(endpoint).then((response) => {
        libraryFiles.value = response.data.data;
        pagination.value = response.data.meta;
    });
};

const pageChanged = ({ page }) => {
    loadLibraryFiles(composeQueryString(ENDPOINT_UPLOADS, { page }));
};
</script>
