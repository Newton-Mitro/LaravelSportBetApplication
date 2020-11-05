@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Home</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Summery</h3>
            </div>
            <div class="card-body">
                <section>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Users</span>
                                    <span class="info-box-number">{{$totalUser}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-mailchimp"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Teams/Players</span>
                                    <span class="info-box-number">{{$totalTeam}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-table-tennis"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Sports</span>
                                    <span class="info-box-number">{{$totalSport}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-chess"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Matches</span>
                                    <span class="info-box-number">{{$totalMatch}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-fedora"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Betting Questions</span>
                                    <span class="info-box-number">{{$totalBettingQuestion}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-jedi"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Betting Choices</span>
                                    <span class="info-box-number">{{$totalBettingChoice}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-accusoft"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Clubs</span>
                                    <span class="info-box-number">{{$totalClub}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-hand-holding-usd"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Deposit Count</span>
                                    <span class="info-box-number">{{$totalDeposit}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Deposit Amount</span>
                                    <span class="info-box-number">{{$totalDepositAmount}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-money-bill-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Withdraw Count</span>
                                    <span class="info-box-number">{{$totalWithdraw}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Withdraw Amount</span>
                                    <span class="info-box-number">{{$totalWithdrawAmount}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-handshake"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Transaction Count</span>
                                    <span class="info-box-number">{{$totalTransaction}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Debit Transaction Amount</span>
                                    <span class="info-box-number">{{$totalTransactionDr}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Credit Transaction Amount</span>
                                    <span class="info-box-number">{{$totalTransactionCr}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 {{(($totalTransactionCr-$totalTransactionDr)<=0)?'bg-success':'bg-warning'}}">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Income/Loss</span>
                                    <span class="info-box-number">{{$totalTransactionCr- $totalTransactionDr}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="fab fa-sticker-mule"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Bet Count</span>
                                    <span class="info-box-number">{{$totalBet}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Bet Amount</span>
                                    <span class="info-box-number">{{$totalUserBetAmount}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="fas fa-trophy"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Winner Count</span>
                                    <span class="info-box-number">{{$totalWiningBet}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Wining Amount</span>
                                    <span class="info-box-number">{{$totalUser}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection