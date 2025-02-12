@extends('site.layouts.master')
@section('content')

{{-- SEC 1 VİDEO section--}}

<section class="video-section">
    <div class="container xlarge">
        <div class="row gap-30">
            <div class="col-md-6 preset-color-peach">
                <h3>Headline or mini text for the video is here two or three lines would be nice. Like a slogan or quote...</h3>
            </div>
            <div class="col-md-6">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/CeBhwgw_Duw?si=zbFM81keZSLNZuTa" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

@endsection