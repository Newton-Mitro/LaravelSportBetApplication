

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
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
                                    <span class="info-box-number"><?php echo e($totalUser); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-mailchimp"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Teams/Players</span>
                                    <span class="info-box-number"><?php echo e($totalTeam); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-table-tennis"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Sports</span>
                                    <span class="info-box-number"><?php echo e($totalSport); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-chess"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Matches</span>
                                    <span class="info-box-number"><?php echo e($totalMatch); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-fedora"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Betting Questions</span>
                                    <span class="info-box-number"><?php echo e($totalBettingQuestion); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-jedi"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Betting Choices</span>
                                    <span class="info-box-number"><?php echo e($totalBettingChoice); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-accusoft"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Clubs</span>
                                    <span class="info-box-number"><?php echo e($totalClub); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-hand-holding-usd"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Deposit Count</span>
                                    <span class="info-box-number"><?php echo e($totalDeposit); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Deposit Amount</span>
                                    <span class="info-box-number"><?php echo e($totalDepositAmount); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-money-bill-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Withdraw Count</span>
                                    <span class="info-box-number"><?php echo e($totalWithdraw); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Withdraw Amount</span>
                                    <span class="info-box-number"><?php echo e($totalWithdrawAmount); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fas fa-handshake"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Transaction Count</span>
                                    <span class="info-box-number"><?php echo e($totalTransaction); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Debit Transaction Amount</span>
                                    <span class="info-box-number"><?php echo e($totalTransactionDr); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Credit Transaction Amount</span>
                                    <span class="info-box-number"><?php echo e($totalTransactionCr); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 <?php echo e((($totalTransactionCr-$totalTransactionDr)<=0)?'bg-success':'bg-warning'); ?>">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Income/Loss</span>
                                    <span class="info-box-number"><?php echo e($totalTransactionCr- $totalTransactionDr); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="fab fa-sticker-mule"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Bet Count</span>
                                    <span class="info-box-number"><?php echo e($totalBet); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Bet Amount</span>
                                    <span class="info-box-number"><?php echo e($totalUserBetAmount); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="fas fa-trophy"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Winner Count</span>
                                    <span class="info-box-number"><?php echo e($totalWiningBet); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3">
                            <div class="info-box mb-3 bg-white">
                                <span class="info-box-icon"><i class="nav-icon fab fa-teamspeak"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-wrap">Total Wining Amount</span>
                                    <span class="info-box-number"><?php echo e($totalUser); ?></span>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backend/home.blade.php ENDPATH**/ ?>