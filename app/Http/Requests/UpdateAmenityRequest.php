<?php

namespace App\Http\Requests;

use App\Models\Amenity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAmenityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('amenity_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:100',
                'required',
                'unique:amenities,name,' . request()->route('amenity')->id,
            ],
            'icon' => [
                'required',
            ],
        ];
    }
}
