import { defineConfig } from 'vite';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173,  // Обратите внимание, что порт можно выбрать ручным образом
        open: true,
    },
    build: {
        outDir: 'dist', // Укажите папку для выходных файлов
        rollupOptions: {
            input: {
                main: 'main.js', // Укажите свой JavaScript файл
                // Если у вас есть другие точки входа, добавьте их здесь
            },
        },
    },
});
