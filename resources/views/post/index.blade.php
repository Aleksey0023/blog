@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row justify-content-center">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper" onclick="openPost('{{ route('post.show', $post->id) }}')">
                                @if($post->preview_image == null)
                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post">
                                @else
                                    <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
                                @endif
                            </div>
                            <div class="d-flex justify-content-between">
                                @if(isset($post->category->title))
                                    <p class="blog-post-category" onclick="openPost('{{ route('post.show', $post->id) }}')">{{$post->category->title}}</p>
                                @else
                                    <p class="blog-post-category" onclick="openPost('{{ route('post.show', $post->id) }}')">Без категории</p>
                                @endif
                                @auth()
                                    <form id="like-form-{{$post->id}}" action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="button" id="like-button-{{$post->id}}" class="border-0 bg-transparent">
                                            @if (auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-heart" style="color: #ff0000;"></i>
                                            @else
                                                <i class="far fa-heart" style="color: #ff0000;"></i>
                                            @endif
                                        </button>
                                        <span id="like-count-{{$post->id}}">{{ $post->liked_users_count }}</span>
                                    </form>
                                @endauth
                                @guest()
                                    <div>
                                        <i class="far fa-heart" style="color: #ff0000;"></i>
                                        <span>{{$post->liked_users_count}}</span>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="mx-auto" style="margin-top: -100px">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="widget widget-post-list mb-auto" data-aos="fade-up">
                            <h5 class="widget-title">Случайные посты</h5>
                        </div>
                        <div class="row blog-post-row">
                            @if(isset($randomPosts))
                                @foreach($randomPosts as $post)
                                    <div class="col-md-6 blog-post" data-aos="fade-up">
                                        <div class="blog-post-thumbnail-wrapper" onclick="openPost('{{ route('post.show', $post->id) }}')">
                                            @if($post->preview_image == null)
                                                <img src="{{asset('assets/images/forSeeds/135258.jpg')}}"
                                                     alt="blog post">
                                            @else
                                                <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if(isset($post->category->title))
                                                <p class="blog-post-category" onclick="openPost('{{ route('post.show', $post->id) }}')">{{$post->category->title}}</p>
                                            @else
                                                <p class="blog-post-category" onclick="openPost('{{ route('post.show', $post->id) }}')">Без категории</p>
                                            @endif
                                            @auth()
                                                <form id="random-like-form-{{$post->id}}" action="{{ route('post.like.store', $post->id) }}" method="POST">
                                                    @csrf
                                                    <button type="button" id="random-like-button-{{$post->id}}" class="border-0 bg-transparent">
                                                        @if (auth()->user()->likedPosts->contains($post->id))
                                                            <i class="fas fa-heart" style="color: #ff0000;"></i>
                                                        @else
                                                            <i class="far fa-heart" style="color: #ff0000;"></i>
                                                        @endif
                                                    </button>
                                                    <span id="random-like-count-{{$post->id}}">{{ $post->liked_users_count }}</span>
                                                </form>
                                            @endauth
                                            @guest()
                                                <div>
                                                    <i class="far fa-heart" style="color: #ff0000;"></i>
                                                    <span>{{$post->liked_users_count}}</span>
                                                </div>
                                            @endguest
                                        </div>
                                        <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{$post->title}}</h6>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Категории</h5>
                        <ul class="nav flex-column">
                            @foreach($categories as $category)
                                <li class="nav-item d-flex justify-content-between align-items-center">
                                    <h6>
                                        <a class="nav-link my-title"
                                           href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a>
                                    </h6>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярные посты</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $post)
                                <li class="post border-bottom-0 mb-0 pb-0">
                                    <a href="{{route('post.show', $post->id)}}" class="post-permalink media">
                                        @if($post->preview_image == null)
                                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post">
                                        @else
                                            <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
                                        @endif
                                        <div class="media-body">
                                            <h6 class="post-title my-title">{{$post->title}}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script>
    function openPost(url) {
        window.location.href = url;
    }
</script>
@endsection

@auth()
    <script src="{{asset('assets/js/like.js')}}"></script>
@endauth
