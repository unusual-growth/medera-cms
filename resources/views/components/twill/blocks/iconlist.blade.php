@php
    $preset = $block->input('preset');
    $classes = [];
    $heading_class = '';
    $text_class = '';
    if ($preset == 'preset1') {
      $heading_class .= ' color-peach';
    }
    else if ($preset == 'preset2') {
        $classes[] = 'preset-color-primary';
    }
    // You can add more preset conditions here
    
    $classList = implode(' ', $classes);
@endphp
<section {{ $attributes->class(['list-card',$classList])}}>
    <div class="container xlarge">
        <div class="row">
            <div class="fab-card">         
                @foreach ($repeater('icons') as $key => $repeaterItem)
                    @php
                        $_renderData = $repeaterItem->renderData;
                        $icon_block = $_renderData->block;
                        $text = $icon_block->translatedInput('text');
                        $title = $icon_block->translatedInput('title');
                        $image = $icon_block->image('icon-list', 'default');

                    @endphp
                    <div>
                      <img src="{{ $image }}" alt="icon" />
                      <h3 class="{{ $heading_class }}">{{ $title }}</h3>
                      <p>{{ $text }}</p>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
