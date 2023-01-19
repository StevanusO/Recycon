<?php $__env->startSection('web-title', 'Login Form'); ?>
<?php $__env->startSection('website-content'); ?>
    <div class="content-height d-flex justify-content-center align-items-center">
        <form action="<?php echo e(route('login_logic')); ?>" class="w-50 p-4 rounded" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <h1 class="w-100 text-center">Login Form</h1>
            <div class="my-4">
                <div class="form-label">Email</div>
                <input name="email" type="email" placeholder="Input your email" class="form-control">
            </div>
            <div class="mb-4">
                <div class="form-label">Password</div>
                <input name="password" type="password" placeholder="Input your password" class="form-control">
            </div>
            <div class="mb-2 form-check">
                <input name="is_remember" id="is_remember" type="checkbox" class="form-check-input">
                <label class="form-check-label" for="is_remember">Remember Me</label>
            </div>
            <div class="w-100 d-flex justify-content-end mt-4">
                <button type="submit" class="w-25 btn btn-success">Login</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/login_form.blade.php ENDPATH**/ ?>