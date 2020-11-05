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
                        <li class="breadcrumb-item active"><a href="{{route('bettingQuestion.index')}}">BettingQuestions</a></li>
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
                    <span>{{$bettingQuestion->match->sport->name}} > </span>
                    <span>{{$bettingQuestion->match->title}}</span>
                </h4>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <strong><i class="fas fa-user-circle"></i> Match Question</strong>
                    <p class="text-muted">
                        {{$bettingQuestion->question}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Match Wining Answer</strong>
                    <p class="text-muted">
                        {{$bettingQuestion->winning_answer}}
                    </p>
                    <hr>

                    <strong><i class="fas fa-user-circle"></i> Match Calculation Status</strong>
                    <p class="text-muted">
                        {{($bettingQuestion->calculation_status==0)?'Need to calculate':'Calculation complete'}}
                    </p>
                    <hr>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{route('bettingQuestion.edit',['id'=>$bettingQuestion->id])}}" class="btn btn-sm btn-dark">Edit Match</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection
