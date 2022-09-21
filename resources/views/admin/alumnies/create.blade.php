@extends('layouts.homepage')

@section('content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                    <button type="button" class="btn close" style="width: 20px !important" data-dismiss="alert">x</button>
                    <strong style="text-align:center">Registered Successfully!</strong>
                </div>
                <h4 class="card-title">Alumni Registration</h4>
                <form id="alumni_create_form" class="form-sample" method="POST" action="{{ route('alumnies.store') }}" enctype="multipart/form-data">
                    @csrf
                    <p class="card-description border-bottom p-3"> Personal Information </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" />
                                    <span class="text-danger small error-text name_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="gender">
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <span class="text-danger small error-text gender_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date of Birth</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="date_of_birth" placeholder="dd/mm/yyyy" />
                                    <span class="text-danger small error-text date_of_birth_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Contact Number</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" />
                                    <span class="text-danger small error-text phone_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Maritial Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="maritial_status">
                                        <option></option>
                                        <option>Married</option>
                                        <option>Single</option>
                                        <option>Divorced</option>
                                    </select>
                                    <span class="text-danger small error-text maritial_status_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Blood Group</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="blood_group">
                                        <option></option>
                                        <option>A+</option>
                                        <option>B+</option>
                                        <option>AB+</option>
                                        <option>O+</option>
                                        <option>A-</option>
                                        <option>B-</option>
                                        <option>AB-</option>
                                        <option>O-</option>
                                    </select>
                                    <span class="text-danger small error-text blood_group_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Present Address</label>
                                <div class="col-sm-8">
                                    <input type="text" name="present_address" class="form-control" />
                                    <span class="text-danger small error-text present_address_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Permanent Address</label>
                                <div class="col-sm-8">
                                    <input type="text" name="permanent_address" class="form-control" />
                                    <span class="text-danger small error-text permanent_address_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" />
                                    <span class="text-danger small error-text email_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" />
                                    <span class="text-danger small error-text password_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input name="donate_blood" class="form-check-input" type="checkbox" value="1"  {{ old('donate_blood') ? 'checked="checked"' : '' }} id="donateBlood">
                                <label class="form-check-label" for="donateBlood">
                                    Donate Blood
                                </label>
                            </div>
                            <span class="text-danger small error-text donate_blood_error" ></span>
                        </div>
                    </div>
                   

                    <p class="card-description border-bottom p-3"> Academic Information </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="department_id">
                                        <option selected></option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}"> {{ $department->name }} </option>
                                        @endforeach
                                    
                                    </select>
                                    <span class="text-danger small error-text department_id_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Student ID</label>
                                <div class="col-sm-8">
                                    <input type="text" name="student_id" class="form-control" />
                                    <span class="text-danger small error-text student_id_error" ></span>
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Batch</label>
                                <div class="col-sm-8">
                                    <input type="number" name="batch" class="form-control" />
                                    <span class="text-danger small error-text batch_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">CGPA</label>
                                <div class="col-sm-8">
                                    <input type="text" name="cgpa" class="form-control" />
                                    <span class="text-danger small error-text cgpa_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Passing Year</label>
                                <div class="col-sm-8">
                                    <input type="text" name="passing_year" class="form-control" />
                                    <span class="text-danger small error-text passing_year_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="card-description border-bottom p-3"> Professional Information </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Profession</label>
                                <div class="col-sm-8">
                                    <input type="text" name="profession" class="form-control" />
                                    <span class="text-danger small error-text profession_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Field</label>
                                <div class="col-sm-8">
                                    <input type="text" name="field" class="form-control" />
                                    <span class="text-danger small error-text field_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Organization</label>
                                <div class="col-sm-8">
                                    <input type="text" name="organization" class="form-control" />
                                    <span class="text-danger small error-text organization_error" ></span>
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
                                <label class="col-sm-4 col-form-label">Office Email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="office_email" class="form-control" />
                                    <span class="text-danger small error-text office_email_error" ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Office Address</label>
                                <div class="col-sm-8">
                                    <input type="text" name="office_address" class="form-control" />
                                    <span class="text-danger small error-text office_address_error" ></span>
                                </div>
                            </div>
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
                            <button type="submit" class="btn btn-gradient-primary btn-rounded btn-fw">Submit</button>
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
        $("#alumni_create_form").on('submit', function(e){
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
                    $("#alumni_create_form")[0].reset();
                }
            },
          });
        });
      });
    </script>


@endsection