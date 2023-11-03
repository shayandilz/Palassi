const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js/app.js')
    .sass('resources/sass/custom.scss', 'public/css/style.css',)
mix.webpackConfig({
    stats: {
        children: true,
    },
});
