<form action="#">
    <div class="modal fade" id="filterplaning" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white" id="exampleModalLongTitle">Filter Planing</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="number">Item</label>
                                    <select name="item" id="item" class="form-control select2" required>
                                        <option value=' ' selected>Default </option>

                                        <?php $__currentLoopData = $itm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->item_code); ?>"><?php echo e($row->item_code); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="rate">Operation</label>
                                    <select name="opunit" id="opunit" class="form-control select2" required>
                                        <option value=' ' selected>Default</option>
                                        <?php $__currentLoopData = $opunit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->operation_unit); ?>"><?php echo e($row->operation_unit); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="rate">Status</label>
                                    <select name="status" id="status" class="form-control select2" required>
                                        <option value='' selected></option>
                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->status); ?>"><?php echo e($row->status); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="number">Date From</label>
                                    <input required type="date" class="form-control text-center flatpickr-basic search_supplier_name" id="min" name="transaction_datefrom" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="rate">Date To</label>
                                    <input required type="date" class="form-control text-center flatpickr-basic search_supplier_name" id="max" name="transaction_dateto" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="planning_filter" class="btn btn-primary planning_filter"
                            name="action">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /var/www/html/resources/views/admin/productionPlanning/filter.blade.php ENDPATH**/ ?>