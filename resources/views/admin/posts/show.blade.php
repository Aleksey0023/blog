@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3">{{$post->title}}</h1>
                        <a href="{{route('admin.post.edit', $post->id)}}" class="text-success">
                            <i class="fas fa-pencil-alt mr-3"></i>
                        </a>
                        <form action="{{route('admin.post.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">{{$post->title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Заголовок</th>
                                        <th>Категория</th>
                                        <th>Теги</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->category->title}}</td>
                                        <td>
                                            @foreach($post->tags as $tag)
                                                • {{$tag->title}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Текст поста</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{!! $post->content !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Превью</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="w-50 mb-2">
                                                @if($post->preview_image == null)
                                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="preview_image"
                                                         class="w-50">
                                                @else
                                                    <img src="{{asset('storage/' . ($post->preview_image))}}" alt="preview_image"
                                                         class="w-50">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Главное изображение</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="w-50 mb-2">
                                                @if($post->main_image == null)
                                                    <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="main_image"
                                                         class="w-50">
                                                @else
                                                    <img src="{{asset('storage/' . ($post->main_image))}}" alt="main_image"
                                                         class="w-50">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
