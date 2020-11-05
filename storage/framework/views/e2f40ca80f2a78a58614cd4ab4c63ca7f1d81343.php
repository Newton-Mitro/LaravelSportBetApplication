
<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header text-bold text-white">Place Bet</div>

        <div class="card-body">
            <?php

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
            ?>
            <section class="m-3 text-white">
                <img src="<?php echo e($sportImage); ?>" alt="" class="rounded mx-auto d-block" height="60px">
                <h4 class="text-center text-uppercase text-bold"><?php echo e($sport); ?></h4>
                <div class="text-center">
                    <div class="row text-bold">
                        <div class="col-5 text-right pt-1">
                            <div class="row float-right" style="width: 40px;"><img class="ml-auto" src="<?php echo e($matchP1icon); ?>" alt="" width="100%"></div>
                            <div class="clearfix"></div>
                            <div class="row float-right"><?php echo e($matchP1); ?></div></div>
                        <div class="col-2 m-auto" >
                            <img class="pr-2 pl-2 m-auto" src="<?php echo e(asset('dist/img/vs.png')); ?>" height="30px" alt="">
                        </div>
                        <div class="col-5 text-left pt-1 w-25">
                            <div class="row"  style="width: 40px;"><img src="<?php echo e($matchP2icon); ?>" alt="" width="100%"></div>
                            <div class="row"><?php echo e($matchP2); ?></div>
                        </div>
                    </div>
                    <div><?php echo e(date('d M Y', strtotime($matchStart_date))); ?> | <?php echo e(date("g:i a", strtotime($matchStart_time))); ?> </div>
                    <div>Match Question: <?php echo e($betQuestion); ?></div>
                    <div>Selected Choice: <strong class="text-warning"><?php echo e($bet->choice_name); ?></strong></div>
                    <div>Wining Rate: <strong class="text-warning"><?php echo e($bet->wining_rate); ?></strong></div>
                </div>
            </section>
            <form method="POST" action="<?php echo e(route('store.bet')); ?>" class="pt-3 pb-3">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="id" name="id" value="<?php echo e($bet->id); ?>">
                <div class="form-group row">
                    <label for="amount" class="col-md-4 col-form-label text-md-right text-white">Stake Amount</label>

                    <div class="col-md-6">
                        <input id="amount" type="number" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="amount" value="<?php echo e(old('amount')); ?>" required autocomplete="amount" autofocus placeholder="Bet Amount">

                        <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eBet\resources\views/frontend/placebet.blade.php ENDPATH**/ ?>