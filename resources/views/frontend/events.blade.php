@extends('layouts.homepage')

@section('content')
<h1 class="h2 text-center my-5"> Upcoming Events</h1>
        <div class="row px-5">
            @foreach($events as $event)
            <div class="col-lg-4 col-sm-6 my-4">
				<article class="mb-5">
					<div class="post-slider slider-sm">
						<img style="height:200px; width:380px" loading="lazy" src="{{ asset('storage/uploads/images/events/' . $event->image) }}" class="img-fluid" alt="post-thumb">
					</div>
					<h3 class="h5"><a class="post-title" href="{{ route('front.events.show', $event->id ) }}">{{ $event->name }}</a></h3>
					<ul class="list-inline post-meta mb-2">
                    <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">{{ $event->user->name }}</a>
                    </li>
                    <li class="list-inline-item">Date : {{ $event->created_at }}</li>
					</ul>
					<p>{{Str::limit($event->description, 50)}}</p>	<a href="{{ route('front.events.show', $event->id ) }}" class="btn btn-outline-primary">Continue Reading</a>
				</article>
			</div>
            @endforeach
        <div>
@endsection