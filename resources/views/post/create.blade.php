<x-master>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="section-row">
						<div class="section-title">
							<h2 class="title">Create Post</h2>
						</div>
                        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('title')error @enderror" type="text" name="title" placeholder="Title" value="{{old('title')}}">
                                        @error('title')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

                                <div class="col-md-12">
                                    <div class="section-title">
                                        <h2 class="title">Image Preview</h2>
                                    </div>
									<div class="form-group">
                                    <input class="input @error('preview')error @enderror" type="file" name="preview">
                                        @error('preview')
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
                                            <label for="{{$category->id}}"><input type="checkbox" name="categories[]" id="{{$category->id}}" value="{{$category->id}}">{{$category->title}}</label>
                                        </div>
                                        @endforeach

                                </div>

                                <div class="col-md-12">
									<div class="form-group">
                                    <input class="input @error('tags')error @enderror" type="text" name="tags" placeholder="tags" value="{{old('tags')}}">
                                        @error('tags')
                                        <span class="error">{{$message}}</span>
                                        @enderror
									</div>
                                </div>

								<div class="col-md-12">
									<div class="form-group">
                                    <textarea class="input @error('body')error @enderror" name="body" placeholder="Enter text here...">{{old('body')}}</textarea>
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
