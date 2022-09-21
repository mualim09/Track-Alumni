@extends('layouts.homepage')

@section('content')
<h1 class="h2 text-center my-5"> Our Alumnies</h1>
        <div class="row px-5">
            @foreach($alumnies as $alumni)
            <div class="col-lg-4 col-sm-6 my-4">
				<article class="mb-5">
					<div class="post-slider slider-sm">
						<img style="height:200px; width:380px" loading="lazy" src="{{ asset('storage//uploads/images/alumnies/' . $alumni->image) }}" class="img-fluid" alt="post-thumb">
					</div>
					<h3 class="h5"><a class="post-title" href="{{ route('front.alumnies.show', $alumni->id ) }}">{{ $alumni->name }}</a></h3>
					<ul class="list-inline post-meta mb-2">
                    </li>
                    <li class="list-inline-item">Department : {{ $alumni->department->name }}</li>
					</ul>
					<p></p>	<a href="{{ route('front.alumnies.show', $alumni->id ) }}" class="btn btn-outline-primary">View Profile</a>
				</article>
			</div>
            @endforeach
        <div>
@endsection