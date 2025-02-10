@php
    $image = TwillImage::make($block, 'col_image')->crop('default')->width(592)->toArray();

    $image_right = $input('image_right');
    $reverse_order_mobile = $input('reverse_order_mobile');
    $color_scheme = $input('color_scheme');
@endphp
<section class="flex6 {{ $color_scheme == 'peach' ? 'preset-color-peach' : '' }}">
    <div class="container xlarge">
        <div class="row {{ $reverse_order_mobile ? 'mob-rev' : '' }} {{ $image_right ? 'reverse' : '' }}">
            <div class="col-md-6 bg-coating">
                {!! TwillImage::render($image, []) !!}
            </div>
            <div class="col-md-6 ">
                {!! $translatedInput('text') !!}
            </div>
        </div>
    </div>
</section>
