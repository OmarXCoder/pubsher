<template>
    <div class="widget rounded-lg overflow-hidden border bg-gray-50 mb-4">
        <header v-if="$slots.header" class="widget__header p-4 border-b">
            <h4 class="text-lg leading-5 font-bold text-gray-700">
                <slot name="header" />
            </h4>
        </header>

        <main class="widget__main">
            <slot />
        </main>
    </div>
</template>

<script></script>
