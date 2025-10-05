import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: ['../backend/routes/**', '../backend/resources/views/**'],
        }),
    ],
    build: {
        outDir: '../backend/public/build',
        emptyOutDir: true,
        manifest: true,
    },
});
