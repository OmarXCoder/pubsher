require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { ZiggyVue } from 'ziggy';
import AppLayout from './Layouts/AppLayout.vue';

createInertiaApp({
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}`)).default;

        if (!page.layout) {
            page.layout = AppLayout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el);
    },
    title: (title) => `My App - ${title}`,
});

InertiaProgress.init({
    showSpinner: true,
});
