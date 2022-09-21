@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trainings Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Department</th>
                            <th>Venue</th>
                            <th>Training Date</th>
                            <th>Training Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainings as $training)
                        <tr>
                            <td>{{ $training->topic }}</td>
                            <td>{{ $training->department->name }}</td>
                            <td>{{ $training->location }}</td>
                            <td>{{ $training->start_date }}</td>
                            <td>{{ $training->start_time }}</td>
                            <td>{{ $training->status }}</td>
                            <td>
                            @if(Auth::guard('staff')->user())
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('staff/trainings/'.$training->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('staff/trainings/'.$training->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                                @elseif(Auth::guard('alumni')->user())
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('alumni/trainings/'.$training->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('alumni/trainings/'.$training->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                                @else
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/trainings/'.$training->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/trainings/'.$training->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection