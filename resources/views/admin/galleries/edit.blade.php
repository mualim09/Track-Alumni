@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                    <button type="button" class="btn close" style="width: 20px !important" data-dismiss="alert">x</button>
                    <strong style="text-align:center">Gallery Updated Successfully!</strong>
                </div> 
                <h4 class="card-title">Create Gallery</h4> 
                @if(Auth::guard('staff')->user())
                    <form id="gallery_create_form" class="form-sample" method="POST" action="{{ route('staff.galleries.update', $gallery->id) }}" enctype="multipart/form-data">
                @elseif(Auth::guard('alumni')->user())
                    <form id="gallery_create_form" class="form-sample" method="POST" action="{{ route('alumni.galleries.update', $gallery->id) }}" enctype="multipart/form-data">
                @else
                    <form id="gallery_create_form" class="form-sample" method="POST" action="{{ route('admin.galleries.update', $gallery->id) }}" enctype="multipart/form-data">
                @endif
                    @csrf
                    <p class="card-description border-bottom p-3"> </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gallery Title</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" class="form-control" value="{{ $gallery->title }}"/>
                                    <span class="text-danger small error-text title_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row my-3">
                        <div class="col-md-6">
                            <label for="status">Event </label>
                            <select name="event_id" class="form-select" aria-label="Default select example">
                                <option selected></option>
                                @foreach($events as $event)
                                        <option value="{{$event->id}}"
                                            @if($gallery->event->id == $event->id)
                                                selected 
                                            @endif
                                        >{{ $event->name }}</option>
                                        @endforeach
                            </select>
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
        $("#gallery_create_form").on('submit', function(e){
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
                    $("#gallery_create_form")[0].reset();
                }
            },
          });
        });
      });
    </script>


@endsection