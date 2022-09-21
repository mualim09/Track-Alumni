@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                    <button type="button" class="btn close" style="width: 20px !important" data-dismiss="alert">x</button>
                    <strong style="text-align:center">Event Updated Successfully!</strong>
                </div>
                <h4 class="card-title">Edit Event</h4>
                @if(Auth::guard('staff')->user())
                    <form id="event_create_form" class="form-sample" method="POST" action="{{ route('staff.events.update', $event->id) }}" enctype="multipart/form-data">
                @elseif(Auth::guard('alumni')->user())
                    <form id="event_create_form" class="form-sample" method="POST" action="{{ route('alumni.events.update', $event->id) }}" enctype="multipart/form-data">
                @else
                    <form id="event_create_form" class="form-sample" method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                @endif
                    @csrf
                    <p class="card-description border-bottom p-3"> </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" value="{{ $event->name }}"/>
                                    <span class="text-danger small error-text name_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Location</label>
                                <div class="col-sm-8">
                                    <input type="text" name="location" class="form-control" value="{{ $event->location }}"/>
                                    <span class="text-danger small error-text location_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Event Date</label>
                                <div class="col-sm-8">
                                    <input type="date" name="start_date" class="form-control" value="{{ $event->start_date }}"/>
                                    <span class="text-danger small error-text start_date_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Event Time</label>
                                <div class="col-sm-8">
                                    <input type="time" name="start_time" class="form-control" value="{{ $event->start_time }}"/>
                                    <span class="text-danger small error-text start_time_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $event->description }}</textarea>
                                    <span class="text-danger small error-text description_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="status">Status</label>
                            <select name="status" class="form-select" aria-label="Default select example">
                                <option selected></option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <span class="text-danger small error-text status_error" ></span>
                        </div>
                    </div>
                    
                   
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Image upload</label>
                            <div class="input-group col-xs-12">
                                <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                            </div>
                            <span class="text-danger small error-text image_error"></span>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      // Validation error message
      $(function(){
        $("#event_create_form").on('submit', function(e){
          e.preventDefault();
          $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data: new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('html, body').animate({ scrollTop: 0 }, 0);
                    $("#success-alert").fadeIn(800);
                    setTimeout(function(){
                        $("#success-alert").fadeOut();
                    }, 5000);
                    $(".close").click(function(){
                        $("#success-alert").fadeOut(800);
                    });
                    $("#event_create_form")[0].reset();
                }
            },
          });
        });
      });
    </script>


@endsection