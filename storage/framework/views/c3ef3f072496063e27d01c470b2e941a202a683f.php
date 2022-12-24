<?php $__env->startSection('web-title', 'Detail | ' . $item->name); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="card w-75 m-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo e(asset($item->image)); ?>" class="img-fluid rounded-start" alt="<?php echo e($item->name); ?>-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?php echo e($item->name); ?></h5>
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
                        <?php if(Auth::user() != null): ?>
                            <?php if(Auth::user()->is_admin == false): ?>
                                <a href="#" class="btn btn-warning">Add to Cart</a>
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