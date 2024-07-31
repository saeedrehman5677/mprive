@extends('front.layouts.main')
@push('meta')
    <title>Mprive |
        @if(Route::currentRouteName()  == "projects")
            New Projectsm in {{ request()?->query('emirate') }}
        @endif
        @if(Route::currentRouteName()  == "buy")
            Buy Properties in  {{ request()?->query('emirate') }}
        @endif
        @if(Route::currentRouteName()  == "rent")
            Rent Properties in  {{ request()?->query('emirate') }}
        @endif
        | Property Lisitng in Emirate
    </title>
    <meta name="description" content="Properties in Emirate">
    <meta name="keywords" content="rent property  in emirate , buy property in emirate ">
    <meta property="og:title" content="Mprive |
        @if(Route::currentRouteName()  == "projects")
            New Projectsm in {{ request()?->query('emirate') }}
        @endif
        @if(Route::currentRouteName()  == "buy")
            Buy Properties in  {{ request()?->query('emirate') }}
        @endif
        @if(Route::currentRouteName()  == "rent")
            Rent Properties in  {{ request()?->query('emirate') }}
        @endif
        | Property Lisitng in Emirate">
    <meta property="og:description" content="Properties Lisiting in Emirates">
    <meta property="og:image" content="{{asset('images/logo/logo.jpg')}}">
@endpush


@php
    use Illuminate\Support\Str;
@endphp
@section('body')
    <section class="flat-section-v6 flat-recommended flat-sidebar">
        <div class="container">
            <div class="box-title-listing">
                @if(request()?->query('developer'))
                <img class="d-img img" src="{{ $developer->image?->url }}">
                @endif
                <h5>
                    @if(Route::currentRouteName()  == "projects")
                       New Projects
                    @endif
                    @if(Route::currentRouteName()  == "buy")
                            Buy Properties
                    @endif
                    @if(Route::currentRouteName()  == "rent")
                            Rent Properties
                    @endif
                    @if(request()?->query('emirate'))
                            Properties in {{ request()?->query('emirate') }}
                    @endif
                     @if(request()?->query('developer'))
                            Properties Of {{ request()?->query('developer') }}
                    @endif
                </h5>


                {{--  <div class="box-filter-tab">
                    <ul class="nav-tab-filter" role="tablist">
                        <li class="nav-tab-item" role="presentation">
                            <a href="#gridLayout" class="nav-link-item active" data-bs-toggle="tab"><i class="icon icon-grid"></i></a>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <a href="#listLayout" class="nav-link-item" data-bs-toggle="tab"><i class="icon icon-list"></i></a>
                        </li>
                    </ul>
                    <div class="nice-select list-page" tabindex="0"><span class="current">12 Per Page</span>
                        <ul class="list">
                            <li data-value="1" class="option">10 Per Page</li>
                            <li data-value="2" class="option">11 Per Page</li>
                            <li data-value="3" class="option selected">12 Per Page</li>
                        </ul>
                    </div>
                    <div class="nice-select list-sort" tabindex="0"><span class="current">Sort by (Default)</span>
                        <ul class="list">
                            <li data-value="default" class="option selected">Sort by (Default)</li>
                            <li data-value="new" class="option">Newest</li>
                            <li data-value="old" class="option">Oldest</li>
                        </ul>
                    </div>
                </div>  --}}
            </div>
            <div class="mt-3 mb-2 ms-2">
                @if(request()?->query('developer'))
                    <div class="pt-2 pb-2 d-desc">
                        {!! $developer->description !!}
                    </div>
                @endif
            </div>
            @livewire('property-search')
        </div>
    </section>
@endsection
