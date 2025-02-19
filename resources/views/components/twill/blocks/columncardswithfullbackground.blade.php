<section class="pills-banner">
    <picture>
        <source srcset="{{$block->image('background-image', 'default')}}" media="(min-width: 768px)">
        <img src="{{$block->image('background-image-mobile')}}" alt="">
    </picture>
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
