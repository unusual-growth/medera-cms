@php
    $preset = $block->input('preset');
    $section_class = '';
    $heading_class = '';
    $text_class = '';
    $container_class = '';
    $inner_class = '';
    $show_text = true;
    $split_heading = false;
    $heading_tag = 'h3';
    if ($preset == 'preset1') {
        $section_class = 'list-card';
        $heading_class = 'border-list-card color-peach';
        $container_class = 'fab-card';
    } elseif ($preset == 'preset2') {
        $section_class = 'list-card preset-color-primary';
        $container_class = 'fab-card';
    } elseif ($preset == 'preset3') {
        $section_class = 'benefitgrid';
        $container_class = 'benefits';
        $inner_class = '__items';
        $show_text = false;
        $split_heading = true;
        $heading_tag = 'h2';
    } elseif ($preset == 'preset4') {
        $section_class = 'border-list-card';
        $container_class = '__fab-card';
    }elseif($preset == 'preset5'){
        $section_class = 'hovered preset-color-secondary';
        $container_class = 'cards';
        $inner_class = 'card';
    }

@endphp
<section {{ $attributes->class([$section_class]) }}>
    <div class="container xlarge">
        <div class="row">
            <div {{ $attributes->class([$container_class]) }}>
                @foreach ($repeater('icons') as $key => $repeaterItem)
                    @php
                        $_renderData = $repeaterItem->renderData;
                        $icon_block = $_renderData->block;
                        $text = $icon_block->translatedInput('text');
                        $title = $icon_block->translatedInput('title');
                        $image = $icon_block->image('icon-list', 'default');

                        // Split text into words and make first word strong
                        $words = explode(' ', $title);
                        if (count($words) > 0 && $split_heading) {
                            $title = '<strong>' . $words[0] . '</strong> ' . implode(' ', array_slice($words, 1));
                        }
                    @endphp
                    <div {{ $attributes->class([$inner_class]) }}>
                        @if ($preset == 'preset4')
                            <div>
                        @endif
                        @if ($preset == 'preset5')
                        <div class="__content">
                    @endif
                        <img src="{{ $image }}" alt="icon" />
                        <{{ $heading_tag }} class="{{ $heading_class }}">{!! $title !!}</{{ $heading_tag }}>
                        @if ($preset == 'preset5')
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="m17.613 15-5.87-6-5.872 6" stroke="#434A57" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        @endif
                            @if ($show_text)
                                <p>{{ $text }}</p>
                            @endif
                        @if ($preset == 'preset4' || $preset == 'preset5')
                            </div>
                         @endif
                    </div>
            @endforeach
        </div>
    </div>
    </div>
</section>

