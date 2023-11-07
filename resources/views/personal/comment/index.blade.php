@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row md-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Комментарии</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead class="text-center">
                                    <tr>
                                        <th class="text-left">Комментарий</th>
                                        <th class="pl-0">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td class="pr-0" style="white-space: normal;">{{$comment->message}}</td>
                                            <td class="text-center">
                                                <a href="{{route('personal.comment.edit', $comment->id)}}" class="text-success mr-3" style="display: inline-block;">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{route('personal.comment.destroy', $comment->id)}}" method="POST" style="display: inline-block;">
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
