

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Withdraws</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Withdraws</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
                <a href="<?php echo e(route('withdraw.index')); ?>" class="btn btn-sm btn-dark">Withdraw Requests</a>
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
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Account Type</th>
                        <th>To</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($withdraw->created_at->format('d/m/Y')); ?></td>
                            <td><?php echo e($withdraw->user->name); ?></td>
                            <td><?php echo e($withdraw->amount); ?> <span>Tk.</span></td>
                            <td><?php echo e($withdraw->method->name); ?></td>
                            <td><?php echo e($withdraw->accountType->name); ?></td>
                            <td><?php echo e($withdraw->to); ?></td>
                            <td><?php echo e($withdraw->user->balance); ?></td>
                            <td class="<?php echo e(($withdraw->status==0)?'text-danger':'text-success'); ?>">
                                <?php if($withdraw->status== 1): ?>
                                    Approved
                                <?php elseif($withdraw->status== 0): ?>
                                    Pending
                                <?php else: ?>
                                    Canceled
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($withdraw->status==0): ?>
                                    <a href="<?php echo e(route('withdraw.complete',['id'=>$withdraw->id])); ?>"
                                       class="btn btn-sm btn-danger"><i class="fas fa-check-circle"></i> Complete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eBet\resources\views/backend/withdraws/index.blade.php ENDPATH**/ ?>