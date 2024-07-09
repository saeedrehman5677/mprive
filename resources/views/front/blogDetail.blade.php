@extends('front.layouts.main')
@push('meta')
    <title>Mprive| {{ $blog->meta_title ?? $blog->title }}</title>
    <meta name="description" content="{{ $blog->meta_description ?? $blog->excerpt }}">
    <meta name="keywords" content="{{$blog->meta_content}} ">
    <meta property="og:title" content="{{ $blog->meta_title ?? $blog->title  }}">
    <meta property="og:description" content="{{ $blog->meta_description ?? $blog->excerpt  }}">
    <meta property="og:image" content="{{ $blog?->featured_image?->url }}">
@endpush

@section('body')
<section class="flat-banner-blog">
    <img src="{{$blog?->featured_image?->url}}" alt="banner-blog">
</section>

<!-- Section Blog Detail -->
<section class="flat-section-v2">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="flat-blog-detail">
                    <a href="#" class="blog-tag primary">{{$blog->updated_at->diffForHumans()}}</a>
                    <h3 class="text-capitalize">{{$blog->title}}</h3>
                    <div class="my-40">
                      @foreach($blog->detail_images as $image)
                          {{$image}}
                      @endforeach
                    </div>
                    {!! $blog->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Section Blog Detail -->

<!-- Section Latest Post -->
<section class="flat-section flat-latest-post">
    <div class="container">
        <div class="box-title-relatest text-center">
            <div class="text-subheading text-primary">Relatest Post</div>
            <h5 class="mt-4">News insight</h5>
        </div>
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
<!-- End Latest Post -->
@endsection
