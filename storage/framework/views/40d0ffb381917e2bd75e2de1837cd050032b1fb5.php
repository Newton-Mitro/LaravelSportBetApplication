
<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header"><span class="text-bold text-white">Make Deposit Request</span>
            <a href="<?php echo e(route('deposit.history')); ?>" class="btn btn-sm btn-warning float-right">Show Diposit History</a>
        </div>


        <div class="card-body">
            <form method="POST" action="<?php echo e(route('store.deposit')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label for="amount"
                           class="col-md-4 col-form-label text-md-right text-white">Deposit Amount</label>

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
                    <label for="method_id" class="col-md-4 col-form-label text-md-right text-white">Send To</label>

                    <div class="col-md-6">
                        <select id="to" class="form-control select2bs4" name="to" style="width: 100%;">

                            <?php $__currentLoopData = $numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>{
                            <option name="to" value="<?php echo e($number->id); ?>"><?php echo e($number->method->name); ?> - <?php echo e($number->phone_number); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

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
                    <label for="form"
                           class="col-md-4 col-form-label text-md-right text-white">Send From</label>

                    <div class="col-md-6">
                        <input id="form" type="text" class="form-control <?php $__errorArgs = ['form'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="form" value="<?php echo e(Auth::user()->phone); ?>" required autocomplete="form" maxlength="12">

                        <?php $__errorArgs = ['form'];
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
                    <label for="transaction_code" class="col-md-4 col-form-label text-md-right text-white">Transuction Number</label>

                    <div class="col-md-6">
                        <input id="transaction_code" type="text" class="form-control <?php $__errorArgs = ['transaction_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="transaction_code" value="<?php echo e(old('transaction_code')); ?>" required autocomplete="transaction_code" autofocus>

                        <?php $__errorArgs = ['transaction_code'];
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
                            Make Deposit Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $(#method_id).change(function () {
                
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eBet\resources\views/frontend/deposit.blade.php ENDPATH**/ ?>