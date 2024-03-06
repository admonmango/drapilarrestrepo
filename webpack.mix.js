// webpack.mix.js

let mix = require("laravel-mix");

require("laravel-mix-polyfill");

if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: "inline-source-map",
  });
}

mix
  .sourceMaps()
  .js("src/scripts/app.js", "dist")
  .setPublicPath("dist")
  .polyfill({
    enabled: true,
    useBuiltIns: "usage",
    targets: "last 40 versions",
  });

mix.sourceMaps().sass("src/style/style.scss", "dist").setPublicPath("dist");
// Change the default port
ui: {
  port: 8080;
}
mix.browserSync({
  proxy: "http://dra-pilar..local/sana-tu-digestion/",
  ui: {
    port: 8080,
  },
});

mix.options({
  postCss: [
    require("autoprefixer")({
      browsers: ["last 40 versions"],
    }),
  ],
});
// ;
