<x-master>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="section-row">
						<div class="section-title">
							<h2 class="title">Create Post</h2>
						</div>
                        <form action="{{route('post.update', $post->slug)}}" method="post">
                            @method('PATCH')
                            @csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('title')error @enderror" type="text" name="title" placeholder="Title" value="{{$post->title}}">
                                        @error('title')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>
                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2 class="title">Categories</h2>
                                    </div>
                                        @foreach(App\Category::all() as $category)
                                        <div class="checkbox">
                                            <label for="{{$category->id}}">
                                                <input
                                                @foreach($post->categories as $cat)
                                                @if($category->id == $cat->id) checked @endif
                                                @endforeach
                                                type="checkbox" name="categories[]" id="{{$category->id}}" value="{{$category->id}}">{{$category->title}}
                                            </label>
                                        </div>
                                        @endforeach

                                </div>
								<div class="col-md-12">
									<div class="form-group">
                                    <textarea class="input @error('body')error @enderror" name="body" placeholder="Enter text here...">{{$post->body}}</textarea>
                                        @error('description')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-master>
