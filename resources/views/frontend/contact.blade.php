@extends('layouts.homepage')

@section('content')

<div class="row justify-content-center my-3">
    <div class="col-md-8">
        
<h2>Contact US</h2>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Contact</button>
</form>
    </div>
</div>

@endsection