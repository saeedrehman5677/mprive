@extends('front.layouts.main')
@push('meta')
    <title>Mprive - Real Estate Services | About Us </title>
    <meta name="description" content="Mprive - Real Estate Services">
    <meta name="keywords" content="propety in dubai, dubai properties, buy property in emirate ">
    <meta property="og:title" content="Mprive - Real Estate Services| About Us ">
    <meta property="og:description" content="Mprive - Real Estate Services">
    <meta property="og:image" content="{{asset('images/logo/logo.jpg')}}">
@endpush
@section('body')

    <section class="flat-title-page style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>/ Developers</li>
            </ul>
            <h2 class="text-center"> Developers</h2>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Service -->
    <section class="flat-section flat-service-v3">
        <div class="container">
            <div class="row">
                @foreach($developers as $developer)
                <div class="box col-lg-3 col-md-3">
                    <div class="box-service style-1">
                        <div class="icon-box">
                            <img class="img" src="{{$developer?->image?->url}}" >
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
