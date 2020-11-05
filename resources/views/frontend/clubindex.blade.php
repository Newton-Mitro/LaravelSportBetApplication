@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <section class="content-header">
        <div class="pl-2 mb-2 text-muted text-bold">
            <h4 class="text-bold">
                <span>Club Name: </span> <span>{{$club->club_name}}</span>
            </h4>
            <h5 class="text-bold">
                <span>Balance: </span> <span>{{$club->balance}}</span><span> tk.</span>
            </h5>
        </div>
        <div class="pl-2 mb-2 text-muted text-bold">
            <span>Status: </span><span>{{($club->status == 1)?'Active':'Processing'}}</span>
        </div>
        <a href="{{route('clubbalancetransfer')}}" class="ml-2 btn btn-sm btn-warning">Balance Transfer to User Account</a>
    </section>
    <!-- Main content -->

    <section class="content text-white">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Club Members</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Member Image</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clubMembers as $clubMember)
                        <tr>
                            <td><img src="{{$clubMember->avatar}}" alt="" height="35px"></td>
                            <td>{{$clubMember->name}}</td>
                            <td>{{$clubMember->phone}}</td>
                            <td>
                                <a href="{{route('member.history',['id'=>$clubMember->id])}}" class="btn btn-sm btn-dark"><i
                                            class="fas fa-eye"></i> Show Bets</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Member Image</th>
                        <th>Name</th>
                        <th>Phone</th>
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
@endsection
