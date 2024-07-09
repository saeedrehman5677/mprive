<?php

namespace App\Livewire;

use App\Models\Amenity;
use App\Models\PropertyType;
use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sale as Property;
use Illuminate\Support\Facades\DB;

class PropertiesGrid extends Component
{
    use WithPagination;

    public $keyword;
    public $emirate = 'all';
    public $type = 'any';
    public $rooms = 1;
    public $bathrooms = 1;
    public $bedrooms = 1;
    public $minPrice;
    public $maxPrice;
    public $minSize;
    public $maxSize;
    public $amenities = [];

    public function render()
    {
        $query = Sale::query();

        // Apply filters based on user input
        if ($this->keyword) {
            $query->where('title', 'like', '%' . $this->keyword . '%');
        }

        if ($this->emirate && $this->emirate !== 'all') {
            $query->where('emirates', $this->emirate);
        }

        if ($this->type && $this->type !== 'any') {
            $query->whereHas('property_types', function ($q) {
                $q->where('name', $this->type);
            });
        }

        $query->where('bed_rooms', '>=', $this->rooms);
        $query->where('bathrooms', '>=', $this->bathrooms);
        $query->where('bed_rooms', '>=', $this->bedrooms);

        if ($this->minPrice) {
            $query->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice) {
            $query->where('price', '<=', $this->maxPrice);
        }

        if ($this->minSize) {
            $query->where('size', '>=', $this->minSize);
        }

        if ($this->maxSize) {
            $query->where('size', '<=', $this->maxSize);
        }

        // Filter by amenities
        if (!empty($this->amenities)) {
            $query->whereHas('amenities', function ($q) {
                $q->whereIn('id', $this->amenities);
            });
        }

        $properties = $query->paginate(10); // Adjust per your pagination needs


        return view('livewire.properties-grid', [
            'properties' => $properties,
        ]);
    }
}
