const mix = require('laravel-mix');

/* Sccript */
mix.scripts([   
    'public/js/plugin/wow.min.js',
    'public/js/plugin/jquery.lazy.min.js',
    'public/js/page/main.js',
], 'public/js/prod/main.js')
mix.scripts([   
    'public/js/plugin/jquery.min.js',
    'public/js/plugin/sweetalert.min.js',
], 'public/js/prod/main_preload.js')

mix.scripts([
    'public/js/page/index.js'
], 'public/js/prod/index.js')

mix.scripts([
    'public/js/page/template/typography.js'
], 'public/js/prod/template/typography.js')


/* Style */
mix.styles([
    'public/css/plugin/animate.min.css',
    'public/css/plugin/bootstrap.min.css',
    'public/css/plugin/themify.css',
    'public/css/page/main.css',
    'public/css/page/responsive.css',
], 'public/css/prod/main.css');

mix.styles([
    'public/css/page/*.css'
], 'public/css/prod/index.css');

mix.styles([
    'public/css/page/template/typography.css'
], 'public/css/prod/template/typography.css');




/************************************************ 
    
                    HOMEPAGE

************************************************/


mix.styles([
    'public/css/page/homepage.css'
], 'public/css/prod/homepage.css');
mix.scripts([
    'public/js/page/homepage.js',
], 'public/js/prod/homepage.js')

