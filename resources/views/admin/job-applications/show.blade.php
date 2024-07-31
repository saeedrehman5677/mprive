@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.developer.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.developers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.developer.fields.id') }}
                        </th>
                        <td>
                            {{ $developer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.developer.fields.image') }}
                        </th>
                        <td>
                            @if($developer->image)
                                <a href="{{ $developer->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $developer->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.developer.fields.name') }}
                        </th>
                        <td>
                            {{ $developer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.developer.fields.description') }}
                        </th>
                        <td>
                            {!! $developer->description !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.developers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
