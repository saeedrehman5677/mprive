@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.viewing.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.viewings.update", [$viewing->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="name">{{ trans('cruds.viewing.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $viewing->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="email">{{ trans('cruds.viewing.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $viewing->email) }}" required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.email_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="phone">{{ trans('cruds.viewing.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $viewing->phone) }}" required>
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.phone_helper') }}</span>
                </div>
                <div class="form-group col-md-12">
                    <label for="message">{{ trans('cruds.viewing.fields.message') }}</label>
                    <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message">{{ old('message', $viewing->message) }}</textarea>
                    @if($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.message_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="date">{{ trans('cruds.viewing.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $viewing->date) }}">
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.date_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="time">{{ trans('cruds.viewing.fields.time') }}</label>
                    <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text" name="time" id="time" value="{{ old('time', $viewing->time) }}">
                    @if($errors->has('time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.time_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="property_id">{{ trans('cruds.viewing.fields.property') }}</label>
                    <select class="form-control select2 {{ $errors->has('property') ? 'is-invalid' : '' }}" name="property_id" id="property_id">
                        @foreach($properties as $id => $entry)
                            <option value="{{ $id }}" {{ (old('property_id') ? old('property_id') : $viewing->property->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('property'))
                        <div class="invalid-feedback">
                            {{ $errors->first('property') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.viewing.fields.property_helper') }}</span>
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
