@extends('layout.main')

@section('content')
    @include('partials.contact-block')
    <div class="c-products page bg-green">
        <div class="container-fluid">
            <div class="c-products__header">
                <h3 class="e-mini e-brad py-3 py-lg-0">
                    <a class="e-link" href="{{route('products')}}">Products</a>
                    <span>&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="e-black">All</span>
                </h3>
                <div class="prod-nav mx-auto py-3 py-lg-0">
                    <a class="mr-3" href="{{route('products')}}">
                        <span class="e-bold @if(request()->route()->getName()=='products') e-black @endif ">All Products</span>
                    </a>
                    <a class="" href="{{route('sale')}}">
                        <span class="e-bold @if(request()->route()->getName()=='sale') e-black @endif mx-3">Sale</span>
                    </a>
                </div>
                <div class="c-sort d-flex align-items-center py-3 py-lg-0"><span class="e-black mr-lg-3 d-none d-lg-inline-block">Sort:</span>
                    <div class="mt-2">
                        <select class="e-select selectProductsSort" name="" id="selectProductsSort">
                            <option value="1" @if(!empty($sort) && $sort==1) selected @endif>Price Up</option>
                            <option value="2" @if(!empty($sort) && $sort==2) selected @endif>Price Low</option>
                            <option value="3" @if(!empty($sort) && $sort==3) selected @endif>A-Z</option>
                            <option value="4" @if(!empty($sort) && $sort==4) selected @endif>Z-A</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-products page bg-white">
        <div class="container-fluid py-5">
            <div class="mx-3">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-11 col-lg-4 mx-auto mx-lg-0 c-product__item">

                                @if(!empty($product->images))
                                <a class="card" href="{{route('product',$product->id)}}">
                                    <img src="{{asset('storage/'.array_values($product->images)[0])}}" alt="" style="max-height: 600px; object-fit: scale-down; ">
                                </a>
                                @endif

                            <div class="pr-footer">
                                <div class="pr-footer__info">
                                    <h3 class="e-mini"> <a href="{{route('product',$product->id)}}">{{$product->name}}</a></h3>
                                    <p class="pr-price"><span>${{number_format($product->price,2)}}</span></p>
                                </div>
                                <a class="btn small" href="{{route('product',$product->id)}}">ADD to CART</a>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
<script>
    $('#selectProductsSort').on('change',function (){
        location.replace('?sort='+$(this).val());
    })
</script>
@endsection