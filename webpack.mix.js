const mix = require('laravel-mix');


/*****************************************************

                 MERCHANT WEBPACK

*****************************************************/

mix.styles(
    [
        "public/css/plugin/likely.min.css",
        "public/css/page/component/phone_input.css",
        "public/css/plugin/introjs.min.css",
        "public/css/plugin/introjs/introjs-flattener.css",
        "public/css/plugin/slick.css",
        "public/css/plugin/animation.css",
        "public/css/plugin/slick-theme.css",
        "public/css/page/merchant/tour.css",
        "public/css/page/merchant/nav.css",
        "public/css/page/merchant/index.css",
        "public/css/page/merchant/responsive.css",
        "public/css/page/merchant/nativemobile.css",
        "public/css/page/index.css"
    ],
    "public/css/prod/merchant/index.css"
);

mix.styles(
    [
        "public/css/plugin/chart.min.css",
        "public/css/page/component/panel.css",
        "public/css/page/merchant/report.css"
    ],
    "public/css/prod/merchant/report.css"
);

mix.styles(
    [
        "public/css/plugin/slick.css",
        "public/css/plugin/slick-theme.css",
        "public/css/page/merchant/onboarding.css"
    ],
    "public/css/prod/merchant/onboarding.min.css"
);


mix.styles(
    [
        "public/css/plugin/jquery.fontselect.css",
        "public/css/plugin/bootstrap-colorpicker.css",
        "public/css/plugin/bootstrap-multiselect.css",
        "public/css/page/merchant/cms/index.css",
        "public/css/page/merchant/cms/theme.css"
    ],
    "public/css/prod/merchant/cms.min.css"
);

mix.styles(
    [
        "public/css/plugin/chart.min.css",
        "public/css/page/component/panel.css",
        "public/css/page/merchant/dashboard.css",
        "public/css/page/merchant/onboarding.css"
    ],
    "public/css/prod/merchant/dashboard.css"
);

mix.scripts(
    ["public/js/plugin/chart.min.js"],
    "public/js/prod/merchant/report.js"
);

mix.scripts(
    [
        "public/js/page/component/phoneInput.js",
        "public/js/plugin/scrollbooster.min.js",
        "public/js/plugin/intro.min.js",
        "public/js/plugin/tinymce.min.js",
        "public/js/page/component/tinymce.js",
        "public/js/plugin/wow.min.js",
        "public/js/plugin/slick.min.js",
        "public/js/page/merchant/nav.js",
        "public/js/page/merchant/index.js",
        "public/js/plugin/likely.min.js",
        "public/js/page/merchant/mobile.js",
        "public/js/page/index.js"
    ],
    "public/js/prod/merchant/index.js"
);

mix.scripts(
    [
        "public/js/plugin/jquery.fontselect.min.js",
        "public/js/plugin/bootstrap-colorpicker.js",
        "public/js/plugin/bootstrap-multiselect.js",
        "public/js/plugin/sortable.min.js",
        "public/js/plugin/mixitup.min.js",
        "public/js/plugin/swap-animation.js"
    ],
    "public/js/prod/merchant/cms.min.js"
);

mix.scripts(
    ["public/js/page/merchant/dashboard.js", "public/js/plugin/chart.min.js"],
    "public/js/prod/merchant/dashboard.js"
);




/************************************************ 
    
                    WEBSITE

************************************************/


mix.styles([
    'public/css/plugin/animate.min.css',
    'public/css/plugin/bootstrap.min.css',
    'public/css/plugin/themify.css',
    'public/css/page/index.css',
    'public/css/page/responsive.css',
    'public/css/page/website/index.css',
    'public/css/page/website/responsive.css',
    'public/css/plugin/unicons.css',
], 'public/css/prod/website/index.min.css');

mix.scripts([
    'public/js/plugin/jquery.min.js',
    'public/js/plugin/sweetalert.min.js',
    'public/js/plugin/wow.min.js',
    'public/js/plugin/jquery.lazy.min.js',
    'public/js/plugin/fontfile.js',
    'public/js/plugin/jquery.nicescroll.min.js',
    'public/js/page/index.js',
], 'public/js/prod/website/index.min.js')




/*****************************************************

                 ECOMMERCE WEBPACK

*****************************************************/

mix.styles(
    [
        "public/css/plugin/animation.css",
        "public/css/page/component/modal.css",
        "public/css/page/ecommerce/theme/cloudsite/index.css",
        "public/css/page/ecommerce/theme/cloudsite/responsive.css"
    ],
    "public/css/prod/ecommerce/theme/cloudsite/index.min.css"
);

mix.styles(
    [
        "public/css/page/ecommerce/default/cms.css",
        "public/css/plugin/leftlet.css",
        "public/css/plugin/slick.css",
        "public/css/plugin/slick-theme.css"
    ],
    "public/css/prod/ecommerce/cms.min.css"
);


mix.scripts(
    [
        "public/js/plugin/wow.min.js",
        "public/js/page/index.js",
        "public/js/page/ecommerce/theme/cloudsite/index.js"
    ],
    "public/js/prod/ecommerce/theme/cloudsite/index.min.js"
);

mix.scripts(
    [
        "public/js/plugin/slick.min.js",
        "public/js/plugin/leftlet.js",
        "public/js/plugin/tinymce.min.js",
        "public/js/page/component/tinymce.js",
        "public/js/plugin/mixitup.min.js"
    ],
    "public/js/prod/ecommerce/cms.min.js"
);


/*****************************************************

                 COMPONENT WEBPACK

*****************************************************/

mix.styles(
    [
        "public/css/page/component/modal.css",
        "public/css/plugin/uploadBox.css",
        "public/css/plugin/flatpickr.min.css",
        "public/css/page/component/table.css"
    ],
    "public/css/prod/component/table.css"
);

mix.scripts(
    [
        "public/js/page/component/table.js",
        "public/js/plugin/flatpickr.min.js",
        "public/js/plugin/uploadBox.js",
    ],
    "public/js/prod/component/table.js"
);

mix.styles(
    [
        "public/css/page/component/chart.css",
        "public/css/plugin/chartjs.min.css"
    ],
    "public/css/prod/component/chartjs.min.css"
);

mix.scripts(
    ["public/js/page/component/panel.js", "public/js/plugin/chartjs.min.js"],
    "public/js/prod/component/chartjs.min.js"
);

mix.scripts(
    [
        "public/js/plugin/jquery.min.js",
        "public/js/plugin/popper.min.js",
        "public/js/plugin/bootstrap.min.js",
        "public/js/plugin/sweetalert.min.js",
        "public/js/plugin/jquery.nicescroll.min.js",
        "public/js/plugin/progressbar.min.js",
        "public/js/plugin/loadash.min.js",
        "public/js/plugin/loaddash.js",
        "public/js/plugin/toastify.js",
        "public/js/plugin/tooltipster.bundle.min.js",
        "public/js/plugin/jquery.lazy.min.js"
    ],
    "public/js/prod/component/index_preload.js"
);

mix.styles(
    [
        "public/css/plugin/themify/themify.css",
        "public/css/plugin/animate.min.css",
        "public/css/plugin/toastify.css",
        "public/css/plugin/bootstrap.min.css",
        "public/css/plugin/tooltipster.bundle.min.css",
        "public/css/plugin/fontawesome/fontawesome.css"
    ],
    "public/css/prod/component/index_preload.css"
);
