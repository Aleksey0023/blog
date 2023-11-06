@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Галерея</h1>
            <section class="featured-posts-section">
                <div class="row justify-content-center align-items-baseline">
                    @foreach($gallery as $gall)
                        <div class="col-md-6 mb-5" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper text-center">
                                @if($gall->main_image == null)
                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="blog post" class="max-width-75">
                                @else
                                    <img src="{{asset('storage/' . $gall->main_image)}}" alt="blog post" class="max-width-75">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="mx-auto" style="margin-top: auto">
                        {{$gallery->links()}}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
