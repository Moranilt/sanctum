<x-master>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="./img/hot-post-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="./img/hot-post-2.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="./img/hot-post-3.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Fashion</a>
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Recent posts</h2>
							</div>
						</div>
                        <!-- post -->
                        @foreach($last_posts as $post)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{route('post.show', $post->slug)}}"><img src="./img/post-1.jpg" alt=""></a>
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
								</div>
							</div>
                        </div>
                        @endforeach
						<!-- /post -->


					</div>
					<!-- /row -->

                    @foreach($categories as $category)
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{$category->title}}</h2>
							</div>
                        </div>
                        @foreach($category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
						<!-- post -->
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="blog-post.html"><img src="./img/post-9.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html">{{$post->title}}</a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$post->user->name}}</a></li>
										<li>{{$post->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
						</div>
                        <!-- /post -->
                        @endforeach

					</div>
					<!-- /row -->
                    @endforeach

                </div>
                <div class="col-md-4">
                    <x-sidebar>
                    </x-sidebar>
                </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	{{-- <!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ad -->
				<div class="col-md-12 section-row text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-2.jpg" alt="">
					</a>
				</div>
				<!-- /ad -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION --> --}}

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                @foreach($categories as $category)
				<div class="col-md-4">
					<div class="section-title">
						<h2 class="title">{{$category->title}}</h2>
					</div>
					<!-- post -->
					<div class="post">
						<a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
                                @foreach($category->posts()->latest()->first()->categories as $category2)
                                <a href="{{route('category.show', $category2->slug)}}">{{$category2->title}}</a>
                                @endforeach
							</div>
							<h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
                </div>
                @endforeach

			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<div class="col-md-4">
                    @foreach(App\Post::all()->random(3) as $post)
					<!-- post -->
					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./img/widget-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
                                @foreach($post->categories as $category)
                                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                                @endforeach
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{$post->title}}</a></h3>
						</div>
					</div>
                    <!-- /post -->
                    @endforeach


				</div>
				<div class="col-md-4">
					@foreach(App\Post::all()->random(3) as $post)
					<!-- post -->
					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./img/widget-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
                                @foreach($post->categories as $category)
                                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                                @endforeach
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{$post->title}}</a></h3>
						</div>
					</div>
                    <!-- /post -->
                    @endforeach
				</div>
				<div class="col-md-4">
					@foreach(App\Post::all()->random(3) as $post)
					<!-- post -->
					<div class="post post-widget">
						<a class="post-img" href="blog-post.html"><img src="./img/widget-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
                                @foreach($post->categories as $category)
                                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                                @endforeach
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{$post->title}}</a></h3>
						</div>
					</div>
                    <!-- /post -->
                    @endforeach
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
                    <!-- post -->
                    @foreach(App\Post::latest()->take(6)->get() as $post)
					<div class="post post-row">
						<a class="post-img" href="blog-post.html"><img src="./img/post-13.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								@foreach($post->categories as $category)
                                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                                @endforeach
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{$post->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$post->user->name}}</a></li>
								<li>{{$post->createdAt()}}</li>
							</ul>
							<p>{{$post->excerpt}}</p>
						</div>
                    </div>
                    @endforeach
					<!-- /post -->



					<div class="section-row loadmore text-center">
						<a href="#" class="primary-button">Load More</a>
					</div>
				</div>
				<div class="col-md-4">
					<!-- galery widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Instagram</h2>
						</div>
						<div class="galery-widget">
							<ul>
								<li><a href="#"><img src="./img/galery-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-4.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-5.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-6.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>
					<!-- /galery widget -->

					<!-- Ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /Ad widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



</x-master>
