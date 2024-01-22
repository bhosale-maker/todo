<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href=<?php echo e(URL::asset('app.css')); ?>>
        <title>Login Page</title>
    </head>

<body style="background-color: #eeccff;">
    <?php echo $__env->make('particles.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id='app' class='container'>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->yieldContent('scripts'); ?>  
    
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.6/dist/umd/popper.min.js"
        integrity="sha384-V6IsYiVwvXNt6OQxY/4/v8aDyCCLQ+e/dSHvZCz2br9T/xgYvJN8XK575/p+8EaZaZM"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-MrFsm+sodUMSWw+KcQgfbdymkU/+IrjNzI5L06febp/Zdnobx93bgs/pMD14Ehdb"
        crossorigin="anonymous"></script>
</body>

</html><?php /**PATH C:\laragon\www\test_laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>