
<?php $__env->startSection('webiste-title', 'Register Form'); ?> 

<?php $__env->startSection('website-content'); ?>  
        <div class="content-height justify-content-center align-items-center d-flex">
            <form action="<?php echo e(route('register_logic')); ?>" method="POST" class="w-50 p-4 rounded" enctype="multipart/form-data">
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
                <h1 class="w-100 text-center">Register Form</h1>
                <div class="my-4">
                    <div class="form-label">Full Name</div>
                    <input name="Username" type="text" placeholder="Input your full name" class="form-control">
                  </div>
                  <div class="mb-4">
                    <div class="form-label">Email</div>
                    <input name="Email_Address" type="email" placeholder="Input your email" class="form-control">
                  </div>
                  <div class="mb-4">
                    <div class="form-label">Password</div>
                    <input name="Password" type="password" placeholder="Input your password" class="form-control">
                  </div>
                  <div class="mb-4">
                    <div class="form-label">Confirm Password</div>
                    <input name="Confirm_Password" type="password" placeholder="Input your password again" class="form-control">
         
                  <div class="w-100 d-flex justify-content-end mt-4">
                      <button type="submit" class="w-25 btn btn-warning">Register Now</button>
                  </div>
                </div>
            </form>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/regist_form.blade.php ENDPATH**/ ?>