const mix = require('laravel-mix');

//SB ADMIN MIXING
const SbAdminResAsset='resources/assets/admin/';
const SbAdminPubAsset='public/admins/';

mix.copy(SbAdminResAsset + 'vendor/fontawesome-free/webfonts',SbAdminPubAsset + 'webfonts');
mix.copy(SbAdminResAsset + 'img',SbAdminPubAsset +'img');
mix.copy(SbAdminResAsset + 'vendor/bootstrap/js/bootstrap.bundle.min.js.map',SbAdminPubAsset + 'js');
mix.copy(SbAdminResAsset + 'vendor/chartjs',SbAdminPubAsset + 'js/chartjs');
mix.copy(SbAdminResAsset + 'js/demo',SbAdminPubAsset +'js/demo');
mix.copy(SbAdminResAsset + 'vendor/datatables',SbAdminPubAsset + 'js/datatables');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .combine([
        SbAdminResAsset + 'vendor/jquery/jquery.min.js',
        SbAdminResAsset + 'vendor/bootstrap/js/bootstrap.bundle.min.js',
        SbAdminResAsset + 'vendor/jquery-easing/jquery.easing.min.js',
        SbAdminResAsset + 'js/sb-admin-2.min.js',
    ],SbAdminPubAsset + 'js/sb-admin.js')
    .styles([
        SbAdminResAsset + 'vendor/fontawesome-free/css/all.min.css',
        SbAdminResAsset + 'css/sb-admin-2.min.css',
    ],SbAdminPubAsset + 'css/sb-admin.css')
    .sourceMaps();
mix.version()

// DINGO MIXING
const  DingoResAsset = 'resources/assets/frontend/';
const  DingoPubAsset = 'public/frontend/dingo/';
mix.copy(DingoResAsset + 'webfonts',DingoPubAsset +'webfonts');
mix.copy(DingoResAsset + 'css/style.css.map',DingoPubAsset +'css');
mix.copy(DingoResAsset + 'js/swiper.min.js.map',DingoPubAsset +'js');
mix.copy(DingoResAsset + 'img',DingoPubAsset +'img');
mix.copy(DingoResAsset + 'fonts',DingoPubAsset +'fonts');

mix.js('resources/js/app.js', 'public/frontend/dingo/js/')
    .combine([
        DingoResAsset + 'js/jquery-1.12.1.min.js',
        DingoResAsset + 'js/popper.min.js',
        DingoResAsset + 'js/bootstrap.min.js',
        DingoResAsset + 'js/jquery.magnific-popup.js',
        DingoResAsset + 'js/swiper.min.js',
        DingoResAsset + 'js/masonry.pkgd.js',
        DingoResAsset + 'js/owl.carousel.min.js',
        DingoResAsset + 'js/slick.min.js',
        DingoResAsset + 'js/gijgo.min.js',
        DingoResAsset + 'js/custom.js',
    ],DingoPubAsset + 'js/dingo.js')
    .styles([
        DingoResAsset + 'css/bootstrap.min.css',
        DingoResAsset + 'css/animate.css',
        DingoResAsset + 'css/owl.carousel.min.css',
        DingoResAsset + 'css/themify-icons.css',
        DingoResAsset + 'css/flaticon.css',
        DingoResAsset + 'css/magnific-popup.css',
        DingoResAsset + 'css/slick.css',
        DingoResAsset + 'css/gijgo.min.css',
        DingoResAsset + 'css/nice-select.css',
        DingoResAsset + 'css/all.css',
        DingoResAsset + 'css/style.css',
    ],DingoPubAsset + 'css/dingo.css')
    .sourceMaps()
mix.version()
    .browserSync('dingo.test');
