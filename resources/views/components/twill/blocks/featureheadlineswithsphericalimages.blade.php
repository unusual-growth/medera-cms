
    {{-- circle card in homepage --}}
    <section class="circle-card">
        @if($input('has_section_content') && $translatedInput('section_content'))
            <div class="container xlarge">
                <div class="heading">
                    {!! $translatedInput('section_content') !!}
                </div>
            </div>
        @endif
        <div class="container xlarge">
            <div class="cards">
                @foreach ($repeater('features') as $item)
                    @php
                        $_block = $item->renderData->block;
                        $_img = $_block->imagesAsArrays('image')[0];

                    @endphp
                        <div class="card {{ PRESETS[$_block->input('color_preset')]['class'] }}">
                            <img width="232" height="232" src="{{ $_img['src'] }}" alt="{{ $_img['alt'] }}" />
                            <p>{{ $_block->translatedInput('title') }}</p>
                        </div>
                @endforeach
            </div>
        </div>
    </section>
