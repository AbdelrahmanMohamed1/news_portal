import { defineConfig, splitVendorChunkPlugin } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        splitVendorChunkPlugin(),
    ],
    build: {
        target: 'es2018',
        sourcemap: false,
        cssCodeSplit: true,
        reportCompressedSize: false,
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        if (id.includes('bootstrap')) return 'vendor-bootstrap';
                        if (id.includes('axios')) return 'vendor-axios';
                        return 'vendor';
                    }
                },
            },
        },
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
    },
});
