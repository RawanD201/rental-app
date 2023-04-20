import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            publicDirectory: "public",
            input: [
                // CSS
                "resources/css/app.css",
                "resources/css/fonts.css",
                "resources/css/rtl_app.css",
                // Javascript
                "resources/js/app.js",
                "resources/js/rtl_app.js",
            ],
        }),
    ],
});
