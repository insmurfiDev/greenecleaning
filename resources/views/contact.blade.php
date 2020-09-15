@extends('layout.main')

@section('content')
    <div class="c-page py-lg-5">
        <div class="c-page__title">
            <h2 class="e-title e-white">Contact Us</h2>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-11 col-lg-5 mx-auto">
                <h4 class="e-subtitle">Corporate Office</h4>
                <p>{{\Illuminate\Support\Facades\Config::get('settings.address')}}</p>
                <div class="d-block my-4">
                    <!--
                    <iframe class="filter-grey" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1550189.0228022253!2d-74.93965240439967!3d40.63621230993994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sua!4v1594823254547!5m2!1sen!2sua" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    -->
                    <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{\Illuminate\Support\Facades\Config::get('settings.address')}}&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
            <div class="col-11 col-lg-6 mx-auto">
                <h4 class="e-subtitle">Contact form</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ipsum, dapibus et sociis sed orci porttitor velit accumsan. Ligula leo id sit tincidunt lorem adipiscing vitae. Eu euismod adipiscing. </p>
                <div class="c-form my-4">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <span>{!! \Session::get('success') !!}</span>
                        </div>
                    @endif
                    <form class="form" action="{{route('contact-send')}}" method="post">
                        @csrf
                        <input class="w-100" type="text" name="name" placeholder="Name" required>
                        <input class="w-100" type="text" name="email" placeholder="Email" required>
                        <textarea class="w-100 mb-0" name="msg" placeholder="Your Message" required></textarea>
                        <div class="d-flex align-items-center mb-3">
                            <input type="checkbox">
                            <span class="ml-2">I consent to the processing of my personal data</span>
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
@endsection