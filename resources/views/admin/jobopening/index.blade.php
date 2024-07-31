@extends('layouts.admin')
@section('content')
    @can('developer_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.jobopenings.create') }}">
                    {{ trans('global.add') }} Job
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
           Job {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Developer">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobOpenings as $jobOpening)
                            <tr>
                                                            <td>{{ $jobOpening->title }}</td>
                                <td>{{ $jobOpening->description }}</td>
                                <td>{{ $jobOpening->location }}</td>
                                <td>{{ $jobOpening->type }}</td>
                                <td>

                                    <a href="{{ route('admin.jobopenings.edit', $jobOpening->id) }}" class="btn btn-warning">Edit</a>

                                    <form action="{{ route('admin.jobopenings.destroy', $jobOpening->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn  btn-danger" value="{{ trans('global.delete') }}">
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
