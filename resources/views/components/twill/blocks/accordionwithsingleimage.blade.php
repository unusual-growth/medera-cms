@php
    $img = $block->imagesAsArrays('image')[0];
@endphp
<section class="accordion-section">
    <div class="container xlarge">
        <div class="row">
            <h2> {{$translatedInput('title')}} </h2>
        </div>
        <div class="row gap-30">
            <div class="col-md-6">
                    {{-- <picture>
                    <source srcset="{{ asset('/dummy-img/accordion1.png') }}" media="(min-width: 1024px)">
                    <source srcset="{{ asset('/dummy-img/accordion1.png') }}" media="(min-width: 768px)">
                    </picture> --}}

                    <img width="{{$img["width"]}}" height="{{$img["height"]}}" src="{{ $img["src"] }}" alt="{{$img["alt"]}}" />
            </div>
            <div class="col-md-6">
                @foreach ($repeater('accordion-items') as $key => $item)
                    @php
                        $_block = $item->renderData->block;
                        $_img = $_block->imagesAsArrays('icon')[0];
                    @endphp
                    {{-- !!TODO active logic does not work properly at the beginning --}}
                    <div class="accordion-item {{ $key === 0 ? 'active' : '' }}">
                        <div class="question" data-accordion="{{ $key }}">
                            <div class="question-content">
                                <img  width="34" height="34" src="{{ $_img['src'] }}" alt="{{$_img['alt']}}" />
                                <h4 itemprop="name">{{ $_block->translatedInput('title') }}</h4>
                            </div>
                            <img src="/dummy-img/arrow.svg" class="arrow"></img>
                        </div>
                        <div class="accordion-answer">
                            <div class="answer-content" itemprop="text">
                                {!! $_block->translatedInput('content') !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- !!TODO: Move this to the main js file --}}
<script>

    document.addEventListener('DOMContentLoaded', function() {
        const questions = document.querySelectorAll('.question');
        const firstAnswer = document.querySelector('.Accordion-item.active .Accordion-answer');
        if (firstAnswer) {
            firstAnswer.style.maxHeight = firstAnswer.scrollHeight + 'px';
        }

        questions.forEach(question => {
            question.addEventListener('click', function() {
                const currentAccordion = this.closest('.accordion-item');
                const currentAnswer = currentAccordion.querySelector('.accordion-answer');
                const isOpen = currentAccordion.classList.contains('active');
                const activeAccordions = document.querySelectorAll('.accordion-item.active');

                if (!isOpen) {
                    activeAccordions.forEach(item => {
                        item.classList.remove('active');
                        item.querySelector('.accordion-answer').style.maxHeight = '0px';
                    });
                    currentAccordion.classList.add('active');
                    currentAnswer.style.maxHeight = currentAnswer.scrollHeight + 'px';
                } else if (activeAccordions.length === 1) {
                    return;
                } else {
                    currentAccordion.classList.remove('active');
                    currentAnswer.style.maxHeight = '0px';
                }
            });
        });
    });
</script>
