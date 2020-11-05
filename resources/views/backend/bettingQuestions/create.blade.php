@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <h1>Create Betting Question</h1>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{route('bettingQuestion.index')}}">Betting Questions</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('bettingQuestion.index')}}" class="btn btn-sm btn-dark">Show Betting Questions</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Betting Question</h3>
            </div>
            <div class="card-body">
                <form action="{{route('bettingQuestion.store')}}" method="post">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>Select Match</label>
                                <select class="form-control select2bs4" name="match_id" style="width: 100%;">

                                    @foreach($matches as $match)
                                        @if ($selected_match == $match->id)

                                            <option name="match_id" selected
                                                    value="{{$match->id}}">{{$match->title}}</option>
                                        @else
                                            <option name="match_id" value="{{$match->id}}">{{$match->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Question</label>
                                <input type="text" class="form-control" id="question" name="question">
                            </div>
                        </div>

                    </div>
                    <button type="submit" name="create_sport" class="btn btn-dark">Create Betting Question</button>
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