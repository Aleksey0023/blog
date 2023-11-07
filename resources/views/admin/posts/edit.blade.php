@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">Редактирование поста</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-8 col-lg-8 col-xl-6">
                                <label class="w-100">
                                    <input type="text" class="form-control" name="title" placeholder="Название поста"
                                           value="{{$post->title}}">
                                </label>
                                @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="summernote"></label><textarea id="summernote"
                                                                          name="content">{{$post->content}}</textarea>
                                @error('content')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-8 col-lg-8 col-xl-6">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="w-50 mb-2">
                                    @if($post->preview_image == null)
                                        <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="preview_image"
                                             class="w-75">
                                    @else
                                        <img src="{{asset('storage/' . ($post->preview_image))}}" alt="preview_image"
                                             class="w-75">
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="exampleInputFile" class="custom-file-input"
                                               name="preview_image">
                                        <label class="custom-file-label">Выберете изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-8 col-lg-8 col-xl-6">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-50 mb-2">
                                    @if($post->main_image == null)
                                        <img src="{{asset('assets/images/forSeeds/135258.jpg')}}" alt="main_image"
                                             class="w-75">
                                    @else
                                        <img src="{{asset('storage/' . ($post->main_image))}}" alt="main_image"
                                             class="w-75">
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="exampleInputFile" class="custom-file-input"
                                               name="main_image">
                                        <label class="custom-file-label">Выберете изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xl-4">
                                <label>Выберете категорию</label>
                                <label class="w-100">
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}"{{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="form-group col-md-8 col-lg-8 col-xl-6">
                                <label>Теги</label>
                                <label class="w-100">
                                    <select class="select2" name="tags[]" multiple="multiple"
                                            data-placeholder="Выберете теги" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
