import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            output: [
                'public/build/assets/app-BwhWt-DD.css', // Specify the output file path for DD.css
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources',
            '~bootstrap': '/node_modules/bootstrap', // Add this line
        },
    },
});
