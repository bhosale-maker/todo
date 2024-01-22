<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between">
        <div>
            <h2>Create Todo</h2>
        </div>
        <div>
            <a href="<?php echo e(route('todo.index')); ?>" class='btn btn-lg btn-warning'>Go back</a>
        </div>
    </div>
    <div id="validationErrors" style="color: red"></div>
    <form method="post" action="<?php echo e(route('todo.store')); ?>" id="todoForm">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id ="title" maxlength='150' required>
            <div id="title_error" style="color: red"></div>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description"></textarea>
            <div id="description_error" style="color: red"></div>

        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" min="<?php echo e(date('Y-m-d')); ?>" required class="form-control" name="date"
                required>
            <div id="date_error" style="color: red"></div>
        </div>
        <div class="form-group">
            <label for="priority">Priority:</label>
            <select id="priority" class="form-control" name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
            <div id="priority_error" style="color: red"></div>
        </div>
        <div class="form-group">
            <label for="image">Image (optional):</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-success btn-block" id="addTaskBtn">Add Todo</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        function addTask() {
            var form = document.getElementById('todoForm');
            const title = document.getElementById('title').value;
            const date = document.getElementById('date').value;
            const description = document.getElementById('description').value;
            const priority = document.getElementById('priority').value;
            const image = document.getElementById('image').files[0];

            // Validate date
            const currentDate = new Date().toISOString().split('T')[0];
            document.getElementById('date_error').innerText = '';
            document.getElementById('title_error').innerText = '';
            document.getElementById('description_error').innerText = '';
            if (date < currentDate) {
                document.getElementById('date_error').innerText = 'Date cannot be in the past.';
                return false;
            }
            if (title == '') {
                document.getElementById('title_error').innerText = 'Title Can not be empty.';
                return false;
            }
            if (description== '') {
                document.getElementById('description_error').innerText = 'Description Can not be empty.';
                return false;
            }
            

            $.ajax({
                method: 'POST',
                url: form.action,
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.status == 200) {
                        window.location.href = '<?php echo e(route('todo.index')); ?>';
                    } else {
                        //  console.log('aniket=='+response.errors.description);
                         //return;
                        if (response.errors.title != "") {

                            document.getElementById('title_error').innerText = response.errors
                                .title;
                        }else{
                            document.getElementById('title_error').innerText ="";
                        }
                        if (response.errors.description != "" && response.errors.description != undefined) {
                            document.getElementById('description_error').innerText = response.errors
                                .description;
                        }else{
                            document.getElementById('description_error').innerText ="";
                        }
                        if (response.errors.priority != "" && response.errors.priority != undefined) {
                            document.getElementById('priority_error').innerText = response.errors
                                .priority;
                        }else{
                            document.getElementById('priority_error').innerText ="";
                        }
                        if (response.errors.date != "" && response.errors.date != undefined) {
                            document.getElementById('date_error').innerText = response.errors
                                .date;
                        }else{
                            document.getElementById('date_error').innerText ="";
                        }
                    }
                },
            });
        }

        // Ensure that the function is called when the document is ready
        $('#addTaskBtn').click(function() {
            addTask();
        });
    });
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\test_laravel\resources\views/todo/create.blade.php ENDPATH**/ ?>