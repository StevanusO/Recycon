<?php $__env->startSection('web-title', 'My Cart'); ?>
<?php $__env->startSection('website-content'); ?>
    <div class="container">
        <div class="fs-3 mt-2">
            My Cart
        </div>
        <?php if($cart == null): ?>
            <div class="fs-5 d-flex justify-content-center align-items-center" style="height: 90vh">
                Cart is empty! Let's go Shopping :)
            </div>
        <?php else: ?>
            <?php if(count($cart->cart_has_detail) < 1): ?>
                <div class="fs-5 d-flex justify-content-center align-items-center" style="height: 90vh">
                    Cart is empty! Let's go Shopping :)
                </div>
            <?php else: ?>
                <table class="table my-2 table-hover table-bordered text-center">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Item Image</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div style="visibility: hidden; display:none;"><?php echo e($total = 0); ?></div>
                        <div style="visibility: hidden; display:none;"><?php echo e($count = 0); ?></div>
                        <?php $__currentLoopData = $cart->cart_has_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <th scope="row"><?php echo e($loop->index + 1); ?></th>
                                <div style="visibility: hidden; display:none;"><?php echo e($count = $loop->index + 1); ?></div>

                                
                                <td><img src="<?php echo e(asset('storage/upload_images/' . $item->cart_detail_belongs_item->image)); ?>"
                                        alt="<?php echo e($item->cart_detail_belongs_item->name); ?>"
                                        style="width: 100px; height:100px;">
                                </td>

                                
                                <td><?php echo e($item->cart_detail_belongs_item->name); ?></td>

                                
                                <td>IDR.<?php echo e($item->cart_detail_belongs_item->price); ?></td>

                                
                                <td><?php echo e($item->qty); ?></td>

                                
                                <td>IDR.<?php echo e($item->cart_detail_belongs_item->price * $item->qty); ?></td>
                                <td>
                                    <div class="d-flex">

                                        <form
                                            action="<?php echo e(route('display_update_cart_item_form', ['id' => $item->item_id])); ?>"
                                            method="GET">
                                            <button class="btn btn-warning text-black fw-bold" type="submit">Update</a>
                                        </form>
                                        <form
                                            action="<?php echo e(route('delete_item_cart_detail_logic', ['id' => $item->item_id])); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-danger text-white fw-bold" type="submit">Delete</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div style="visibility: hidden; display: none">
                                <?php echo e($total = $total + $item->cart_detail_belongs_item->price * $item->qty); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <caption class="fw-bold text-dark fs-5">
                        Grand Total: IDR. <?php echo e($total); ?>

                    </caption>
                </table>
                <div class="container mb-5">
                    <p class="fs-3 fw-bold">Receiver</p>
                    <form action="<?php echo e(route('insert_transaction_history_logic')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="receiver_name" placeholder="Enter Receiver Name"
                                value="<?php echo e(Auth::user()->username); ?>" name="receiver_name">
                            <label for="receiver_name">Receiver Name</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="receiver_address" rows="2" cols="2" name="receiver_address"></textarea>
                            <label for="receiver_address">Receiver Address</label>
                        </div>
                        <div>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($message); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-warning mt-3 fw-bold">Checkout
                            (<?php echo e($count); ?>)</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/User/cart.blade.php ENDPATH**/ ?>