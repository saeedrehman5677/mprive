<?php

namespace App\Http\Requests;

use App\Models\Sale;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSaleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sale_create');
    }

    public function rules()
    {
        return [
            'property' => [
                'string',
                'max:255',
                'required',
                'unique:sales',
            ],
            'title' => [
                'string',
                'max:255',
                'required',
            ],
            'slug' => [
                'string',
                'max:255',
                'required',
                'unique:sales',
            ],
            'emirates' => [
                'required',
            ],
            'location' => [
                'string',
                'max:255',
                'required',
            ],
            'size' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'required',
            ],
            'bathrooms' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bed_rooms' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'year_built' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'developer' => [
                'string',
                'max:255',
                'nullable',
            ],
            'property_status' => [
                'required',
            ],
            'gallery_images' => [
                'array',
            ],
            'files' => [
                'array',
            ],
            'property_types.*' => [
                'integer',
            ],
            'property_types' => [
                'array',
            ],
            'amenities.*' => [
                'integer',
            ],
            'amenities' => [
                'array',
            ],
            'meta_title' => [
                'string',
                'max:255',
                'nullable',
            ],
            'meta_content' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }
}
