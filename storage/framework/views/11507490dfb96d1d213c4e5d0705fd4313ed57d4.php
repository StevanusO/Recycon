<?php $__env->startSection('web-title', 'View Item'); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="container">
        <table class="table my-2 table-hover table-bordered text-center">
            <?php if(count($items) < 1): ?>
                <div class="text-center py-5 fs-3 fw-bold">No data</div>
            <?php else: ?>
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">Item ID</th>
                        <th scope="col">Item Image</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Description</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Item Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->index + 1); ?></th>
                            <td><?php echo e($item->primary_id); ?></td>
                            <td><?php echo e($item->image); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->description); ?></td>
                            <td><?php echo e($item->price); ?></td>
                            <td><?php echo e($item->category); ?></td>
                            <td>
                                <div class="d-flex">

                                    <form action="<?php echo e(route('display_update_item_form', ['id' => $item->primary_id])); ?>"
                                        method="GET">
                                        <button class="btn btn-warning text-black fw-bold" type="submit">Update</a>
                                    </form>
                                    <form action="<?php echo e(route('delete_item_logic', ['id' => $item->primary_id])); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-danger text-white fw-bold" type="submit">Delete</a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/Admin/view_item.blade.php ENDPATH**/ ?>