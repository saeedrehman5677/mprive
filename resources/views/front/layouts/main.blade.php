@php
    use Illuminate\Support\Facades\Route;
@endphp
@include('front.layouts.header')

<div id="wrapper">
    <div id="pagee" class="clearfix">

        @if(Route::currentRouteName() == 'home')
            @include('front.layouts.menu')
        @else
            @include('front.layouts.otherMenu')
        @endif
        @yield('body')

        @include('front.layouts.foot')

    </div>
</div>
<style>
    .w-float {
        position: fixed;
        bottom: 15px;
        left: 15px;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        font-size: 50px;
        z-index: 100;
    }
    .w-float1 {
        position: fixed;
        bottom: 90px;
        left: 20px;
        color: #fff;
        border-radius: 80px;
        text-align: center;
        font-size: 50px;
        z-index: 100;
    }
    @media (max-width: 576px) {
        .box-left .row .col-6,
        .box-left .row .col-md-4 {
            padding: 5px;
            text-align: center;
        }

        .box-left .row img {
            width: 100%;
            height: auto;
            display: inline-block;
        }

        .btn-view {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
    }

    @media (min-width: 577px) {
        .box-left .row img {
            width: 100%;
            height: auto;
            display: block;
        }
    }

</style>
<a style="color:white" target="_blank" rel="noopener" href="https://api.whatsapp.com/send?phone=971544223163" class="w-float">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" height="70" width="70">
</a>
<a style="color:white" target="_blank" rel="noopener" href="tel:+971544223163" class="w-float1">
    <img src="{{asset('img/phone1.png')}}" height="70" width="58">
</a>
@include('front.layouts.footer')
