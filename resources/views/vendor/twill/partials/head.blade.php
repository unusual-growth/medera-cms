<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="robots" content="noindex,nofollow" />

<title>{{ config('app.name') }} {{ config('twill.admin_app_title_suffix') }}</title>

<!-- Fonts -->
@if (app()->isProduction())
    <link href="{{ twillAsset('Inter-Regular.woff2') }}" rel="preload" as="font" type="font/woff2" crossorigin>
    <link href="{{ twillAsset('Inter-Medium.woff2') }}" rel="preload" as="font" type="font/woff2" crossorigin>
@endif

<!-- CSS -->
@if (app()->isProduction())
    <link href="{{ twillAsset('chunk-common.css') }}" rel="preload" as="style" crossorigin />
    <link href="{{ twillAsset('chunk-vendors.css') }}" rel="preload" as="style" crossorigin />
@endif

@unless (config('twill.dev_mode', false))
    <link href="{{ twillAsset('chunk-common.css') }}" rel="stylesheet" crossorigin />
    <link href="{{ twillAsset('chunk-vendors.css') }}" rel="stylesheet" crossorigin />
@endunless

<!-- head.js -->
<script>
    ! function(e) {
        var i = window.A17 || {},
            n = e.documentElement,
            l = window;
        i.browserSpec = "html5", i.touch = !!("ontouchstart" in l || l.documentTouch && e instanceof DocumentTouch), i
            .objectFit = "objectFit" in n.style, window.A17 = i, n.className = n.className.replace(/\bno-js\b/, " js " +
                i.browserSpec + (i.touch ? " touch" : " no-touch") + (i.objectFit ? " objectFit" : " no-objectFit"))
    }(document);
</script>

@stack('extra_css')
@stack('extra_js_head')
<style>
    body {
        background-color: #e9e9e9;
        min-height:100vh;
    }

    .twill-layout {
        display: flex;
        min-height: 100vh;
    }

    @media screen and (min-width: 1540px) {
        .container {
            width: 100%;
        }
    }
    @media screen and (min-width: 1540px) {
        .container[data-v-4a720f0f] {
            width:100%;
        }}




    .twill-sidebar-menu {
        width: 250px;
        min-width: 250px;
        background-color: #fdfdfd;
        padding: 20px;
        height: auto;
        overflow-y: auto;
        -webkit-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        -ms-box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 11 !important;
    }

    .header__item.s--on,
    .header__item:hover {
        background-color: transparent !important;
    }

    .header__item.s--on a,
    .header__item:hover a {
        color: #f44336;
    }

    .header__item {
        color: #333;
    }

    @media screen and (max-width: 1024px) {
        .twill-sidebar-menu {
            display: none;
        }
    }


    .twill-content-wrapper {
        flex: 1;
        padding: 20px;
        height:100%;
        width: 50%;
    }

    @media screen and (max-width: 1024px) {
        .twill-content-wrapper {
            padding: 0;
        }
    }

    @media screen and (max-width: 768px) {
        .twill-content-wrapper {
            padding: 0;
        }
    }


    .header>.container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    /* Make the menu vertical */
    .header__nav {
        height: auto;
        overflow: hidden;
        flex-direction: column;
    }

    /* Target the container of the two lists */
    .header__primary {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }

    /* Style for the header items lists */
    .header__items {
        display: flex !important;
        flex-direction: column !important;
        width: 100%;
        padding: 0;
        margin: 0 0 20px 0 !important;
        list-style: none;
    }

    .header__item {
        width: 100%;
        margin: 0 !important;
        position: relative;
        border-bottom: 1px solid #eee;
    }

    .header__item::before {
        content: "►";
        /* You can change this symbol to anything you want */
        position: absolute;
        left: 0px;
        top: 50%;
        transform: translateY(-50%);
        color: #b4b4b4;
        font-size: 8px;
        margin-left: 5px;
    }

    .header__subitem {
        margin-left: 20px !important;
    }

    .header__subsubitem {
        margin-left: 40px !important;
    }

    q .header__item a {
        display: block;
        padding: 10px 15px;
        color: #fff;
        text-decoration: none;
    }

    .header__item a:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .header__item.s--on a {
        background-color: rgba(255, 255, 255, 0.15);
        font-weight: bold;
    }

    @media screen and (min-width: 1040px) and (max-width: 1539px) {
        .col--primary {
            width: calc(66.66667vw - 363.33333px);
        }
    }

    header.header {
        background: #f44336;
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        -ms-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        padding: 5px 0;
    }

    .header__title {
        font-size: 18px;
    }

    .dashboardSearch {
        background: #f44336;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        -ms-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .container.search.search--dashboard {
        background: #f44336;
    }

    .search--dashboard .search__input .form__input {
        background: #fff !important;
    }



    .headerSearch__toggle .icon {
        color: #fff;
    }

    .headerSearch__toggle .icon:hover {
        color: #ccc;
    }

    .listing,
    #content,
    .fieldset,
    .publisher__wrapper {
        background: #fff;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
    }

    .fieldset__header {
        background: #ffc008 !important;
        color: #fff;
    }

    .block__header {
        background: #607D8B !important;
        color: #fff !important;
    }

    .block--small .block__header {
        background: #9baeb7 !important;
        color: #fff !important;
    }

    .block__handle:before {
        background: repeating-linear-gradient(180deg, #9baeb7, #9baeb7 2px, transparent 0, transparent 4px) !important;
    }

    .a17.a17--login {
        background: #00416a;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6496b6, #e4e5e6);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6496b6, #e4e5e6);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        //background: linear-gradient(110deg, #fdcd3b 60%, #ffed4b 60%);
    }

    .a17.a17--login form {
        background: rgba(255, 255, 255, 0.5);
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .login__heading {
        color: #00416a;
        margin: -30px -30px 0 -30px;
        background: rgba(255, 255, 255, 0.5);
        padding: 30px;
        text-align: center;
    }

    h2.login__heading {
        display: none;
    }

    .login__input {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        border: 0;
        border-bottom: 1px solid #555;
        background-color: transparent !important;
    }

    .login__button {
        background-color: #E91E63 !important;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:focus {
        transition: background-color 0s 600000s, color 0s 600000s !important;
    }

    .footer {
        display: none;
    }

    .login__copyright {
        display: none;
    }
</style>
