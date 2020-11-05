@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')

    @php
        use App\Setting;
        $setting = Setting::find(1);
    @endphp
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Bets History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Bets History</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="{{route('bet.calculate')}}" class="btn btn-sm btn-dark">Bets Calculation</a>
                <a href="{{route('bet.index')}}" class="btn btn-sm btn-dark ml-3">All Bets</a>
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
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Question</th>
                        <th>Choice</th>
                        <th>Amount</th>
                        <th>Wining Rate</th>
                        <th>Club Commission</th>
                        <th>Possible Wining Amount</th>
                        <th>User Balance</th>
                        <th>Wining Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bettingChoiceUsers as $bettingChoiceUser)
                        <tr>
                            <td>{{$bettingChoiceUser->id}}</td>
                            <td>{{\App\User::find($bettingChoiceUser->user_id)->name}}</td>
                            <td>{{\App\Models\Sport::find($bettingChoiceUser->sport_id)->name}}</td>
                            <td>{{\App\Models\Match::find($bettingChoiceUser->match_id)->title}}</td>
                            <td>{{\App\Models\BettingQuestion::find($bettingChoiceUser->betting_question_id)->question}}</td>
                            <td>{{\App\Models\BettingChoice::find($bettingChoiceUser->betting_choice_id)->choice_name}}</td>
                            <td>{{$bettingChoiceUser->amount}}</td>
                            <td>{{$bettingChoiceUser->wining_rate}}</td>
                            <td>{{$bettingChoiceUser->amount*$setting->club_commission_rate}}</td>
                            <td>{{($bettingChoiceUser->amount*$bettingChoiceUser->wining_rate)-($bettingChoiceUser->amount*$setting->club_commission_rate)}}</td>
                            <td>{{\App\User::find($bettingChoiceUser->user_id)->balance}}</td>
                            <td class="{{($bettingChoiceUser->wining_status==1)?'text-success':'text-danger'}}">
                                @if($bettingChoiceUser->wining_status==1)
                                    <i class="fas fa-trophy text-success"></i> Win
                                @elseif($bettingChoiceUser->wining_status==2)
                                    <i class="fas fa-thumbs-down text-danger"></i> Lose
                                @elseif($bettingChoiceUser->wining_status==3)
                                    <i class="fas fa-ban text-warning"></i> <span class="text-warning">Match Canceled</span>
                                    @else
                                    <i class="fas fa-spinner text-info"></i> <span class="text-info">Runing</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Question</th>
                        <th>Choice</th>
                        <th>Amount</th>
                        <th>Wining Rate</th>
                        <th>Club Commission</th>
                        <th>Possible Wining Amount</th>
                        <th>User Balance</th>
                        <th>Wining Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection