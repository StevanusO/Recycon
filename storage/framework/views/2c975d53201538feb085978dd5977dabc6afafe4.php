<?php $__env->startSection('web-title', 'Edit Profile | ' . Auth::user()->username); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="container">
        <div class="m-3 px-3 rounded" style="background-color: rgb(194, 229, 255)">
            <form action="<?php echo e(route('edit_profile_logic')); ?>" method="POST"enctype="multipart/form-data" class="py-4">
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
                <div class="fw-bold fs-4 py-2 mb-3">Edit Profile
                </div>
                <div class="container">
                    <div class="mb-3">
                        <label for="name" class="fw-bold form-label">New Username</label>
                        <input type="text" name="data_username" id="name" placeholder="Enter new name"
                            class="form-control" value="<?php echo e(Auth::user()->username); ?>">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="email" class="fw-bold form-label">New Email</label>
                        <input name="data_email" id="email" class="form-control" type="text"
                            value="<?php echo e(Auth::user()->email); ?>">
                    </div>
                    <div class="mt-5 w-100 d-flex justify-content-end">
                        <button class="btn btn-warning fw-bold" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/edit_profile.blade.php ENDPATH**/ ?>