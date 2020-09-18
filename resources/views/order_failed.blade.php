@extends('layout.main')

@section('content')
    @include('partials.contact-block')
    <div class="c-products page bg-green">
        <div class="container-fluid">
            <div class="c-products__header center " style="min-height: 600px;">
                <h2 class="center mx-auto center text-center">
                    We could not process your payment via Paypal<br>
                    Please, get back to shopping cart and try again. Thank you!
                </h2>
            </div>
        </div>
    </div>

@endsection

@section('page_js')

@endsection