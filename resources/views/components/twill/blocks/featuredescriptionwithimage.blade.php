    {{-- SEC 8  MINI IMAGE --}}
    @php
        $packagingTypes = [
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Standardized Dosage',
                'description' =>
                    'Each capsule contains the same amount of active ingredients to increase product effectiveness.',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Hygiene',
                'description' => 'It ensures maximum hygiene reliability by securely preserving the product. ',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'Consumer Reach',
                'description' => 'The capsule formulation expands the product’s appeal to a broader consumer base.',
            ],
            [
                'icon' => '/dummy-img/mini-img.png',
                'title' => 'High Performance',
                'description' =>
                    'Resistant to stomach acid, the capsules dissolve in the intestines for enhanced performance.',
            ],
        ];
    @endphp
    <section class="list-card">
        <div class="container xlarge">
            <div class="row">
                <div class="fab-card">
                    @foreach ($repeater("features") as $item)
                        @php
                            $_block = $item->renderData->block;
                            $_img = $_block->imagesAsArrays('image')[0];
                        @endphp
                        <div>
                            <img
                                width="282"
                                height="172"
                                src="{{ $_img['src'] }}"
                                alt="{{ $_img['alt'] }}"
                            />
                            <h3>{{ $_block->translatedInput('title') }}</h3>
                            <p>{{ $_block->translatedInput('description') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
