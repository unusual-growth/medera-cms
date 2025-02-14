@php
    use A17\Twill\Facades\TwillNavigation;
    $navigationTree = TwillNavigation::buildNavigationTree();
    // dd($navigationTree, $linkGroups);
@endphp
<nav class="header__nav">
    @foreach ($navigationTree as $nav_branch)
        @foreach ($nav_branch as $nav_item)
            {!! $nav_item->render(class: 'header__item') !!}
            @if ($nav_item->getChildren())
                @foreach ($nav_item->getChildren() as $child_item)
                    {!! $child_item->render(class: 'header__item header__subitem') !!}
                    @if ($child_item->getChildren())
                        @foreach ($child_item->getChildren() as $grandchild_item)
                            {!! $grandchild_item->render(class: 'header__item header__subsubitem') !!}
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endforeach
    @endforeach
</nav>
