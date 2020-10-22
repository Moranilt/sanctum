@extends('app')

@section('page-header')
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-size:cover;background-image: url({{$post->preview}});" data-stellar-background-ratio="0.3"></div>
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
            @auth
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
            @endauth
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
            @foreach($post->tags as $tag)
            <li><a href="{{route('tag.show', $tag->slug)}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /post tags -->

<!-- post nav -->
<div class="section-row">
    <div class="post-nav">
        @if($previous)
        <div class="prev-post">
            <a class="post-img" href="{{route('post.show', $previous->slug)}}"><img src="{{$previous->preview}}" alt=""></a>
            <h3 class="post-title"><a href="{{ route('post.show', $previous->slug) }}">{{$previous->excerpt}}</a></h3>
            <span>Previous post</span>
        </div>
        @endif
        @if($next)
        <div class="next-post">
            <a class="post-img" href="{{route('post.show', $next->slug)}}"><img src="{{$next->preview}}" alt=""></a>
            <h3 class="post-title"><a href="{{route('post.show', $next->slug)}}">{{$next->excerpt}}</a></h3>
            <span>Next post</span>
        </div>
        @endif
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
                <img class="author-img media-object" src="{{$post->user->avatar}}" alt="">
            </a>
        </div>
        <div class="media-body">
            <p>{{$post->user->description}}</p>
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
                <img class="media-object" src="{{$comment->user->avatar}}" alt="">
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
                        <img class="media-object" src="{{$reply->user->avatar}}" alt="">
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


