@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.sale.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.sales.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h4>Basic  :</h4>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="required" for="property">{{ trans('cruds.sale.fields.property') }}</label>
                                <input class="form-control {{ $errors->has('property') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="property" id="property" value="{{ old('property', '') }}" required>
                                @if($errors->has('property'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('property') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.property_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required" for="title">{{ trans('cruds.sale.fields.title') }}</label>
                                <input onkeyup="convertToSLug(this.value)" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                       name="title" id="title" value="{{ old('title', '') }}" required>
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.title_helper') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="sub_title">{{ trans('cruds.sale.fields.sub_title') }}</label>
                                <textarea rows="3"
                                          class="form-control {{ $errors->has('sub_title') ? 'is-invalid' : '' }}"
                                          name="sub_title" id="sub_title">{{ old('sub_title') }}</textarea>
                                @if($errors->has('sub_title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sub_title') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.sub_title_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required" for="slug">{{ trans('cruds.sale.fields.slug') }}</label>
                                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text"
                                       name="slug" id="slug" value="{{ old('slug', '') }}" required>
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('slug') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.slug_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required">{{ trans('cruds.sale.fields.emirates') }}</label>
                                <select class="form-control {{ $errors->has('emirates') ? 'is-invalid' : '' }}"
                                        name="emirates"
                                        id="emirates" required>
                                    <option value
                                            disabled {{ old('emirates', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Models\Sale::EMIRATES_SELECT as $key => $label)
                                        <option
                                            value="{{ $key }}" {{ old('emirates', 'Dubai') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('emirates'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('emirates') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.emirates_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="required" for="location">{{ trans('cruds.sale.fields.location') }}</label>
                                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="location" id="location" value="{{ old('location', '') }}" required>
                                @if($errors->has('location'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('location') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.location_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="required" for="size">{{ trans('cruds.sale.fields.size') }}</label>
                                <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="number"
                                       name="size" id="size" value="{{ old('size', '') }}" step="1" required>
                                @if($errors->has('size'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('size') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.size_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="required" for="price">{{ trans('cruds.sale.fields.price') }}</label>
                                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                       type="number"
                                       name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                                @if($errors->has('price'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('price') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.price_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discounted_price">{{ trans('cruds.sale.fields.discounted_price') }}</label>
                                <input class="form-control {{ $errors->has('discounted_price') ? 'is-invalid' : '' }}"
                                       type="number" name="discounted_price" id="discounted_price"
                                       value="{{ old('discounted_price', '') }}" step="0.01">
                                @if($errors->has('discounted_price'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('discounted_price') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.discounted_price_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="required"
                                       for="bathrooms">{{ trans('cruds.sale.fields.bathrooms') }}</label>
                                <input class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}"
                                       type="number"
                                       name="bathrooms" id="bathrooms" value="{{ old('bathrooms', '') }}" step="1"
                                       required>
                                @if($errors->has('bathrooms'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bathrooms') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.bathrooms_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="required"
                                       for="bed_rooms">{{ trans('cruds.sale.fields.bed_rooms') }}</label>
                                <input class="form-control {{ $errors->has('bed_rooms') ? 'is-invalid' : '' }}"
                                       type="number"
                                       name="bed_rooms" id="bed_rooms" value="{{ old('bed_rooms', '') }}" step="1"
                                       required>
                                @if($errors->has('bed_rooms'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bed_rooms') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.bed_rooms_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="required"
                                       for="year_built">{{ trans('cruds.sale.fields.year_built') }}</label>
                                <input class="form-control date {{ $errors->has('year_built') ? 'is-invalid' : '' }}"
                                       type="text" name="year_built" id="year_built" value="{{ old('year_built') }}"
                                       required>
                                @if($errors->has('year_built'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('year_built') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.year_built_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="developer">{{ trans('cruds.sale.fields.developer') }}</label>
                                <select class="form-control select2 {{ $errors->has('developer') ? 'is-invalid' : '' }}" name="developer" id="developer">
                                    @foreach($developers as $id => $entry)
                                        <option value="{{ $id }}" {{ old('developer') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('developer'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('developer') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.developer_helper') }}</span>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="required">{{ trans('cruds.sale.fields.property_status') }}</label>
                                <select class="form-control {{ $errors->has('property_status') ? 'is-invalid' : '' }}"
                                        name="property_status" id="property_status" required>
                                    <option value
                                            disabled {{ old('property_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Models\Sale::PROPERTY_STATUS_SELECT as $key => $label)
                                        <option
                                            value="{{ $key }}" {{ old('property_status', 'For Sale') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('property_status'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('property_status') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.property_status_helper') }}</span>
                            </div>

                            <div class="form-group col-md-3">
                                <label>{{ trans('cruds.sale.fields.publishing_status') }}</label>
                                <select class="form-control {{ $errors->has('publishing_status') ? 'is-invalid' : '' }}"
                                        name="publishing_status" id="publishing_status">
                                    <option value
                                            disabled {{ old('publishing_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Models\Sale::PUBLISHING_STATUS_SELECT as $key => $label)
                                        <option
                                            value="{{ $key }}" {{ old('publishing_status', 'active') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('publishing_status'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('publishing_status') }}
                                    </div>
                                @endif
                                <span
                                    class="help-block">{{ trans('cruds.sale.fields.publishing_status_helper') }}</span>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="property_types">{{ trans('cruds.sale.fields.property_type') }}</label>
                                <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all"
                                          style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select
                                    class="form-control select2 {{ $errors->has('property_types') ? 'is-invalid' : '' }}"
                                    name="property_types[]" id="property_types" multiple>
                                    @foreach($property_types as $id => $property_type)
                                        <option
                                            value="{{ $id }}" {{ in_array($id, old('property_types', [])) ? 'selected' : '' }}>{{ $property_type }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('property_types'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('property_types') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.property_type_helper') }}</span>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="property_types">Sub Property Types</label>
                                <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all"
                                          style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select
                                    class="form-control select2 {{ $errors->has('property_types') ? 'is-invalid' : '' }}"
                                    name="sub_types[]" id="sub_types" multiple>
                                    @foreach($subTypes as $id => $type)
                                        <option
                                            value="{{ $id }}" {{ in_array($id, old('property_types', [])) ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('sub_property_types'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sub_property_types') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="amenities">{{ trans('cruds.sale.fields.amenities') }}</label>
                                <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all"
                                  style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                    <span class="btn btn-info btn-xs deselect-all"
                                          style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                </div>
                                <select class="form-control select2 {{ $errors->has('amenities') ? 'is-invalid' : '' }}"
                                        name="amenities[]" id="amenities" multiple>
                                    @foreach($amenities as $id => $amenity)
                                        <option
                                            value="{{ $id }}" {{ in_array($id, old('amenities', [])) ? 'selected' : '' }}>{{ $amenity }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('amenities'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('amenities') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.amenities_helper') }}</span>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="user_id">{{ trans('cruds.sale.fields.user') }}</label>
                                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}"
                                        name="user_id" id="user_id">
                                    @foreach($users as $id => $entry)
                                        <option
                                            value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('user'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('user') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.user_helper') }}</span>
                            </div>
                            <div class="form-group  col-md-3">
                                <div class="form-check {{ $errors->has('featured') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="featured" value="0">
                                    <input class="form-check-input" type="checkbox" name="featured" id="featured"
                                           value="1" {{ old('featured', 0) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                           for="featured">{{ trans('cruds.sale.fields.featured') }}</label>
                                </div>
                                @if($errors->has('featured'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('featured') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.featured_helper') }}</span>
                            </div>
                            <div class="form-group  col-md-3">
                                <div class="form-check {{ $errors->has('top_properties') ? 'is-invalid' : '' }}">
                                    <input type="hidden" name="top_properties" value="0">
                                    <input class="form-check-input" type="checkbox" name="top_properties"
                                           id="top_properties"
                                           value="1" {{ old('top_properties', 0) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                           for="top_properties">{{ trans('cruds.sale.fields.top_properties') }}</label>
                                </div>
                                @if($errors->has('top_properties'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('top_properties') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.top_properties_helper') }}</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Media :</h4>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="featured_image">{{ trans('cruds.sale.fields.featured_image') }}</label>
                                <div
                                    class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}"
                                    id="featured_image-dropzone">
                                </div>
                                @if($errors->has('featured_image'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('featured_image') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.featured_image_helper') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="files">{{ trans('cruds.sale.fields.files') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}"
                                     id="files-dropzone">
                                </div>
                                @if($errors->has('files'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('files') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.files_helper') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="gallery_images">{{ trans('cruds.sale.fields.gallery_images') }}</label>
                                <div
                                    class="needsclick dropzone {{ $errors->has('gallery_images') ? 'is-invalid' : '' }}"
                                    id="gallery_images-dropzone">
                                </div>
                                @if($errors->has('gallery_images'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('gallery_images') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.gallery_images_helper') }}</span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4>Details :</h4>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="nearby">{{ trans('cruds.sale.fields.nearby') }}</label>
                                <textarea class="form-control ckeditor {{ $errors->has('nearby') ? 'is-invalid' : '' }}"
                                          name="nearby" id="nearby">{!! old('nearby') !!}</textarea>
                                @if($errors->has('nearby'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nearby') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.nearby_helper') }}</span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description">{{ trans('cruds.sale.fields.description') }}</label>
                                <textarea
                                    class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    name="description" id="description">{!! old('description') !!}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.description_helper') }}</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <h4>Seo :</h4>
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label for="meta_title">{{ trans('cruds.sale.fields.meta_title') }}</label>
                                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}">
                                @if($errors->has('meta_title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('meta_title') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.meta_title_helper') }}</span>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="meta_content">{{ trans('cruds.sale.fields.meta_content') }}</label>
                                <input class="form-control {{ $errors->has('meta_content') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="meta_content" id="meta_content" value="{{ old('meta_content', '') }}">
                                @if($errors->has('meta_content'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('meta_content') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.meta_content_helper') }}</span>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="meta_description">{{ trans('cruds.sale.fields.meta_description') }}</label>
                                <textarea
                                    class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}"
                                    name="meta_description"
                                    id="meta_description">{{ old('meta_description') }}</textarea>
                                @if($errors->has('meta_description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('meta_description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.sale.fields.meta_description_helper') }}</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#property_types').select2().on('select2:select', function (e) {
            let propertyTypeIds = $(this).val();

            $.ajax({
                url: "{{ route('admin.sales.fetchSubTypes') }}",
                type: "POST",
                data: {
                    property_type_ids: propertyTypeIds,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    let subTypesSelect = $('#sub_types');

                    // Clear existing options
                    subTypesSelect.empty();

                    // Append new options
                    $.each(response.subTypes, function (id, name) {
                        let newOption = new Option(name, id, false, false);
                        $(newOption).attr('data-custom-attribute', 'value-' + id); // Add custom attribute
                        subTypesSelect.append(newOption);
                    });

                    // Refresh the Select2 control
                    subTypesSelect.val(null).trigger('change'); // Reset selection
                    subTypesSelect.select2(); // Re-initialize Select2
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.sales.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${file.name}.`;
                                        xhr.addEventListener('error', function () {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function () {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({default: response.url});
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $sale->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

    <script>
        Dropzone.options.featuredImageDropzone = {
            url: '{{ route('admin.sales.storeMedia') }}',
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.webp,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1,
                width: 2000,
                height: 2000
            },
            success: function (file, response) {
                $('form').find('input[name="featured_image"]').remove()
                $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="featured_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($sale) && $sale->featured_image)
                var file = {!! json_encode($sale->featured_image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>
    <script>
        var uploadedGalleryImagesMap = {}
        Dropzone.options.galleryImagesDropzone = {
            url: '{{ route('admin.sales.storeMedia') }}',
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.webp,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="gallery_images[]" value="' + response.name + '">')
                uploadedGalleryImagesMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedGalleryImagesMap[file.name]
                }
                $('form').find('input[name="gallery_images[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($sale) && $sale->gallery_images)
                var files = {!! json_encode($sale->gallery_images) !!}
                for(
                var i
            in
                files
            )
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="gallery_images[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>
    <script>
        var uploadedFilesMap = {}
        Dropzone.options.filesDropzone = {
            url: '{{ route('admin.sales.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 10
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
                uploadedFilesMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFilesMap[file.name]
                }
                $('form').find('input[name="files[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($sale) && $sale->files)
                var files =
                    {!! json_encode($sale->files) !!}
                    for(
                var i
            in
                files
            )
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
