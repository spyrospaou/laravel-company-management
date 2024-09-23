import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        port:5173,
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        },
        watch: {
            usePolling: true,
        },
    },
});
