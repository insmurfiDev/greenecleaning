<div class="mx-4" id="divCart">

    @foreach($cart as $item)
        <div class="row no-gutters border-bottom py-3 cartItem">
            <div class="col-3"><a href="{{route('product',$item->options['id'])}}"></a>

                <img src="{{asset('storage/'.$item->options['image'])}}">
            </div>
            <div class="col-9 text-right">
                <div class="d-flex">
                    <h3 class="e-mini w-50 text-right my-0">
                        <a href="{{route('product',$item->options['id'])}}">{{$item->name}}</a>
                    </h3>
                    <a class="rem_prod w-50 text-right aCartRemove" data-uid="{{$item->getUniqueId()}}" href="#">
                        <img src="{{asset('svg/icons/trash.svg')}}">
                    </a>
                </div>
                <p class="mb-0 w-50 e-new">${{number_format($item->price,2)}}</p><br>
                <p class="mb-0 w-50 e-middle">size: {{$item->options['size']}}</p>
                <div class="d-flex align-items-center">
                    <p class="mb-0 w-50 e-middle">quantity:</p>
                    <div class="c-cart__info w-50 d-flex justify-content-end">
                        <a class="cart-block aCartPlus" data-price="{{$item->price}}" data-itemid="{{$item->options['id']}}" data-size="{{$item->options['size']}}" href="#"><img src="{{asset('svg/icons/plus.svg')}}"></a>
                        <span class="cart-block"><input class="w-100" type="text" value="{{$item->quantity}}"></span>
                        <a class="cart-block aCartMinus" data-uid="{{$item->getUniqueId()}}" data-price="{{$item->price}}" data-itemid="{{$item->options['id']}}" data-size="{{$item->options['size']}}" href="#"><img src="{{asset('svg/icons/minus.svg')}}"></a></div>
                </div>
            </div>
        </div>
    @endforeach
    @if(isset($cart_count) && $cart_count>0)
    <div class="m-3">
        <div class="row border-bottom">
            <div class="col-6">
                <p class="e-middle">Estimated Total: </p>
            </div>
            <div class="col-6 text-right">
                <p class="e-bold textETotal">${{number_format($cart_etotal,2)}}</p>

            </div>
        </div>
    </div><a class="btn wide" href="{{route('checkout')}}">Checkout</a>
    @endif
</div>