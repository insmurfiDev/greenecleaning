@props(['cleaningTypes', 'flatSizes', 'bathroomSizes', 'timeWindows', 'extras', 'locations'])

<div class="page-checkout__form">
    
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            <ul>
                <li>We could not process your payment.</li>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <h1 class="page-checkout__form-title">Book Now</h1>
    <h3 class="page-checkout__row-title">When should we come?</h3>
    <div class="row">
        <div class="col">
            <x-checkout.form-input name="come_date" required id="come_date" placeholder="Date" class="when_come" />
        </div>
        <div class="col">
            <x-controls.select key="timeWindows" :options="$timeWindows->map(function ($timeWindow) {
                return [
                    'name' => $timeWindow->window,
                    'value' => $timeWindow->id,
                ];
            })" />
        </div>
    </div>
    <h3 class="page-checkout__row-title">Where should we come?</h3>
    <div class="row" >
        <div class="col" >
            <x-controls.select 
                key="locations" 
                :selected="request()->get('location') ?? null"
                :options="$locations->map(function ($location) {
                    return [
                        'name' => $location['name'],
                        'value' => $location['id'],
                        'attributes' => [
                            'data-additional-price-percent = '.$location->additional_price_percent
                        ]
                    ];
                })" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-9">
            <x-checkout.form-input required id="address" name="address" placeholder="Street Address" />
        </div>
        <div class="col-3">
            <x-checkout.form-input id="apt_number" placeholder="Apt. Number" name="apt_number" />
        </div>
    </div>
    <h3 class="page-checkout__row-title">Contact info</h3>
    <div class="row">
        <div class="col">
            <x-checkout.form-input name="name" required id="name" placeholder="Name" />
        </div>
        <div class="col">
            <x-checkout.form-input name="email" required type="email" id="email" placeholder="Email" />
        </div>
        <div class="col">
            <x-checkout.form-input name="phone" required id="phone" placeholder="Phone" />
        </div>
    </div>
    <h3 class="page-checkout__row-title">Choose the type of cleaning</h3>
    <div class="row">
        <div class="col">
            <x-controls.select 
            key="cleaningType" 
            :options="$cleaningTypes->map(function ($cleaningType) {
                return [
                    'name' => $cleaningType['type'],
                    'value' => $cleaningType['id'],
                    'attributes' => [
                        'data-additional-price-percent = '.$cleaningType->additional_price_percent
                    ]
                ];
            })" />
        </div>
        <div class="col">
            <x-controls.select
            :selected="request()->get('flat')" 
            key="flatSize" 
            :options="$flatSizes->map(function ($flatSize) {
                return [
                    'name' => $flatSize['size'],
                    'value' => $flatSize['id'],
                    'attributes' => [
                        'data-price = '.$flatSize->price
                    ]
                ];
            })" />
        </div>
        <div class="col">
            <x-controls.select
            :selected="request()->get('bathroom')"  
            key="bathroomSizes" 
            :options="$bathroomSizes->map(function ($bathroomSize) {
                $name = $bathroomSize['size'];
                return [
                    'name' => $name,
                    'value' => $bathroomSize['id'],
                    'attributes' => [
                        'data-additional-price = '.$bathroomSize->additional_price
                    ]
                ];
            })" />
        </div>
    </div>
    <h3 class="page-checkout__row-title mt-3">Extras</h3>
    <div class="row page-checkout__form-extras">
        @foreach($extras as $extra)
        <x-checkout.extra price="{{$extra->price}}" :id="$extra->id" title="{{$extra->name}}">
            @slot('icon')
                @switch($loop->index)
                    @case(0) <x-icons.checkout.calendar />
                    @break
                    @case(1) <x-icons.checkout.calculator />
                    @break
                    @case(2) <x-icons.checkout.cabinetes />
                    @break
                @endswitch
            @endslot
        </x-checkout.extra>    
        @endforeach
    </div>
    <h3 class="page-checkout__row-title">Payment</h3>
    <div class="row">
        <x-checkout.radio value="pay_now" class="col-2" name="payment" label="Pay now" checked />
        <x-checkout.radio value="pay_later" class="col-5" name="payment" label="Pay later (Cash Only)" />
    </div>
    <div class="page-checkout__form-payment-types">
        <div data-select-card-pay class="page-checkout__form-payment-types__type page-checkout__form-payment-types__type-selected ">
            <x-icons.checkout.credit-card />
        </div>
        <div data-select-paypal-pay class="page-checkout__form-payment-types__type">
            <x-icons.checkout.paypal />
        </div>
    </div>
    <div data-pay-now >
        <div data-card-pay >
            <h3 class="page-checkout__row-title">Credit Card Information</h3>
            <x-checkout.credit-card/>
        </div>
        <div data-paypal-pay >
            <h3 class="page-checkout__row-title">PayPal Information</h3>
            <x-checkout.form-input id="paypal-email" name="paypal_email" />
        </div>
    </div>
        <label class="page-checkout__checkbox-wrapper">
            <input type="checkbox" hidden required />
            <div class="page-checkout__checkbox-square">
                <span>✓</span>
            </div>
            <p>
                By cheking this box I consent to receive automated marketing by text message from Shades of greeny
                through an automatic telephone dialingsystem at the number provided.Consent is not condition to
                purchase. View privacy policy
            </p>
        </label>
    <div class="page-checkout__form-bottom">
        <div class="page-checkout__form-bottom__total">
            <p>Total:</p>
            <p class="page-checkout__form-bottom__total-price" data-summary-total >$80.00</p>
        </div>
        <button type="submit" class="btn-default page-checkout__form-bottom-btn">Book now</button>
    </div>
</div>
