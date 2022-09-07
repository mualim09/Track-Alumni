@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Job Posts Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                           
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->designation }}</td>
                            <td>{{ $job->description }}</td>
                            <td>
                            <a class="text-decoration-none text-white pe-auto" href="{{ url('/jobs/'.$job->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                <a class="text-decoration-none text-white pe-auto" href="{{ url('/jobs/'.$job->id.'/delete') }}"><label class="badge badge-danger">Delete</label></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection