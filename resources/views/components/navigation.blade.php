<!-- HEADER -->
<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->
                <ul class="nav-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{route('home')}}" class="logo"><img src="{{asset('/img/logo.png')}}" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns nav-login">
                    @guest
                    <ul>
                        <li><a href="/login">Sign In</a></li>
                        <li><a href="/register">Sign Up</a></li>
                    </ul>
                    @endguest
                    @auth
                    {{-- <button class="aside-btn"><span>{{auth()->user()->name}}</span><i class="fa fa-bars"></i></button> --}}
                    <a href="#" id="aside-btn" class="aside-btn"><span>{{auth()->user()->name}}</span><i class="fa fa-bars"></i></a>
                    @endauth
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div id="nav-search">
                        <form>
                            <input class="input" name="search" placeholder="Enter your search...">
                        </form>
                        <button class="nav-close search-close">
                            <span></span>
                        </button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li class="has-dropdown">
                        <a href="index.html">Home</a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <ul class="dropdown-list">
                                    <li><a href="category.html">Category page</a></li>
                                    <li><a href="blog-post.html">Post page</a></li>
                                    <li><a href="author.html">Author page</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                    <li><a href="blank.html">Regular</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="has-dropdown megamenu">
                        <a href="#">Lifestyle</a>
                        <div class="dropdown tab-dropdown">
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="tab-nav">
                                        @foreach(App\Category::all() as $category)
                                        @if($loop->first)
                                        <li class="active"><a data-toggle="tab" href="#tab{{$category->id}}">{{$category->title}}</a></li>
                                        @endif
                                        <li><a data-toggle="tab" href="#tab{{$category->id}}">{{$category->title}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="dropdown-body tab-content">
                                        <!-- tab1 -->
                                        @foreach(App\Category::all() as $category)
                                    <div id="tab{{$category->id}}" class="tab-pane fade in @if($loop->first)active @endif">
                                            <div class="row">
                                                @foreach($category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                                                <!-- post -->
                                                <div class="col-md-4">
                                                    <div class="post post-sm">
                                                        <a class="post-img" href="blog-post.html"><img src="{{asset('img/post-10.jpg')}}" alt=""></a>
                                                        <div class="post-body">
                                                            <div class="post-category">
                                                                @foreach($post->categories as $category)
                                                                <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                                                                @endforeach
                                                            </div>
                                                            <h3 class="post-title title-sm"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h3>
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
                                        </div>
                                        @endforeach
                                        <!-- /tab1 -->

                                        {{-- <!-- tab2 -->
                                        <div id="tab2" class="tab-pane fade in">
                                            <div class="row">
                                                <!-- post -->
                                                <div class="col-md-4">
                                                    <div class="post post-sm">
                                                        <a class="post-img" href="blog-post.html"><img src="{{asset('img/post-5.jpg')}}" alt=""></a>
                                                        <div class="post-body">
                                                            <div class="post-category">
                                                                <a href="category.html">Lifestyle</a>
                                                            </div>
                                                            <h3 class="post-title title-sm"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                                                            <ul class="post-meta">
                                                                <li><a href="author.html">John Doe</a></li>
                                                                <li>20 April 2018</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /post -->

                                                <!-- post -->
                                                <div class="col-md-4">
                                                    <div class="post post-sm">
                                                        <a class="post-img" href="blog-post.html"><img src="{{asset('img/post-8.jpg')}}" alt=""></a>
                                                        <div class="post-body">
                                                            <div class="post-category">
                                                                <a href="category.html">Fashion</a>
                                                                <a href="category.html">Lifestyle</a>
                                                            </div>
                                                            <h3 class="post-title title-sm"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                                                            <ul class="post-meta">
                                                                <li><a href="author.html">John Doe</a></li>
                                                                <li>20 April 2018</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /post -->

                                                <!-- post -->
                                                <div class="col-md-4">
                                                    <div class="post post-sm">
                                                        <a class="post-img" href="blog-post.html"><img src="{{asset('img/post-9.jpg')}}" alt=""></a>
                                                        <div class="post-body">
                                                            <div class="post-category">
                                                                <a href="category.html">Lifestyle</a>
                                                            </div>
                                                            <h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                                                            <ul class="post-meta">
                                                                <li><a href="author.html">John Doe</a></li>
                                                                <li>20 April 2018</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /post -->
                                            </div>
                                        </div>
                                        <!-- /tab2 -->

                                        <!-- /tab3 tab4 .. --> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="has-dropdown megamenu">
                        <a href="#">Fashion</a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="dropdown-heading">Categories</h4>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Technology</a></li>
                                            <li><a href="#">Health</a></li>
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="dropdown-heading">Lifestyle</h4>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Health</a></li>
                                        </ul>
                                        <h4 class="dropdown-heading">Technology</h4>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="dropdown-heading">Fashion</h4>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Technology</a></li>
                                        </ul>
                                        <h4 class="dropdown-heading">Travel</h4>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Healtth</a></li>
                                            <li><a href="#">Fashion</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="dropdown-heading">Health</h4>
                                        <ul class="dropdown-list">
                                            <li><a href="#">Technology</a></li>
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Health</a></li>
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Health</a></li>
                    <li><a href="#">Travel</a></li>
                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                <li><a href="{{route('home')}}">Home</a></li>
                @auth
                <li><a href="{{route('user.show', auth()->user()->slug)}}">My Profile</a></li>
                <li><a href="{{route('followers', auth()->user()->slug)}}">Followers</a></li>
                <li><a href="{{route('following', auth()->user()->slug)}}">Following</a></li>
                <li><a href="/category/create">Add Category</a></li>
                <li><a href="{{route('post.create')}}">Create Post</a></li>
                <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endauth
                <li class="has-dropdown"><a>Categories</a>
                    <ul class="dropdown">
                        @foreach(App\Category::all() as $category)
                    <li><a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </li>


            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->
</header>
<!-- /HEADER -->
