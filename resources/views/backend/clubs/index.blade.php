@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clubs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Clubs</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="" class="btn btn-sm btn-dark" data-toggle="modal"
                   data-target="#modal-add-club">Create New Club</a>
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
                        <th>Club ID</th>
                        <th>Club Owner</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clubs as $club)
                        <tr>
                            <td>{{$club->id}}</td>
                            <td>{{$club->user->name}}</td>
                            <td>{{$club->club_name}}</td>
                            <td>{{($club->status==0)?'Inactive':'Active'}}</td>
                            <td>{{$club->balance}} <span> tk.</span></td>
                            <td>
                                @if($club->status==0)
                                    <a href="{{route('club.accept',['id'=>$club->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-check-circle"></i> Accept</a>
                                @else
                                    <a href="{{route('club.reject',['id'=>$club->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-thumbs-down"></i> Reject</a>
                                @endif
                                <a href="{{route('club.edit',['id'=>$club->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-pen-square"></i> Edit</a>
                                @if(!$club->users->count())
                                    <a href="{{route('club.delete',['id'=>$club->id])}}" class="btn btn-sm btn-dark"><i
                                                class="fas fa-trash-alt"></i> Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Club ID</th>
                        <th>Club Owner</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Balance</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal fade" id="modal-add-club">
            <form action="{{route('club.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Club</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mr-5 ml-5">

                            <div class="row">
                                @csrf
                                {{--<input type="text" hidden name="user_id" value="{{$auth->user->id}}">--}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="club_name">Club Name</label>
                                        <input type="text" class="form-control" id="club_name" name="club_name"
                                               placeholder="Enter Club Name">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                            <button type="submit" name="add_club" class="btn btn-dark">Create Club</button>
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