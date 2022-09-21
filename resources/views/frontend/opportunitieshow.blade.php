@extends('layouts.homepage')

@section('content')

<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3 text-center">Company Name: {{ $job->title }}</h1>
                <h1 class="h4 mb-3 text-center">Designation: {{ $job->designation }}</h1>
                <h1 class="h4 mb-3 text-center">Experience Required: {{ $job->experience_required }}</h1>
                <h1 class="h4 mb-3 text-center">Salary: {{ $job->salary }}</h1>
				<ul class="list-inline post-meta mb-3 text-center">
					
					<li class="list-inline-item">Posted date : {{ $job->created_at }}</li>
					</a>
					</li>
				</ul>
			</div>

			<div class="col-lg-10 mx-auto">
				<div class="content">
					<h3 class="text-center">Job Description</h3>
					<p class="text-center">{{ $job->description }}</p>
				</div>
			</div>
		</article>
	</div>
    
</section>


@endsection