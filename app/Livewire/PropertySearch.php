<?php

namespace App\Livewire;

use App\Models\Amenity;
use App\Models\Developer;
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
    public $subType = 'any';
    public $property_status = "any";
    public $bathrooms = '';
    public $bedrooms = '';
    public $minPrice;
    public $maxPrice;
    public $minSize;
    public $maxSize;
    public $amenities = [];
    public $developer = [];
    public $subTypes =[];

    public function mount()
    {
        if ( request()->query('emirate')) {
            $this->emirate = request()->query('emirate');
        }
        if ( request()->query('developer')) {
            $this->developer = request()->query('developer');
        }
        if ( request()->query('type')) {
            $this->type = request()->query('type');
        }
        if ( request()->query('property_status')) {
            $this->property_status = request()->query('property_status');
        }
    }
    public function fetchSubTypes($type)
    {
        if ($type && $type !== 'any') {
            $Ptype  = PropertyType::where('name', $type)->first();
            if ($Ptype) {
                $this->subTypes = \App\Models\Subtype::where('parent_property_id', $Ptype->id)->get();
            }
        } else {
            $this->subTypes = [];
        }
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
            ->when($this->developer !== "", function ($query) {
                $id = Developer::with('media')->where('name' ,$this->developer )->first();
                if ($id) {
                    $query->where('developer', $id->id);
                }
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
            ->when($this->subType !== 'any', function ($query) {
                $query->whereHas('subProperty', function ($q) {
                    $q->where('name', $this->subType);
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
