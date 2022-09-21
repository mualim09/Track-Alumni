@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                    <button type="button" class="btn close" style="width: 20px !important" data-dismiss="alert">x</button>
                    <strong style="text-align:center">Job Post Created Successfully!</strong>
                </div>
                <h4 class="card-title">Create Job Post</h4>
                @if(Auth::guard('staff')->user())
                    <form id="job_create_form" class="form-sample" method="POST" action="{{ route('staff.jobs.store') }}" enctype="multipart/form-data">
                @elseif(Auth::guard('alumni')->user())
                    <form id="job_create_form" class="form-sample" method="POST" action="{{ route('alumni.jobs.store') }}" enctype="multipart/form-data">
                @else
                    <form id="job_create_form" class="form-sample" method="POST" action="{{ route('admin.jobs.store') }}" enctype="multipart/form-data">
                @endif
                    @csrf
                    <p class="card-description border-bottom p-3"> </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Company Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" class="form-control" />
                                    <span class="text-danger small error-text title_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Designation</label>
                                <div class="col-sm-8">
                                    <input type="text" name="designation" class="form-control" />
                                    <span class="text-danger small error-text designation_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Experience Required</label>
                                <div class="col-sm-8">
                                    <input type="text" name="experience_required" class="form-control" />
                                    <span class="text-danger small error-text experience_required_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Salary</label>
                                <div class="col-sm-8">
                                    <input type="text" name="salary" class="form-control" />
                                    <span class="text-danger small error-text salary_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
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
        $("#job_create_form").on('submit', function(e){
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
                    $("#job_create_form")[0].reset();
                }
            },
          });
        });
      });
    </script>


@endsection