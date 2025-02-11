@php
      $image = TwillImage::make($block, 'banner_image')->crop('default')->width(592)->toArray();
@endphp
<div class="onlyimage">
  {!! TwillImage::render($image, []) !!}
</div>
