@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.propertyType.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.property-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.propertyType.fields.id') }}
                        </th>
                        <td>
                            {{ $propertyType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.propertyType.fields.name') }}
                        </th>
                        <td>
                            {{ $propertyType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.propertyType.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $propertyType->status ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.propertyType.fields.icon') }}
                        </th>
                        <td>
                            @if($propertyType->icon)
                                <a href="{{ $propertyType->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $propertyType->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.property-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#property_type_sales" role="tab" data-toggle="tab">
                    {{ trans('cruds.sale.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="property_type_sales">
                @includeIf('admin.propertyTypes.relationships.propertyTypeSales', ['sales' => $propertyType->propertyTypeSales])
            </div>
        </div>
    </div>

@endsection
