@php
    $background_image = $block->image('background-image', 'default');

    if (!empty($background_image) && strpos($background_image, 'data:image/gif') === false) {
        $dynamicAttributes['style'] = 'background-image: url(' . $background_image . ')';
    }
@endphp
<section class="pills-banner" {{ $attributes->merge($dynamicAttributes) }}>
    <div class="container xlarge">
        <div class="row">
            @foreach ($repeater('texts') as $key => $repeaterItem)
                @php
                    $_renderData = $repeaterItem->renderData;
                    $icon_block = $_renderData->block;
                    $title = $icon_block->translatedInput('title');
                @endphp
                <div>
                    <p> {{ $title }}</p>
                </div>
            @endforeach
        </div>
</section>
