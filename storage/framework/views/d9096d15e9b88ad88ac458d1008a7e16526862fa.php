<?php $__env->startSection('web-title', 'Update Form | ' . $item->primary_id); ?>

<?php $__env->startSection('website-content'); ?>
    <div class="container">
        <div class="m-3 px-3 rounded" style="background-color: rgb(194, 229, 255)">
            <form action="<?php echo e(route('update_item_logic')); ?>" method="POST" enctype="multipart/form-data" class="py-4">
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
                <div class="fw-bold fs-4 py-2 mb-3">Update Item</div>
                <div class="container">
                    <div class="d-flex gap-5 mb-4">
                        <div>
                            <label for="item_id" class="fw-bold form-label">Item ID</label>
                            <input type="text" name="item_id" id="item_id" class="form-control"
                                value="<?php echo e($item->primary_id); ?>" readonly
                                style=" background-color:#ced4da; border: 1px solid black">
                        </div>
                        <div>
                            <label for="price" class="fw-bold form-label">Item Price</label>
                            <input class="form-control" type="number" name="item_price" value="<?php echo e($item->price); ?>"
                                id="price" placeholder="Enter item Price">
                        </div>
                        <div>
                            <label for="cat" class="fw-bold form-label"><?php echo e($item->category); ?></label>
                            <select name="item_category" id="cat" class="form-select">
                                <option value="Recycle">Recycle</option>
                                <option value="Second">Second</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="fw-bold form-label">Item Name</label>
                        <input class="form-control" type="text" name="item_name" value="<?php echo e($item->name); ?>"
                            id="name" placeholder="Enter item name">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="desc" class="fw-bold form-label">Item Description</label>
                        <textarea name="item_description" id="desc" class="form-control" placeholder="Enter item Description"><?php echo e($item->description); ?></textarea>
                    </div>

                    <div class="d-flex mb-3">
                        <div>
                            <label for="img" class="fw-bold form-label">Item Image</label>
                            <img src="<?php echo e(asset('storage/upload_images/' . $item->image)); ?>" alt=""
                                style="width: 100px; height: 100px;">
                        </div>
                        <div class="ps-5">
                            <label for="path" class="fw-bold">Item image file</label>
                            <input type="text" name="old_image_path" value="<?php echo e($item->image); ?>" id="path"
                                placeholder="<?php echo e($item->image); ?>" class="form-control" readonly
                                style=" background-color:#ced4da; border: 1px solid black">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="fw-bold form-label">New Image</label>
                        <input type="file" name="image" id="img" placeholder="Upload Item" class="form-control">
                    </div>

                    <div class="mb-3 w-100 d-flex justify-content-end">
                        <button class="btn btn-warning fw-bold" type="submit">Update Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/Admin/update_item_form.blade.php ENDPATH**/ ?>