
<div class="modal fade" id="productMove" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-white" id="exampleModalLongTitle">Product Move Info</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.trx.fields.item')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.trx.fields.description')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.trx.fields.subinventory_code')); ?>

                                </th>
                                <th  class="text-center">
                                    <?php echo e(trans('cruds.trx.fields.transaction_quantity')); ?>

                                </th>
                                <th>
                                    <?php echo e(trans('cruds.trx.fields.transaction_date')); ?>

                                </th>

                                <th style="text-align: center;">
                                <?php echo e(trans('cruds.trx.fields.transaction_source_name')); ?>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $trx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-entry-id="<?php echo e($raw->id); ?>">
                                    <td style="display:none">
                                        <?php echo e($raw->transaction_id ?? ''); ?>

                                    </td>
                                    <td>
                                    <?php echo e($raw->itemMaster->item_code ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($raw->itemMaster->description ?? ''); ?>

                                    </td>
                                    <td>
                                    <?php echo e($raw->subinventory_code ?? ''); ?>

                                    </td>
                                    <td  class="text-center">
                                        <?php if($raw->transaction_source_name == "WIP Assembly Completion"): ?>
                                            <a class="badge bg-primary text-white">+ <?php echo e($raw->transaction_quantity ?? ''); ?></a>
                                        <?php else: ?>
                                            <a class="badge bg-warning text-white">- <?php echo e($raw->transaction_quantity ?? ''); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php echo e($raw->created_at->format('Y-m-d H:i')); ?>

                                    </td>
                                    <td  class="text-center">
                                    <?php echo e($raw->transaction_source_name ?? ''); ?>

                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/admin/workOrder/productMove.blade.php ENDPATH**/ ?>