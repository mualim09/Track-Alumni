@extends('layouts.admin')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success" id="success-alert" style="display:none; text-align:center;">
                    <button type="button" class="btn close" style="width: 20px !important" data-dismiss="alert">x</button>
                    <strong style="text-align:center">Department Added Successfully!</strong>
                </div>
                <h4 class="card-title">Create New Department Data</h4>
                <form id="department_create_form" class="form-sample" method="POST" action="{{ route('admin.departments.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" />
                                    <span class="text-danger small error-text name_error" ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Validation error message
        $(function(){
            $("#department_create_form").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url:$(this).attr('action'),
                    method:$(this).attr('method'),
                    data:new FormData(this),
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
                            $("#department_create_form")[0].reset();
                        }
                    },
                });
            });
        });
    </script>

    <!-- Description letter counter -->
    <script>

        const description = document.getElementById('description');
        const letter_counter = document.getElementById('letter_counter');
        const counter = document.getElementById('counter');
        const text_exceeded = document.getElementById('text_exceeded');

        description.addEventListener('input', () => {
            let letter_value = description.value.length;

            if(letter_value > 500){
                counter.classList.remove('text-primary');
                counter.classList.add('text-danger');
                text_exceeded.innerText = "Text limit exceeded!"
            }
            else{
                counter.classList.add('text-primary');
                counter.classList.remove('text-danger');
                text_exceeded.innerText = ""
            }
            letter_counter.innerHTML = letter_value;

        });

    </script>

@endsection
