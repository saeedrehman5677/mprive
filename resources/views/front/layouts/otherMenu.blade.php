<header class="main-header fixed-header">
    <!-- Header Lower -->
    <div class="header-lower">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-container d-flex justify-content-between align-items-center">
                    <!-- Logo Box -->
                    <div class="logo-box flex">
                        <div class="logo"><a href="{{url('/')}}"><img src="{{asset('img/logo-white.png')}}" alt="logo" width="200" height="60"></a></div>
                    </div>
                    <div class="nav-outer">
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown home current"><a href="{{url('/')}}">Home</a></li>
                                    <li class="dropdown"><a href="{{url('buy/properties')}}">Buy</a></li>
                                    <li class="dropdown"><a href="{{url('rent/properties')}}">Rent</a></li>
                                    <li class="dropdown"><a href="{{url('projects/properties')}}">Projects</a></li>
                                    <li class="dropdown"><a href="{{url('developers')}}">Developers</a></li>
                                    <li class="dropdown"><a href="{{url('faq')}}">FAQs</a></li>
                                    <li class="dropdown"><a href="{{url('about')}}">About Us</a></li>

                                    <li class="dropdown"><a href="{{url('contact')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>


                    <div class="mobile-nav-toggler mobile-button"><span></span></div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Header Lower -->

    <!-- Mobile Menu  -->
    <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="nav-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo-white.png')}}" alt="nav-logo" width="200" height="60"></a></div>
            <div class="bottom-canvas">
                <div class="menu-outer"></div>
                <div class="button-mobi-sell">
                </div>
                <div class="mobi-icon-box">
                    <div class="box d-flex align-items-center">
                        <span class="icon icon-phone2"></span>
                        <div>+971 54 422 3163</div>
                    </div>
                    <div class="box d-flex align-items-center">
                        <span class="icon icon-mail"></span>
                        <div>office@mprive.com</div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>
