import { createInertiaApp } from '@inertiajs/vue3';
import createServer from '@inertiajs/server';
import { renderToString } from '@vue/server-renderer';

createServer((page) =>
  createInertiaApp({
    page,
    render: renderToString,
    resolve: (name) => require(`./src/${name}`),
    setup({ app, props, plugin }) {
      return createSSRApp({ render: () => h(app, props) }).use(plugin);
    },
  })
);
