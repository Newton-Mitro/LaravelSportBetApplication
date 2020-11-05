

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Betting Question Choices</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Betting Question Choices</li>
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
                        <th>Betting Question</th>
                        <th>Choice Name</th>
                        <th>Can Place Bet?</th>
                        <th>Winning Rate</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $bettingChoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bettingChoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($bettingChoice->bettingQuestion->match->sport->name); ?></td>
                            <td><?php echo e($bettingChoice->bettingQuestion->match->id); ?>-<?php echo e($bettingChoice->bettingQuestion->match->title); ?></td>
                            <td><?php echo e($bettingChoice->bettingQuestion->id); ?>-<?php echo e($bettingChoice->bettingQuestion->question); ?></td>
                            <td><?php echo e($bettingChoice->choice_name); ?></td>
                            <td><?php echo e(($bettingChoice->can_place_bet==0)?'No':'Yes'); ?></td>
                            <td><?php echo e($bettingChoice->wining_rate); ?></td>
                            <td>
                                <a href="<?php echo e(route('bettingChoice.show',['id'=>$bettingChoice->id])); ?>" class="btn btn-sm btn-dark"><i class="fas fa-eye"></i> View</a>
                                <a href="<?php echo e(route('bettingChoice.edit',['id'=>$bettingChoice->id])); ?>" class="btn btn-sm btn-dark"><i class="fas fa-pen-square"></i> Edit</a>
                                <a href="<?php echo e(route('bettingChoice.delete',['id'=>$bettingChoice->id])); ?>" class="btn btn-sm btn-dark"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sport</th>
                        <th>Match</th>
                        <th>Betting Question</th>
                        <th>Choice Name</th>
                        <th>Can Place Bet?</th>
                        <th>Winning Rate</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eBet\resources\views/backend/bettingChoices/index.blade.php ENDPATH**/ ?>