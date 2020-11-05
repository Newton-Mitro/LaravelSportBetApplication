

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <h1>Edit Betting Question</h1>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="<?php echo e(route('bettingQuestion.index')); ?>">Betting Questions</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="<?php echo e(route('bettingQuestion.index')); ?>" class="btn btn-sm btn-dark">Show Betting Questions</a>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Betting Question</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('bettingQuestion.update',['id'=>$bettingQuestion->id])); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="row">
                        <?php echo csrf_field(); ?>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label>Select Match</label>
                                <select class="form-control select2bs4" name="match_id" style="width: 100%;">
                                    <?php
                                    $matches = \App\Models\Match::all();
                                    foreach($matches as $match){
                                    if ($bettingQuestion->match_id == $match->id){
                                    ?>
                                    <option name="match_id" selected value="<?php echo e($match->id); ?>"><?php echo e($match->title); ?></option>
                                    <?php
                                    }else{ ?>
                                    <option name="match_id" value="<?php echo e($match->id); ?>"><?php echo e($match->title); ?></option>
                                    <?php   }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="name">Question</label>
                                <input type="text" class="form-control" id="question" name="question"
                                       value="<?php echo e($bettingQuestion->question); ?>">
                            </div>
                        </div>
                        <?php if(Auth::user()->role_id == 1): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Wining Answer</label>
                                    <select class="form-control select2bs4" name="winning_answer"
                                            style="width: 100%;">

                                        <option name="winning_answer" value="0">Select Wining Answer</option>
                                        <?php $__currentLoopData = $bettingQuestion->bettingChoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bettingChoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option name="winning_answer"
                                                    <?php echo e(($bettingChoice->id == $bettingQuestion->winning_answer)?'selected':''); ?> value="<?php echo e($bettingChoice->id); ?>"><?php echo e($bettingChoice->choice_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>

                        <?php endif; ?>
                        <?php if($bettingQuestion->winning_answer == 0 and Auth::user()->role_id == 2): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Wining Answer</label>
                                    <select class="form-control select2bs4" name="winning_answer"
                                            style="width: 100%;">

                                        <option name="winning_answer" value="0">Select Wining Answer</option>
                                        <?php $__currentLoopData = $bettingQuestion->bettingChoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bettingChoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option name="winning_answer"
                                                    <?php echo e(($bettingChoice->id == $bettingQuestion->winning_answer)?'selected':''); ?> value="<?php echo e($bettingChoice->id); ?>"><?php echo e($bettingChoice->choice_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($bettingQuestion->winning_answer == 0): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Bet cancel on this question</label>
                                    <select class="form-control select2bs4" name="cancel_bet"
                                            style="width: 100%;">

                                        <option name="cancel_bet" <?php echo e(($bettingQuestion->cancel_bet == 0)?'selected':''); ?> value="0">No</option>
                                        <option name="cancel_bet" <?php echo e(($bettingQuestion->cancel_bet == 1)?'selected':''); ?> value="1">Yes</option>

                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if($bettingQuestion->winning_answer == 0): ?>
                        <button type="submit" name="create_sport" class="btn btn-dark">Update Betting Question</button>
                    <?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backend/bettingQuestions/edit.blade.php ENDPATH**/ ?>