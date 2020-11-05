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
                        <li class="breadcrumb-item active"><a href="{{route('user.index')}}">All User</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('user.index')}}" class="btn btn-sm btn-dark">Show All User</a>
                <a href="{{route('user.show',['id'=>$user->id])}}" class="ml-2 btn btn-sm btn-dark">View User</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit User Information</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <div class="custom-file">
                                        <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-primary"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                            <input id="thumbnail" class="form-control" type="text" name="avatar">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="phone" class="form-control" value="{{$user->phone}}"
                                               data-inputmask='"mask": "99999-999999"' data-mask>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input minlength="8" type="password" class="form-control" id="password" name="password"
                                           placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control select2bs4" name="role_id" style="width: 100%;">
                                        <?php
                                        $roles = \App\Role::all();
                                        foreach($roles as $role){
                                        if ($user->role_id == $role->id){
                                        ?>
                                        <option name="role_id" selected value="{{$role->id}}">{{$role->name}}</option>
                                        <?php
                                        }else{ ?>
                                        <option name="role_id" value="{{$role->id}}">{{$role->name}}</option>
                                        <?php   }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="update_user" class="btn btn-dark">Update User</button>

                    </form>
                </div>
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