@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.ourService.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.our-services.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table ">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ourService.fields.id') }}
                        </th>
                        <td>
                            {{ $ourService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ourService.fields.name') }}
                        </th>
                        <td>
                            {{ $ourService->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ourService.fields.description') }}
                        </th>
                        <td>
                            {{ $ourService->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ourService.fields.icon') }}
                        </th>
                        <td>
                            @if($ourService->icon)
                                <a href="{{ $ourService->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $ourService->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.our-services.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
