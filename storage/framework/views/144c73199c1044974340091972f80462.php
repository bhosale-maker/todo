<?php $__env->startSection('title','todo'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row" >
        <div class="col">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Todo List</h3>
                </div>
                <div>
                    <a href="<?php echo e(route('todo.create')); ?>" class='btn btn-lg btn-success'><i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="btn-group" role="group">
            </div>
            <table class="table" id="todoTable" style="">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">priority</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">action</th>
                </tr>
                </thead>

                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $todo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        
                        <td><?php echo e($todo->title); ?></td>
                        <td><?php echo e($todo->description); ?></td>
                        <td><?php echo e($todo->date); ?></td>
                        <td><?php echo e($todo->priority); ?></td>
                        <td> <?php if($todo->image): ?>
                            <img src="<?php echo e(asset('images/' . $todo->image)); ?>" alt="Todo Image" width="300" height="100">
                        <?php else: ?>
                            <p>No image available</p>
                        <?php endif; ?></td>
                        <td class='<?php echo e($todo->status == 1 ? 'text-success' : 'text-primary'); ?>'>
                            <?php echo e($todo->status == 1 ? 'Completed' : 'Pending'); ?>

                        </td>
                        <td>
                            <?php if($todo->status != 1 ): ?>
                            <div class='btn-group'>
                                <button href="" class="btn <?php echo e($todo->complete ? 'btn-warning' : 'btn-success'); ?> btn-sm" onclick="markAsDone( <?php echo e($todo->id); ?> )" >
                                    <i class="material-icons"><?php echo e($todo->complete ? 'cancel' : 'done'); ?></i>
                                </button>
                            </div>
                            <?php endif; ?>
                        </td>
                        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7">No todo items available.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
function markAsDone(id) {
    console.log("id ==> " + id);
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        type: 'POST', // Use 'type' instead of 'method'
        url: '<?php echo e(route('markasdone')); ?>', // Correct syntax for echoing in Blade views
        data: {'id': id},
        success: function(response) {
            if (response.status == 200) {
                location.reload();
            }
        },
    });
}

</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\test_laravel\resources\views/todo/index.blade.php ENDPATH**/ ?>