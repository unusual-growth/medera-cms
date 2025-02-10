@php
    $image = TwillImage::make($block, 'col_image')->crop('default')->width(592)->toArray();

    $image_right = $input('image_right');
    $color_mode = $input('color_mode');
    $reverse_order_mobile = $input('reverse_order_mobile');
    $color_scheme = $input('color_scheme');
@endphp

<section class="journey-section {{ $color_scheme == 'peach' ? 'preset-color-peach' : '' }}">
  <div class="container xlarge journey-container">
    <div class="row {{ $reverse_order_mobile ? 'mob-rev' : '' }} {{ $image_right ? 'reverse' : '' }}">
      <div class="journey-image col-sm-5">
        {!! TwillImage::render($image, []) !!}

      </div>
      <div class="journey-content height-500 {{ $color_mode == 'dark' ? 'dusky-blush-gradient' : 'bg-light' }} col-sm-7">
          <div>
            {!! $translatedInput('text') !!}

          </div>
      </div>
    </div>
  </div>
</section>