@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sports's Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('sport.index')}}">Sports</a></li>
                        <li class="breadcrumb-item active">{{$sport->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h4 class="text-info">Sports's Information</h4>
            </div>
            <div class="card-body">
                <div class="card-body">

                    <strong><i class="fas fa-user-circle"></i> Sport Icon</strong>
                    <p class="text-muted">
                        <img src="{{$sport->icon}}" alt="" class="img-thumbnail" width="200px">
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Sport Name</strong>
                    <p class="text-muted">
                        {{$sport->name}}
                    </p>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route('sport.edit',$sport->id)}}" class="btn btn-sm btn-dark">Edit Sport</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection
