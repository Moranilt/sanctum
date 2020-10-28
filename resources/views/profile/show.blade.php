@extends('app')

@section('page-header')
    <!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<div class="author">
                            <img class="author-img center-block" src="{{$user->avatar}}" alt="">
                            @if($user->isAdmin)
                            <span class="user-role">{{$user->roles->first()->name}}</span>
                            @endif
                            <h1 class="text-uppercase">{{$user->name}} </h1>

							<p class="lead">{{$user->description}}</p>
							<ul class="author-social">
                                @if($user->facebook)
                                <li><a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if($user->twitter)
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if($user->google)
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                @endif
                                @if($user->instagram)
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                @endif
                            </ul>
                            <div class="flex-buttons" style="margin-top:20px;">
                                @if(auth()->user()->isAdmin || auth()->user()->id == $user->id)
                                <a href="{{route('user.edit', $user->slug)}}" class="primary-button">Edit</a>
                                @endif
                                @if(auth()->user()->id != $user->id)
                                <form action="{{route('follow', $user->slug)}}" method="POST">
                                    @csrf
                                    <button class="primary-button">
                                        @if(auth()->user()->following($user))
                                        Unfollow
                                        @else
                                        Follow
                                        @endif
                                    </button>
                                </form>
                                @endif
                            </div>
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
