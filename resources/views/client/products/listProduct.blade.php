@extends('client.layouts.default')


@section('content')
    <!-- /navigation -->
    <div class="header text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h1 class="mb-4">Shop</h1>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="text-default" href="{{ route('homeClient') }}">Home &nbsp; &nbsp; /</a></li>
                        <li class="list-inline-item text-primary">Shop</li>
                    </ul>
                </div>
            </div>
        </div>

        <svg class="header-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
                stroke-miterlimit="10" />
            <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
            <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
                stroke-miterlimit="10" />
        </svg>


        <svg class="header-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d)">
                <path class="path"
                    d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
                <path
                    d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
                    stroke="#040306" stroke-miterlimit="10" />
            </g>
            <defs>
                <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                </filter>
            </defs>
        </svg>


        <svg class="header-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
                stroke-miterlimit="10" />
            <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
            <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
                stroke-miterlimit="10" />
        </svg>


        <svg class="header-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
                stroke-width="2" />
        </svg>
    </div>


    <section class="section-sm">
        <div class="container">
            <div class="row">
                @foreach ($products as $value)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
                            <a href="#!">
                                <span class="badge badge-primary">NEW</span>
                                <img src="{{ asset($value->image) }}" alt="" class="card-img-top rounded-0">
                                <div class="card-body">
                                    <h4 class="text-uppercase mb-3">{{ $value->name }}</h4>
                                    <p class="h4 text-muted font-weight-light mb-3">{{ $value->nameCategory }}</p>
                                    <p class="h4">{{ $value->price }}$</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
                        <a href="#!">
                            <img src="images/shop/04.jpg" alt="" class="card-img-top rounded-0">
                            <div class="card-body">
                                <h4 class="text-uppercase mb-3">Sun-glass</h4>
                                <p class="h4 text-muted font-weight-light mb-3">Lip Gloss</p>
                                <p class="h4">$25.00</p>
                            </div>
                        </a>
                    </div>
                </div> --}}
                <div class="col-12 text-center mt-5">
                     {{ $products->links('pagination::bootstrap-5') }}
                </div>
               
            </div>
        </div>
    </section>
@endsection
