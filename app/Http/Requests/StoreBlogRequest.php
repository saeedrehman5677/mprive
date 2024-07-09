<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_create');
    }

    public function rules()
    {
        return [
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
            'title' => [
                'string',
                'max:255',
                'required',
            ],
            'featured_image' => [
                'required',
            ],
            'slug' => [
                'string',
                'max:255',
                'required',
                'unique:blogs',
            ],
            'detail_images' => [
                'array',
            ],
        ];
    }
}
