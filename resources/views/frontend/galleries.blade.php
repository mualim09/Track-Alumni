@extends('layouts.homepage')

@section('content')
<h1 class="h2 text-center my-5"> Our Galleries</h1>
        <div class="row px-5">
            @foreach($galleries as $gallery)
            <div class="col-lg-4 col-sm-6 my-4">
				<article class="mb-5">
					<div class="post-slider slider-sm">
						<img style="height:200px; width:380px" loading="lazy" src="{{ asset('storage/uploads/images/galleries/' . $gallery->image) }}" class="img-fluid" alt="post-thumb">
					</div>
					<h3 class="h5">{{ $gallery->title }}</a></h3>
					<h3 class="h3">{{ $gallery->event->name }}</h3>
				</article>
			</div>
            @endforeach
        <div>
@endsection