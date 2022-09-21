@extends('layouts.homepage')

@section('content')

<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3 text-center">{{ $event->name }}</h1>
				<h1 class="h4 mb-3 text-center">The event will held at {{ $event->start_date }} on {{$event->start_time}}</h1>
				<h1 class="h4 mb-3 text-center">Location: {{ $event->location }}</h1>
				<ul class="list-inline post-meta mb-3 text-center">
					<li class="list-inline-item">Date : {{ $event->created_at->format('j F, Y') }}</li>
				</ul>
			</div>
			<div class="col-12 mb-3">
				<div class="post-slider text-center">
					<img style="height:450px;width:600px" src="{{ asset('storage/uploads/images/events/' . $event->image) }}" class="img-fluid" alt="post-thumb">
				</div>
			</div>
			<div class="col-lg-10 mx-auto">
				<div class="content">
					<p>{{ $event->description }}</p>
				</div>
			</div>
			<div class="row justify-content-center">
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
				<button type="submit" class="btn btn-info display-block">Post</button>
			</div>
		</div>
	</div>
    
</section>


@endsection

@section('script')

	<script>
		const attend = document.getElementById('attend');
		const cancel = document.getElementById('cancel');

		
	</script>

@endsection