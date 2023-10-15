@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Отзывы</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($reviews as $review)
                        <div class="col-md-6 mb-5" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                @if($review->main_image == null)
                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post" class="w-100">
                                @else
                                    <img src="{{asset('storage/' . $review->main_image)}}" alt="blog post" class="w-100">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="mx-auto" style="margin-top: auto">
                        {{$reviews->links()}}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
