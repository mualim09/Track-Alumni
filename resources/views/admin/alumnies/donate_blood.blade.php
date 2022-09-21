@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blood Donator Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Batch</th>
                            <th>Blood Group</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnies as $alumni)
                        <tr>
                            <td>{{ $alumni->name }}</td>
                            <td>{{ $alumni->department->name }}</td>
                            <td>{{ $alumni->batch }}</td>
                            <td>{{ $alumni->blood_group }}</td>
                            <td>{{ $alumni->email }}</td>
                            <td>{{ $alumni->phone }}</td>
                            <td>{{ $alumni->gender }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection