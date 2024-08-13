@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} Subtype
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.subtypes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="parent_property_id">Parent Property Type</label>
                    <select name="parent_property_id" class="form-control" required>
                        @foreach($propertyTypes as $id => $propertyType)
                            <option value="{{ $id }}">{{ $propertyType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
