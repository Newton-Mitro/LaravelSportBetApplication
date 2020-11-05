@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('user.index')}}">User's</a></li>
                        <li class="breadcrumb-item active">{{$user->name}}</li>
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
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-dark">Edit User</a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <strong><i class="fas fa-camera"></i> Photo</strong>
                    <p class="text-muted">
                        <img src="{{$user->avatar}}" alt="" width="200px" class="img-thumbnail">
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Name</strong>
                    <p class="text-muted">
                        {{$user->name}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-envelope-open"></i> Email</strong>
                    <p class="text-muted">{{$user->email}}</p>
                    <hr>

                    <strong><i class="fas fa-phone-square"></i> Phone</strong>
                    <p class="text-muted">
                        {{$user->phone}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-cubes"></i> Joined Club</strong>
                    <p class="text-muted">{{\App\Models\Club::find($user->club_id)->club_name}}</p>

                    @if($user->club != null)
                        <strong><i class="fas fa-cubes"></i> Owned Club</strong>
                        <p class="text-muted">{{$user->club->club_name}}</p>
                    @endif

                    <strong><i class="far fa-file-alt mr-1"></i> Role</strong>
                    <p class="text-muted">{{$user->role->name}}</p>
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
