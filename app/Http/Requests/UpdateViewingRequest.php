<?php

namespace App\Http\Requests;

use App\Models\Viewing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateViewingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('viewing_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'max:255',
                'required',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
