@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.faq.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.faqs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table ">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.id') }}
                        </th>
                        <td>
                            {{ $faq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.title') }}
                        </th>
                        <td>
                            {{ $faq->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.description') }}
                        </th>
                        <td>
                            {{ $faq->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faq.fields.category') }}
                        </th>
                        <td>
                            {{ $faq->category->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.faqs.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
