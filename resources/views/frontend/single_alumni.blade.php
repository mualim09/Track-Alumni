@extends('layouts.homepage')

@section('content')

<section class="section-sm border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-bordered mb-5 d-flex align-items-center">
					<h1 class="h4">{{ $alumni->name }}</h1>
					<ul class="list-inline social-icons ml-auto mr-3 d-none d-sm-block">
						<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a>
						</li>
						<li class="list-inline-item"><a href="#"><i class="ti-github"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 mb-4 mb-md-0 text-center text-md-left">
				<img loading="lazy" class="rounded-lg img-fluid" src="{{ asset('storage/uploads/images/alumnies/' . $alumni->image) }}">
			</div>
			<div class="col-lg-9 col-md-8 content text-center text-md-left">
				<ul class="ml-auto mr-3 d-none d-sm-block">
                    <li><span class="font-weight-bold">Name :</span> {{ $alumni->name }}</li>
                    <li><span class="font-weight-bold">Gender : </span> {{ $alumni->gender }}</li>
                    <li><span class="font-weight-bold">Date of Birth : </span> {{ $alumni->date_of_birth }}</li>
                    <li><span class="font-weight-bold">Email : </span> {{ $alumni->email }}</li>
                    <li><span class="font-weight-bold">Department : </span> {{ $alumni->department }}</li>
                    <li><span class="font-weight-bold">Company Name : </span> {{ $alumni->company_name }}</li>
                </ul>
			</div>
		</div>
	</div>
</section>


@endsection