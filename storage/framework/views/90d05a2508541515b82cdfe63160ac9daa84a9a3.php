<?php $__env->startSection('web-title', 'Update Qty | ' . $item->name); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="card w-75 m-3">
        <div class="container text-center fw-bold fs-4 mb-4">Update Quantity</div>
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo e(asset('storage/upload_images/' . $item->image)); ?>" class="img-fluid rounded-start"
                    alt="<?php echo e($item->name); ?>-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <input type="text" name="item_id" value="<?php echo e($item->primary_id); ?>"
                        style="visibility: hidden; display: none">
                    <h2 class="card-title"><?php echo e($item->name); ?></h2>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Category</h3>
                    <p class="card-text"><?php echo e($item->category); ?></p>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Price</h3>
                    <p class="card-text">IDR.<?php echo e($item->price); ?></p>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Description</h3>
                    <p class="card-text"><?php echo e($item->description); ?></p>
                    <hr class="border border-dark border-2 opacity-100">
                    <form action="<?php echo e(route('cart_logic')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="item_id" value="<?php echo e($item->primary_id); ?>"
                            style="visibility: hidden; display: none;">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="qty" class="col-form-label">Qty:</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" value="<?php echo e($cart_detail->qty); ?>" name="Qty" id="qty"
                                    class="form-control">
                            </div>
                            <div class="col-auto">
                                <button href="#" class="btn btn-warning fw-bold" type="submit">Update</button>
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
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/User/update_qty.blade.php ENDPATH**/ ?>