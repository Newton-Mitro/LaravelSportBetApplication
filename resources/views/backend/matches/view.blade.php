@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Matches's Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('match.index')}}">Matches</a></li>
                        <li class="breadcrumb-item active">{{$match->title}}</li>
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
                <h4 class="text-info">
                    {{$match->sport->name}}
                </h4>
            </div>
            <div class="card-body">
                <div class="card-body">

                    <strong><i class="fas fa-user-circle"></i> Match Title</strong>
                    <p class="text-muted">
                        {{$match->title}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Contestant One</strong>
                    <p class="text-muted">
                        {{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Contestant Two</strong>
                    <p class="text-muted">
                        {{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Description</strong>
                    <p class="text-muted">
                        {{$match->description}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Start Date</strong>
                    <p class="text-muted">
                        {{$match->start_date}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Start Time</strong>
                    <p class="text-muted">
                        {{date("g:i a", strtotime($match->start_time))}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Is Open</strong>
                    <p class="text-muted">
                        {{$match->is_open}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Match Status</strong>
                    <p class="text-muted">
                        {{$match->status->name}}
                    </p>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route('match.edit',$match->id)}}" class="btn btn-sm btn-dark">Edit Match</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection
