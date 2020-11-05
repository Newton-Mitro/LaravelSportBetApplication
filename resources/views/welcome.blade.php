@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
    <div class="content-header navsize-margin-top">
        <div class="container">
            <div class="card bg-gradient-gray-dark">
                <div class="scroll-left">
                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem,
                        cupiditate temporibus!</p>
                </div>
                <hr class="ml-3 mr-3">
                <div class="row pb-3 pt-2 text-white">
                    <?php $i = 1; $last = count($sports); ?>
                    @foreach($sports as $sport)
                        <a href=""
                           class="col-sm-2 {{ ($i==$last)?'':'border-right border-dark' }} text-center  text-white">
                            <img src="{{$sport->icon}}"
                                 class="rounded w-25" alt="">
                            <div class="description-block">
                                <span class="description-text">{{$sport->name}}</span>
                            </div>
                        </a>
                        <?php $i++; ?>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{--Show Live Matches--}}
        <?php
        foreach ($sports as $sport) {
        $matches = \App\Models\Match::where('sport_id', $sport->id)
            ->where('status_id', 2)
            ->where('is_open', 1)->get();
        foreach ($matches as $match) { ?>
        <div class="card">
            <div class="card-header bg-white">
                {{$sport->name}}
                <div class="ml-auto float-right">
                    <div class="{{($match->status_id==1)?'bg-gradient-olive ':'bg-gradient-success '}} btn btn-sm">
                        &nbsp;&nbsp; {{$match->status->name}} &nbsp;&nbsp;
                    </div>
                </div>
            </div>

            <div class="card-body m-2">
                <nav>
                    <div class="nav nav-tabs">
                        <div class="btn btn-sm bg-gradient-gray-dark"><span
                                    class="pr-2">{{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}</span><span
                                    class="border-left pl-2">{{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}</span>
                        </div>
                        <div class="btn btn-sm bg-gradient-blue">{{date('d M Y', strtotime($match->start_date))}}</div>
                    </div>
                </nav>
                <?php
                $questions = \App\Models\BettingQuestion::where('match_id', $match->id)->get();
                foreach ($questions as $question) { ?>
                <div>
                    <div class="row border-bottom p-1 mt-2">
                        <div class="col-sm-12 col-md-1 p-2 mb-1 text-center mt-4">
                            <img src="{{$sport->icon}}"
                                 class="rounded" alt="" height="35px">
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="align-middle border-right  p-2 mb-1">
                                <strong>{{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}</strong><br><strong>{{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}</strong><br>
                                <span>{{$question->question}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="row mt-2">
                                <?php
                                $choices = \App\Models\BettingChoice::where('betting_question_id', $question->id)->get();
                                foreach ($choices as $choice) { ?>
                                <a href="" class="col-sm-12 col-md-4 text-center">
                                    <div class="bg-white rounded p-2 mb-1 border">
                                        <span>{{$choice->choice_name}}</span><br><span
                                                class="text-bold">{{$choice->wining_rate}}</span></div>
                                </a>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }
        }
        ?>
        {{--Show Upcomming Match--}}
        <?php
        foreach ($sports as $sport) {
        $matches = \App\Models\Match::where('sport_id', $sport->id)
            ->where('status_id', 1)
            ->where('is_open', 1)->get();
        foreach ($matches as $match) { ?>
        <div class="card">
            <div class="card-header bg-white">
                {{$sport->name}}
                <div class="ml-auto float-right">
                    <div class="{{($match->status_id==1)?'bg-gradient-olive ':'bg-gradient-success '}} btn btn-sm">
                        &nbsp;&nbsp; {{$match->status->name}} &nbsp;&nbsp;
                    </div>
                </div>
            </div>

            <div class="card-body m-2">
                <nav>
                    <div class="nav nav-tabs">
                        <div class="btn btn-sm bg-gradient-gray-dark"><span
                                    class="pr-2">{{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}</span><span
                                    class="border-left pl-2">{{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}</span>
                        </div>
                        <div class="btn btn-sm bg-gradient-blue">{{date('d M Y', strtotime($match->start_date))}}</div>
                    </div>
                </nav>
                <?php
                $questions = \App\Models\BettingQuestion::where('match_id', $match->id)->get();
                foreach ($questions as $question) { ?>
                <div>
                    <div class="row border-bottom p-1 mt-2">
                        <div class="col-sm-12 col-md-1 p-2 mb-1 text-center mt-4">
                            <img src="{{$sport->icon}}"
                                 class="rounded" alt="" height="35px">
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="align-middle border-right  p-2 mb-1">
                                <strong>{{\App\Models\TeamOrPlayer::find($match->contestant_one)->name}}</strong><br><strong>{{\App\Models\TeamOrPlayer::find($match->contestant_two)->name}}</strong><br>
                                <span>{{$question->question}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="row mt-2">
                                <?php
                                $choices = \App\Models\BettingChoice::where('betting_question_id', $question->id)->get();
                                foreach ($choices as $choice) { ?>
                                <a href="" class="col-sm-12 col-md-4 text-center">
                                    <div class="bg-white rounded p-2 mb-1 border">
                                        <span>{{$choice->choice_name}}</span><br><span
                                                class="text-bold">{{$choice->wining_rate}}</span></div>
                                </a>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }
        }
        ?>


        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title">User Deposit History
                    style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>To</th>
                        <th>Form</th>
                        <th>Amount</th>
                        <th>Transaction Code</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Method</th>
                        <th>To</th>
                        <th>Form</th>
                        <th>Amount</th>
                        <th>Transaction Code</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header  bg-white">
                <h3 class="card-title">User Transaction History
                    style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h3 class="card-title">User Withdraw History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header bg-white">
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
                        <th>Club Commission</th>
                        <th>Possible Wining Amount</th>
                        <th>User Balance</th>
                        <th>Wining Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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

        <div class="card card-secondary">
            <div class="card-header bg-gradient-gray-dark">
                <div class="mb-5 mt-5">
                    <span class="event-summary__date t-center m-auto" href="#">
    <span class="event-summary__day">500</span><span class="event-summary__month">tk</span>
  </span>
                </div>
            </div>
            <div class="card-body box-profile">
                <div class="">
                    <img class="profile-user-img img-fluid img-thumbnail"
                         src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">
                </div>
                <h3 class="profile-username">Nina Mcintire</h3>
                <hr>

                <strong><i class="fas fa-phone-square-alt"></i> Mobile</strong>
                <p class="text-muted">
                    01704-000000
                </p>
                <hr>

                <strong><i class="fas fa-envelope-open-text"></i> Email</strong>
                <p class="text-muted">email@email.com</p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                <p class="text-muted">Malibu, California</p>
                <hr>

                <strong><i class="fas fa-cubes"></i> Joined Club</strong>
                <p class="text-muted">Shadhin Bangla Club.</p>
                <a href="#" class="btn bg-gradient-gray-dark btn-sm"><b>
                        &nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection