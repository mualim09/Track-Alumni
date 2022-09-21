@extends('layouts.homepage')

@section('content')
<h1 class="h2 text-center my-5"> Upcoming Trainings</h1>
        <div class="row px-5">
            @foreach($trainings as $training)
            <div class="col-lg-4 col-sm-6 my-4">
				<article class="mb-5">
					<div class="post-slider slider-sm">
						<img style="height:200px; width:380px" loading="lazy" src="{{ asset('storage/uploads/images/trainings/' . $training->image) }}" class="img-fluid" alt="post-thumb">
					</div>
					<h3 class="h5"><a class="post-title" href="{{ route('front.trainings.show', $training->id ) }}">{{ $training->topic }}</a></h3>
					<ul class="list-inline post-meta mb-2">
                   
                    </li>
                    <li class="list-inline-item">Date : {{ $training->created_at }}</li>
					</ul>
					<p>{{Str::limit($training->description, 50)}}</p>	<a href="{{ route('front.trainings.show', $training->id ) }}" class="btn btn-outline-primary">Continue Reading</a>
				</article>
			</div>
            @endforeach
        <div>
@endsection