<template>
    <header class="h-40 bg-primary-800"></header>
    <OxContainer width="5xl" class="pt-0 -mt-36">
        <div class="flex justify-center h-16">
            <div class="rounded-full max-w-fit max-h-fit p-2 bg-primary-800 -mb-16">
                <OxAvatar size="28" :src="user.data.avatar_url" class="" />
            </div>
        </div>
        <div class="bg-white rounded-lg border">
            <section class="p-6 flex justify-end">
                <button v-if="user.data.is_current_user" class="btn btn-md btn-primary">Edit profile</button>
                <button v-else class="btn btn-md btn-primary">Follow</button>
            </section>
            <section class="px-6 pb-6 flex flex-col items-center">
                <h3 class="text-4xl font-extrabold">{{ user.data.name }}</h3>
                <p class="mt-4 mb-5 text-lg">I'm Omar Ali, a CS graduate, a freelancer web developer.</p>
                <div class="flex items-center space-x-6">
                    <div class="flex items-center text-gray-500">
                        <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span class="ml-2">Egypt</span>
                    </div>
                    <div class="flex items-center text-gray-500">
                        <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                fill-rule="evenodd"
                                d="M6 3a1 1 0 011-1h.01a1 1 0 010 2H7a1 1 0 01-1-1zm2 3a1 1 0 00-2 0v1a2 2 0 00-2 2v1a2 2 0 00-2 2v.683a3.7 3.7 0 011.055.485 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0A3.7 3.7 0 0118 12.683V12a2 2 0 00-2-2V9a2 2 0 00-2-2V6a1 1 0 10-2 0v1h-1V6a1 1 0 10-2 0v1H8V6zm10 8.868a3.704 3.704 0 01-4.055-.036 1.704 1.704 0 00-1.89 0 3.704 3.704 0 01-4.11 0 1.704 1.704 0 00-1.89 0A3.704 3.704 0 012 14.868V17a1 1 0 001 1h14a1 1 0 001-1v-2.132zM9 3a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm3 0a1 1 0 011-1h.01a1 1 0 110 2H13a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span class="ml-2">Joined on Sep 4, 2019</span>
                    </div>
                    <div class="flex items-center text-gray-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                            />
                        </svg>
                        <a href="https//github.com/omarxcoder" class="ml-2">{{ user.data.username }}</a>
                    </div>
                </div>
            </section>
            <section class="p-6 border-t flex justify-evenly items-center">
                <div class="text-center">
                    <h6 class="text-gray-500 text-sm">Education</h6>
                    <p>BS of computer science</p>
                </div>
                <div class="text-center">
                    <h6 class="text-gray-500 text-sm">Work</h6>
                    <p>Dev at Freelancer</p>
                </div>
            </section>
        </div>

        <div class="flex mt-4 space-x-4">
            <aside class="w-80">
                <OxWidget class="!bg-white">
                    <template #header>
                        <span>Badges</span>
                    </template>
                    <div class="p-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel minima obcaecati modi.
                    </div>
                </OxWidget>
            </aside>
            <main class="flex-1">
                <OxWidget class="!bg-white">
                    <template #header>
                        <span>Recent Comments</span>
                    </template>
                    <div class="p-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel minima obcaecati modi.
                    </div>
                </OxWidget>
            </main>
        </div>
    </OxContainer>
</template>

<script setup>
import OxContainer from '@/Components/OxContainer.vue';
import OxWidget from '@/Components/OxWidget.vue';
import OxAvatar from '@/Components/OxAvatar.vue';

const props = defineProps({
    user: Object,
});
</script>
