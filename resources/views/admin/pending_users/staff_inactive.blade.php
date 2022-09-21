@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pending Staffs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staffs as $staff)
                        <tr>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->email }}</td> 
                            <td>{{ $staff->designation }}</td> 
                            <td>{{ $staff->gender }}</td>
                            <td><button type="button" class="btn btn-danger" disabled='true'>Pending</button>
                            <td><a class="text-white" href="{{ route('admin.staffs.pending_staff_edit', $staff->id ) }}"><button type="button" class="btn btn-info"> Edit </button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection