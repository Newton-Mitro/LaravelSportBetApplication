
<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $setting = \App\Setting::find(1);
    ?>
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
                <?php $__currentLoopData = $bets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bet->id); ?></td>
                        <td><?php echo e(\App\Models\Sport::find($bet->sport_id)->name); ?></td>
                        <td><?php echo e(\App\Models\TeamOrPlayer::find(\App\Models\Match::find($bet->match_id)->contestant_one)->name); ?>

                            <span> Vs. </span><?php echo e(\App\Models\TeamOrPlayer::find(\App\Models\Match::find($bet->match_id)->contestant_two)->name); ?>

                        </td>
                        <td><?php echo e(\App\Models\BettingQuestion::find($bet->betting_question_id)->question); ?></td>
                        <td><?php echo e(\App\Models\BettingChoice::find($bet->betting_choice_id)->choice_name); ?></td>
                        <td><?php echo e($bet->amount); ?> <span> tk.</span></td>
                        <td><?php echo e($bet->wining_rate); ?></td>
                        <td><?php echo e(($bet->amount*$bet->wining_rate)); ?><span> tk.</span></td>
                        <?php if($bet->wining_status==3): ?>
                            <td><?php echo e(($bet->amount - ($bet->amount*$setting->bet_sale_commission_rate))); ?><span> tk.</span></td>
                        <?php else: ?>
                            <td>0.00<span> tk.</span></td>
                        <?php endif; ?>
                        <td><?php echo e($bet->balance); ?><span> tk.</span></td>
                        <td class="<?php echo e(($bet->wining_status==1)?'text-success':'text-danger'); ?>">
                            <?php if($bet->wining_status==1): ?>
                                <i class="fas fa-trophy text-success"></i> Win
                            <?php elseif($bet->wining_status==2): ?>
                                <i class="fas fa-thumbs-down text-danger"></i> Lose
                            <?php elseif($bet->wining_status==3 and $bet->calculation_status == 0): ?>
                                <a href="<?php echo e(route('bet.sale',['id'=>$bet->id])); ?>" class="btn btn-sm btn-success"><i
                                            class="fas fa-ban text-dark"></i> <span
                                            class="text-dark">Bet Sale</span></a>
                            <?php elseif($bet->wining_status==3 and $bet->calculation_status == 1): ?>
                                <i class="fas fa-check-double text-info"></i> <span class="text-info">Bet Sold</span>
                            <?php else: ?>
                                <i class="fas fa-spinner text-info"></i> <span class="text-info">Runing</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/frontend/bets.blade.php ENDPATH**/ ?>