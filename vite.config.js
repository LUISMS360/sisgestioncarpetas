import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '192.168.18.134', // Tu IP local
        port: 5173,
        cors: true, // <--- ESTO ACTIVA LOS HEADERS CORS
        hmr: {
            host: '192.168.18.134',
        },
    },
});
