@extends('layouts.homepage')

@section('content')

<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3 text-center">{{ $event->name }}</h1>
				<ul class="list-inline post-meta mb-3 text-center">
					<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="">{{ $event->user->name }}</a>
					</li>
					<li class="list-inline-item">Date : {{ $event->created_at }}</li>
					</a>
					</li>
				</ul>
			</div>
			<div class="col-12 mb-3">
				<div class="post-slider text-center">
					<img src="{{ asset('storage/uploads/images/events/' . $event->image) }}" class="img-fluid" alt="post-thumb">
				</div>
			</div>
			<div class="col-lg-10 mx-auto">
				<div class="content">
					<p>{{ $event->description }}</p>
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