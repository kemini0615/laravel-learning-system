import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/admin.css", // Vite가 번들링할 파일 추가
                "resources/css/frontend.css", // Vite가 번들링할 파일 추가
                "resources/js/app.js",
                "resources/js/admin/index.js", // Vite가 번들링할 파일 추가
            ],
            refresh: true,
        }),
    ],
});
