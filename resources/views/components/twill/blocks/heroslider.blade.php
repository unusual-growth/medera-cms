@php
//TODO: HTML CSS missing

    $picture_hierarchy = [
        [
            'key' => 'mobile_image',
            'src' => null,
            'media' => null,
        ],
        [
            'key' => 'tablet_image',
            'src' => null,
            'media' => '(min-width: 768px)',
        ],
        [
            'key' => 'desktop_image',
            'src' => null,
            'media' => '(min-width: 1024px)',
        ],
    ];

    if (!function_exists('setUpPicture')) {
        function setUpPicture($block, &$arr, $setMediaNull = false, $i = 0)
        {
            if ($i > array_key_last($arr)) {
                return $arr;
            }
            if ($setMediaNull) {
                $arr[$i]['media'] = null;
            }
            if (!$block->hasImage($arr[$i]['key'])) {
                unset($arr[$i]);
                return setUpPicture($block, $arr, true, $i + 1);
            }
            $arr[$i]['src'] = $block->image($arr[$i]['key']);
            return setUpPicture($block, $arr, false, $i + 1);
        }
    }
@endphp
<section @class(['hero', 'formed'])>
    @foreach ($repeater('slides') as $key => $repeaterItem)
        @php
            $_renderData = $repeaterItem->renderData;
            $slide_block = $_renderData->block;
            $top_title = $slide_block->translatedInput('top_title');
            $heading = $slide_block->translatedInput('heading');
            $text = $slide_block->translatedInput('text');
            $link = $slide_block->translatedInput('link');
            $link_text = $slide_block->translatedInput('link_text');
            $picture_hierarchy = setUpPicture($slide_block, $picture_hierarchy);
        @endphp
        <picture>
            @for ($i = array_key_last($picture_hierarchy); $i >= 0; $i--)
                @php
                    $item = $picture_hierarchy[$i] ?? null;
                    if (!$item) {
                        break;
                    }
                @endphp

                @if ($item['media'])
                    <source srcset="{{ $item['src'] }}" media="{{ $item['media'] }}">
                @else
                    <img src="{{ $item['src'] }}" alt="{{ $slide_block->imagesAsArrays($item['key'])[0]['alt'] }}">
                @endif
            @endfor
        </picture>

        {!! $top_title !!}
        {!! $heading !!}
        {!! $text !!}
        <a href="{{ $link }}">{{ $link_text }}</a>
    @endforeach
</section>
