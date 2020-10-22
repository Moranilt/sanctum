@extends('app')

@section('page-header')
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('img/header-1.jpg')}});" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    @foreach($post->categories as $category)
                    <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                    @endforeach
                </div>
                <h1>{{$post->title}}</h1>
                <ul class="post-meta">
                    <li><a href="{{route('user.show', $post->user->slug)}}">{{$post->user->name}}</a></li>
                    <li>{{$post->created_at->diffForHumans()}}</li>
                    <li><i class="fa fa-comments"></i> {{$post->countComments()}}</li>
                    <li><i class="fa fa-eye"></i> {{$post->countViews()}}</li>
                </ul>
            </div>
            <div class="col-md-12" style="margin-top:20px; display:flex;">
                @if(auth()->user()->id == $post->user->id)
                    <a href="{{route('post.edit', $post->slug)}}" class="primary-button" style="margin-right:10px;">Edit</a>

                    <form action="{{route('post.delete', $post->slug)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="primary-button">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- post share -->
<div class="section-row">
    <div class="post-share">
        <a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
        <a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
        <a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
        <a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
    </div>
</div>
<!-- /post share -->

<div class="section-row">
    {{$post->body}}
</div>

<!-- post tags -->
<div class="section-row">
    <div class="post-tags">
        <ul>
            <li>TAGS:</li>
            <li><a href="#">Social</a></li>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Fashion</a></li>
            <li><a href="#">Health</a></li>
        </ul>
    </div>
</div>
<!-- /post tags -->

<!-- post nav -->
<div class="section-row">
    <div class="post-nav">
        <div class="prev-post">
            <a class="post-img" href="blog-post.html"><img src="{{asset('img/widget-8.jpg')}}" alt=""></a>
            <h3 class="post-title"><a href="#">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
            <span>Previous post</span>
        </div>

        <div class="next-post">
            <a class="post-img" href="blog-post.html"><img src="{{asset('img/widget-10.jpg')}}" alt=""></a>
            <h3 class="post-title"><a href="#">Postea senserit id eos, vivendo periculis ei qui</a></h3>
            <span>Next post</span>
        </div>
    </div>
</div>
<!-- /post nav  -->

<!-- post author -->
<div class="section-row">
    <div class="section-title">
        <h3 class="title">About <a href="{{route('user.show', $post->user->slug)}}">{{$post->user->name}}</a></h3>
    </div>
    <div class="author media">
        <div class="media-left">
            <a href="{{route('user.show', $post->user->slug)}}">
                <img class="author-img media-object" src="{{asset('img/avatar-1.jpg')}}" alt="">
            </a>
        </div>
        <div class="media-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <ul class="author-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /post author -->

<!-- post comments -->
<div class="section-row">
    <div class="section-title">
        <h3 class="title">{{$post->countComments()}} Comments</h3>
    </div>
    <div class="post-comments">

        @foreach($post->comments as $comment)
        <!-- comment -->
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="{{asset('img/avatar-3.jpg')}}" alt="">
            </div>
        <div class="media-body" data-token="{{ csrf_token() }}" data-comment-id="{{$comment->id}}" data-route="{{route('comment.store', $post->slug)}}">
                <div class="media-heading">
                    <h4><a href="{{route('user.show', $comment->user->slug)}}">{{$comment->user->name}}</a></h4>
                    <span class="time">{{$comment->createdAt()}}</span>
                </div>
                <p>{{$comment->body}}</p>
                <a href="#" class="reply">Reply</a>

                @if($comment->replies)
                @foreach($comment->replies as $reply)
                <!-- comment -->
                <div class="media media-author">
                    <div class="media-left">
                        <img class="media-object" src="{{asset('img/avatar-1.jpg')}}" alt="">
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <h4><a href="{{route('user.show', $reply->user->slug)}}">{{$reply->user->name}}</a></h4>
                            <span class="time">{{$reply->createdAt()}}</span>
                        </div>
                        <p>{{$reply->body}}</p>
                    </div>
                </div>
                <!-- /comment -->

                @endforeach
                @endif
            </div>
        </div>
        <!-- /comment -->
        @endforeach
    </div>
</div>
<!-- /post comments -->


<!-- post reply -->
<div class="section-row">
    <div class="section-title">
        <h3 class="title">Leave a reply</h3>
    </div>
    <form class="post-reply" action="{{route('comment.store', $post->slug)}}">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="input" name="message" placeholder="Message"></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <button class="primary-button">Submit</button>
            </div>

        </div>
    </form>
</div>
<!-- /post reply -->
@endsection


