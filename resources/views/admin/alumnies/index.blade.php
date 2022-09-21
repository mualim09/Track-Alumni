@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alumni Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Batch</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Passing Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnies as $alumni)
                        <tr>
                            <td>{{ $alumni->name }}</td>
                            <td>{{ $alumni->department->name }}</td>
                            <td>{{ $alumni->batch }}</td>
                            <td>{{ $alumni->email }}</td>
                            <td>{{ $alumni->phone }}</td>
                            <td>{{ $alumni->gender }}</td>
                            <td>{{ $alumni->passing_year }}</td>
                            @if(Auth::guard('alumni')->user())
                            <td><a class="text-white" href="{{ route('alumnies.show', $alumni->id ) }}"><button type="button" class="btn btn-info"> View </button></a></td>
                            @elseif(Auth::guard('staff')->user())
                            <td><a class="text-white" href="{{ route('staff.alumnies.show', $alumni->id ) }}"><button type="button" class="btn btn-info"> View </button></a></td>
                            @else
                            <td><a class="text-white" href="{{ route('admin.alumnies.show', $alumni->id ) }}"><button type="button" class="btn btn-info"> View </button></a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection