
<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card text-white">
        <div class="card-header">
            <h3 class="card-title">User Transaction History
                style</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Account Type</th>
                    <th>Dr. Amount (Out)</th>
                    <th>Cr. Amount (In)</th>
                    <th>Balance</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($transaction->updated_at); ?></td>
                        <td><?php echo e($transaction->user->name); ?></td>
                        <td><?php echo e($transaction->transactionType->name); ?></td>
                        <td><?php echo e($transaction->dr_amount); ?><span> tk.</span></td>
                        <td><?php echo e($transaction->cr_amount); ?><span> tk.</span></td>
                        <td><?php echo e($transaction->balance); ?> <span> tk.</span></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Account Type</th>
                    <th>Dr. Amount (Out)</th>
                    <th>Cr. Amount (In)</th>
                    <th>Balance</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/frontend/transaction.blade.php ENDPATH**/ ?>