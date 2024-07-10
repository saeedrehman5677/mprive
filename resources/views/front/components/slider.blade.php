
<section class="flat-slider home-5">
    <div class="wrap-slider-swiper">


        <div class="video-background">
            <video   autoplay muted playsinline id="myVideo">
                <source  src="https://res.cloudinary.com/dituvuuk9/video/upload/v1720635396/videoplayback_urxor0.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="overlay"></div>

        </div>
        <script>
            document.getElementById('myVideo').play();
        </script>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="info-box">
                    <div class="box-top">
                        <div class="heading">
                            <h2 class="title wow fadeIn animationtext clip" data-wow-delay=".1s" data-wow-duration="1000ms">
                                <br>
                                <span class="tf-text s1 cd-words-wrapper">
                                            <span class="item-text is-visible">Your Dream - Our Mission</span>
                                            <span class="item-text is-hidden">Your trust our goal</span>
                                        </span>
                            </h2>
                            <p class="subtitle body-1 wow fadeIn" data-wow-delay=".2s" data-wow-duration="1000ms">
                                We are a prominent real estate brokerage agency based in Dubai, specializing in both the off-plan and secondary markets.
                            </p>
                        </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Filter -->
<section class="flat-filter-search home-5">
    <div class="container">
        <div class="flat-tab flat-tab-form">
            <ul class="nav-tab-form style-3" role="tablist">
                <li class="nav-tab-item" role="presentation">
                    <a href="#forRent" class="nav-link-item active" data-bs-toggle="tab">For Rent</a>
                </li>
                <li class="nav-tab-item" role="presentation">
                    <a href="#forSale" class="nav-link-item" data-bs-toggle="tab">For Sale</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" role="tabpanel" id="forRent">
                    <div class="form-sl">
                        <form action="{{url('properties')}}" method="get" id="rentForm">
                            <input type="hidden" name="property_status" value="For Rent">
                            <div class="wd-find-select shadow-st no-left-round">
                                <div class="inner-group">
                                    <div class="form-group-1 search-form form-style">
                                        <label>Keyword</label>
                                        <input type="text" class="form-control" placeholder="Search Keyword." value="" name="s" title="Search for" required="">
                                    </div>
                                    <div class="form-group-2 form-style">
                                        <label>Type</label>
                                        <div class="group-select">
                                            <select name="type" class="form-control">
                                                <option value="any">Any</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group-3 form-style">
                                        <label>Emirate</label>
                                        <div class="group-select">
                                            <select name="emirate" class="form-control">
                                                <option value="all">All</option>
                                                @foreach(\App\Models\Sale::EMIRATES_SELECT as $emirate)
                                                    <option value="{{$emirate}}">{{$emirate}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="tf-btn primary" href="#">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="forSale">
                    <div class="form-sl">
                        <form action="{{url('properties')}}" method="get" id="saleForm">
                            <input type="hidden" name="listingType" value="For Sale">
                            <div class="wd-find-select shadow-st no-left-round">
                                <div class="inner-group">
                                    <div class="form-group-1 search-form form-style">
                                        <label>Keyword</label>
                                        <input type="text" class="form-control" placeholder="Search Keyword." value="" name="s" title="Search for" required="">
                                    </div>
                                    <div class="form-group-2 form-style">
                                        <label>Type</label>
                                        <div class="group-select">
                                            <select name="type" class="form-control">
                                                <option value="any">Any</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group-3 form-style">
                                        <label>Emirate</label>
                                        <div class="group-select">
                                            <select name="emirate" class="form-control">
                                                <option value="all">All</option>
                                                @foreach(\App\Models\Sale::EMIRATES_SELECT as $emirate)
                                                    <option value="{{$emirate}}">{{$emirate}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="tf-btn primary" href="#">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    document.addEventListener('DOMContentLoaded', function () {


        const rentTab = document.querySelector('a[href="#forRent"]');
        const saleTab = document.querySelector('a[href="#forSale"]');
        const rentForm = document.getElementById('rentForm');
        const saleForm = document.getElementById('saleForm');

        rentTab.addEventListener('click', function () {
            rentForm.classList.add('active');
            saleForm.classList.remove('active');
        });
        saleTab.addEventListener('click', function () {
            saleForm.classList.add('active');
            rentForm.classList.remove('active');
        });
    });
</script>

