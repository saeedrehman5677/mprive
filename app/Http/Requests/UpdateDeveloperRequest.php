<?php

namespace App\Http\Requests;

use App\Models\Developer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeveloperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('developer_edit');
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
