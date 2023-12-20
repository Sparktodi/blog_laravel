@extends('layouts.main')

@section('content')
    <main class="blog mt-4">
        <div class="container">
            <section class="featured-posts-section">
                <h1 class="widget-title text-center mb-5">Popular posts</h1>
                <div class="row">
                    @foreach ($likedUsers as $likedUser)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ 'storage/' . $likedUser->preview_image }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $likedUser->category->title }}</p>
                            <a href="{{ route('posts.show', $likedUser->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $likedUser->title }}</h6>
                            </a>
                            <div class="row justify-content-end">
                                <div class="col-2">
                                    <form action={{ route('post.like.store', $likedUser->id) }} method="POST">
                                        @csrf

                                        @auth
                                            @if (auth()->user()->likedPosts->contains($likedUser->id))
                                                <button type="submit" class="btn btn-primary btn-xs">
                                                    <i
                                                        class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $likedUser->liked_users_count}}</i>
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-secondary btn-xs">
                                                    <i
                                                        class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $likedUser->liked_users_count }}</i>
                                                </button>
                                            @endif
                                        @endauth

                                        @guest
                                            <i
                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $likedUser->liked_users_count }}</i>
                                        @endguest

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </section>
            <section class="featured-posts-section">
                <h1 class="widget-title text-center mb-5">Posts</h1>
                <div class="input-group mb-3">
                    <div class="col-12 mb-3">
                        <form class="card card-sm" method="get" action={{ route('posts.index') }}>
                            <div class="card-body row no-gutters align-items-center">
                               
                                <div class="col">
                                    <input name="title" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search by title">
                                </div>
                                <!--end of col-->
                                <div class="col-auto">
                                    <button class="btn btn-lg btn-success" type="submit">Search</button>
                                </div>
                                <!--end of col-->
                            </div>
                        </form>
                    </div>
                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                            <div class="row justify-content-end">
                                <div class="col-2">
                                    <form action={{ route('post.like.store', $post->id) }} method="POST">
                                        @csrf

                                        @auth
                                            @if (auth()->user()->likedPosts->contains($post->id))
                                                <button type="submit" class="btn btn-primary btn-xs">
                                                    <i
                                                        class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count}}</i>
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-secondary btn-xs">
                                                    <i
                                                        class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                                                </button>
                                            @endif
                                        @endauth

                                        @guest
                                            <i
                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                                        @endguest

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -5px"> {{ $posts->withQueryString()->links() }}</div>
                </div>
            </section>
    
        
        
          
                <div class="col-md-12 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h1 class="text-center mt-3">Random Posts</h1>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                    <li data-target="#carouselId" data-slide-to="3"></li>
                                    <li data-target="#carouselId" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach ($randomPosts as $key => $randomPost)
                                        @if ($key === 0)
                                            <figure class="carousel-item active">
                                                <img 
                                                    src="{{ 'storage/' . $randomPost->preview_image }}" alt="First slide">
                                                <figcaption class="post-title">
                                                    <a
                                                        href="{{ route('posts.show', $randomPost->id) }}">{{ $randomPost->title }}</a>
                                                    <div class="row justify-content-end">
                                                        <div class="col-2">
                                                            <form action={{ route('post.like.store', $randomPost->id) }} method="POST">
                                                                @csrf
                        
                                                                @auth
                                                                    @if (auth()->user()->likedPosts->contains($randomPost->id))
                                                                        <button type="submit" class="btn btn-primary btn-xs">
                                                                            <i
                                                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count}}</i>
                                                                        </button>
                                                                    @else
                                                                        <button type="submit" class="btn btn-secondary btn-xs">
                                                                            <i
                                                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count }}</i>
                                                                        </button>
                                                                    @endif
                                                                @endauth
                        
                                                                @guest
                                                                    <i
                                                                        class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count }}</i>
                                                                @endguest
                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        @endif
                                        <figure class="carousel-item">
                                            <img src="{{ 'storage/' . $randomPost->preview_image }}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a
                                                    href="{{ route('posts.show', $randomPost->id) }}">{{ $randomPost->title }}</a>
                                                <div class="row justify-content-end">
                                                    <div class="col-2">
                                                        <form action={{ route('post.like.store', $randomPost->id) }} method="POST">
                                                            @csrf
                    
                                                            @auth
                                                                @if (auth()->user()->likedPosts->contains($randomPost->id))
                                                                    <button type="submit" class="btn btn-primary btn-xs">
                                                                        <i
                                                                            class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count}}</i>
                                                                    </button>
                                                                @else
                                                                    <button type="submit" class="btn btn-secondary btn-xs">
                                                                        <i
                                                                            class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count }}</i>
                                                                    </button>
                                                                @endif
                                                            @endauth
                    
                                                            @guest
                                                                <i
                                                                    class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count }}</i>
                                                            @endguest
                    
                                                        </form>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                        @if ($key === 5)
                                            <div class="carousel-item">
                                                <img src="{{ 'storage/' . $randomPost->preview_image }}" alt="First slide">
                                                <figcaption class="post-title">
                                                    <a
                                                        href="{{ route('posts.show', $post->id) }}">{{ $randomPost->title }}</a>
                                                    <div class="row justify-content-end">
                                                        <div class="col-2">
                                                            <form action={{ route('post.like.store', $randomPost->id) }} method="POST">
                                                                @csrf
                        
                                                                @auth
                                                                    @if (auth()->user()->likedPosts->contains($randomPost->id))
                                                                        <button type="submit" class="btn btn-primary btn-xs">
                                                                            <i
                                                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count}}</i>
                                                                        </button>
                                                                    @else
                                                                        <button type="submit" class="btn btn-secondary btn-xs">
                                                                            <i
                                                                                class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count }}</i>
                                                                        </button>
                                                                    @endif
                                                                @endauth
                        
                                                                @guest
                                                                    <i
                                                                        class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $randomPost->liked_users_count }}</i>
                                                                @endguest
                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>
@endsection
