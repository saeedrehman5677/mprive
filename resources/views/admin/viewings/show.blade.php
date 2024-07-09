@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.viewing.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.viewings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table ">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.id') }}
                        </th>
                        <td>
                            {{ $viewing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.name') }}
                        </th>
                        <td>
                            {{ $viewing->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.email') }}
                        </th>
                        <td>
                            {{ $viewing->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.phone') }}
                        </th>
                        <td>
                            {{ $viewing->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.message') }}
                        </th>
                        <td>
                            {{ $viewing->message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.date') }}
                        </th>
                        <td>
                            {{ $viewing->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.time') }}
                        </th>
                        <td>
                            {{ $viewing->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.viewing.fields.property') }}
                        </th>
                        <td>
                            {{ $viewing->property->title ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.viewings.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
