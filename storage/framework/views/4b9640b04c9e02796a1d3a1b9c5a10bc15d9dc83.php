
<form action="<?php echo e(route('admin.prodplan.store')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" novalidate>
<?php echo e(csrf_field()); ?>

<div class="modal fade" id="openData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" style="height: 550px">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Order Summary</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col-md-12 col-12">
                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-1"><span><b>Production to :</b></span></div>
                            <div class="col-sm-2">
                                <select name="pm" id="pm" class="form-control select2" required>
                                    <?php $__currentLoopData = $pm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->short_name); ?>"><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info arrow-right-circle btn-sm"><i data-feather='refresh-cw'></i> Add </button>
                            </div>

                        </div>
                    </div>
                </div>
                <table id="order-summary" class="table w-100 table-hover"  >
                    <thead>
                        <tr>
                            <th><?php echo e(trans('cruds.planning.fields.no')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.order_num')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.customer')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.po_num')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.ship_date')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.item')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.gsm')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.width')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.qty')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.opration')); ?></th>
                            <th><?php echo e(trans('cruds.planning.fields.roll')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</form>

<?php /**PATH /var/www/html/resources/views/admin/productionPlanning/open.blade.php ENDPATH**/ ?>