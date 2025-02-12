@php
    $videoUrl = $translatedInput('video_url');
    $videoId = '';

    if (
        preg_match(
            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $videoUrl,
            $match,
        )
    ) {
        $videoId = $match[1];
    }

    $videoUrl = 'https://www.youtube.com/embed/' . $videoId;
@endphp
<section class="video-section">
    <div class="container xlarge">
        <div class="row gap-30">
            <div class="col-md-6 preset-color-peach">
                {!! $translatedInput('title') !!}
            </div>
            <div class="col-md-6">
                <iframe width="560" height="315" src="{{ $videoUrl }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>
