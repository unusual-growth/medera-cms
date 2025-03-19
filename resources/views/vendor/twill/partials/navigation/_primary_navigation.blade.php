@php
    use A17\Twill\Facades\TwillNavigation;
    $navigationTree = TwillNavigation::buildNavigationTree();
    // dd($navigationTree, $linkGroups);
@endphp
<nav class="header__nav">
    @foreach ($navigationTree as $nav_branch)
        @foreach ($nav_branch as $nav_item)
            {!! $nav_item->render('header__item') !!}
            @if ($nav_item->getChildren())
                @foreach ($nav_item->getChildren() as $child_item)
                    {!! $child_item->render('header__item header__subitem') !!}
                    @if ($child_item->getChildren())
                        @foreach ($child_item->getChildren() as $grandchild_item)
                            {!! $grandchild_item->render('header__item header__subsubitem') !!}
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endforeach
    @endforeach
</nav>

@push('extra_js')
    <script>
        window.addEventListener('load', function() {
            const bts = document.querySelectorAll('[data-medialib-btn]');

            function _triggerOpenMediaLibrary() {
                if (window.{{ config('twill.js_namespace') }}) {
                    window.{{ config('twill.js_namespace') }}.vm.openFreeMediaLibrary();
                }
            }

            if (bts.length) {
                bts.forEach(function(bt) {
                    bt.addEventListener('click', function(e) {
                        e.preventDefault();
                        _triggerOpenMediaLibrary();
                        bt.blur();
                    });
                });
            }
        });
    </script>
@endpush
