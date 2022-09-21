@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Events Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Event Date</th>
                            <th>Event Time</th>
                            <th>Status</th>
                            @if(Auth::guard('alumni')->user())

                            @else
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td><img style="height:50px;" src="{{ asset('storage/uploads/images/events/' . $event->image) }}" alt=""></td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->start_time }}</td>
                            <td>{{ $event->status }}</td>
                            @if(Auth::guard('staff')->user())
                            <td>
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('staff/events/'.$event->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('staff/events/'.$event->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                            </td>
                                @elseif(Auth::guard('alumni')->user())
                                    
                                @else
                                <td>
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/events/'.$event->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/events/'.$event->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                                </td>
                                @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection