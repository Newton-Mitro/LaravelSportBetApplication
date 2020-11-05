
<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header"><span class="text-white text-bold">Make Withdraw Request</span>
            <a href="<?php echo e(route('withdraw.history')); ?>" class="btn btn-sm btn-warning float-right">Show Withdraw History</a>
        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('store.withdraw')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="amount"
                           class="col-md-4 col-form-label text-md-right text-white">Withdraw Amount</label>

                    <div class="col-md-6">
                        <input id="amount" type="number" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="amount" value="<?php echo e(old('amount')); ?>" required autocomplete="amount">

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

                <div class="form-group row">
                    <label for="method_id" class="col-md-4 col-form-label text-md-right text-white">Method</label>

                    <div class="col-md-6">
                        <select class="form-control select2bs4" name="method_id" style="width: 100%;">
                            <?php
                            $methods = \App\Models\Method::all();
                            foreach($methods as $method){
                            ?>
                            <option name="method_id" value="<?php echo e($method->id); ?>"><?php echo e($method->name); ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <?php $__errorArgs = ['method_id'];
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

                <div class="form-group row">
                    <label for="to" class="col-md-4 col-form-label text-md-right text-white">Send To</label>

                    <div class="col-md-6">
                        <input id="to" type="text" class="form-control <?php $__errorArgs = ['to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="to" value="<?php echo e(Auth::user()->phone); ?>" required autocomplete="to" autofocus maxlength="12">

                        <?php $__errorArgs = ['to'];
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

                <div class="form-group row">
                    <label for="account_type_id" class="col-md-4 col-form-label text-md-right text-white">Account Type</label>

                    <div class="col-md-6">
                        <select class="form-control select2bs4" name="account_type_id" style="width: 100%;">
                            <?php
                            $accuntTypes = \App\Models\AccountType::all();
                            foreach($accuntTypes as $accuntType){
                            ?>
                            <option name="account_type_id" value="<?php echo e($accuntType->id); ?>"><?php echo e($accuntType->name); ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <?php $__errorArgs = ['account_type_id'];
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
                        <button type="submit" class="btn btn-success">
                            Make Withdraw Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eBet\resources\views/frontend/withdraw.blade.php ENDPATH**/ ?>