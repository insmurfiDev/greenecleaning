@extends('layout.main')

@section('content')
    @include('partials.contact-block')
    <div class="c-products page bg-green">
        <div class="container-fluid">
            <div class="c-products__header center " style="min-height: 600px;">
                <h2 class="center mx-auto center text-center">
                    Thank you for your purchase! <br>Your order number: {{$order->id}}
                </h2>
            </div>
        </div>
    </div>

@endsection

@section('page_js')

@endsection