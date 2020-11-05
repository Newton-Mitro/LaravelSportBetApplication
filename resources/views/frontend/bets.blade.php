@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    @php
        $setting = \App\Setting::find(1);
    @endphp
    <div class="card text-white">
        <div class="card-header">
            <h3 class="card-title">User Betting History</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sport</th>
                    <th>Match</th>
                    <th>Question</th>
                    <th>Choice</th>
                    <th>Amount</th>
                    <th>Wining Rate</th>
                    <th>Possible Wining Amount</th>
                    <th>Bet Sale Amount</th>
                    <th>User Balance</th>
                    <th>Wining Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bets as $bet)
                    <tr>
                        <td>{{$bet->id}}</td>
                        <td>{{\App\Models\Sport::find($bet->sport_id)->name}}</td>
                        <td>{{\App\Models\TeamOrPlayer::find(\App\Models\Match::find($bet->match_id)->contestant_one)->name}}
                            <span> Vs. </span>{{\App\Models\TeamOrPlayer::find(\App\Models\Match::find($bet->match_id)->contestant_two)->name}}
                        </td>
                        <td>{{\App\Models\BettingQuestion::find($bet->betting_question_id)->question}}</td>
                        <td>{{\App\Models\BettingChoice::find($bet->betting_choice_id)->choice_name}}</td>
                        <td>{{$bet->amount}} <span> tk.</span></td>
                        <td>{{$bet->wining_rate}}</td>
                        <td>{{($bet->amount*$bet->wining_rate)}}<span> tk.</span></td>
                        @if($bet->wining_status==3)
                            <td>{{($bet->amount - ($bet->amount*$setting->bet_sale_commission_rate))}}<span> tk.</span></td>
                        @else
                            <td>0.00<span> tk.</span></td>
                        @endif
                        <td>{{$bet->balance}}<span> tk.</span></td>
                        <td class="{{($bet->wining_status==1)?'text-success':'text-danger'}}">
                            @if($bet->wining_status==1)
                                <i class="fas fa-trophy text-success"></i> Win
                            @elseif($bet->wining_status==2)
                                <i class="fas fa-thumbs-down text-danger"></i> Lose
                            @elseif($bet->wining_status==3 and $bet->calculation_status == 0)
                                <a href="{{route('bet.sale',['id'=>$bet->id])}}" class="btn btn-sm btn-success"><i
                                            class="fas fa-ban text-dark"></i> <span
                                            class="text-dark">Bet Sale</span></a>
                            @elseif($bet->wining_status==3 and $bet->calculation_status == 1)
                                <i class="fas fa-check-double text-info"></i> <span class="text-info">Bet Sold</span>
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
                    <th>Sport</th>
                    <th>Match</th>
                    <th>Question</th>
                    <th>Choice</th>
                    <th>Amount</th>
                    <th>Wining Rate</th>
                    <th>Possible Wining Amount</th>
                    <th>Bet Sale Amount</th>
                    <th>User Balance</th>
                    <th>Wining Status</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection