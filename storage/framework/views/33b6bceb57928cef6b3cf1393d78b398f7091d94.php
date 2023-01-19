<?php $__env->startSection('web-title', 'My Transaction'); ?>
<?php $__env->startSection('website-content'); ?>

    
    <div class="container">
        <div class="fs-3 mt-2 mb-2">
            My History Transaction
        </div>
        <?php if(count($th) < 1): ?>
            <div class="fs-5 d-flex justify-content-center align-items-center" style="height: 90vh">
                Transaction History is empty! Let's go Shopping :)
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $th; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion accordion-flush">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading<?php echo e($loop->index + 1); ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse<?php echo e($loop->index + 1); ?>" aria-expanded="false"
                                aria-controls="flush-collapse<?php echo e($loop->index + 1); ?>">
                                <?php echo e($head->created_at->toDateString()); ?>

                            </button>
                        </h2>
                        <div id="flush-collapse<?php echo e($loop->index + 1); ?>" class="accordion-collapse collapse"
                            aria-labelledby="flush-heading<?php echo e($loop->index + 1); ?>">
                            <div class="accordion-body">
                                <table class="table my-2 table-hover table-bordered text-center">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">No</th>
                                            <th scope="col">Item Image</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Item Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div style="visibility: hidden; display:none;"><?php echo e($total = 0); ?></div>
                                        <div style="visibility: hidden; display:none;"><?php echo e($count = 0); ?></div>
                                        <?php $__currentLoopData = $head->transaction_has_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <th scope="row"><?php echo e($loop->index + 1); ?></th>
                                                <div style="visibility: hidden; display:none;">
                                                    <?php echo e($count = $loop->index + 1); ?>

                                                </div>

                                                
                                                <td><img src="<?php echo e(asset('storage/upload_images/' . $data->transaction_detail_has_item->image)); ?>"
                                                        alt="<?php echo e($data->transaction_detail_has_item->name); ?>"
                                                        style="width: 100px; height:100px;">
                                                </td>

                                                
                                                <td><?php echo e($data->transaction_detail_has_item->name); ?></td>

                                                
                                                <td>IDR.<?php echo e($data->transaction_detail_has_item->price); ?></td>

                                                
                                                <td><?php echo e($data->qty); ?></td>

                                                
                                                <td>IDR.<?php echo e($data->transaction_detail_has_item->price * $data->qty); ?></td>
                                            </tr>
                                            <div style="visibility: hidden; display: none">
                                                <?php echo e($total = $total + $data->transaction_detail_has_item->price * $data->qty); ?>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <div class="w-100">
                                        <caption class="fw-bold text-dark text-end pe-2"
                                            style="background-color: rgb(213, 223, 255)">
                                            Grand Total: IDR. <?php echo e($total); ?>

                                        </caption>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/User/transaction_history.blade.php ENDPATH**/ ?>