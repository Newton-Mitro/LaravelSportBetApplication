@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BettingQuestions's Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{route('bettingQuestion.index')}}">BettingQuestions</a></li>
                        <li class="breadcrumb-item active"></li>
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
                <h4 class="text-info">
                    <span>{{$bettingChoice->bettingQuestion->match->sport->name}} > </span>
                    <span>{{$bettingChoice->bettingQuestion->match->title}} > </span>
                    <span>{{$bettingChoice->bettingQuestion->question}} </span>
                </h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <strong><i class="fas fa-user-circle"></i> Match's Betting Choice Name</strong>
                    <p class="text-muted">
                        {{$bettingChoice->choice_name}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Can place bet?</strong>
                    <p class="text-muted">
                        {{($bettingChoice->can_place_bet==0)?'No':'Yes'}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Wining Rate</strong>
                    <p class="text-muted">
                        {{$bettingChoice->wining_rate}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Minimum Stake</strong>
                    <p class="text-muted">
                        {{$bettingChoice->min_stake}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Maximum Stake</strong>
                    <p class="text-muted">
                        {{$bettingChoice->max_stake}}
                    </p>
                    <hr>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route('bettingChoice.edit',['id'=>$bettingChoice->id])}}" class="btn btn-sm btn-dark">Edit
                    Match</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection
