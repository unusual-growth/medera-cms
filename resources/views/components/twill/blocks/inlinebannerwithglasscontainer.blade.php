@php
    $has_desktop_image = $block->hasImage('desktop_image');
    $has_tablet_image = $block->hasImage('tablet_image');
    $has_mobile_image = $block->hasImage('mobile_image');
@endphp
<section class="banner glass"
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
    >
    <div class="container xlarge">
        <div class="flex-column justify-content-center align-items-center elevation">
            <div class="window">
                {!! $block->translatedInput('content') !!}
                <a href="{{$block->translatedInput('link_url')}}" class="primary-cta">{{$block->translatedInput('link_text')}}</a>
            </div>
        </div>
    </div>
</section>
