@extends('front.layouts.main')
@php
    use Illuminate\Support\Str;
@endphp
@push('meta')
    <title>Mprive| {{ $property->meta_title ??  $property->title}}</title>
    <meta name="description" content="{{ $property->meta_description ?? $property->sub_title }}">
    <meta name="keywords" content="{{$property->meta_content}} ">
    <meta property="og:title" content="{{ $property->meta_title ??  $property->title }}">
    <meta property="og:description" content="{{ $property->meta_description  ?? $property->sub_title  }}">
    <meta property="og:image" content="{{ $property?->featured_image?->url  ?? asset('images/logo/logo.jpg') }}">
@endpush

@section('body')
    <style>
        .info-box{
            width: 80%;
            background: white !important;
        }
    </style>
    <section class=" flat-gallery-single">
        <div class="item1 box-img">
            {{$property->featured_image}}

            <div class="box-btn">
                <a href="https://youtu.be/MLpWrANjFbI" data-fancybox="gallery2" class="box-icon">
                    <span class="icon icon-play2"></span>
                </a>
                <a href="{{$property->featured_image->url}}"  data-fancybox="gallery" class="tf-btn primary">View All Photos</a>
            </div>

        </div>
        @foreach($property->galleryImages->take(4) as $key => $image)
            @php($mkey =  $key+2 )
            <a href="{{$image->url}}" class="item{{$mkey}} box-img" data-fancybox="gallery">
                {{$image}}
            </a>
        @endforeach


    </section>

    <section class="flat-section-v6 flat-property-detail-v3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-property-detail">
                        <div class="content-top d-flex justify-content-between align-items-center">
                            <div class="box-name">
                                <div href="" class="flag-tag primary">{{ $property->property_status  }}</div>
                                <h5 class="title link">{{$property->title}}</h5>
                                <p>
                                    <b> Developer </b> :   @if($property?->getDeveloper?->image)
                                        <img class="img" height="50" width="70"  src="{{$property?->getDeveloper?->image?->url }}">
                                    @else
                                        {{ $property?->getDeveloper?->name}}
                                    @endif
                                </p>
                            </div>
                            <div class="box-price d-flex align-items-center">
                                <h4>@if($property->discounted_price)
                                        <strike style="color: green; font-size: 14px; margin-right: 4px">
                                            {{$property->price }}</strike>
                                        {{ number_format( $property->price , 2)}}
                                    @else
                                        {{ number_format( $property->price , 2)}}
                                    @endif
                                </h4>
                                @if($property->property_status == "For rent")
                                <span class="body-1 text-variant-1">/month</span>
                                @endif
                            </div>
                        </div>
                        <div class="content-bottom">
                            <div class="info-box">
                                <div class="label">FEATUREs:</div>
                                <ul class="meta">
                                    <li class="meta-item"><span class="icon icon-bed"></span> {{$property->bed_rooms}} Bedroom</li>
                                    <li class=nnnnnnnnnnn"meta-item"><span class="icon icon-bathtub"></span> {{$property->bathrooms}} Bathroom</li>
                                    <li class="meta-item"><span class="icon icon-ruler"></span> {{$property->size}} SqFT</li>
                                </ul>
                            </div>
                            <ul class="icon-box">
                                <li><a href="#" class="item"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-module_link__icon--prefix__SYT-o"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 16.6364C20 16.8409 19.9621 17.108 19.8864 17.4375C19.8106 17.767 19.7311 18.0265 19.6477 18.2159C19.4886 18.5947 19.0265 18.9962 18.2614 19.4205C17.5492 19.8068 16.8447 20 16.1477 20C15.9432 20 15.7443 19.9867 15.5511 19.9602C15.358 19.9337 15.1402 19.8864 14.8977 19.8182C14.6553 19.75 14.4754 19.6951 14.358 19.6534C14.2405 19.6117 14.0303 19.5341 13.7273 19.4205C13.4242 19.3068 13.2386 19.2386 13.1705 19.2159C12.428 18.9508 11.7652 18.6364 11.1818 18.2727C10.2121 17.6742 9.21023 16.858 8.17614 15.8239C7.14205 14.7898 6.32576 13.7879 5.72727 12.8182C5.36364 12.2348 5.04924 11.572 4.78409 10.8295C4.76136 10.7614 4.69318 10.5758 4.57955 10.2727C4.46591 9.9697 4.38826 9.75947 4.34659 9.64205C4.30492 9.52462 4.25 9.3447 4.18182 9.10227C4.11364 8.85985 4.06629 8.64205 4.03977 8.44886C4.01326 8.25568 4 8.05682 4 7.85227C4 7.1553 4.19318 6.45076 4.57955 5.73864C5.00379 4.97348 5.4053 4.51136 5.78409 4.35227C5.97348 4.26894 6.23295 4.18939 6.5625 4.11364C6.89205 4.03788 7.15909 4 7.36364 4C7.4697 4 7.54924 4.01136 7.60227 4.03409C7.73864 4.07955 7.93939 4.36742 8.20455 4.89773C8.28788 5.04167 8.40152 5.24621 8.54545 5.51136C8.68939 5.77652 8.82197 6.01705 8.94318 6.23295C9.06439 6.44886 9.18182 6.65152 9.29545 6.84091C9.31818 6.87121 9.38447 6.96591 9.49432 7.125C9.60417 7.28409 9.68561 7.41856 9.73864 7.52841C9.79167 7.63826 9.81818 7.74621 9.81818 7.85227C9.81818 8.00379 9.71023 8.19318 9.49432 8.42045C9.27841 8.64773 9.04356 8.85606 8.78977 9.04545C8.53598 9.23485 8.30114 9.43561 8.08523 9.64773C7.86932 9.85985 7.76136 10.0341 7.76136 10.1705C7.76136 10.2386 7.7803 10.3239 7.81818 10.4261C7.85606 10.5284 7.88826 10.6061 7.91477 10.6591C7.94129 10.7121 7.99432 10.803 8.07386 10.9318C8.15341 11.0606 8.19697 11.1326 8.20455 11.1477C8.7803 12.1856 9.43939 13.0758 10.1818 13.8182C10.9242 14.5606 11.8144 15.2197 12.8523 15.7955C12.8674 15.803 12.9394 15.8466 13.0682 15.9261C13.197 16.0057 13.2879 16.0587 13.3409 16.0852C13.3939 16.1117 13.4716 16.1439 13.5739 16.1818C13.6761 16.2197 13.7614 16.2386 13.8295 16.2386C13.9659 16.2386 14.1402 16.1307 14.3523 15.9148C14.5644 15.6989 14.7652 15.464 14.9545 15.2102C15.1439 14.9564 15.3523 14.7216 15.5795 14.5057C15.8068 14.2898 15.9962 14.1818 16.1477 14.1818C16.2538 14.1818 16.3617 14.2083 16.4716 14.2614C16.5814 14.3144 16.7159 14.3958 16.875 14.5057C17.0341 14.6155 17.1288 14.6818 17.1591 14.7045C17.3485 14.8182 17.5511 14.9356 17.767 15.0568C17.983 15.178 18.2235 15.3106 18.4886 15.4545C18.7538 15.5985 18.9583 15.7121 19.1023 15.7955C19.6326 16.0606 19.9205 16.2614 19.9659 16.3977C19.9886 16.4508 20 16.5303 20 16.6364Z" fill="currentColor"></path></svg> Call  </a></li>
                                <li><a href="#" class="item"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="button-module_button__icon--prefix__dBABA"><path d="M4 6.61538C4 5.72323 4.71634 5 5.6 5H18.4C19.2837 5 20 5.72323 20 6.61538V7.91586L12 12.4591L4 7.91584V6.61538Z" fill="currentColor"></path><path d="M4 9.15144V17.3846C4 18.2768 4.71634 19 5.6 19H18.4C19.2837 19 20 18.2768 20 17.3846V9.15146L12 13.6947L4 9.15144Z" fill="currentColor"></path></svg> Email</a> </li>
                                <li><a href="#" class="item" style="background-color: green"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="link-module_link__icon--prefix__SYT-o"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 4C7.58174 4 4.00001 7.58172 4.00001 12C4.00001 13.681 4.51902 15.2421 5.40536 16.5301L4.05632 19.2282C3.95366 19.4335 3.9939 19.6815 4.15622 19.8438C4.31855 20.0061 4.56653 20.0464 4.77186 19.9437L7.46994 18.5947C8.75794 19.481 10.319 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM14.6448 12.7707C14.8262 12.844 15.7926 13.3633 15.9894 13.4706C16.0267 13.4909 16.0616 13.5093 16.094 13.5264C16.2329 13.5996 16.3264 13.649 16.3646 13.7178C16.4115 13.8029 16.3967 14.2022 16.2122 14.6616C16.0275 15.1208 15.1924 15.5402 14.8239 15.5594C14.7608 15.5628 14.7083 15.5734 14.6543 15.5843C14.3935 15.637 14.1014 15.6959 12.4382 14.9711C10.5836 14.1624 9.41165 12.2836 9.16962 11.8955C9.14979 11.8637 9.1362 11.842 9.12899 11.8316L9.12791 11.83C9.0288 11.6878 8.35185 10.716 8.38865 9.73847C8.42323 8.81941 8.8949 8.35476 9.11183 8.14105C9.12664 8.12646 9.14027 8.11304 9.15248 8.10072C9.34344 7.90811 9.56255 7.86616 9.69613 7.87125C9.76463 7.87376 9.83294 7.88073 9.89898 7.88747C9.96182 7.89388 10.0226 7.90008 10.0796 7.90204C10.0936 7.90259 10.1084 7.9022 10.1238 7.9018C10.2369 7.89884 10.3841 7.89499 10.5178 8.25183C10.5674 8.3844 10.6397 8.58016 10.7162 8.78717C10.8736 9.21337 11.0486 9.68724 11.0798 9.75543C11.1263 9.85709 11.1552 9.97482 11.0835 10.1055C11.0732 10.1243 11.0636 10.1421 11.0544 10.1591C10.9998 10.2603 10.9599 10.3342 10.8707 10.4306C10.8351 10.4689 10.7983 10.5102 10.7615 10.5515C10.69 10.6319 10.6186 10.7121 10.5569 10.769C10.4528 10.8645 10.3439 10.9685 10.4536 11.1726C10.5631 11.3765 10.9406 12.0446 11.5162 12.5955C12.1356 13.1883 12.6836 13.4494 12.9607 13.5814C13.0145 13.6071 13.0581 13.6279 13.0901 13.6453C13.287 13.7528 13.4044 13.7409 13.5265 13.612C13.648 13.4832 14.049 13.0481 14.1901 12.8539C14.3314 12.6592 14.4636 12.6974 14.6448 12.7707Z" fill="currentColor"></path></svg> Whatsapp</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="single-property-element single-property-desc">
                        <div class="h7 title fw-7">Description</div>
                            {!! $property->description !!}
                    </div>
                    <div class="single-property-element single-property-overview">
                        <div class="h7 title fw-7">Overview</div>
                        <ul class="info-box">
                            <li class="item">
                                <a href="#" class="box-icon w-52"><i class="icon icon-house-line"></i></a>
                                <div class="content">
                                    <span class="label">Proprty ID/ Ref:</span>
                                    <span>{{$property->property}}</span>
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-52"><i class="icon icon-arrLeftRight"></i></a>
                                <div class="content">
                                    <span class="label">Type:</span>
                                    @foreach($property?->property_types?->take(1) as $type)
                                        <span >{{$type->name}}</span>
                                    @endforeach
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-52"><i class="icon icon-bed"></i></a>
                                <div class="content">
                                    <span class="label">Bedrooms:</span>
                                    <span>{{$property->bed_rooms}} Rooms</span>
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-52"><i class="icon icon-bathtub"></i></a>
                                <div class="content">
                                    <span class="label">Bathrooms:</span>
                                    <span>{{$property->bathrooms}} Rooms</span>
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-52"><i class="icon icon-ruler"></i></a>
                                <div class="content">
                                    <span class="label">Size:</span>
                                    <span>{{ $property->size }} SqFt</span>
                                </div>
                            </li>
                            <li class="item">
                                <a href="#" class="box-icon w-52"><i class="icon icon-hammer"></i></a>
                                <div class="content">
                                    <span class="label">Year Built:</span>
                                    <span>{{ $property->year_built }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="single-property-element single-property-feature">
                        <div class="h7 title fw-7">Amenities and features</div>
                        <div class="wrap-feature">
                            <div class="box-feature">
                                <ul>
                                    @foreach($property->amenities as $amenity)
                                    <li class="feature-item">
                                        <img height="20"  width="20" src="{{$amenity->icon->url}}" class="img">
                                        {{$amenity->name}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-property-element single-property-map">
                        <ul class="info-map">
                            <li>
                                <div class="fw-7">Address</div>
                                <span class="mt-4 text-variant-1">{{$property->location}}</span>
                            </li>
                            <li>
                                <div class="fw-7">Emirate</div>
                                <span class="mt-4 text-variant-1">{{ $property->emirates }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="single-property-element single-property-attachments">
                        <div class="h7 title fw-7">File Attachments</div>
                        <div class="row">
                            @foreach($property->files as $file)

                            <div class="col-sm-6">
                                <a href="{{ $file->url }}" target="_blank" class="attachments-item">
                                    <div class="box-icon w-60">
                                        <img src="{{asset('images/home/file-1.png') }}" alt="file">
                                    </div>
                                    <span>{{ Str::limit($file->name, 50) }}.{{$file->extension}}</span>
                                    <i class="icon icon-download"></i>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single-property-element single-property-nearby">
                        <div class="h7 title fw-7">What’s nearby?</div>
                        {!! $property->nearby !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-sidebar fixed-sidebar wrapper-sidebar-right">
                        <div class="widget-box single-property-contact bg-surface">
                            <div class="h7 title fw-7">Book Free Viewing</div>
                            @livewire('contact-form', ['propertyId' => $property->id])
                        </div>
                        <div class="widget-box single-property-whychoose bg-surface">
                            <div class="h7 title fw-7">Why Choose Us?</div>
                            <ul class="box-whychoose">
                                <li class="item-why">
                                    <i class="icon icon-secure"></i>
                                    Secure Booking
                                </li>
                                <li class="item-why">
                                    <i class="icon icon-guarantee"></i>
                                    Best Price Guarantee
                                </li>
                                <li class="item-why">
                                    <i class="icon icon-booking"></i>
                                    Easy Booking Process
                                </li>
                                <li class="item-why">
                                    <i class="icon icon-support"></i>
                                    Available Support 24/7
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <section class="flat-section pt-0 flat-latest-property">
        <div class="container">
            <div class="box-title">
                <div class="text-subtitle text-primary">Featured properties</div>
                <h4 class="mt-4">The Most Recent Estate</h4>
            </div>
            <div class="swiper tf-latest-property" data-preview-lg="4" data-preview-md="3" data-preview-sm="2" data-space="30" data-loop="true">
                <div class="swiper-wrapper">
                    @foreach($featured as $property)
                    <div class="swiper-slide">
                        <div class="homeya-box style-2">
                            <div class="archive-top">
                                <a href="{{url('properties' , $property->slug)}}" class="images-group">
                                    <div class="images-style">
                                        <img  style=" max-height: 240px" src="{{ $property?->featured_image?->url }}">
                                    </div>
                                    <div class="top">
                                        <ul class="d-flex gap-8">
                                            <li class="flag-tag success">Featured</li>
                                            @if($property->discounted_price)
                                            <li class="flag-tag style-1">For Sale</li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="bottom">
                                        @foreach($property?->property_types?->take(2) as $type)
                                            <span class="flag-tag style-2">{{$type->name}}</span>
                                        @endforeach
                                    </div>
                                </a>
                                <div class="content">
                                    <div class="h7 text-capitalize fw-7"><a href="#" class="link"> {{$property->title}}</a></div>
                                    <div class="desc"><i class="fs-16 icon icon-mapPin"></i><p>{{$property->location}}</p> </div>
                                    <ul class="meta-list">
                                        <li class="item">
                                            <i class="icon icon-bed"></i>
                                            <span>{{ $property->bed_rooms }}</span>
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
                                <div class="d-flex align-items-center">
                                    Price : &nbsp;
                                    @if($property->discounted_price)
                                        <strike style="color: green; font-size: 14px; margin-right: 4px">
                                            {{ number_format( $property->price , 2) }}</strike>
                                        {{ number_format( $property->price ,2)}}
                                    @else
                                        {{ number_format( $property->price ,2)}}
                                    @endif
                                    AED
                                    @if($property->property_status == "For rent")
                                    <span class="text-variant-1">/month</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
