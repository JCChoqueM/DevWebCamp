import { defineConfig } from 'vite';
import FullReload from 'vite-plugin-full-reload';
import scssAutoIndex from './vite-plugins/scss-auto-index.js';
import fg from 'fast-glob';

const jsEntries = fg.sync([
    'src/js/**/*.js',
    '!src/js/modules/**'
]).reduce((entries, file) => {
    const nombre = file.replace('src/js/', '').replace('.js', '');
    entries[nombre] = file;
    return entries;
}, {});

export default defineConfig(({ command }) => ({
    base: command === 'build' ? '/build/' : '/',
    publicDir: false,
    plugins: [
        scssAutoIndex('src/scss'),
        FullReload([
            'Router.php',          // Router principal
            'views/**/*.php',      // Views (admin, auth, paginas, templates)
            'controllers/**/*.php', // Controllers
            'models/**/*.php',     // Models
            'classes/**/*.php',    // Classes (Email.php, Paginacion.php)
            'includes/**/*.php',   // Includes (app.php, database.php, funciones.php)
            'public/index.php'     // Entry point
        ], {
            delay: 2500
        })
    ],
    css: {
        devSourcemap: true,
        preprocessorOptions: {
            scss: {
                includePaths: ['src/scss']
            }
        }
    },
    server: {
        host: '0.0.0.0',
        port: 5174,
        origin: 'http://localhost:5174',
        watch: {
            usePolling: true,
            interval: 500,
            ignored: ['**/vendor/**',
                '**/node_modules/**',
                '**/public/build/**']
        }
    },
    build: {
        outDir: 'public/build',
        manifest: true,
        sourcemap: true,
        rollupOptions: {
            input: {
                ...jsEntries,
                styles: 'src/scss/app.scss'
            }
        }
    }
}));