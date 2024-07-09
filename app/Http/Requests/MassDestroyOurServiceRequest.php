<?php

namespace App\Http\Requests;

use App\Models\OurService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOurServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('our_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:our_services,id',
        ];
    }
}
