@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    @php
        use App\Setting;
        $setting = Setting::find(1);
    @endphp
    <div class="card text-white">
        <div class="card-header">
            <h3 class="card-title text-bold">Member Betting History</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Member's Name</th>
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
                @foreach($bets as $bet)
                    <tr>
                        <td>{{\App\User::find($bet->user_id)->name}}</td>
                        <td>{{\App\Models\Sport::find($bet->sport_id)->name}}</td>
                        <td>{{\App\Models\TeamOrPlayer::find(\App\Models\Match::find($bet->match_id)->contestant_one)->name}}
                            <span> Vs. </span>{{\App\Models\TeamOrPlayer::find(\App\Models\Match::find($bet->match_id)->contestant_two)->name}}
                        </td>
                        <td>{{\App\Models\BettingQuestion::find($bet->betting_question_id)->question}}</td>
                        <td>{{\App\Models\BettingChoice::find($bet->betting_choice_id)->choice_name}}</td>
                        <td>{{$bet->amount}} <span> tk.</span></td>
                        <td>{{$bet->wining_rate}}</td>
                        <td>{{$bet->amount*$setting->club_commission_rate}}<span> tk.</span></td>
                        <td>{{($bet->amount*$bet->wining_rate)-($bet->amount*$setting->club_commission_rate)}}<span> tk.</span></td>
                        <td>{{$bet->balance}}<span> tk.</span></td>
                        <td class="{{($bet->wining_status==1)?'text-success':'text-danger'}}">
                            @if($bet->wining_status==1)
                                <i class="fas fa-trophy text-success"></i> Win
                            @elseif($bet->wining_status==2)
                                <i class="fas fa-thumbs-down text-danger"></i> Lose
                            @else
                                <i class="fas fa-spinner text-info"></i> <span class="text-info">Runing</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Member's Name</th>
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

@endsection