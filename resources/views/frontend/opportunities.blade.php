@extends('layouts.homepage')

@section('content')

<h1 class="h2 text-center my-5"> Job Posts</h1>
        <div class="row px-5">
            @foreach($jobs as $job)
            <div class="col-lg-4 col-sm-6 my-4">
				<article class="mb-5">
					<div class="post-slider slider-sm">
						
					</div>
					<h3 class="h5"><a class="post-title" href="{{ route('front.jobs.show', $job->id ) }}">{{ $job->title }}</a></h3>
					<ul class="list-inline post-meta mb-2">
                    <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">{{ $job->user->name }}</a>
                    </li>
                    <li class="list-inline-item">Date : {{ $job->created_at }}</li>
					</ul>
					<p>{{Str::limit($job->description, 50)}}</p>	<a href="{{ route('front.jobs.show', $job->id ) }}" class="btn btn-outline-primary">Continue Reading</a>
				</article>
			</div>
            @endforeach
        <div>

@endsection