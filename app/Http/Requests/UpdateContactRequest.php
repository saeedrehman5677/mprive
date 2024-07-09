<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_edit');
    }

    public function rules()
    {
        return [
            'full_name' => [
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
        ];
    }
}
