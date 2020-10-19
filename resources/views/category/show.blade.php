@extends('app')
@section('page-header')
    <!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url({{asset('img/header-2.jpg')}});" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase">{{$category->title}}</h1>
					</div>
				</div>
			</div>
		</div>
        <!-- /PAGE HEADER -->
@endsection


@section('content')
                <x-last-post></x-last-post>
                <x-post></x-post>
                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Load More</a>
                </div>
@endsection

