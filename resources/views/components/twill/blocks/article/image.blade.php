@php
    $image = $block->image('image');

    $classes = $block->input('classes');
    $classList = $classes ? implode(' ', $classes) : '';

@endphp
<div class="container xlarge">
    <img src="{{ $image }}" {{ $attributes->class([$classList]) }} width="{{ $block->input('width') }}" height="{{ $block->input('height') }}">
</div>
