@php
    $has_background_image = $block->input('has_background_image');
    $has_desktop_image = $has_background_image && $block->hasImage('desktop_image');
    $has_tablet_image = $has_background_image && $block->hasImage('tablet_image');
    $has_mobile_image = $has_background_image && $block->hasImage('mobile_image');
@endphp
<section class="banner {{$block->input('background')}}"
    @if ($has_background_image)
    style="
        @if($has_desktop_image)
            {{ '--desktop-image: url(' . $block->image('desktop_image') . ');' }}
        @endif
        @if($has_tablet_image)
            {{ '--tablet-image: url(' . $block->image('tablet_image') . ');' }}
        @endif
        @if($has_mobile_image)
            {{ '--mobile-image: url(' . $block->image('mobile_image') . ');' }}
        @endif
    "
    @endif
    >
    <div class="container xlarge">
        <div class="flex-column justify-content-center align-items-center">
            {!! $block->translatedInput('content') !!}
            @if($block->input('has_link'))
                <a href="{{$block->translatedInput('link_url')}}" class="primary-cta">{{$block->translatedInput('link_text')}}</a>
            @endif
        </div>
    </div>
</section>
