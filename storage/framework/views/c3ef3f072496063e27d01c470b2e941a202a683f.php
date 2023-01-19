<?php $__env->startSection('web-title', 'Detail | ' . $items->name); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="card w-75 m-3">
        
        


        
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo e(asset('storage/upload_images/' . $items->image)); ?>" class="img-fluid rounded-start"
                    alt="<?php echo e($items->name); ?>-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?php echo e($items->name); ?></h2>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Category</h3>
                    <p class="card-text"><?php echo e($items->category); ?></p>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Price</h3>
                    <p class="card-text">IDR.<?php echo e($items->price); ?></p>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Description</h3>
                    <p class="card-text"><?php echo e($items->description); ?></p>
                    <hr class="border border-dark border-2 opacity-100">
                    <?php if(Auth::user() != null): ?>
                        <?php if(Auth::user()->is_admin == false): ?>
                            <form action="<?php echo e(route('cart_logic')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="item_id" value="<?php echo e($items->primary_id); ?>"
                                    style="visibility: hidden; display: none;">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="qty" class="col-form-label">Qty:</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="number" name="Qty" id="qty" class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        <button href="#" class="btn btn-warning fw-bold" type="submit">Add to
                                            Cart</button>

                                    </div>
                                </div>
                            </form>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger mt-2">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($message); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(Route('display_login_form_view')); ?>" class="btn btn-warning text-dark fw-bold">Login
                            to Buy</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/ShowProductPage/show_product_detail.blade.php ENDPATH**/ ?>