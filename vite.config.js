import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'node:path'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js', 'resources/admin/scss/app.scss', 'resources/admin/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'jquery': path.resolve(__dirname, 'node_modules/jquery'),
            'sweetalert2': path.resolve(__dirname, 'node_modules/sweetalert2'),
            '~swiper': path.resolve(__dirname, 'node_modules/swiper'),
            'tinymce': path.resolve(__dirname, 'node_modules/tinymce'),
            '~selectize/selectize': path.resolve(__dirname, 'node_modules/selectize'),
        }
    },
});
