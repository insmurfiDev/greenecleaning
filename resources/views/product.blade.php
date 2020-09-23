@extends('layout.main')

@section('content')
    @include('partials.contact-block')
    <div class="c-products page bg-green">
        <div class="container-fluid">
            <div class="c-products__header">
                <h3 class="e-mini e-brad"> <a class="e-link" href="{{route('products')}}">Products</a><span>&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="e-black">{{$product->name}}</span></h3>
            </div>
        </div>
    </div>
    <div class="c-products page bg-white">
        <div class="container-fluid py-5">
            <div class="mx-3">
                <div class="row">

                    <div class="col-lg-7">
                        <div class="row " id="carousel-component">
                            <div class="col-11 col-lg-2 mx-auto c-product__item">
                                @foreach($product->images as $image)
                                    <div class="card mb-4"><img class="p-50" src="{{asset('storage/'.$image)}}" alt=""></div>
                                @endforeach

                            </div>
                            <div class="col-11 col-lg-5 mx-auto c-product__item">
                                <div class="prod-img h-100 d-flex align-items-center">
                                    @if(!empty($product->images))
                                    <img src="{{asset('storage/'.array_values($product->images)[0])}}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-11 col-lg-4 mx-auto c-product__item py-5 py-lg-0">
                        <form id="formProduct">
                            @csrf
                            <h3 class="e-title e-black">{{$product->name}}</h3>
                            <hr>
                            <h4 class="e-subtitle mini">size</h4>
                            <div class="d-flex justify-content-between my-3">
                                @foreach($product->attributes as $attribute)
                                    <div class="c-prop @if($loop->first) active @endif " data-price="{{$attribute['price'] ?? 0}}" data-count="{{$attribute['count'] ?? 0}}">{{$attribute['name'] ?? ''}}</div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="e-subtitle mini">quantity</h4>
                                    <select class="e-select w-50 selectQty"  name="qty" id="selectQty">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="e-subtitle mini">price</h4>
                                    <h4 class="e-subtitle mini " id="textPrice">
                                    @if(isset($product->attributes[0]['price']))
                                    ${{number_format($product->attributes[0]['price'],2) ?? 0.00}}
                                    @endif
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="e-subtitle mini">in stock</h4>
                                    <h4 class="e-subtitle mini" id="textCount">
                                        @if(isset($product->attributes[0]['count']))

                                            @if($product->attributes[0]['count']>10)
                                                yes
                                            @elseif($product->attributes[0]['count']>0 && $product->attributes[0]['count']<=10)
                                                limited
                                            @else
                                                pre-orer
                                            @endif
                                        @endif
                                    </h4>
                                </div>
                            </div>

                            <input type="hidden" name="prop" id="inputProp" value="{{$product->attributes[0]['name'] ?? ''}}">
                            <input type="hidden" name="price" id="inputPrice" value="{{$product->attributes[0]['price'] ?? 0}}">
                            <input type="hidden" name="product_id" id="inputProductId" value="{{$product->id}}">
                            <h4 class="e-subtitle mini">
                                Total:
                            </h4>
                            <h4 class="e-subtitle e-serif e-theme" id="textTotal">${{number_format($product->attributes[0]['price'] ?? 0,2)}}</h4>
                            <p class="my-4 py-3">
                                {{$product->short}}
                            </p>
                            <a class="btn w-100 btnCartAdd" href="#">ADD to CART</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white d-block text-center py-lg-5">
        <ul class="nav nav-tabs d-flex justify-content-center" id="descRev" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="true">Description</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
            </li>
        </ul>
    </div>
    <div class="d-block bg-green py-lg-5">
        <div class="container">

            <div class="my-5">
                <div class="tab-content" id="descRevContent">
                    <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                        <div class="row">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="row c-form">
                            <div class="center text-center">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <span>{!! \Session::get('success') !!}</span>
                                </div>
                            @endif
                            </div>
                            <form class="form d-flex" id="" action="{{route('review-send')}}" method="post">
                                @csrf
                                <div class="col-11 col-lg-10 mx-auto">
                                        <div class="row">
                                            <div class="col-12 col-lg-4"><input class="w-100" type="text" name="fname" placeholder="First Name" required></div>
                                            <div class="col-12 col-lg-4"><input class="w-100" type="text" name="lname" placeholder="Last Name"></div>
                                            <div class="col-12 col-lg-4"><input class="w-100" type="text" name="address" placeholder="Address"></div>
                                            <div class="col-12"><textarea class="w-100 revarea" placeholder="Your Comment" name="msg" required></textarea></div>
                                        </div>
                                </div>
                                <div class="col-11 col-lg-2 mx-auto">
                                    <div class="my-lg-5 py-lg-4"></div>
                                    <div class="c-review c-list__rating my-0 mx-3">
                                        <div class="rate d-flex">
                                            <span class="rating-stars one checked"></span>
                                            <span class="rating-stars two checked"></span>
                                            <span class="rating-stars three checked"></span>
                                            <span class="rating-stars four checked"></span>
                                            <span class="rating-stars five checked"></span>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <button class="btn small color" type="submit">Add</button>
                                    </div>
                                    <input type="hidden" value="5" name="rating">
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                </div>
                            </form>

                        </div>
                        <hr class="mt-4">
                        @foreach($product->reviews as $review)
                        <div class="row my-4">
                            <div class="col-11 col-lg-2 mx-auto py-4 py-lg-0">
                                <span class="e-black e-bold mb-3">{{$review->name}}</span>
                                <br>
                                <span class="e-dark">{{$review->address}}</span></div>
                            <div class="col-11 col-lg-7 mx-auto">
                                <p>{{$review->msg}}</p>
                            </div>
                            <div class="col-11 col-lg-2 mx-auto py-4 py-lg-0">
                                <div class="d-flex flex-column justify-content-between"> <span class="e-dark">{{$review->review_date}}</span>
                                    <div class="d-flex">
                                        @for($i=1;$i<=$review->rating;$i++)
                                            <img class="mx-1" src="{{asset('svg/star-a.svg')}}" alt="">
                                        @endfor
                                        @for($i=1;$i<=5-$review->rating;$i++)
                                            <img class="mx-1" src="{{asset('svg/star-f.svg')}}" alt="">
                                        @endfor
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>

                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-white py-lg-5">
        <div class="py-5 text-center">
            <a class="btn white mx-auto" href="{{route('products')}}">Back to all products</a>
        </div>
    </div>
@endsection

@section('page_js')

@endsection