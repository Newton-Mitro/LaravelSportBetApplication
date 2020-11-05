@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <h1>Create Betting Question Choice</h1>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{route('bettingChoice.index')}}">Betting Question Choice</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('bettingChoice.index')}}" class="btn btn-sm btn-dark">Show Betting Question Choice</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Betting Question Choice</h3>
            </div>
            <div class="card-body">
                <form action="{{route('bettingChoice.store')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>Selected Question</label>
                                <select class="form-control select2bs4" name="betting_question_id" style="width: 100%;">
                                    <option name="betting_question_id" selected value="{{$bettingQuestion->id}}">{{$bettingQuestion->question}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Choice Name</label>
                                <input type="text" class="form-control" id="choice_name" name="choice_name" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>Can place bet?</label>
                                <select class="form-control select2bs4" name="can_place_bet" style="width: 100%;">
                                    <option name="can_place_bet" selected value="0">No</option>
                                    <option name="can_place_bet" value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Wining Rate</label>
                                <input step="any" type="number" class="form-control" id="wining_rate" name="wining_rate" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Minimum Stake</label>
                                <input type="number" class="form-control" id="min_stake" name="min_stake" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Maximum Stake</label>
                                <input type="number" class="form-control" id="max_stake" name="max_stake" >
                            </div>
                        </div>

                    </div>
                    <button type="submit" name="create_sport" class="btn btn-dark">Create Betting Question Choice</button>
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