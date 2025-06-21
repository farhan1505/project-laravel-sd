import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    base: '/build/', // ⬅️ Ini penting agar semua asset pakai path relatif
    server: {
        host: true,
        port: 5173,
        strictPort: true
    }
});
