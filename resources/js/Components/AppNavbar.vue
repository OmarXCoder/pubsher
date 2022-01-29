<template>
    <nav class="relative bg-white border-b border-b-gray-200">
        <OxContainer class="flex items-center justify-between md:justify-start py-2">
            <div class="flex">
                <Link :href="route('home')">
                    <ApplicationLogo class="h-8 w-auto sm:h-10" />
                </Link>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button
                    type="button"
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </div>
            <div class="hidden md:flex ml-4">
                <form class="w-96">
                    <input type="search" class="form-control" placeholder="Search..." />
                </form>
            </div>
            <div v-if="$page.props.auth.user" class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <div class="flex items-center">
                    <Link :href="route('posts.create')" as="button" class="btn btn-md btn-outline-primary">
                        Create Post
                    </Link>
                    <div class="ml-6 relative">
                        <OxDropdown align="right" width="48">
                            <template #trigger>
                                <OxAvatar
                                    size="8"
                                    :src="$page.props.auth.user.avatar_url"
                                    class="cursor-pointer border border-primary-300 rounded-full transition-colors hover:ring hover:ring-primary-200 hover:ring-opacity-50"
                                />
                            </template>

                            <template #content>
                                <OxDropdownLink
                                    :href="route('profile', $page.props.auth.user)"
                                    as="button"
                                    class="hover:underline"
                                >
                                    <h5 class="text-gray-800 text-lg leading-5 font-medium">
                                        {{ $page.props.auth.user.name }}
                                    </h5>
                                    <span class="text-xs text-gray-500">@{{ $page.props.auth.user.username }}</span>
                                </OxDropdownLink>
                                <hr class="my-2" />
                                <OxDropdownLink :href="route('profile', $page.props.auth.user)" as="button">
                                    Dashboard
                                </OxDropdownLink>
                                <OxDropdownLink :href="route('posts.create')" as="button"> Create Post </OxDropdownLink>
                                <OxDropdownLink :href="route('profile', $page.props.auth.user)" as="button">
                                    Settings
                                </OxDropdownLink>
                                <hr class="my-2" />
                                <OxDropdownLink :href="route('logout')" method="post" as="button">
                                    Log Out
                                </OxDropdownLink>
                            </template>
                        </OxDropdown>
                    </div>
                </div>
            </div>
            <div v-else class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <Link :href="route('login')" class="btn btn-md btn-ghost">Log in</Link>
                <Link :href="route('register')" class="btn btn-md btn-primary ml-4">Sign up</Link>
            </div>
        </OxContainer>
    </nav>
</template>

<script setup>
import OxAvatar from '@/Components/OxAvatar.vue';
import OxNavLink from '@/Components/OxNavLink.vue';
import OxDropdown from '@/Components/OxDropdown.vue';
import OxDropdownLink from '@/Components/OxDropdownLink.vue';
import OxContainer from '@/Components/OxContainer.vue';
import ApplicationLogo from '@/Components/AppLogo.vue';
</script>
