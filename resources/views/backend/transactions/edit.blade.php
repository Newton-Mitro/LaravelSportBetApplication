@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('club.index')}}">Clubs</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Clubs Information</h3>
            </div>
            <div class="card-body">
                <form action="{{route('club.update',$club->id)}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Club Owner Email Address</label>
                                <select class="form-control select2bs4" name="user_id" style="width: 100%;">
                                    <?php
                                    $users = \App\User::all();
                                    foreach($users as $user){
                                    if ($club->user_id == $user->id){
                                    ?>
                                    <option name="user_id" selected value="{{$user->id}}">{{$user->email}}</option>
                                    <?php
                                    }else{ ?>
                                    <option name="user_id" value="{{$user->id}}">{{$user->email}}</option>
                                    <?php   }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="club_name" name="club_name"
                                       placeholder="Enter Name" value="{{$club->club_name}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update_club" class="btn btn-dark">Update Club</button>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route('club.index')}}" class="btn btn-sm btn-dark">Show Clubs</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection