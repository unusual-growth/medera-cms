@extends('site.layouts.master')
@section('content')
    <footer>
        <div class="row-top">
            <div class="container xlarge">
                <div class="row">
                    <div class="col-sm-3 left">
                        <div class="logo">
                            <a href="#"><img src="/dummy-img/medera-white-logo.png" alt="" /></a>
                        </div>

                        @php
                            $socials = [
                                [
                                    'social' => '/dummy-img/youtube.svg',
                                ],
                                [
                                    'social' => '/dummy-img/facebook.svg',
                                ],
                                [
                                    'social' => '/dummy-img/instagram.svg',
                                ],
                                [
                                    'social' => '/dummy-img/linkedln.svg',
                                ],
                            ];
                        @endphp
                        <div class="socials">
                            <p>FOLLOW US</p>
                            <div>
                                @foreach ($socials as $social)
                                    <a target="_blank" href="#"><img src="{{ $social['social'] }} " /> </a>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    @php
                        $list1 = [
                            [
                                'text' => 'Butyrate',
                            ],
                            [
                                'text' => 'All-nature',
                            ],
                            [
                                'text' => 'DRcaps®',
                            ],
                            [
                                'text' => 'Medera',
                            ],
                        ];
                    @endphp
                    <div class="col-sm-3 mid-left">
                        <p>PRODUCT</p>
                        <ul>
                            @foreach ($list1 as $list)
                                <li><a href="#">{{ $list['text'] }} </a></li>
                            @endforeach
                        </ul>
                    </div>

                    @php
                        $list2 = [
                            [
                                'text' => 'Packaging',
                            ],
                            [
                                'text' => 'Shipping & Returns',
                            ],
                            [
                                'text' => 'FAQ',
                            ],
                            [
                                'text' => 'Feedback',
                            ],
                        ];
                    @endphp
                    <div class="col-sm-3 mid-right">
                        <p>LEARN MORE</p>
                        <ul>
                            @foreach ($list2 as $list)
                                <li><a href="#">{{ $list['text'] }} </a></li>
                            @endforeach
                        </ul>

                    </div>
                    {{-- @php
                    $info = [
                        [
                            'address' => 'Lange Viestraat 2B, 3511 BK Utrecht, The Netherlands',
                        ],
                        [
                            'email' => 'info@mederanutrition.com',
                        ],
                        [
                            'phone' => '00 111 22 33',
                        ],
                    ];
                @endphp --}}
                    <div class="col-sm-3 right">
                        <p>COMPANY</p>
                        <p><span>Adress:</span>Lange Viestraat 2B, 3511 BK Utrecht, The Netherlands </p>
                        <p><span>Email</span>info@mederanutrition.com</p>
                        <p><span>Phone:</span>00 111 22 33 </p>
                    </div>
                </div>

                @php
                    $links = [
                        [
                            'name' => 'Privacy Policy',
                            'link' => 'privacy-policy',
                        ],
                        [
                            'name' => 'User Agreement',
                            'link' => 'user-aggreement',
                        ],
                    ];
                @endphp
            </div>
        </div>

        <div class="container ful-1440 line">
            <div class="container xlarge">
                <div class="row justify-space-between">
                    <div class="bottom">
                        <div class="__left">
                            <span>©2024 Medera Nutrition. All right reserved.</span>
                        </div>
                        <div class="__right">
                            @foreach ($links as $link)
                                <a href="{{ $link['link'] }}"> {{ $link['name'] }} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
@endsection
