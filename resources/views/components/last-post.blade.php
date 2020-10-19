<div class="post post-thumb">
    <a class="post-img" href="blog-post.html"><img src="{{asset('img/hot-post-3.jpg')}}" alt=""></a>
    <div class="post-body">
        <div class="post-category">
            @foreach($post->categories as $category)
            <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
            @endforeach
        </div>
        <h3 class="post-title title-lg"><a href="blog-post.html">{{$post->title}}</a></h3>
        <ul class="post-meta">
            <li><a href="author.html">{{$post->user->name}}</a></li>
            <li>{{$post->created_at->diffForHumans()}}</li>
        </ul>
    </div>
</div>
