import { defineConfig } from "vite";
import codeigniter from "codeigniter-vite-plugin";

export default defineConfig(() => {
  return {
    plugins: [
      codeigniter({
        input: ["resources/css/app.css", "resources/js/app.js"],
        refresh: true,
      }),

    ],
  };
});
