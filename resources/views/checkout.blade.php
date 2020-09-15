@extends('layout.checkout')

@section('content')
    <div class="c-checkout mt-5">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-11 col-lg-7 mx-auto pb-lg-5 order-2 order-lg-1">
                    <div class="bg-white pt-5">
                        <div class="ml-lg-5 pl-lg-2">
                            <div class="mx-4">
                                <div class="d-none d-lg-block ml-lg-5 mb-4"><a href="{{route('home')}}"><img class="logo-cart" src="{{asset('svg/logos/logo.svg')}}"></a></div>
                                <nav class="pt-2">
                                    <div class="mx-lg-5">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist"><a class="nav-item nav-link active" id="nav-card-tab" data-toggle="tab" href="#nav-card" role="tab" aria-controls="nav-card" aria-selected="true"><img src="svg/icons/card-w.svg"><img class="d-none" src="svg/icons/card.svg"></a><a class="nav-item nav-link" id="nav-pp-tab" data-toggle="tab" href="#nav-pp" role="tab" aria-controls="nav-pp" aria-selected="false"><img src="svg/icons/pp.svg"><img class="d-none" src="svg/icons/pp-w.svg"></a></div>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active px-lg-5" id="nav-card" role="tabpanel" aria-labelledby="nav-card-tab">
                                        <div class="c-form mt-3">
                                            <form class="form" action="" method="post">
                                                <p class="e-bold mt-4">Credit card information</p><input class="w-100" type="text" placeholder="Name on the card"><input class="w-100" type="text" placeholder="Credit card number">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade px-lg-5" id="nav-pp" role="tabpanel" aria-labelledby="nav-pp-tab">
                                        <div class="c-form mt-3">
                                            <form class="form" action="" method="post">
                                                <p class="e-bold mt-4">PayPal information</p><input class="w-100" type="text" placeholder="Enter your email address">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-form mx-lg-5 mb-5">
                                    <hr class="green my-4">
                                    <form class="form" action="{{route('make-order')}}" method="post" id="formOrder">
                                        @csrf
                                        <p class="e-bold">Contact Information</p>
                                        <div class="row">
                                            <div class="col-12 col-lg-6"><input class="w-100" type="text" name="email" placeholder="Email" required></div>
                                            <div class="col-12 col-lg-6"><input class="w-100" type="text" name="phone" placeholder="Phone" required></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <input type="checkbox" checked name="keepme">
                                            <span class="ml-2">Keep me up to date on news and exclusive offers</span></div>
                                        <p class="e-bold mt-4">Shipping address</p>
                                        <div class="row">
                                            <div class="col-12 col-lg-6"><input class="w-100" type="text" name="fname" placeholder="First Name" required></div>
                                            <div class="col-12 col-lg-6"><input class="w-100" type="text" name="lname" placeholder="Last Name" required></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-8"><input id="address-input" name="address" class="w-100" type="text" placeholder="Address" required></div>
                                            <div class="col-12 col-lg-4"><input class="w-100" type="text" name="apt" placeholder="Apartment, suite"></div>
                                        </div>
                                        <div class=" simple">
                                            <select class="e-select w-100" name="shipping" id="selectShipping">
                                                @foreach($shippings as $shipping)
                                                    <option value="">{{$shipping->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <a class="e-decor e-brand my-2" data-toggle="collapse" href="#code" role="button" aria-expanded="false" aria-controls="code">Promotional code</a>
                                        <div class="collapse my-2" id="code">
                                            <div class="row">
                                                <div class="col-12 col-lg-7"><input class="w-100" type="text" placeholder="enter code"></div>
                                                <div class="col-12 col-lg-5"><a class="btn w-100" href="">Apply</a></div>
                                            </div>
                                        </div>
                                        <div class="d-flex my-3"><input class="mt-1 checks" type="checkbox" checked><small class="ml-3">*By cheking this box I consent to receive automated marketing by text message from Shades of greeny through an automatic telephone dialingsystem at the number provided.Consent is not condition to purchase. View privacy policy</small></div>
                                        <input type="hidden" name="tax" value="0" id="inputTax">
                                        <input type="hidden" name="stotal" value="{{$cart_etotal}}" id="inputSTotal">
                                        <input type="hidden" name="shipping" value="0" id="inputShipping">
                                        <input type="hidden" name="total" value="0" id="inputTotal">
                                    </form>
                                </div>
                                <div class="d-block d-lg-flex justify-content-between mx-lg-5">
                                    <div class="d-block my-3 py-3 border-top w-70 mr-3">
                                        <div class="d-flex justify-content-between">
                                            <span class="e-dark w-75 text-right">Subtotal</span>
                                            <span class="e-bold e-black w-10 text-right">$</span>
                                            <span class="e-bold e-black w-15 text-right textETotal2">{{number_format($cart_etotal,2)}}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="e-dark w-75 text-right">Shipping</span>
                                            <span class="e-bold e-black w-10 text-right">$</span>
                                            <span class="e-bold e-black w-15 text-right textShipping">0.00 </span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="e-dark w-75 text-right">Tax</span>
                                            <span class="e-bold e-black w-10 text-right">$</span>
                                            <span class="e-bold e-black w-15 text-right textTax">0.00</span>
                                        </div>
                                        <div class="d-flex justify-content-between border-top">
                                            <h4 class="w-75 text-right">Total</h4>
                                            <h4 class="w-10 text-right">$</h4>
                                            <h4 class="w-15 text-right textTotal">{{number_format($cart_etotal,2)}}</h4>
                                        </div>
                                    </div>
                                    <div class="w-30 ml-lg-3 mt-lg-5 pt-lg-5">
                                        <div class="pt-1 my-1"></div>
                                        <button class="btn small" type="submit" id="btnOrder">Pay Now</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-11 col-lg-5 mx-auto py-lg-3 order-1 order-lg-2" id="mobileCheckout">
                    <div class="d-block d-lg-none text-center mb-4"><a class="mx-auto" href="{{route('home')}}">
                            <img class="logo-cart" src="{{asset('svg/logos/logo.svg')}}"></a></div>
                    <h3 class="e-sub e-bold border p-3 rounded d-flex justify-content-between d-lg-none" data-toggle="collapse" href="#mCartShow">
                        <span>Shopping bag ({{$cart_count}})</span><span class="e-new" data-feather="chevron-down"></span></h3>
                    <div class="collapse show mt-4" id="mCartShow">
                        <div class="c-cart page">
                            <div class="mr-lg-5 pr-lg-5">
                                <div class="mx-4">
                                    @foreach($cart as $item)
                                        <div class="row no-gutters border-bottom py-3 cartItem">
                                            <div class="col-3">
                                                <a href="{{route('product',$item->options['id'])}}"></a>
                                                <img src="{{asset('storage/'.$item->options['image'])}}">
                                            </div>
                                            <div class="col-9 text-right">
                                                <div class="d-flex">
                                                    <h3 class="e-mini w-50 text-right my-0">
                                                        <a href="{{route('product',$item->options['id'])}}">Name bottle 1</a>
                                                    </h3>
                                                    <a class="rem_prod w-50 text-right aCartRemove" data-uid="{{$item->getUniqueId()}}" href=""><img src="{{asset('svg/icons/trash.svg')}}"></a>
                                                </div>
                                                <p class="mb-0 w-50 e-new">${{number_format($item->price,2)}}</p><br>
                                                <p class="mb-0 w-50 e-middle">size: {{$item->options['size']}}</p>
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 w-50 e-middle">quantity:</p>
                                                    <div class="c-cart__info w-50 d-flex justify-content-end">
                                                        <a class="cart-block aCartPlus" data-price="{{$item->price}}" data-itemid="{{$item->options['id']}}" data-size="{{$item->options['size']}}" href="#">
                                                            <img src="{{asset('svg/icons/plus.svg')}}">
                                                        </a>
                                                        <span class="cart-block"><input class="w-100 inputQty" type="text" value="{{$item->quantity}}"></span>
                                                        <a class="cart-block aCartMinus" data-uid="{{$item->getUniqueId()}}" data-price="{{$item->price}}" data-itemid="{{$item->options['id']}}" data-size="{{$item->options['size']}}" href="#"><img src="{{asset('svg/icons/minus.svg')}}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                    <div class="m-3">
                                        <div class="row border-bottom">
                                            <div class="col-6">
                                                <p class="e-middle">Estimated Total: </p>
                                            </div>
                                            <div class="col-6 text-right">
                                                <p class="e-bold textETotal">${{number_format($cart_etotal,2)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')

    <script>

    </script>

@endsection