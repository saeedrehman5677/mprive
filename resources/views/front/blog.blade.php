@extends('front.layouts.main')
@push('meta')
    <title>Mprive - Real Estate Services | Latest News </title>
    <meta name="description" content="Mprive - Real Estate Services">
    <meta name="keywords" content="propety in dubai, dubai properties, buy property in emirate ">
    <meta property="og:title" content="Mprive - Real Estate Services| Frequently asked Questiond">
    <meta property="og:description" content="Mprive - Real Estate Services">
    <meta property="og:image" content="{{asset('images/logo/logo.jpg')}}">
@endpush
@section('body')
    <!-- Page Title -->
    <section class="flat-title-page">
        <div class="container">
            <h2 class="text-center">Latest News</h2>
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>/ Blog</li>
            </ul>

        </div>
    </section>
    <!-- End Page Title -->

    <!-- Section Blog Grid -->
    <section class="flat-section">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('blogs', $blog->slug) }}" class="flat-blog-item hover-img">
                        <div class="img-style">
                            <img src="{{ $blog?->featured_image?->url }}" alt="img-blog">
                            <span class="date-post">{{ $blog?->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="content-box">
                            <h6 class="title">
                                @limit($blog->title, 85)
                            </h6>
                            <p class="description">
                                @limit($blog->excerpt, 150)
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Section Blog Grid -->

@endsection
