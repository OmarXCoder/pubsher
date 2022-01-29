require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { ZiggyVue } from 'ziggy';
import AppLayout from './Layouts/AppLayout.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}`)).default;

        if (!page.layout) {
            page.layout = AppLayout;
        }

        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .mixin({ methods: { route } })
            .mount(el);
    },
    title: (title) => `My App - ${title}`,
});

InertiaProgress.init({ color: '#4B5563' });
