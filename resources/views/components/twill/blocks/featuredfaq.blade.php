    {{-- SEC 8 --}}
    @php
        $learnMoreCards = [
            [
                'title' => 'Where do you get butyrate from?',
                'description' =>
                    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etconsectetur seddo eiusmod tempo.',
                'link' => 'learn more',
            ],
            [
                'title' => 'Are your butyrate products halal?',
                'description' =>
                    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etconsectetur seddo eiusmod tempo.',
                'link' => 'learn more',
            ],
            [
                'title' => 'Do you have a vegan certificate?',
                'description' =>
                    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etconsectetur seddo eiusmod tempo.',
                'link' => 'learn more',
            ],
        ];
    @endphp
    <section class="learnmore-cards">
        <div class="container xlarge">
            <h2> Any questions? We are here to help!</h2>
            <div class="row justify-space-between">
                {{-- @foreach ($learnMoreCards as $type)
                    <div class="card">
                        <h3> {{ $type['title'] }} </h3>
                        <p> {{ $type['description'] }} </p>
                        <a href="#" target="_blank">{{ $type['link'] }}</a>
                    </div>
                @endforeach --}}
                @foreach ( $block->getRelated('faqs') as $item )
                    <div class="card">
                        <h3> {{ $item->title }} </h3>
                        <p> {{ $item->excerpt }} </p>
                        <a class="primary-cta" href="{{ $translatedInput('link') }}" target="_blank">{{ __('util.read-more') }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
