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
                        <li class="breadcrumb-item active"><a href="{{route('team.index')}}">Teams</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('team.index')}}" class="btn btn-sm btn-dark">Show Teams</a>
                <a href="{{route('team.show',['id'=>$team->id])}}" class="ml-2 btn btn-sm btn-dark">View Team/Player</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Team/Player Information</h3>
            </div>
            <div class="card-body">
                <form action="{{route('team.update',$team->id)}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        <div class="form-group">
                            <label for="avatar">Image</label>
                            <div class="custom-file">
                                <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-primary"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                    <input id="thumbnail" class="form-control" type="text" name="image">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter Name" value="{{$team->name}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update_team" class="btn btn-dark">Update Team</button>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection