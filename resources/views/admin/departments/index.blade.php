@extends('layouts.admin')

@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title">Departments Table</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" id="search" name="search" class="form-control" placeholder="Search department by name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="allData">
                        @foreach($departments as $department)
                        <tr>
                            <td> {{ $department->name }} </td>
                            <td>
                                <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/departments/'.$department->id.'/edit') }}"><label class="badge badge-info">Edit</label></a>
                                <a class="text-decoration-none text-white pe-auto" href="{{ url('admin/departments/'.$department->id.'/delete') }}"><label class="badge badge-danger">Delete</label></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody id="searchData">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

    $('#search').on('keyup', function(){
        $value = $(this).val();
        if($value){
            $('#allData').hide();
            $('#searchData').show();
        }
        else{
            $('#allData').show();
            $('#searchData').hide();
        }

        $.ajax({
            type : 'get',
            url : "{{URL::to('departments/search')}}",
            data : {'search' : $value},

            success: function(data){
                $('#searchData').html(data);
            }
        });
    })

</script>


@endsection
