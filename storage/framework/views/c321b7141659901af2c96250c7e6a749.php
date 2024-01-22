<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d580ff;">
    <a class="navbar-brand" href="<?php echo e(Auth::user() ? '/tasks' : '/'); ?>">
        Todolist app
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar" >
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <?php if(auth()->guard()->check()): ?> 
            <li class="nav-item">
                <span class="navbar-text">
                    Welcome, <?php echo e(Auth::user()->name); ?> 
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                Logout
                </a>   
            </li> 
            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
            <?php else: ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">Login
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('register')); ?>">Register
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<br><?php /**PATH C:\laragon\www\test_laravel\resources\views/particles/nav.blade.php ENDPATH**/ ?>