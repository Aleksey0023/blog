@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title my-title" data-aos="fade-up" style="font-size: 40px;">{{$post->title}}</h1>
            <p class="edica-blog-post-meta mb-3" data-aos="fade-up" data-aos-delay="200">
                Теги:
                @forelse($post->tags as $tag)
                    • {{ $tag->title }}
                @empty
                    {{ $post->tags->count() }}
                @endforelse
            </p>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                • {{$date->translatedFormat('d-m-Y')}} • {{$date->format('H:i')}} • Комментарии
                (<span id="comment-count">{{$post->comments->count()}}</span>)</p>
            <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
                @if($post->main_image == null)
                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="featured image" class="max-width-65">
                @else
                    <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="max-width-65">
                @endif
            </section>
            <section class="post-content" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <p class="my-text">{!! $post->content !!}</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    <section class="py-4">
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
                    </section>
                    @if($relatedPosts->count() > 0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPosts)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        @if($relatedPosts->preview_image == null)
                                            <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="related post"
                                                 class="post-thumbnail">
                                        @else
                                            <img src="{{asset('storage/' . $relatedPosts->preview_image)}}"
                                                 alt="related post" class="post-thumbnail">
                                        @endif
                                        @if(isset($relatedPosts->category->title))
                                            <p class="post-category">{{$relatedPosts->category->title}}</p>
                                        @else
                                            <p class="post-category">Без категории</p>
                                        @endif
                                        <a href="{{route('post.show', $relatedPosts->id)}}"><h5
                                                class="post-title">{{$relatedPosts->title}}</h5></a>
                                    </div>
                                @endforeach
                            </div>
                            @else
                                <section class="related-posts">
                                    <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты (0)</h2>
                                </section>
                        </section>
                    @endif
                    <section class="comment_list mb-5 mt-5">
                        <h2 class="section-title mb-4" data-aos="fade-up">Комментарии (<span id="comment-count2">{{$post->comments->count()}}</span>)</h2>
                        @foreach($post->comments as $comment)
                            <div class="comment-text mb-5" data-aos="fade-up">
                            <span class="username">
                                <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                                <div class="font-weight-bold mb-2">
                                    {{$comment->user->name}}
                                </div>
                            </span>
                                {{$comment->message}}
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title" data-aos="fade-up">Оставить комментарий</h2>
                            <form id="comment-form" action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control" placeholder="Напишите комментарий" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <button type="button" id="submit-comment" class="btn btn-warning">Отправить</button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection

@auth()
    <script src="{{asset('assets/js/comment.js')}}"></script>
    <script src="{{asset('assets/js/like.js')}}"></script>
@endauth
