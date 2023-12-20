@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>


            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="1">Category: {{ $post->category->title }}; Tags:
                @foreach ($post->tags as $tag)
                    {{ $tag->title }};
                @endforeach
            </p>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $data->format('F') }} -
                {{ $data->year }} - {{ $data->format('H:i') }} - {{ $post->comments->count() }} Comments</p>
              <p align="center">
                <img  style="width:400 px; height: 400px" src="{{ asset('storage/' . $post->main_image) }}" >
                <img  style="width:400 px; height: 400px" src="{{ asset('storage/' . $post->preview_image) }}" >
              </p>
          
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{{ strip_tags($post->content) }}</p>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-2">
                        <form action={{ route('post.like.store', $post->id) }} method="POST">
                            @csrf

                            @auth
                                @if (auth()->user()->likedPosts->contains($post->id))
                                    <button type="submit" class="btn btn-primary btn-xs">
                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-secondary btn-xs">
                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                                    </button>
                                @endif
                            @endauth

                            @guest
                                <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3">{{ $post->liked_users_count }}</i>
                            @endguest

                        </form>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h2 class="section-title mb-5" data-aos="fade-up">Comments</h2>
                    <section class="comment">
                        @foreach ($post->comments as $comment)
                            <div class="col-md-12">
                                <div class="media g-mb-30 media-comment mt-5">
                                    @if ($comment->user->photo)
                                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                                            style="width: 80px; height: 80px"
                                            src="{{ asset('storage/' . $comment->user->photo) }}">
                                    @else
                                        <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                                            style="width: 80px; height: 80px"
                                            src="{{ asset('assets/images/defolt/defoltphoto.jpg') }}">
                                    @endif
                                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30 ml-3">
                                        <div class="g-mb-15">
                                            <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $comment->user->name }}</h5>
                                            <span
                                                class="g-color-gray-dark-v4 g-font-size-12">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                        </div>
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section mt-5">
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label class="sr-only">Comment</label>
                                        <textarea name="message" id="message" class="form-control" placeholder="Comment"></textarea>
                                        @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                    @if ($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts by tags</h2>
                            <div class="row">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->main_image) }}" alt="related post"
                                            class="post-thumbnail">
                                        <p class="post-category">
                                            @foreach ($relatedPost->tags as $tag)
                                                {{ $tag->title }};
                                            @endforeach
                                        </p>
                                        <a href="{{ route('posts.show', $relatedPost->id) }}"
                                            class="blog-post-permalink">{{ $relatedPost->title }}</a>
                                    </div>
                                @endforeach

                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection


<script src="assets/vendors/popper.js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/vendors/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
