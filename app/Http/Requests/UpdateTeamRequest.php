<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'job_title' => [
                'string',
                'max:255',
                'required',
                'unique:teams,job_title,' . request()->route('team')->id,
            ],
            'phone' => [
                'string',
                'max:15',
                'nullable',
            ],
            'facebook' => [
                'string',
                'max:255',
                'nullable',
            ],
            'instagram' => [
                'string',
                'max:255',
                'nullable',
            ],
            'twitter' => [
                'string',
                'max:255',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }
}
