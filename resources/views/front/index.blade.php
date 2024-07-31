@extends('front.layouts.main')
@push('meta')
    <title>Mprive - Real Estate Services | Home</title>
    <meta name="description" content="Mprive - Real Estate Services">
    <meta name="keywords" content="propety in dubai, dubai properties, buy property in emirate ">
    <meta property="og:title" content="Mprive Home">
    <meta property="og:description" content="Mprive - Real Estate Services">
    <meta property="og:image" content="{{asset('images/logo/logo.jpg')}}">
@endpush

@section('body')
    @include('front.components.slider')
    <!-- Categories -->
    <section class="flat-section flat-categories">
        <div class="container">
            <div class="box-title style-1 wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                <div class="box-left">
                    <div class="text-subtitle text-primary">Property Type</div>
                    <h4 class="mt-4">Try Searching For</h4>
                </div>
                <a href="{{url('properties')}}" class="btn-view"><span class="text">View All </span> <span
                        class="icon icon-arrow-right2"></span> </a>
            </div>
            <div class="wrap-categories  wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                <div class="swiper tf-sw-categories" data-preview-lg="7" data-preview-md="5" data-preview-sm="3"
                     data-space="30">
                    <div class="swiper-wrapper">
                        @foreach($types as $type)
                        <div class="swiper-slide">
                            <a href="{{url('properties')}}?type={{$type->name}}" class="homeya-categories">
                                <div class="icon-box">
                                   <img style="height: 64px; width: 64px" src="{{$type->icon->url}}">
                                </div>
                                <div class="content text-center">
                                    <h6>{{ $type->name }}</h6>
                                    <p class="mt-4 text-variant-1">{{ $type->property_type_sales_count }} Property</p>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>

                </div>
                <div class="box-navigation">
                    <div class="navigation style-1 swiper-nav-next nav-next-category"><span
                            class="icon icon-arr-l"></span></div>
                    <div class="navigation style-1 swiper-nav-prev nav-prev-category"><span
                            class="icon icon-arr-r"></span></div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Categories -->
    <!-- Recommended -->
    <section class="flat-section flat-recommended pt-0 wow fadeInUpSmall" data-wow-delay=".2s"
             data-wow-duration="1000ms">
        <div class="container">
            <div class="box-title style-2 text-center">
                <div class="text-subtitle text-primary">Featured Properties</div>
                <h4 class="mt-4">Discover Mprive's Finest Properties for Your Dream Home</h4>
            </div>
            <div class="row">
                @foreach($properties as $property)
                <div class="col-xl-4 col-md-6">
                    <div class="homeya-box md">
                        <div class="archive-top">
                            <a href="{{ url('properties' ,$property->slug)}}" class="images-group">
                                <div class="images-style">
                                   <img style="min-height: 300px" src="{{$property?->featured_image?->url}}">
                                </div>
                                <div class="top">
                                    <ul class="d-flex gap-8 flex-row">
                                        @if($property->featured)
                                        <li class="flag-tag success">Featured</li>
                                        @endif
                                        <li class="flag-tag style-1">{{$property->property_status}}</li>

                                    </ul>
                                </div>
                                <div class="bottom">
                                    @foreach($property?->property_types?->take(2) as $type)
                                    <span class="flag-tag style-2">{{$type->name}}</span>
                                    @endforeach
                                </div>
                            </a>

                            <div class="content">
                                <div class="text-1 text-capitalize">
                                    <a href="{{ url('properties' ,$property->slug)}}" class="link">
                                       {{$property->title}}</a></div>
                                <div class="desc"><i class="fs-16 icon icon-mapPin"></i>
                                    <p>{{$property->location}}</p></div>
                                <ul class="meta-list">
                                    <li class="item">
                                        <i class="icon icon-bed"></i>
                                        <span>{{$property->bed_rooms}}</span>
                                    </li>
                                    <li class="item">
                                        <i class="icon icon-bathtub"></i>
                                        <span>{{$property->bathrooms}}</span>
                                    </li>
                                    <li class="item">
                                        <i class="icon icon-ruler"></i>
                                        <span>{{$property->size}} SqFT</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="archive-bottom d-flex justify-content-between align-items-center">
                            <p>
                                @if($property?->getDeveloper?->image)
                                <img class="img" height="50" width="70"  src="{{$property?->getDeveloper?->image?->url }}">
                                @else
                                    {{ $property?->getDeveloper?->name}}
                                @endif
                            </p>
                            <div class="d-flex align-items-center">
                                <div class="h7 fw-7">
                                    Price :
                                    @if($property->discounted_price)
                                        <strike style="color: green; font-size: 14px; margin-right: 4px">
                                            {{ number_format( $property->price , 2) }}
                                        </strike>
                                        {{ number_format( $property->price ,2)}}
                                    @else
                                        {{ number_format( $property->price , 2 )}}
                                    @endif
                                    AED
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{url('properties')}}" class="tf-btn primary size-1">View All Properties</a>
            </div>
        </div>
    </section>
    <!-- End Recommended -->
    <!-- Service -->
    <section class="flat-section-v3 flat-service-v2 bg-surface">
        <div class="container">
            <div class="row wrap-service-v2">
                <div class="col-lg-6">
                    <div class="box-left wow fadeInLeftSmall" data-wow-delay=".1s" data-wow-duration="1000ms">
                        <div class="box-title">
                            <div class="text-subtitle text-primary">Why Choose Us</div>
                            <h4 class="mt-4">Rewards from Our Clients</h4>
                        </div>
                        <p>We are honored to have received recognition from esteemed developers such as Emaar, Nakheel, Meraas, Binghatti, and Sobha,
                            naming us as one of their top 10 agencies. This recognition underscores our commitment to delivering outstanding results and maintaining strong relationships with developers and clients alike.
                        </p>
                        <div class="row">
                            @foreach($developers as $developer)
                            <div class="col-6 col-md-4 pb-md-4">
                                <a href="{{ url('properties') }}?developer={{ $developer->name }}">
                                    <img class="img" src="{{ $developer->image ? $developer->image->url : '' }}" >
                                </a>
                            </div>
                        @endforeach

                        </div>
                        <a href="{{ url('contact') }}" class="btn-view"><span class="text">Contact Us</span> <span
                                class="icon icon-arrow-right2"></span> </a>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="box-right wow fadeInRightSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                        <div class="box-service style-1 hover-btn-view">
                            <div class="icon-box">
                                <span class="icon icon-buy-home"></span>
                            </div>
                            <div class="content">
                                <h6 class="title">Buy A New Property</h6>
                                <p class="description">Explore diverse properties and expert guidance for a seamless
                                    buying experience.</p>
                                <a href="{{url('buy/properties')}}" class="btn-view style-1"><span class="text">Buy Now</span> <span
                                        class="icon icon-arrow-right2"></span> </a>
                            </div>
                        </div>
                        <div class="box-service style-1 hover-btn-view">
                            <div class="icon-box">
                                <span class="icon icon-rent-home"></span>
                            </div>
                            <div class="content">
                                <h6 class="title">Rent a Property</h6>
                                <p class="description">Explore a diverse variety of listings tailored precisely to
                                    suit your unique lifestyle needs.</p>
                                <a href="{{url('rent/properties')}}" class="btn-view style-1"><span class="text">Rent Now</span> <span
                                        class="icon icon-arrow-right2"></span> </a>
                            </div>
                        </div>
                        <div class="box-service style-1 hover-btn-view">
                            <div class="icon-box">
                                <span class="icon icon-apartment"></span>
                            </div>
                            <div class="content">
                                <h6 class="title">See new Projects</h6>
                                <p class="description">Showcasing new projects that are under development
                                    sale.</p>
                                <a href="{{url('projects/properties')}}" class="btn-view style-1"><span class="text">Learn More</span> <span
                                        class="icon icon-arrow-right2"></span> </a>
                            </div>
                        </div>
                        <div class="box-service style-1 hover-btn-view">
                            <div class="icon-box">
                                <span class="icon icon-apartment"></span>
                            </div>
                            <div class="content">
                                <h6 class="title">List Your Properties</h6>
                                <p class="description">Showcasing new projects that are under development
                                    sale.</p>
                                <a href="{{url('contact')}}?for=listing" class="btn-view style-1"><span class="text">Learn More</span> <span
                                        class="icon icon-arrow-right2"></span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service -->
    <!-- Location -->
    <section class="flat-section flat-location-v2">
        <div class="container">
            <div class="box-title text-center wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
                <h4 class="mt-4">Explore Emirates</h4>
            </div>
            <div class="grid-location-second mb-md-4 wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
                <a href="{{url('properties')}}?emirate=Dubai" class="item-5 box-location-v2 hover-img">
                    <div class="box-img img-style">
                        <img src=" {{asset('images/location/dubai.webp')}}" alt="image-location">
                    </div>
                    <div class="content">
                        <h6 class="link">Dubai</h6>
                    </div>
                </a>
                <a href="{{url('properties')}}?emirate=Abu Dhabi" class="item-6 box-location-v2 hover-img">
                    <div class="box-img img-style">
                        <img src="{{asset('images/location/abudhabi.jpg')}}" alt="image-location">
                    </div>
                    <div class="content">
                        <h6 class="link">Abu Dhabi</h6>

                    </div>
                </a>
                <a href="{{url('properties' ) }}?emirate=Ras Al Khaimah" class="item-3 box-location-v2 hover-img">
                    <div class="box-img img-style">
                        <img src="{{asset('images/location/rasalkhama_600x376_1_801x451.jpg')}}" alt="image-location">
                    </div>
                    <div class="content">
                        <h6 class="link">Ras Al Khaimah</h6>

                    </div>
                </a>

            </div>
        </div>
    </section>
    <!-- End Location -->
    <!-- Property  -->
    <section class="flat-section flat-property-v2 bg-surface">
        <div class="container">
            <div class="box-title style-1 wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
                <div class="box-left">
                    <div class="text-subtitle text-primary">Top Properties</div>
                    <h4 class="mt-4">Best Property Value</h4>
                </div>
                <a href="{{url('properties')}}" class="tf-btn primary size-1">View All</a>
            </div>
            <div class="grid-2 gap-30 wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
                @foreach($properties?->where('top_properties', 1) as $property)
                <div class="homeya-box list-style-1">
                    <a href="{{ url('properties' ,$property->slug)}}" class="images-group">
                        <div class="images-style">
                            <img  style="max-height: 240px" src="{{$property?->featured_image->url}}" alt="img">
                        </div>
                        <div class="top">
                            <ul class="d-flex gap-4 flex-row">
                                @if($property->featured)
                                    <li class="flag-tag success">Featured</li>
                                @endif
                                <li class="flag-tag style-1">{{$property->property_status}}</li>

                            </ul>
                        </div>
                        <div class="bottom">
                            <span class="flag-tag style-2">
                                @foreach($property?->property_types?->take(2) as $type)
                                    <span class="flag-tag style-2">{{$type->name}}</span>
                                @endforeach
                            </span>
                        </div>
                    </a>
                    <div class="content">
                        <div class="archive-top">
                            <div class="h7 text-capitalize fw-7">
                                <a href="{{ url('properties' ,$property->slug)}}" class="link">{{$property->title}}</a>
                            </div>
                            <div class="desc"><i class="icon icon-mapPin"></i>
                                <p>{{$property->location}}</p></div>
                            <ul class="meta-list">
                                <li class="item">
                                    <i class="icon icon-bed"></i>
                                    <span>{{$property->bed_rooms}}</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-bathtub"></i>
                                    <span>{{$property->bathrooms}}</span>
                                </li>
                                <li class="item">
                                    <i class="icon icon-ruler"></i>
                                    <span>{{$property->size}} SqFT</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center">
                                <div class="h7 fw-7">
                                    Price :
                                    @if($property->discounted_price)
                                        <strike style="color: green; font-size: 14px; margin-right: 4px">
                                            {{ number_format(  $property->price , 2)}}</strike>
                                        {{ number_format( $property->price , 2)}}
                                    @else
                                        {{ number_format ($property->price , 2)}}
                                    @endif
                                    AED
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Property  -->
    <!-- Agents -->
    @if(count($agents) >0)
    <section class="flat-section flat-agents">
        <div class="container">
            <div class="box-title text-center wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
                <div class="text-subtitle text-primary">Our Teams</div>
                <h4 class="mt-4">Meet Mprive's Agents</h4>
            </div>
            <div class="row wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
                @foreach($agents as $agent)
                <div class="box col-lg-4 col-sm-6">
                    <div class="box-agent style-1 hover-img">
                        <div href="#" class="box-img img-style">
                            {{$agent->featured_image}}
                            <ul class="agent-social">
                                <li> <a href="{{$agent->facebook}}"><span class="icon icon-facebook"></span></a> </li>
                                <li><a href="{{$agent->linkedin}}"> <span class="icon icon-linkedin"></span> </a></li>
                                <li> <a href="{{$agent->twitter}}"><span class="icon icon-twitter"></span> </a></li>
                                <li> <a href="{{$agent->instagram}}"><span class="icon icon-instagram"></span> </a></li>
                            </ul>
                        </div>
                        <div  class="content">
                            <div class="info">
                                <h6 class="link">{{$agent->name}}</h6>
                                <p class="mt-4 text-variant-1">{{$agent->job_title}}</p>
                            </div>
                            <a href="tel:{{$agent->phone}}"> <span class="icon-phone"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- End Agents -->
    <!-- Latest New -->
    <section class="flat-section flat-latest-new wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="1000ms">
        <div class="container">
            <div class="box-title text-center">
                <div class="text-subtitle text-primary">Latest New</div>
                <h4 class="mt-4">Helpful Mprive Guides</h4>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="box col-lg-4 col-md-6">
                    <a href="{{ url('blogs', $blog->slug) }}" class="flat-blog-item hover-img">
                        <div class="img-style">
                            {{$blog->featured_image}}
                            <span class="date-post">{{$blog->updated_at->diffForHumans()}}</span>
                        </div>
                        <div class="content-box">

                            <h6 class="title">{{$blog->title}}</h6>
                            <p class="description">{{$blog->excerpt}}</p>
                        </div>

                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Latest New -->
@endsection
