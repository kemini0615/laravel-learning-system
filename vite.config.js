import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/admin/login.js", // Vite가 번들링할 파일 추가
            ],
            refresh: true,
        }),
    ],
});
