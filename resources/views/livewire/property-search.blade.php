<div class="row">
    @if(request()->has('developer') || request()->has('emirate') || Route::currentRouteName()  == "projects")
        <div class="col-xl-12 col-lg-12">
            <div class="tab-content">
                <div wire:loading.remove class="tab-pane fade active show" id="gridLayout" role="tabpanel">
                    <div class="row">
                        @if(count($properties) <= 0)
                            <div style="margin-top: 100px" class="text-center col-md-12">
                                <h5>
                                    <span style="font-size: 70px;" class="box-icon w-100">
                                        <i class="icon icon-villa"></i>
                                    </span>
                                    No Properties Found
                                </h5>
                            </div>
                        @endif
                        @foreach($properties as $property)
                            <div class="col-xl-6 col-md-6">
                                <div class="homeya-box">
                                    <div class="archive-top">
                                        <a href="{{ url('properties', $property->slug) }}" class="images-group">
                                            <div class="images-style">
                                                <img style="min-height: 300px" src="{{ $property->featured_image->url }}">
                                            </div>
                                            <div class="top">
                                                <ul class="d-flex gap-8 flex-row">
                                                    @if($property->featured)
                                                        <li class="flag-tag success">Featured</li>
                                                    @endif
                                                    <li class="flag-tag style-1">{{ $property->property_status }}</li>
                                                </ul>
                                            </div>
                                            <div class="bottom">
                                                @foreach($property->property_types->take(2) as $type)
                                                    <span class="flag-tag style-2">{{ $type->name }}</span>
                                                @endforeach
                                            </div>
                                        </a>
                                        <div class="content">
                                            <div class="text-1 text-capitalize">
                                                <a href="property-details-v1.html" class="link">{{ $property->title }}</a>
                                            </div>
                                            <div class="desc">
                                                <i class="fs-16 icon icon-mapPin"></i>
                                                <p>{{ $property->location }}</p>
                                            </div>
                                            <ul class="meta-list">
                                                <li class="item">
                                                    <i class="icon icon-bed"></i>
                                                    <span>{{ $property->bed_rooms }}</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-bathtub"></i>
                                                    <span>{{ $property->bathrooms }}</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>{{ $property->size }} SqFT</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="archive-bottom d-flex justify-content-between align-items-center">
                                        <p>
                                            @if($property->getDeveloper->image)
                                                <img class="img" height="50" width="70" src="{{ $property->getDeveloper->image->url }}">
                                            @else
                                                {{ $property->getDeveloper->name }}
                                            @endif
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="h7 fw-7">
                                                Price:
                                                @if($property->discounted_price)
                                                    <strike style="color: green; font-size: 14px; margin-right: 4px">
                                                        {{ number_format($property->price, 2) }}
                                                    </strike>
                                                    {{ number_format($property->price, 2) }}
                                                @else
                                                    {{ number_format($property->price, 2) }}
                                                @endif
                                                AED
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $properties->links('vendor.pagination.custom') }}
                </div>
                <div wire:loading>
                    <div class="fa-3x spinner-border" role="status"></div>
                </div>
            </div>
        </div>
    @else
        <div class="col-xl-4 col-lg-5">
            <div class="widget-sidebar fixed-sidebar">

                <div class="flat-tab flat-tab-form widget-filter-search widget-box bg-surface">
                    <div class="h7 title fw-7">Search</div>
                    <ul class="nav-tab-form" role="tablist">
                        <li class="nav-tab-item" role="presentation">
                            <a href="#forRent" class="nav-link-item {{ $this->property_status == "For Rent" ? 'active' :''}}"  onclick="updateListingType('For Rent')" data-bs-toggle="tab">For Rent</a>
                        </li>
                        <li class="nav-tab-item" role="presentation">
                            <a href="#forSale" class="nav-link-item {{ $this->property_status == "For Sale" ? 'active' :''}}" data-bs-toggle="tab" onclick="updateListingType('For Sale')" >For Sale</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div  class="tab-pane fade active show" role="tabpanel">
                            <div class="form-sl">
                                <form wire:submit.prevent="submit">
                                    <div class="wd-filter-select">
                                        <div class="inner-group inner-filter">
                                            <div class="form-style">
                                                <label class="title-select">Keyword</label>
                                                <input type="text" wire:model.debounce.500ms="s" class="form-control" placeholder="Search Keyword" >
                                            </div>
                                            <div class="form-style">
                                                <label class="title-select">Emirate</label>
                                                <div class="group-select">
                                                    <select wire:model="emirate" class="nice-select">
                                                        <option value="all">All</option>
                                                        @foreach(\App\Models\Sale::EMIRATES_SELECT as $emirate)
                                                            <option value="{{ $emirate }}">{{ $emirate }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-style">
                                                <label class="title-select">Type</label>
                                                <div class="group-select">
                                                    <select wire:click="type"  wire:change="fetchSubTypes($event.target.value)"  class="nice-select">
                                                        <option value="any">Any</option>
                                                        @foreach($types as $type)
                                                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                                <div class="form-style">
                                                    <label class="title-select">Sub Type</label>
                                                    <div class="group-select">
                                                        <select  wire:model="subType" class="nice-select">
                                                            <option value="any">Any</option>
                                                            @foreach($subTypes as $subType)
                                                                <option value="{{ $subType->name }}">{{ $subType->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-style box-select">
                                                        <label class="title-select">Bathrooms</label>
                                                        <div class="group-select">
                                                            <select wire:model="bathrooms" class="nice-select">
                                                                <option value="" selected> Any  </option>
                                                                @for ($i = 1; $i <= 10; $i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-style box-select">
                                                        <label class="title-select">Bedrooms</label>
                                                        <div class="group-select">
                                                            <select wire:model="bedrooms" class="nice-select">
                                                                <option value="" selected> Any </option>
                                                                @for ($i = 1; $i <= 10; $i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-style widget-price">
                                                <div class="box-title-price">
                                                    <div class="caption-price">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <span>from</span>
                                                                <input type="text" wire:model="minPrice" id="slider-range-value1">
                                                            </div>
                                                            <div class="col-6">
                                                                <span>to</span>
                                                                <input type="text" wire:model="maxPrice" id="slider-range-value2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-style btn-show-advanced">
                                                <a class="filter-advanced pull-right">
                                                    <span class="icon icon-faders"></span>
                                                    <span class="text-advanced">Show Advanced</span>
                                                </a>
                                            </div>
                                            <div class="form-style wd-amenities">
                                                <div class="group-checkbox">
                                                    <div class="text-1">Amenities:</div>
                                                    <div class="group-amenities">
                                                        @foreach ($amenities as $amenity)
                                                            <fieldset class="amenities-item">
                                                                <input type="checkbox" wire:model="amenities" value="{{ $amenity->id }}" class="tf-checkbox style-1" id="cb{{ $amenity->id }}">
                                                                <label for="cb{{ $amenity->id }}" class="text-cb-amenities">{{ $amenity->name }}</label>
                                                            </fieldset>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-style btn-hide-advanced">
                                                <a class="filter-advanced pull-right">
                                                    <span class="icon icon-faders"></span>
                                                    <span class="text-advanced">Hide Advanced</span>
                                                </a>
                                            </div>
                                            <div wire:loading.remove class="form-style">
                                                <button type="submit" class="tf-btn primary">Find Properties</button>
                                            </div>
                                            <div wire:loading>
                                                <div class=" fa-3x spinner-border" role="status">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="tab-content">
                <div wire:loading.remove class="tab-pane fade active show" id="gridLayout" role="tabpanel">
                    <div class="row">
                        @if(count($properties) <= 0)
                            <div style="margin-top: 100px" class="text-center col-md-12">
                                <h5>
                                    <span style="font-size: 70px;" class="box-icon w-100">
                                        <i class="icon icon-villa"></i>
                                    </span>
                                    No Properties Found
                                </h5>
                            </div>
                        @endif
                        @foreach($properties as $property)
                            <div class="col-xl-6 col-md-6">
                                <div class="homeya-box">
                                    <div class="archive-top">
                                        <a href="{{ url('properties', $property->slug) }}" class="images-group">
                                            <div class="images-style">
                                                <img style="min-height: 300px" src="{{ $property?->featured_image?->url }}">
                                            </div>
                                            <div class="top">
                                                <ul class="d-flex gap-8 flex-row">
                                                    @if($property->featured)
                                                        <li class="flag-tag success">Featured</li>
                                                    @endif
                                                    <li class="flag-tag style-1">{{ $property->property_status }}</li>
                                                </ul>
                                            </div>
                                            <div class="bottom">
                                                @foreach($property->property_types->take(2) as $type)
                                                    <span class="flag-tag style-2">{{ $type->name }}</span>
                                                @endforeach
                                            </div>
                                        </a>
                                        <div class="content">
                                            <div class="text-1 text-capitalize">
                                                <a href="property-details-v1.html" class="link">{{ $property->title }}</a>
                                            </div>
                                            <div class="desc">
                                                <i class="fs-16 icon icon-mapPin"></i>
                                                <p>{{ $property->location }}</p>
                                            </div>
                                            <ul class="meta-list">
                                                <li class="item">
                                                    <i class="icon icon-bed"></i>
                                                    <span>{{ $property->bed_rooms }}</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-bathtub"></i>
                                                    <span>{{ $property->bathrooms }}</span>
                                                </li>
                                                <li class="item">
                                                    <i class="icon icon-ruler"></i>
                                                    <span>{{ $property->size }} SqFT</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="archive-bottom d-flex justify-content-between align-items-center">
                                        <p>
                                            @if($property->getDeveloper->image)
                                                <img class="img" height="50" width="70" src="{{ $property->getDeveloper->image->url }}">
                                            @else
                                                {{ $property->getDeveloper->name }}
                                            @endif
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <div class="h7 fw-7">
                                                Price:
                                                @if($property->discounted_price)
                                                    <strike style="color: green; font-size: 14px; margin-right: 4px">
                                                        {{ number_format($property->price, 2) }}
                                                    </strike>
                                                    {{ number_format($property->price, 2) }}
                                                @else
                                                    {{ number_format($property->price, 2) }}
                                                @endif
                                                AED
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $properties->links('vendor.pagination.custom') }}
                </div>
                <div wire:loading>
                    <div class="fa-3x spinner-border" role="status"></div>
                </div>
            </div>
        </div>
    @endif
</div>
<script>
    function updateListingType(type) {
    @this.call('updateListingType', type);
    }
</script>
