@extends('layout.main')

@section('content')
    <div class="c-intro">
        <div class="c-chat py-3 bg-brand">
            <div class="text-center"><span class="e-white">Need to chat? </span><a class="e-white e-decor" href="{{route('contact')}}">Click Here</a></div>
        </div>
        <div class="carousel carousel-fade" id="sliderHome" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#sliderHome" data-slide-to="0"></li>
                <li class="second" data-target="#sliderHome" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="wow zoomIn" data-wow-duration="2s" src="{{asset('img/intro/intro3.png')}}" alt="">
                    <div class="carousel-caption">
                        <h1 class="e-title--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1s">{{$content['block1']->title ?? ''}}</h1>
                        <p class="e-subtitle--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.25s">
                            {!! $content['block1']->content ?? '' !!}</p><a class="btn mt-3 wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.5s" href="{{route('products')}}">Shop Now</a>
                    </div>
                    <div class="img-up third wow slideInUp d-none d-lg-block" data-wow-duration=".75s" data-wow-delay="2.5s">
<!--
                        <img src="{{asset('img/intro/gr.png')}}">
-->
                    </div>
                </div>
                <div class="carousel-item first"><img class="wow zoomIn" data-wow-duration="2s" src="{{asset('img/intro/intro2.jpg')}}" alt="">
                    <div class="carousel-caption">
                        <h1 class="e-title--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1s">{{$content['block2']->title ?? ''}}</h1>
                        <p class="e-subtitle--intro wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.25s">{!! $content['block2']->content ?? '' !!}</p><a class="btn mt-3 wow slideInUp" data-wow-duration=".75s" data-wow-delay="1.5s" href="{{route('products')}}">Shop Now</a>
                    </div>
                    <div class="img-up third wow slideInUp d-none d-lg-block" data-wow-duration=".75s" data-wow-delay="2.5s"><img src="{{asset('img/about.png')}}"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-about py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-11 col-lg-6 mx-auto">
                    <div class="c-about__image wow zoomOut" data-wow-duration="2s"><img src="{{asset('img/about.png')}}"></div>
                </div>
                <div class="col-11 col-lg-6 mx-auto pt-lg-4">
                    <h1 class="e-title e-title--part wow fadeInUp" data-wow-duration=".75s">{{$content['block3']->title ?? ''}}</h1>
                    {!! $content['block3']->content  ?? ''!!}

                    <h1 class="e-title e-title--part wow fadeInUp" data-wow-duration=".75s">{{$content['block4']->title ?? ''}}</h1>
                    {!! $content['block4']->content ?? '' !!}

                </div>
            </div>
        </div>
    </div>
    <div class="c-products pb-5">
        <div class="container-fluid">
            <div class="c-products__header py-4 py-lg-0">
                <h2 class="e-sub e-white ml-3 ml-lg-0">Newest Products</h2><a class="btn small yellow w-10" href="{{route('products')}}">View all</a>
            </div>

            <div class="c-products__items d-flex ">
                @foreach($products as $product)
                    <div class="col-12 col-lg-4 mx-lg-0 c-product__item">
                        @if(!empty($product->images))
                            <a class="card w-100" href="{{route('product',$product->id)}}">
                                <img class="mt-4 mb-4 product-image" src="{{asset('storage/'.array_values($product->images)[0])}}" alt="" >
                            </a>
                        @endif
                        <div class="pr-footer w-100 mx-auto">
                            <div class="pr-footer__info w-50">
                                <h3 class="e-mini"> <a href="{{route('product',$product->id)}}">{{$product->name}}</a></h3>

                                <p class="pr-price"><span>${{number_format($product->price,2)}}</span></p>
                            </div>
                            <div class="w-50 d-block">
                                <a class="btn small" href="{{route('product',$product->id)}}">
                                    ADD to CART
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="c-why py-5">
        <div class="container-fluid">
            <h2 class="e-title e-title--part m-5 wow fadeInUp" data-wow-duration=".75s">Why Creen Living Important?</h2>
            <div class="row">
                <div class="col-11 col-lg-4 mx-auto">
                    <div class="mx-lg-5">
                        <h4 class="e-mini top e-new">01</h4><img class="wow fadeInUp" data-wow-delay=".25s" src="{{asset('img/about/a1.png')}}" alt="">
                        <p class="wow fadeInUp mt-4" data-wow-delay=".5s">
                            {!! $content['main-why-block1']->content  ?? ''!!}

                        </p>
                    </div>
                </div>
                <div class="col-11 col-lg-4 mx-auto col-middle">
                    <div class="mx-lg-5">
                        <h4 class="e-mini top e-yellow">02</h4><img class="wow fadeInUp" data-wow-delay=".5s" src="{{asset('img/about/a2.png')}}" alt="">
                        <p class="wow fadeInUp mt-4" data-wow-delay=".75s">
                            {!! $content['main-why-block2']->content  ?? ''!!}


                        </p>
                    </div>
                </div>
                <div class="col-11 col-lg-4 mx-auto">
                    <div class="mx-lg-5">
                        <h4 class="e-mini top e-new">03</h4><img class="wow fadeInUp" data-wow-delay=".75s" src="{{asset('img/about/a3.png')}}" alt="">
                        <p class="wow fadeInUp mt-4" data-wow-delay="1s">
                            {!! $content['main-why-block3']->content  ?? ''!!}

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-faq bg-white py-5">
        <div class="container">
            <div class="text-center">
                <h4 class="e-mini e-color">Clean help</h4>
                <h3 class="e-title e-color">Frequently asked questions</h3>
            </div>
            <div class="row">
                <div class="col-11 col-lg-10 mx-auto">
                    <div class="accordion my-5" id="faq">
                        @foreach($faqs as $idx=>$faq)

                            <div class="card">
                                <div class="card-header" id="heading{{$idx}}">
                                    <div class="d-flex align-items-center @if(!$loop->first) collapsed @endif " data-toggle="collapse" data-target="#collapse{{$idx}}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="collapse{{$idx}}">
                                        <img class="vis" src="{{asset('svg/chevron-down.svg')}}">
                                        <img class="hid" src="{{asset('svg/chevron-up.svg')}}">
                                        <span class="mx-3">{{$faq->question}}</span>
                                    </div>
                                </div>
                                <div class="collapse @if($loop->first) show @endif " id="collapse{{$idx}}" aria-labelledby="heading{{$idx}}" data-parent="#faq">
                                    <div class="card-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_js')
@endsection
