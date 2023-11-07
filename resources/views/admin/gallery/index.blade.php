@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0">Галерея</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Галерея</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-4 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <a href="{{route('admin.gallery.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-4">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead class="text-center">
                                    <tr>
                                        <th class="text-left">ID</th>
                                        <th colspan="3">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery as $gall)
                                        <tr>
                                            <td>{{$gall->id}}</td>
                                            <td class="text-center"><a href="{{route('admin.gallery.show', $gall->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.gallery.edit', $gall->id)}}"
                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.gallery.destroy', $gall->id)}}"
                                                      method="POST">
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
