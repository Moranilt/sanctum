@extends('app')
@section('page-header')
    <!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url({{asset('img/header-2.jpg')}});" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
                    <h4 class="text-uppercase" style="color:#fafafa;">All posts for</h4>
                    <h1 class="text-uppercase">#{{$tag->name}}</h1>
					</div>
				</div>
			</div>
		</div>
        <!-- /PAGE HEADER -->
@endsection


@section('content')
                <x-last-post :post="$tag->posts->last()"></x-last-post>
                @foreach($tag->posts()->orderBy('created_at', 'desc')->get() as $post)
                <x-post :post="$post"></x-post>
                @endforeach
                <div class="section-row loadmore text-center">
                    <a href="#" class="primary-button">Load More</a>
                </div>
@endsection

