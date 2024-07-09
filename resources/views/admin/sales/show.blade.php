@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.sale.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.sales.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table ">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.id') }}
                        </th>
                        <td>
                            {{ $sale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.property') }}
                        </th>
                        <td>
                            {{ $sale->property }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.title') }}
                        </th>
                        <td>
                            {{ $sale->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.sub_title') }}
                        </th>
                        <td>
                            {{ $sale->sub_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.slug') }}
                        </th>
                        <td>
                            {{ $sale->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.emirates') }}
                        </th>
                        <td>
                            {{ App\Models\Sale::EMIRATES_SELECT[$sale->emirates] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.location') }}
                        </th>
                        <td>
                            {{ $sale->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.size') }}
                        </th>
                        <td>
                            {{ $sale->size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.price') }}
                        </th>
                        <td>
                            {{ $sale->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.discounted_price') }}
                        </th>
                        <td>
                            {{ $sale->discounted_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.bathrooms') }}
                        </th>
                        <td>
                            {{ $sale->bathrooms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.bed_rooms') }}
                        </th>
                        <td>
                            {{ $sale->bed_rooms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.year_built') }}
                        </th>
                        <td>
                            {{ $sale->year_built }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.developer') }}
                        </th>
                        <td>
                            {{ $sale->developer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.property_status') }}
                        </th>
                        <td>
                            {{ App\Models\Sale::PROPERTY_STATUS_SELECT[$sale->property_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.description') }}
                        </th>
                        <td>
                            {!! $sale->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.publishing_status') }}
                        </th>
                        <td>
                            {{ App\Models\Sale::PUBLISHING_STATUS_SELECT[$sale->publishing_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.featured_image') }}
                        </th>
                        <td>
                            @if($sale->featured_image)
                                <a href="{{ $sale->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $sale->featured_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.gallery_images') }}
                        </th>
                        <td>
                            @foreach($sale->gallery_images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.files') }}
                        </th>
                        <td>
                            @foreach($sale->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.property_type') }}
                        </th>
                        <td>
                            @foreach($sale->property_types as $key => $property_type)
                                <span class="label label-info">{{ $property_type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.amenities') }}
                        </th>
                        <td>
                            @foreach($sale->amenities as $key => $amenities)
                                <span class="label label-info">{{ $amenities->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.nearby') }}
                        </th>
                        <td>
                            {!! $sale->nearby !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.user') }}
                        </th>
                        <td>
                            {{ $sale->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sale->featured ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.top_properties') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sale->top_properties ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $sale->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.meta_content') }}
                        </th>
                        <td>
                            {{ $sale->meta_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.meta_description') }}
                        </th>
                        <td>
                            {{ $sale->meta_description }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.sales.index') }}">
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
                <a class="nav-link" href="#property_contacts" role="tab" data-toggle="tab">
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#property_viewings" role="tab" data-toggle="tab">
                    {{ trans('cruds.viewing.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="property_contacts">
                @includeIf('admin.sales.relationships.propertyContacts', ['contacts' => $sale->propertyContacts])
            </div>
            <div class="tab-pane" role="tabpanel" id="property_viewings">
                @includeIf('admin.sales.relationships.propertyViewings', ['viewings' => $sale->propertyViewings])
            </div>
        </div>
    </div>

@endsection
