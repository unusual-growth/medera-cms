@php
    $setting_block =TwillAppSettings::getGroupDataForSectionAndName('static-pages','success');
    $meta = arrayToObject([
        "title" => $setting_block->translatedInput('title'),
        "description" => $setting_block->translatedInput('title'),
        "index" => 'noindex'
    ]);
@endphp
@extends('site.master', ['meta' => $meta])
@section('content')
    <section class="success-section">
        <div>
            <img src="/dummy-img/success.svg" alt="">
            <h1 class="color-white"><strong>Success</strong></h1>
            <p>Thank you! Your request has been submitted!</p>
            <a href="">GO HOME</a>
        </div>
    </section>
@endsection
