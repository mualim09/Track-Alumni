@extends('layouts.homepage')

@section('content')

<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3 text-center">Company Name: {{ $job->title }}</h1>
                <h1 class="h4 mb-3 text-center">Designation: {{ $job->designation }}</h1>
				<ul class="list-inline post-meta mb-3 text-center">
					<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="">Posted by: {{ $job->user->name }}</a>
					</li>
					<li class="list-inline-item">Date : {{ $job->created_at }}</li>
					</a>
					</li>
				</ul>
			</div>

			<div class="col-lg-10 mx-auto">
				<div class="content">
					<p>{{ $job->description }}</p>
				</div>
			</div>
		</article>
	</div>
    
</section>


@endsection