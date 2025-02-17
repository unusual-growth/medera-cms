<section class="request-section">
    @if(!$block->input('has_title'))
    <div class="container medium">
        @unusualForm(['formData' => config('forms.request-form')])
    </div>
    @else

    <div class="container xlarge">
        <div class="row">
            <div class="col-md-6 bg-col">
                <p>
                    {{ $block->translatedInput('title') }}
                </p>
            </div>
            <div class="col-md-6">
                    @unusualForm(['formData' => config('forms.request-form')])
                </div>
            </div>
        </div>
    @endif
</section>
