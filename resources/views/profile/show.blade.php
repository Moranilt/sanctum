@extends('app')

@section('page-header')
    <!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<div class="author">
							<img class="author-img center-block" src="{{$user->avatar}}" alt="">
							<h1 class="text-uppercase">{{$user->name}}</h1>
							<p class="lead">{{$user->description}}</p>
							<ul class="author-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            <a href="#" class="primary-button" style="margin-top:20px;">Edit</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
@endsection

@section('content')
    @foreach($posts as $post)
        <x-post :post="$post">

        </x-post>
    @endforeach
    @if($posts->isEmpty())
        <p style="font-size:18px; text-align:center;">No posts yet... <a href="{{route('post.create')}}">Tell us something usefull by clicking on me!</a></p>
    @endif
@endsection
