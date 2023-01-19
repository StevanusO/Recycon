<?php $__env->startSection('web-title', 'Show Product'); ?>
<?php $__env->startSection('website-content'); ?>

    <div class="container">
        <h2 class="text-center py-3">Our Products</h2>
        <?php if(count($items) < 1): ?>
            <h4>No Products</h4>
        <?php else: ?>
            <div class="card-group d-flex gap-4 my-3">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card rounded">
                        <img src="<?php echo e(asset('storage/upload_images/' . $item->image)); ?>" class="card-img-top rounded-top"
                            alt="<?php echo e($item->name); ?>">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5><?php echo e($item->name); ?></h5>
                                <h6><?php echo e($item->category); ?></h6>
                            </div>
                            <p class="card-text"><?php echo e($item->price); ?></p>
                            <a class="btn btn-warning"
                                href="<?php echo e(route('item_detail_logic', ['id' => "$item->primary_id"])); ?>">
                                Detail Product
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pagination justify-content-center">
                <?php echo e($items->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/ShowProductPage/show_product.blade.php ENDPATH**/ ?>