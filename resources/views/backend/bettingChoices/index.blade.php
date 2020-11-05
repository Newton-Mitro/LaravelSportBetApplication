@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Betting Question Choices</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Betting Question Choices</li>
                    </ol>
                </div>
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
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Betting Question</th>
                        <th>Choice Name</th>
                        <th>Can Place Bet?</th>
                        <th>Winning Rate</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bettingChoices as $bettingChoice)
                        <tr>
                            <td>{{$bettingChoice->bettingQuestion->match->sport->name}}</td>
                            <td>{{$bettingChoice->bettingQuestion->match->id}}-{{$bettingChoice->bettingQuestion->match->title}}</td>
                            <td>{{$bettingChoice->bettingQuestion->id}}-{{$bettingChoice->bettingQuestion->question}}</td>
                            <td>{{$bettingChoice->choice_name}}</td>
                            <td>{{($bettingChoice->can_place_bet==0)?'No':'Yes'}}</td>
                            <td>{{$bettingChoice->wining_rate}}</td>
                            <td>
                                <a href="{{route('bettingChoice.show',['id'=>$bettingChoice->id])}}" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i> View</a>
                                <a href="{{route('bettingChoice.edit',['id'=>$bettingChoice->id])}}" class="btn btn-sm btn-dark"><i class="fas fa-pen-square"></i> Edit</a>
                                <a href="{{route('bettingChoice.delete',['id'=>$bettingChoice->id])}}" class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Betting Question</th>
                        <th>Choice Name</th>
                        <th>Can Place Bet?</th>
                        <th>Winning Rate</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection