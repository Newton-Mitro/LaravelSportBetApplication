

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Betting Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Betting Questions</li>
                    </ol>
                </div>
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
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Question</th>
                        <th>Bet place</th>
                        <th>Bet Amount</th>
                        <th>Winning Answer</th>
                        <th>Action</th>
                        <th>Betting Choice</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $bettingQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bettingQuestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($bettingQuestion->match->sport->name); ?></td>
                            <td><?php echo e($bettingQuestion->match->id); ?>-<?php echo e($bettingQuestion->match->title); ?></td>
                            <td><?php echo e($bettingQuestion->question); ?></td>
                            <td><?php echo e($bets = \App\Models\BettingChoiceUser::where('betting_question_id',$bettingQuestion->id)->count()); ?></td>
                            <td><?php echo e($bets = \App\Models\BettingChoiceUser::where('betting_question_id',$bettingQuestion->id)->sum('amount')); ?></td>
                            <td><?php echo e(($bettingQuestion->winning_answer!=null)?\App\Models\BettingChoice::find($bettingQuestion->winning_answer)->choice_name:'Select From '.$bettingQuestion->bettingChoices->count()); ?></td>
                            <td>
                                <a href="<?php echo e(route('bettingQuestion.show',['id'=>$bettingQuestion->id])); ?>"
                                   class="btn btn-sm btn-dark"><i class="fas fa-eye"></i> View</a>
                                <a href="<?php echo e(route('bettingQuestion.edit',['id'=>$bettingQuestion->id])); ?>"
                                   class="btn btn-sm btn-dark"><i class="fas fa-pen-square"></i> Edit</a>
                                <?php if(!$bettingQuestion->bettingChoices->count()): ?>
                                    <a href="<?php echo e(route('bettingQuestion.delete',['id'=>$bettingQuestion->id])); ?>"
                                       class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i> Delete</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('bettingChoice.create',['id'=>$bettingQuestion->id])); ?>"
                                   class="btn btn-sm btn-dark" style="width: 150px"><i class="fas fa-plus-circle"></i>
                                    Create <?php echo e($bettingQuestion->question); ?> Betting Choice</a>
                                <a href="<?php echo e(route('bettingChoice.bettingChoice',['id'=>$bettingQuestion->id])); ?>"
                                   class="btn btn-sm btn-danger" style="width: 150px"><i class="fas fa-eye"></i>
                                    Show <?php echo e($bettingQuestion->question); ?> Betting Choice</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Question</th>
                        <th>Bet place</th>
                        <th>Bet Amount</th>
                        <th>Winning Answer</th>
                        <th>Action</th>
                        <th>Betting Choice</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/backend/bettingQuestions/index.blade.php ENDPATH**/ ?>