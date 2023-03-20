import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.jsx',  'resources/sass/app.scss',
            'resources/js/app.js'],
            ssr: 'resources/js/ssr.jsx',
            refresh: true,
        }),
        vue(),
    ],
});
