@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">All User</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="" class="btn btn-sm btn-dark" data-toggle="modal"
                   data-target="#modal-add-user">Create New User</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Balance</th>
                        @if(Auth::user()->role_id == 1)
                            <th>Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->balance}}</td>
                            @if(Auth::user()->role_id == 1)
                                <td>
                                    <a href="{{route('user.show',['id'=>$user->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-eye"></i> View</a>
                                    <a href="{{route('user.edit',['id'=>$user->id])}}"
                                       class="btn btn-sm btn-dark"><i
                                                class="fas fa-pen-square"></i> Edit</a>
                                    <a href="{{route('user.delete',['id'=>$user->id])}}"
                                       class="btn btn-sm btn-dark"><i
                                                class="fas fa-trash-alt"></i> Delete</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Balance</th>
                        @if(Auth::user()->role_id == 1)
                            <th>Actions</th>
                        @endif
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal fade" id="modal-add-user">
            <form action="{{route('user.create')}}" method="post" enctype="multipart/form-data">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mr-5 ml-5">

                            <div class="row">
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <div class="custom-file">
                                            <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-primary"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                                <input id="thumbnail" class="form-control" type="text" name="avatar">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="phone" class="form-control"
                                                   data-inputmask='"mask": "99999-999999"' data-mask>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input minlength="8" type="password" class="form-control" id="password"
                                               name="password"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input minlength="8" type="password" class="form-control"
                                               id="password_confirmation"
                                               name="password_confirmation"
                                               placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control select2bs4" name="role_id" style="width: 100%;">
                                            <?php
                                            $roles = \App\Role::all();
                                            foreach($roles as $role){
                                            ?>
                                            <option name="role_id" value="{{$role->id}}">{{$role->name}}</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                            <button type="submit" name="add_user" class="btn btn-dark">Add User</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
    </section>
    <!-- /.content -->
@endsection