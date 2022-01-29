<template>
    <div class="flex flex-col">
        <div v-if="editor" class="bg-gray-50 p-2 flex items-center">
            <div class="flex items-center px-2">
                <button
                    type="button"
                    @click="editor.chain().focus().toggleBold().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('bold') }"
                >
                    <i class="ri-lg ri-bold"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleItalic().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('italic') }"
                >
                    <i class="ri-lg ri-italic"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleStrike().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('strike') }"
                >
                    <i class="ri-lg ri-strikethrough"></i>
                </button>
            </div>
            <div class="flex items-center px-2 border-l">
                <button
                    type="button"
                    @click="editor.chain().focus().setParagraph().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('paragraph') }"
                >
                    <i class="ri-lg ri-paragraph"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('heading', { level: 1 }) }"
                >
                    <i class="ri-lg ri-h-1"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('heading', { level: 2 }) }"
                >
                    <i class="ri-lg ri-h-2"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('heading', { level: 3 }) }"
                >
                    <i class="ri-lg ri-h-3"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleHeading({ level: 4 }).run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('heading', { level: 4 }) }"
                >
                    <i class="ri-lg ri-h-4"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleHeading({ level: 5 }).run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('heading', { level: 5 }) }"
                >
                    <i class="ri-lg ri-h-5"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleHeading({ level: 6 }).run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('heading', { level: 6 }) }"
                >
                    <i class="ri-lg ri-h-6"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleBlockquote().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('blockquote') }"
                >
                    <i class="ri-lg ri-double-quotes-l"></i>
                </button>
            </div>
            <div class="flex items-center px-2 border-l">
                <button
                    type="button"
                    @click="editor.chain().focus().toggleBulletList().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('bulletList') }"
                >
                    <i class="ri-lg ri-list-unordered"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleOrderedList().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('orderedList') }"
                >
                    <i class="ri-lg ri-list-ordered"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleCode().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('code') }"
                >
                    <i class="ri-lg ri-code-view"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().toggleCodeBlock().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                    :class="{ 'bg-primary-100 text-primary-600': editor.isActive('codeBlock') }"
                >
                    <i class="ri-lg ri-code-box-line"></i>
                </button>
            </div>
            <div class="flex items-center px-2 border-l">
                <button
                    type="button"
                    @click="editor.chain().focus().setHorizontalRule().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                >
                    <i class="ri-lg ri-page-separator"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().setHardBreak().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                >
                    <span class="font-semibold">BR</span>
                </button>
            </div>
            <div class="flex items-center px-2 border-l">
                <button
                    type="button"
                    @click="editor.chain().focus().undo().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                >
                    <i class="ri-lg ri-arrow-go-back-line"></i>
                </button>
                <button
                    type="button"
                    @click="editor.chain().focus().redo().run()"
                    class="btn w-10 h-10 rounded text-gray-500 hover:bg-primary-100 hover:text-primary-600"
                >
                    <i class="ri-lg ri-arrow-go-forward-line"></i>
                </button>
            </div>
        </div>
        <div class="px-12 py-8 flex-1">
            <EditorContent :editor="editor" class="h-full" />
        </div>
    </div>
</template>

<script setup>
import { useEditor, EditorContent } from '@tiptap/vue-3';
import StarterKit from '@tiptap/starter-kit';
import Placeholder from '@tiptap/extension-placeholder';
import { onBeforeUnmount, watch } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);

const editor = useEditor({
    extensions: [
        StarterKit,
        Placeholder.configure({
            placeholder: 'Write your post content here...',
            emptyEditorClass: 'is-editor-empty',
        }),
    ],
    content: props.modelValue,
    onUpdate: () => {
        // HTML
        emit('update:modelValue', editor.value.getHTML());
        // JSON
        // this.$emit('update:modelValue', this.editor.getJSON())
    },
});

onBeforeUnmount(() => {
    editor.value.destroy();
});

watch(
    () => props.modelValue,
    () => {
        // HTML
        const isSame = editor.value.getHTML() === value;

        // JSON
        // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)

        if (isSame) {
            return;
        }

        editor.value.commands.setContent(value, false);
    }
);
</script>

<style lang="scss">
/* Basic editor styles */
.ProseMirror p.is-editor-empty:first-child::before {
    content: attr(data-placeholder);
    float: left;
    color: #adb5bd;
    pointer-events: none;
    height: 0;
    font-size: 1.25rem;
}

.ProseMirror {
    height: 100%;
    outline: none;
    > * + * {
        margin-top: 0.75em;
    }

    ul,
    ol {
        padding: 0 1rem;
    }

    h1 {
        font-size: 3rem;
    }

    ul {
        list-style-type: square;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.1;
    }

    code {
        background-color: rgba(#616161, 0.1);
        color: #616161;
    }

    pre {
        background: #0d0d0d;
        color: #fff;
        font-family: 'JetBrainsMono', monospace;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;

        code {
            color: inherit;
            padding: 0;
            background: none;
            font-size: 0.8rem;
        }
    }

    img {
        max-width: 100%;
        height: auto;
    }

    blockquote {
        padding-left: 1rem;
        border-left: 2px solid rgba(#0d0d0d, 0.1);
    }

    hr {
        border: none;
        border-top: 2px solid rgba(#0d0d0d, 0.1);
        margin: 2rem 0;
    }
}
</style>
