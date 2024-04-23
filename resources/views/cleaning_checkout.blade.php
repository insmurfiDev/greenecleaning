@extends('layout.main')

@section('page_js')
    <script src="{{ asset('/js/modernizr.js') }}"></script>

    <script src="{{ asset('/js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/js/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/js/controls/select.js') }}"></script>
    <script src="{{ asset('/js/cleaning.js') }}"></script>

    <script src="{{ asset('/js/cc.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/paymentinfo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/new/checkout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/new/select.css') }}" />

    <script src="
        https://cdn.jsdelivr.net/npm/air-datepicker@3.5.0/air-datepicker.min.js
        "></script>
    <link href="
https://cdn.jsdelivr.net/npm/air-datepicker@3.5.0/air-datepicker.min.css
" rel="stylesheet">
@endsection
@section('content')
    <form class="page-checkout" method="post" action="{{route('booking')}}" >
        @csrf
        <input hidden id="paymentType" name="paymentType" />
        <input hidden id="cleaningPrice" value="{{$cleaningPrice}}" />
        <input hidden id="cleaningTax" value="{{$cleaningTax}}" />
        <input hidden id="formData" name="formData" />
        <input hidden name="location_id" />
        <input hidden name="flat_size_id" />
        <input hidden name="bathroom_size_id" />
        <input hidden name="time_window_id" />
        <input hidden name="cleaning_type_id" />
        <input hidden name="extras" />
        <x-checkout.form :cleaningTypes="$cleaningTypes" :flatSizes="$flatSizes" :bathroomSizes="$bathroomSizes" :timeWindows="$timeWindows" :extras="$extras" :locations="$locations" />
        <x-checkout.summary />
    </form>
@endsection
