<?php $__env->startSection('web-title', 'Change Password | ' . Auth::user()->username); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="container">
        <div class="m-3 px-3 rounded" style="background-color: rgb(194, 229, 255)">
            <form action="<?php echo e(route('change_password_logic')); ?>" method="POST"enctype="multipart/form-data" class="py-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($message); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="fw-bold fs-4 py-2 mb-3">Change Password
                </div>
                <div class="container">
                    <input type="number" style="visibility: hidden; display: none;" name="id"
                        value="<?php echo e(Auth::user()->id); ?>">
                    <div class="mb-3">
                        <label for="old" class="fw-bold form-label">Old Password</label>
                        <input type="password" name="old_password" id="old" placeholder="Enter Old Password"
                            class="form-control">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="new" class="fw-bold form-label">New Password</label>
                        <input name="new_password" id="new" class="form-control" type="password"
                            placeholder="Enter New Password">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="confirm" class="fw-bold form-label">Confirm Password</label>
                        <input name="confirm_password" id="confirm" class="form-control" type="password"
                            placeholder="Confirm New password">
                    </div>
                    <div class="mt-5 w-100 d-flex justify-content-end">
                        <button class="btn btn-warning fw-bold" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/change_password.blade.php ENDPATH**/ ?>