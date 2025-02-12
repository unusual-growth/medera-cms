<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="robots" content="noindex,nofollow" />

<title>{{ config('app.name') }} {{ config('twill.admin_app_title_suffix') }}</title>

<!-- Fonts -->
@if(app()->isProduction())
    <link href="{{ twillAsset('Inter-Regular.woff2') }}" rel="preload" as="font" type="font/woff2" crossorigin>
    <link href="{{ twillAsset('Inter-Medium.woff2') }}" rel="preload" as="font" type="font/woff2" crossorigin>
@endif

<!-- CSS -->
@if(app()->isProduction())
    <link href="{{ twillAsset('chunk-common.css') }}" rel="preload" as="style" crossorigin/>
    <link href="{{ twillAsset('chunk-vendors.css') }}" rel="preload" as="style" crossorigin/>
@endif

@unless(config('twill.dev_mode', false))
    <link href="{{ twillAsset('chunk-common.css') }}" rel="stylesheet" crossorigin/>
    <link href="{{ twillAsset('chunk-vendors.css' )}}" rel="stylesheet" crossorigin/>
@endunless

<!-- head.js -->
<script>
    !function(e){var i=window.A17||{},n=e.documentElement,l=window;i.browserSpec="html5",i.touch=!!("ontouchstart"in l||l.documentTouch&&e instanceof DocumentTouch),i.objectFit="objectFit"in n.style,window.A17=i,n.className=n.className.replace(/\bno-js\b/," js "+i.browserSpec+(i.touch?" touch":" no-touch")+(i.objectFit?" objectFit":" no-objectFit"))}(document);
</script>

@stack('extra_css')
@stack('extra_js_head')
<style>
   .twill-layout {
    display: flex;
    min-height: 100vh;
}

.twill-sidebar-menu {
    width: 250px;
    min-width: 250px;
    background-color: #1a1a1a;
    padding: 20px;
    height: auto;
    overflow-y: auto;
}
@media screen and (max-width: 1024px) {
    .twill-sidebar-menu {
        display: none;
    }
}


.twill-content-wrapper {
    flex: 1;
    padding: 20px;
}

.header > .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


/* Make the menu vertical */
.header__nav {
    height: auto;
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
}

.header__subitem {
    margin-left: 20px !important;
}

.header__subsubitem {
    margin-left: 40px !important;
}q

.header__item a {
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


</style>
