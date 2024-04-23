@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/new/services.css') }}">
@endsection

@section('content')
    <x-services.header />
    <div class="container">
        <x-services.text title="Just how will your home cleaner understand my concerns?
		">
            Shades of Green is a home cleaning company that supplies the best solution and also the best price. Whether you
            are
            looking for a regular, bi-weekly, monthly or one-time cleansing, our objective is not only satisfying your
            assumptions but surpassing them. Obtain an immediate estimate of the complete time and also price of your house
            cleaning service by placing your requirements. 100% customer satisfaction is not only our goal yet a warranty.
            Every
            one of our skilled professionals prepare to give the very best service, whether it's a basic cleaning, routine
            weekly cleansing, or even thorough move-out/move-in cleaning.
        </x-services.text>
        <x-services.text title="The amount of hrs should I select?
		">
            Hours are noted in labor-hours, indicating that a four-hour visit might either be one pro working for 4 hrs or
            more
            pros benefiting two hrs. The rate quote shown over is based upon the variety of overall cleaning hrs. Our
            suggested
            cleansing time is based on information we collected from our carriers making use of the variety of bedrooms and
            washrooms to approximate the overall size of the residence. We offer a recommendation based upon your inputs but
            you
            should choose the number of hrs you believe finest fits your needs.
        </x-services.text>
    </div>
    <x-services.products />
    <p class="page-services__footnote container ">
        If it's your first time booking a consultation with your home cleaner, make certain to assess the extent of job
        described on this page prior to your appointment so you recognize what's included in a typical cleansing. Plan to be
        readily available to assess your cleaning preferences and top priorities when your pro gets here. This will assist
        ensure your pro spends their time cleaning up the components of your house that issue most to you. Any type of
        unique demands should be reviewed before the service appointment begins, as some demands are not consisted of in a
        basic cleaning and also might lead to an upgraded solution cost.
    </p>
@endsection


@section('page_js')
@endsection
