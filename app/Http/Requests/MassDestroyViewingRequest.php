<?php

namespace App\Http\Requests;

use App\Models\Viewing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyViewingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('viewing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:viewings,id',
        ];
    }
}
