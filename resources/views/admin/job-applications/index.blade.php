@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
           Applications {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Developer">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CV</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                <tr>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->email }}</td>
                    <td><a href="{{ url('storage/cvs/' . basename($application->cv)) }}" target="_blank">View CV</a>
                    </td>
                    <td><a href="{{ route('admin.job-applications.show', $application->id) }}">View Details</a></td>
                </tr>
            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
