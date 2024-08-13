@extends('layouts.admin')
@section('content')
@can('property_type_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.subtypes.create') }}">
                    {{ trans('global.add') }} Sub Type
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Subtypes {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-Subtype">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Parent Property Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subtypes as $subtype)
                            <tr>
                                <td>{{ $subtype->name }}</td>
                                <td>{{ $subtype->propertyType->name ?? '' }}</td>
                                <td>
                                    <a href="{{ route('admin.subtypes.show', $subtype->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('admin.subtypes.edit', $subtype->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.subtypes.destroy', $subtype->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
