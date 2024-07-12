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


<section class="flat-section flat-banner-about">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3>Who We Are: </h3>
            </div>
            <div class="col-md-7 hover-btn-view">
                <P class="body-2 text-variant-1">We are a prominent real estate brokerage agency based in Dubai, specializing in both the off-plan and secondary markets. With extensive experience and a deep understanding of the local real estate landscape, we pride ourselves on delivering exceptional service and results to our clients.</P>
                <a href="{{url('contact')}}" class="btn-view style-1"><span class="text">Learn More</span> <span class="icon icon-arrow-right2"></span> </a>

            </div>

        </div>
    </div>
</section>
<!-- Service -->
<section class="flat-section-v3 flat-service-v2 bg-surface">
    <div class="container">
        <div class="row wrap-service-v2">
            <div class="col-lg-6">
                <div class="box-left">
                    <div class="box-title">
                        <div class="text-subtitle text-primary">Why Choose Us</div>
                        <h4 class="mt-4">Experience in Dubai Market:</h4>
                    </div>
                    <p>
                        Our team possesses a wealth of knowledge and experience in navigating the dynamic Dubai real estate market. We have successfully handled transactions in both off-plan developments and the secondary market, catering to a diverse clientele.
                    </p>
                    <div class="list-view">

                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                    <img src="{{asset('images/slider/dubai2.jpg')}}" alt="img-property">
            </div>
        </div>
    </div>
</section>
<!-- End Service -->

<section class="flat-section-v3 flat-service-v2 bg-surface">
    <div class="container">
        <div class="row wrap-service-v2">
            <div class="col-lg-6">

                <img src="{{asset('images/slider/sucess.jpg')}}" alt="img-property">

            </div>
            <div class="col-lg-6">
                <div class="box-left">
                    <div class="box-title">
                        <div class="text-subtitle text-primary">Success</div>
                        <h4 class="mt-4">Our Success Story:</h4>
                    </div>
                    <p>
                        Over the years, we have built a solid reputation for excellence and integrity in the Dubai real estate market.
                        Our track record includes numerous successful transactions, satisfied clients, and accolades from leading developers.

                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Testimonial -->

<!-- End Testimonial -->
<!-- Contact -->
<section class="flat-section-v3 flat-slider-contact">
    <div class="container">
        <div class="row content-wrap">
            <div class="col-lg-12">
                <div class="content-left">
                    <div class="box-title">
                        <h4 class="mt-4 fw-6 text-white">Rewards from Our Clients:</h4>
                    </div>
                    <p class="body-2 text-white">
                        We are honored to have received recognition from esteemed developers such as Emaar, Nakheel, Meraas, Binghatti, and Sobha, naming us as one of their top 10 agencies. This recognition underscores our commitment to delivering outstanding results and maintaining strong relationships with developers and clients alike.

                    </p>
                </div>

            </div>

        </div>

    </div>
    <div class="overlay"></div>

</section>
<!-- End Contact -->
<!-- banner -->
<section class="flat-section flat-testimonial-v4">
    <div class="container">
        <div class="box-title text-center">
            <div class="text-subtitle text-primary">Your's Trust</div>
            <h4 class="mt-4">Our Commitment</h4>
        </div>
            <P class="body-2 justify-content-center text-center text-variant-1">

                When you partner with us,
                you can expect a highly professional and
                dedicated team devoted to your project's success.
                Our goal is to sell the entire project within 4 months,
                utilizing our expertise, network, and innovative marketing strategies
                <br><br><br>
            </P>

        <div class="wrap-partner swiper tf-sw-partner" data-preview-lg="5" data-preview-md="4" data-preview-sm="3" data-space="80">
            <div class="swiper-wrapper">
                @foreach($developers as $developer)
                <div class="swiper-slide">
                    <div  class="partner-item">
                         <img class="img" width="120" height="40" src="{{$developer?->image?->url}}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')

@endpush
