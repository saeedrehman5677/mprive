<div>
    <div class="widget-box bg-surface box-latest-property">
        <div class="h7 fw-7 title">Latest Properties</div>
        <ul>
            @foreach($properties as $property)
                <li class="latest-property-item">
                    <a href="{{ url('properties', $property->slug) }}" class="images-style">
                        <img style="min-height: 300px" src="{{ $property->featured_image->url }}">
                    </a>
                    <div class="content">
                        <div class="h7 text-capitalize fw-7">
                            <a href="{{ url('properties', $property->slug) }}" class="link">{{ $property->title }}</a>
                        </div>
                        <ul class="meta-list">
                            <li class="item">
                                <span>Bed:</span>
                                <span class="fw-7">{{ $property->bed_rooms }}</span>
                            </li>
                            <li class="item">
                                <span>Bath:</span>
                                <span class="fw-7">{{ $property->bathrooms }}</span>
                            </li>
                            <li class="item">
                                <span class="fw-7">{{ $property->size }} SqFT</span>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <div class="h7 fw-7">
                                Price :
                                @if($property->discounted_price)
                                    <strike style="color: green; font-size: 14px; margin-right: 4px">
                                        {{ number_format($property->price, 2) }}
                                    </strike>
                                    {{ number_format($property->discounted_price, 2) }}
                                @else
                                    {{ number_format($property->price, 2) }}
                                @endif
                                AED
                            </div>
                            @if($property->property_status == "For rent")
                                <span class="text-variant-1">/month</span>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
