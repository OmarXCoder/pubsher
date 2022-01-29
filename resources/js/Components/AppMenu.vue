<template>
    <aside class="side-panel w-52 shrink-0">
        <div class="space-y-2">
            <AppMenuItem :href="route('home')">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
                <span class="ml-3">Home</span>
            </AppMenuItem>
            <AppMenuItem :href="route('home')">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"
                    />
                </svg>
                <span class="ml-3">Reading List</span>
            </AppMenuItem>
            <AppMenuItem :href="route('home')">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
                    />
                </svg>
                <span class="ml-3">Explore</span>
            </AppMenuItem>
            <AppMenuItem v-if="$page.props.auth.user" :href="route('profile', $page.props.auth.user)">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
                <span class="ml-3">Profile</span>
            </AppMenuItem>
            <AppMenuItem :href="route('home')">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
                <span class="ml-3">About</span>
            </AppMenuItem>
        </div>
    </aside>
</template>

<script setup>
import AppMenuItem from './AppMenuItem.vue';
</script>
