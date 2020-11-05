@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <h1>Edit Match</h1>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('match.index')}}">Matches</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('match.index')}}" class="btn btn-sm btn-dark">Show Matches</a>
                <a href="{{route('match.show',['id'=>$match->id])}}" class="ml-2 btn btn-sm btn-dark">View Match</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Match</h3>
            </div>

            <div class="card-body">
                <form action="{{route('match.update',$match->id)}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Sport Id</label>
                                <select class="form-control select2bs4" name="sport_id" style="width: 100%;">
                                    <?php
                                    $sports = \App\Models\Sport::all();
                                    foreach($sports as $sport){
                                    if ($match->sport_id == $sport->id){
                                    ?>
                                    <option name="sport_id" selected value="{{$sport->id}}">{{$sport->name}}</option>
                                    <?php
                                    }else{ ?>
                                    <option name="sport_id" value="{{$sport->id}}">{{$sport->name}}</option>
                                    <?php   }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Contestant Two</label>
                                <select class="form-control select2bs4" name="contestant_two" style="width: 100%;">
                                    <?php
                                    $teams = \App\Models\TeamOrPlayer::all();
                                    foreach($teams as $team){
                                    if ($team->id == $match->contestant_two)
                                    {
                                    ?>
                                    <option selected name="contestant_two" value="{{$team->id}}">{{$team->name}}</option>
                                    <?php
                                    }else { ?>
                                        <option name="contestant_two" value="{{$team->id}}">{{$team->name}}</option>
                                        <?php
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Time picker:</label>
                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="start_time" value="{{$match->start_time}}"
                                               data-target="#timepicker"/>
                                        <div class="input-group-append" data-target="#timepicker"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="Enter Title" value="{{$match->title}}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" name="status_id" style="width: 100%;">
                                    <?php
                                    $statuses = \App\Models\Status::all();
                                    foreach($statuses as $status){
                                        if ($match->status_id == $status->id){?>
                                    <option selected name="status_id" value="{{$status->id}}">{{$status->name}}</option>
                                    <?php
                                    }else{?>
                                        <option name="status_id" value="{{$status->id}}">{{$status->name}}</option>
                                     <?php   }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Is Open</label>
                                <select class="form-control select2bs4" name="is_open" style="width: 100%;">
                                    <option {{($match->is_open == 0)?'selected':''}} name="is_open" value="0">Closed</option>
                                    <option {{($match->is_open == 1)?'selected':''}} name="is_open" value="1">Open</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Contestant One</label>
                                <select class="form-control select2bs4" name="contestant_one" style="width: 100%;">
                                    <?php
                                    $teams = \App\Models\TeamOrPlayer::all();
                                    foreach($teams as $team){
                                    if ($team->id == $match->contestant_one)
                                    {
                                    ?>
                                    <option selected name="contestant_one" value="{{$team->id}}">{{$team->name}}</option>
                                    <?php
                                    }else { ?>
                                    <option name="contestant_one" value="{{$team->id}}">{{$team->name}}</option>
                                    <?php
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{$match->start_date}}">
                            </div>


                        </div>

                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea type="text" rows="4" cols="1" class="form-control" id="description" name="description">{{$match->description}}</textarea>
                    </div>
                    <button type="submit" name="create_sport" class="btn btn-dark">Edit Match</button>
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