@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="card">
        <div class="card-header text-bold text-white">Place Bet</div>

        <div class="card-body">
            @php

                $matchP1icon = \App\Models\TeamOrPlayer::find($bet->bettingQuestion->match->contestant_one)->image;
                $matchP2icon = \App\Models\TeamOrPlayer::find($bet->bettingQuestion->match->contestant_two)->image;
                $sportImage = $bet->bettingQuestion->match->sport->icon;
                $sport = $bet->bettingQuestion->match->sport->name;
                $matchP1 = \App\Models\TeamOrPlayer::find($bet->bettingQuestion->match->contestant_one)->name;
                $matchP2 = \App\Models\TeamOrPlayer::find($bet->bettingQuestion->match->contestant_two)->name;
                $matchStart_date = $bet->bettingQuestion->match->start_date;
                $matchStart_time = $bet->bettingQuestion->match->start_time;
                $matchStatus = $bet->bettingQuestion->match->status->name;
                $betQuestion = $bet->bettingQuestion->question;

                $bet->choice_name;
                $bet->wining_rate;
                $bet->can_place_bet;
            @endphp
            <section class="m-3 text-white">
                <img src="{{$sportImage}}" alt="" class="rounded mx-auto d-block" height="60px">
                <h4 class="text-center text-uppercase text-bold">{{$sport}}</h4>
                <div class="text-center">
                    <div class="row text-bold">
                        <div class="col-5 text-right pt-1">
                            <div class="row float-right" style="width: 40px;"><img class="ml-auto" src="{{$matchP1icon}}" alt="" width="100%"></div>
                            <div class="clearfix"></div>
                            <div class="row float-right">{{$matchP1}}</div></div>
                        <div class="col-2 m-auto" >
                            <img class="pr-2 pl-2 m-auto" src="{{ asset('dist/img/vs.png')}}" height="30px" alt="">
                        </div>
                        <div class="col-5 text-left pt-1 w-25">
                            <div class="row"  style="width: 40px;"><img src="{{$matchP2icon}}" alt="" width="100%"></div>
                            <div class="row">{{$matchP2}}</div>
                        </div>
                    </div>
                    <div>{{date('d M Y', strtotime($matchStart_date))}} | {{date("g:i a", strtotime($matchStart_time))}} </div>
                    <div>Match Question: {{$betQuestion}}</div>
                    <div>Selected Choice: <strong class="text-warning">{{$bet->choice_name}}</strong></div>
                    <div>Wining Rate: <strong class="text-warning">{{$bet->wining_rate}}</strong></div>
                </div>
            </section>
            <form method="POST" action="{{ route('store.bet') }}" class="pt-3 pb-3">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$bet->id}}">
                <div class="form-group row">
                    <label for="amount" class="col-md-4 col-form-label text-md-right text-white">Stake Amount</label>

                    <div class="col-md-6">
                        <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                               name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus placeholder="Bet Amount">

                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-sm btn-danger">
                            Place Bet
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
