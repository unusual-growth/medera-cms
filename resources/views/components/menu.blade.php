@php
    $currentSlug = request()->segment(2);
    if(isset($type) && $type == 'mobile') {
        // dd($links);
    }
@endphp
<ul>
    @foreach ($links as $link)
    @php
            $page = $link->getRelated('page')->first();
            if ($page) {
                $linkSlug = $page->slug;
                $isActive = isset($item) && $page instanceof $item && $page->id == $item->id ? 'active' : '';
            } else {
            }
        @endphp
        @php
            if ($type == 'mobile' && isset($link->children) && count($link->children) > 0) {
                // dd(isset($type) && $type == 'desktop',$link->children);

            }
        @endphp

        @if (isset($link->children) && count($link->children) > 0)
            {{-- @dd($link->children) --}}
            @if (isset($type) && $type == 'desktop')
                <li>
                    <div class="dropdown">
                        @if ($page)
                            <a href="{{  $page->getLocalizedUriWithRoute(LaravelLocalization::getCurrentLocale()) }}">{{ $link->title }}</a>
                        @else
                            <span>{{ $link->title }}</span>
                        @endif
                        <div class="dropdown-content">
                            <div>
                                @foreach ($link->children as $subitem)
                                    @php
                                        $subitemSlug = $subitem->getRelated('page')->first()->slug;
                                        $isActive = isset($item) && $subitem instanceof $item && $subitem->id == $item->id ? 'active' : '';
                                    @endphp
                                    <a href="{{$subitem->getRelated('page')->first()->getLocalizedUriWithRoute(LaravelLocalization::getCurrentLocale())}}"
                                        class="{{ $isActive }}">{{ $subitem->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            @else
                {{-- @dd('else',$link->children); --}}
                <li class="hasSub">
                    <span>{{ $link->title }}</span>
                    <ul class="submenu">
                        @foreach ($link->children as $subitem)
                            @php
                                $subitemSlug = $subitem->getRelated('page')->first()->slug;
                                $isActive = $currentSlug === $subitemSlug ? 'active' : '';
                            @endphp
                            <li>
                                <a href="{{ $subitem->getRelated('page')->first()->getLocalizedUriWithRoute(LaravelLocalization::getCurrentLocale()) }}"
                                    class="{{ $isActive }}">{{ $subitem->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endisset
        @else
            <li>
                @if ($page)
                    <a href="{{ $page->getLocalizedUriWithRoute(LaravelLocalization::getCurrentLocale()) }}" class="{{ $isActive }}">{{ $link->title }}</a>
                @else
                    <span>{{ $link->title }}</span>
                @endif
            </li>
        @endisset
    @endforeach
    @if (isset($location) && $location == 'header')

        <li>
            <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated(App::currentLocale(), 'routes.articles') }}"
                class="secondary-cta active">{{ __('frontend.Library') }}</a>
        </li>
    @endif
</ul>
