import { defineConfig, normalizePath } from 'vite';
import { resolve } from 'path';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    resolve: {
        alias: {
            '@': normalizePath(resolve(__dirname, 'resource')),
            '~bootstrap': resolve(__dirname, 'node_modules/bootstrap'),
            '~bootstrap-icons': resolve(__dirname, 'node_modules/bootstrap-icons'),
            '~perfect-scrollbar': resolve(__dirname, 'node_modules/perfect-scrollbar'),
            '~@fontsource': resolve(__dirname, 'node_modules/@fontsource'),
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/js/cashier/barcode.js'
            ],
            refresh: true
        }),
    ],
});
