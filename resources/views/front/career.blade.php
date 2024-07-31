@extends('front.layouts.main')
@push('meta')
    <title>Mprive - Real Estate Services | Careers</title>
    <meta name="description" content="Mprive - Real Estate Services Careers">
    <meta name="keywords" content="jobs, career, employment opportunities, real estate jobs">
    <meta property="og:title" content="Mprive - Real Estate Services | Careers">
    <meta property="og:description" content="Mprive - Real Estate Services Careers">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">
@endpush

@section('body')

<section class="flat-title-page style-2">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>/ Careers</li>
        </ul>
        <h2 class="text-center">Careers</h2>
    </div>
</section>
<!-- End Page Title -->

<section class="flat-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($jobs as $jobOpening)
                <div class="tf-job-opening">
                    <h5>
                        <i class="fa-fw fab fa-teamspeak c-sidebar-nav-icon"></i> {{ $jobOpening->title }}
                    </h5>
                    <ul class="box-job-opening" id="wrapper-job-opening">
                        <li class="job-opening-item">
                            <p class="job-opening-body">
                               <strong>Description:</strong> {{ $jobOpening->description }}
                                <br>
                                <strong>Location:</strong> {{ $jobOpening->location }}
                                <br>
                                <strong>Type:</strong> {{ $jobOpening->type }}
                            </p>
                            <button type="button" class="tf-btn primary" data-bs-toggle="modal" data-bs-target="#applyModal-{{ $jobOpening->id }}">
                                Apply Now
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="applyModal-{{ $jobOpening->id }}" tabindex="-1" aria-labelledby="applyModalLabel-{{ $jobOpening->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="applyModalLabel-{{ $jobOpening->id }}">Apply for {{ $jobOpening->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @livewire('job-application-form', ['job_opening_id' => $jobOpening->id])
                            </div>
                        </div>
                    </div>
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
