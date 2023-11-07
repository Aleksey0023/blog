@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Теги</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Теги</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <a href="{{route('admin.tag.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead class="text-center">
                                    <tr>
                                        <th class="text-left">ID</th>
                                        <th class="text-left">Название</th>
                                        <th class="pl-0">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$tag->id}}</td>
                                            <td class="pr-0" style="white-space: normal;">{{$tag->title}}</td>
                                            <td class="text-center">
                                                <a href="{{route('admin.tag.show', $tag->id)}}" class="text-primary mr-3" style="display: inline-block;">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{route('admin.tag.edit', $tag->id)}}" class="text-success mr-3" style="display: inline-block;">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{route('admin.tag.destroy', $tag->id)}}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
