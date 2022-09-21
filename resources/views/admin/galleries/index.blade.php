@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Galleries</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Gallery Title</th>
                            <th>Event</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                        <tr>
                            <td><img style="height:50px;" src="{{ asset('storage/uploads/images/galleries/' . $gallery->image) }}" alt=""></td>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->event->name }}</td>
                            <td>
                            @if(Auth::guard('staff')->user())
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('staff/galleries/'.$gallery->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('staff/galleries/'.$gallery->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                                @elseif(Auth::guard('alumni')->user())
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('alumni/galleries/'.$gallery->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('alumni/galleries/'.$gallery->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
                                    </a>
                                @else
                                    <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/galleries/'.$gallery->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                        <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/galleries/'.$gallery->id.'/delete') }}"><label class="badge badge-danger">Delete</label>
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