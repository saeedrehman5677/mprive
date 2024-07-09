@extends('front.layouts.main')
@push('meta')
    <title>Mprive - Real Estate Services | Faqs</title>
    <meta name="description" content="Mprive - Real Estate Services">
    <meta name="keywords" content="propety in dubai, dubai properties, buy property in emirate ">
    <meta property="og:title" content="Mprive - Real Estate Services| Frequently asked Questions">
    <meta property="og:description" content="Mprive - Real Estate Services">
    <meta property="og:image" content="{{asset('images/logo/logo.jpg')}}">
@endpush

@section('body')

<section class="flat-title-page style-2">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>/ Frequently Asked Questions</li>
        </ul>
        <h2 class="text-center">FAQs</h2>
    </div>
</section>
<!-- End Page Title -->


<section class="flat-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($faqs as $category)
                <div class="tf-faq">
                    <h5>{{$category->name}}</h5>

                    <ul class="box-faq" id="wrapper-faq">

                        @foreach($category->categoryFaqs as $faq)
                            <li class="faq-item">
                                <a href="#{{$category->id}}{{$faq->id}}" class="faq-header collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="accordion-faq-one">
                                    {{$faq->title}}
                                </a>
                                <div id="{{$category->id}}{{$faq->id}}" class="collapse" data-bs-parent="#wrapper-faq">
                                    <p class="faq-body">
                                        {{$faq->description}}
                                    </p>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="widget-sidebar fixed-sidebar wrapper-sidebar-right">
                    <div class="widget-box single-property-contact bg-surface">
                        <div class="h7 title fw-7">Contact Us</div>
                        @livewire('contact-form', ['propertyId' => null])
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
