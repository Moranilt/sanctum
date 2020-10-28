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
<div class="followers">
    @foreach($followers as $follower)

        <div class="follower">
            <a href="{{route('user.show', $follower->slug)}}">

                <img src="{{$follower->avatar}}" alt="">
                {{$follower->name}}

            </a>
        </div>

    @endforeach
</div>
@endsection
