<?php

namespace App\Http\Requests;

use App\Models\Developer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeveloperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('developer_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'name' => [
                'string',
                'min:5',
                'max:255',
                'required',
            ],
        ];
    }
}
