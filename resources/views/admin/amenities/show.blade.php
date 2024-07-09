@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.amenity.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.amenities.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table ">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.amenity.fields.id') }}
                        </th>
                        <td>
                            {{ $amenity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.amenity.fields.name') }}
                        </th>
                        <td>
                            {{ $amenity->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.amenity.fields.icon') }}
                        </th>
                        <td>
                            @if($amenity->icon)
                                <a href="{{ $amenity->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $amenity->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.amenities.index') }}">
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
                <a class="nav-link" href="#amenities_sales" role="tab" data-toggle="tab">
                    {{ trans('cruds.sale.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="amenities_sales">
                @includeIf('admin.amenities.relationships.amenitiesSales', ['sales' => $amenity->amenitiesSales])
            </div>
        </div>
    </div>

@endsection
