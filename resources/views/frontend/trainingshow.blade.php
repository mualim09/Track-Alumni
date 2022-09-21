@extends('layouts.homepage')

@section('content')

<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3 text-center">{{ $training->topic }}</h1>
				<ul class="list-inline post-meta mb-3 text-center">
                    <h4 class="h4">Started from {{ $training->start_date }}</h4>
                    <h4 class="h4">Training will be held in {{ $training->location }} at {{ $training->start_time }}</h4>
                    <h4 class="h4">Last date of registration is {{ $training->last_date }}. So, hurry up!</h4>
					<li class="list-inline-item">Date : {{ $training->created_at->format('j F, Y') }}</li>
				</ul>
			</div>
			<div class="col-12 mb-3">
				<div class="post-slider text-center">
					<img style="height:500px;width:600px" src="{{ asset('storage/uploads/images/trainings/' . $training->image) }}" class="img-fluid" alt="post-thumb">
				</div>
			</div>
			<div class="col-lg-10 mx-auto">
				<div class="content">
                    <h2 class="text-center">About Training</h2>
					<p>{{ $training->description }}</p>
				</div>
                <div class="quote"> <i class="ti-quote-left"></i>
                    <div>
                        <p>Referenced by-</p> <span class="quote-by"> - {{ $training->reference_contact_name }}</span> 
                        <p>Referenced Contact-</p> <span class="quote-by"> - {{ $training->reference_contact_number }}</span> 
                    </div>
                </div>
			</div>
			<div class="row justify-content-center my-3">
				<div class="col-md-6">
					<button id="attend" type="button" class="btn btn-info"><a class="text-white" href="">Attend</a></button>
				</div>
				<div class="col-md-6">
					<button id="cancel" type="button" class="btn btn-danger" disabled=true><a class="text-white" href="">Cancel</a></button>
				</div>
			</div>
		</article>
        <div class="row"> 
        
		<div class="col-md-6">
			<h5>Comment Here</h5>
				<textarea name="comment" id="" cols="50" rows="4"></textarea>
				<button type="submit" class="btn btn-info">Post</button>
			</div>
		</div>
	</div>
    
</section>


@endsection
