<div class="post post-row">
    <a class="post-img" href="{{route('post.show', $post->slug)}}"><img src="{{$post->preview}}" alt=""></a>
    <div class="post-body">
        <div class="post-category">
            @foreach($post->categories as $category)
                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
            @endforeach
        </div>
        <h3 class="post-title"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h3>
        <ul class="post-meta">
            <li><a href="author.html">{{$post->user->name}}</a></li>
            <li>{{$post->created_at->diffForHumans()}}</li>
        </ul>
        <p>{{$post->excerpt}}</p>
    </div>
</div>
