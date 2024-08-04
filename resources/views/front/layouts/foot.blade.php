<!-- footer -->
<footer class="footer">
    <div class="top-footer">
        <div class="container">
            <div class="content-footer-top">
                <div class="footer-logo">
                    <img src="{{asset('img/logo-white.png')}}" alt="logo-footer" width="200" height="60">
                </div>
                <div class="wd-social">
                    <span>Follow Us:</span>
                    <ul class="list-social d-flex align-items-center">
                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-facebook"></i></a></li>
                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-linkedin"></i></a></li>
                        <li><a href="#" class="box-icon w-40 social">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_748_6323)">
                                        <path
                                            d="M9.4893 6.77491L15.3176 0H13.9365L8.87577 5.88256L4.8338 0H0.171875L6.28412 8.89547L0.171875 16H1.55307L6.8973 9.78782L11.1659 16H15.8278L9.48896 6.77491H9.4893ZM7.59756 8.97384L6.97826 8.08805L2.05073 1.03974H4.17217L8.14874 6.72795L8.76804 7.61374L13.9371 15.0075H11.8157L7.59756 8.97418V8.97384Z"
                                            fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_748_6323">
                                            <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a></li>
                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-pinterest"></i></a>
                        </li>

                        <li><a href="#" class="box-icon w-40 social"><i class="icon icon-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-cl-1">

                        <p class="text-variant-2">Specializes in providing high-class tours for those in need.
                            Contact Us</p>
                        <ul class="mt-12">
                            <li class="mt-12 d-flex align-items-center gap-8">
                                <i class="icon icon-mapPinLine fs-20 text-variant-2"></i>
                                <p class="text-white">Office: 701 | Concord Tower | Media City Dubai - UAE</p>
                            </li>
                            <li class="mt-12 d-flex align-items-center gap-8">
                                <i class="icon icon-phone2 fs-20 text-variant-2"></i>
                                <a href="tel:+971544223163" class="text-white caption-1">+971 54 422 3163</a>
                            </li>
                            <li class="mt-12 d-flex align-items-center gap-8">
                                <i class="icon icon-mail fs-20 text-variant-2"></i>
                                <a href="mailto:office@mprive.com" class="text-white caption-1">office@mprive.com</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-6">
                    <div class="footer-cl-2">
                        <div class="fw-7 text-white">Categories</div>
                        <ul class="mt-10 navigation-menu-footer">
                            <li><a href="{{url('blogs')}}" class="caption-1 text-variant-2">News</a></li>
                            <li><a href="{{url('about')}}" class="caption-1 text-variant-2">About Us</a></li>
                            <li><a href="{{url('contact')}}" class="caption-1 text-variant-2">Contact Us</a></li>
                            <li><a href="{{url('career')}}" class="caption-1 text-variant-2">Career</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="footer-cl-3">
                        <div class="fw-7 text-white">Our Company</div>
                        <ul class="mt-10 navigation-menu-footer">
                            <li><a href="{{ url('buy/properties') }}" class="caption-1 text-variant-2">Property For Sale</a></li>
                            <li><a href="{{ url('rent/properties') }}" class="caption-1 text-variant-2">Property For Rent</a></li>
                            <li><a href="{{ url('projects/properties') }}" class="caption-1 text-variant-2">Off plan Projects</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-cl-4">
                        <div class="fw-7 text-white">
                            Newsletter
                        </div>
                        <p class="mt-12 text-variant-2">Your Weekly/Monthly Dose of Knowledge and
                            Inspiration</p>
                        <form class="mt-12" id="subscribe-form" action="#" method="post" accept-charset="utf-8"
                              data-mailchimp="true">
                            <div id="subscribe-content">
                                <span class="icon-left icon-mail"></span>
                                <input type="email" name="email-form" id="subscribe-email"
                                       placeholder="Your email address"/>
                                <button type="button" id="subscribe-button" class="button-subscribe"><i
                                        class="icon icon-send"></i></button>
                            </div>
                            <div id="subscribe-msg"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="content-footer-bottom">
                <div class="copyright">@ {{date('Y')}} Mprive. All Rights Reserved.</div>

                <ul class="menu-bottom">
                    <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
