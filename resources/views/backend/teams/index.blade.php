@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teams</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Teams</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="" class="btn btn-sm btn-dark" data-toggle="modal"
                   data-target="#modal-add-team">Create New Team/Player</a>
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
                        <th>Team ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{$team->id}}</td>
                            <td><img src="{{$team->image}}" alt="" height="30px"></td>
                            <td>{{$team->name}}</td>
                            <td>
                                <a href="{{route('team.show',['id'=>$team->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-eye"></i> View</a>
                                <a href="{{route('team.edit',['id'=>$team->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-pen-square"></i> Edit</a>
                                <a href="{{route('team.delete',['id'=>$team->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Team ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal fade" id="modal-add-team">
            <form action="{{route('team.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Team/Player</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mr-5 ml-5">

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
                                               placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                            <button type="submit" name="add_team" class="btn btn-dark">Add Team</button>
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