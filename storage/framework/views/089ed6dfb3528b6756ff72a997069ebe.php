<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Register</h4>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                            <?php echo csrf_field(); ?>


                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">

                                    <?php if($errors->has('name')): ?>
                                        <span class="form-text text-muted">
                                            <?php echo e($errors->first('name')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Phone</label>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>">

                                    <?php if($errors->has('phone')): ?>
                                        <span class="form-text text-muted">
                                            <?php echo e($errors->first('phone')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                    <?php if($errors->has('email')): ?>
                                        <span class="form-text text-muted">
                                            <?php echo e($errors->first('email')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password">

                                    <?php if($errors->has('password')): ?>
                                        <span class="form-text text-muted">
                                            <?php echo e($errors->first('password')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\test_laravel\resources\views/register.blade.php ENDPATH**/ ?>