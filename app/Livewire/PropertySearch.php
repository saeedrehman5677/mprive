<?php

namespace App\Livewire;

use App\Models\Amenity;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\Sale;

// Adjust the model namespace as per your application

class PropertySearch extends Component
{
    public $s;
    public $emirate = 'all';
    public $type = 'any';
    public $property_status = "any";
    public $bathrooms = '';
    public $bedrooms = '';
    public $minPrice;
    public $maxPrice;
    public $minSize;
    public $maxSize;
    public $amenities = [];


    public function mount()
    {
        if ( request()->query('emirate')) {
            $this->emirate = request()->query('emirate');
        }
        if ( request()->query('type')) {
            $this->type = request()->query('type');
        }
        if ( request()->query('property_status')) {
            $this->property_status = request()->query('property_status');
        }
    }

    public function updateListingType($type)
    {
        $this->property_status = $type;
    }

    public function render()
    {
        $types = PropertyType::with('media')->withCount('propertyTypeSales')->take(10)->get();
        $amenities = Amenity::with('media')->get();

       if (Route::currentRouteName() == "buy"){
             $this->property_status = "For Sale";
       }
       if (Route::currentRouteName() == "rent"){
                $this->property_status = "For rent";
       }
       if (Route::currentRouteName() == "projects"){
                $this->property_status = "New Project";
       }
        $properties = Sale::query();

        $properties = $properties
            ->when($this->s, function ($query) {
                $query->where('title', 'like', '%' . $this->s . '%');
            })

            ->when($this->bathrooms, function ($query) {
                $query->where('bathrooms', '>=', $this->bathrooms);
            })

            ->when($this->property_status !== "any", function ($query) {

                $query->where('property_status', $this->property_status);
            })
            ->when($this->bedrooms, function ($query) {
                $query->where('bed_rooms', '>=', $this->bedrooms);
            })
            ->when($this->emirate !== 'all', function ($query) {
                $query->where('emirates', $this->emirate);
            })
            ->when($this->type !== 'any', function ($query) {
                $query->whereHas('property_types', function ($q) {
                    $q->where('name', $this->type);
                });
            })
            ->when($this->minPrice, function ($query) {
                $query->where('price', '>=', $this->minPrice);
            })
            ->when($this->maxPrice, function ($query) {
                $query->where('price', '<=', $this->maxPrice);
            })
            ->when($this->minSize, function ($query) {
                $query->where('size', '>=', $this->minSize);
            })
            ->when($this->maxSize, function ($query) {
                $query->where('size', '<=', $this->maxSize);
            });

        $properties = $properties->paginate(10); // Adjust per your pagination needs

        return view('livewire.property-search', [
            'properties' => $properties,
            'types' => $types,
            'amenities' => $amenities,
        ]);
    }

    public function submit()
    {
        $this->render();

    }
}
