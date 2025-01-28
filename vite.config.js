import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import inject from "@rollup/plugin-inject";

var config = {
    plugins: [
        laravel({
            input: [
                'resources/scss/style.scss',    // Add both entry points
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        inject({
            $: 'jquery',
            jQuery: 'jquery',
        })
    ],
    server: {
        origin: 'http://localhost:5173',
        cors: true
    },
    build: {
        assetsDir: '',
    },
};

export default defineConfig(({command, mode, ssrBuild}) => {
    if (command === 'serve') {
        config.publicDir = 'public';
        config.build = {
            assetsDir: '',
            copyPublicDir: false,
            emptyOutDir: true,
        };
    }

    return config;
});
