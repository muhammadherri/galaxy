<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
<a href="./" class="breadcrumbs__item">Inventory</a>

<a href="./" class="breadcrumbs__item">Miscellaneous Transaction</a>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h6 class="card-title">
                        <a href="<?php echo e(route("admin.missTransaction.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.physic.fields.inv')); ?> </a>
                        <a href="<?php echo e(route("admin.missTransaction.index")); ?>" class="breadcrumbs__item">Miscellaneous Transaction </a>
                        <a href="<?php echo e(route("admin.missTransaction.create")); ?>" class="breadcrumbs__item">Create </a>
                    </h6>
                </div>
                <hr>
                <div class="card-body">
                    <form action="<?php echo e(route("admin.missTransaction.store")); ?>" method="POST" enctype="multipart/form-data" onsubmit="disableButton()">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="box-body scrollx tableFixHead" style="height: 380px;overflow: scroll;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> <?php echo e(trans('cruds.inventory.fields.item_number')); ?></th>
                                            <th> <?php echo e(trans('cruds.inventory.fields.subinventory')); ?></th>
                                            <th><?php echo e(trans('cruds.trx.fields.transaction_quantity')); ?></th>
                                            <th><?php echo e(trans('cruds.itemMaster.fields.Uom')); ?></th>
                                            <th><?php echo e(trans('cruds.trx.fields.cat')); ?></th>
                                            <th><?php echo e(trans('cruds.trx.fields.transaction_reference')); ?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="miss_container">
                                        <tr class="tr_input">
                                            <td width="30%">
                                                <input type="text" class="form-control search_item_code" placeholder="Type here ..." name="item_code[]" id="searchitem_1" autocomplete="off" required><span class="help-block search_item_code_empty" style="display: none;" required>No Results Found ...</span>
                                                <input type="hidden" class="search_inventory_item_id" id="id_1" name="inventory_item_id[]" autocomplete="off">
                                                <input type="hidden" class="form-control" value="" id="description_1" name="description_item[]" autocomplete="off">
                                            </td>
                                            <td width="15%">
                                                <input type="text" class="form-control search_subinventory" value="" name="subinventory_from[]" required id="subinventoryfrom_1" autocomplete="off">
                                                <input type="hidden" class="form-control subinvfrom_1" name="subinvfrom[]" id="subinvfrom_1" autocomplete="off">
                                            </td>
                                            <td width="15%">
                                                <input type="text" class="form-control text-end" name="quantity[]" id="quantity_1" autocomplete="off" required>
                                            </td>
                                            <td width="10%">
                                                <input type="text" class="form-control" name="uom[]" id="uom_1" autocomplete="off" readonly required>
                                            </td>
                                            <td width="15%">
                                                <input type="text" class="form-control search_subcategory_code_" name="sub_category[]" id="subcategory_1" autocomplete="off">
                                            </td>
                                            <td width="15%">
                                                <input type="text" class="form-control search_ref_aju " name="reference[]" value="<?php echo e($reference??''); ?>" id="reference_1" autocomplete="off">
                                            </td>
                                            <td width="5%">
                                                <button type="button" class="btn btn-ligth btn-sm" style="position: inherit;">X</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button type="button" class="btn  btn-light btn-sm  add_misTransaction"><i class="fa fa-plus"></i> Add More</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table></br>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label></label><br>
                                        <input type="text" class="form-control " value="<?php echo e(Carbon\Carbon::parse($request->date)->format('d-M-Y H:i:s')); ?>" readonly name="transaction_date">
                                        <input type="hidden" class="form-control " value="<?php echo e($request->source); ?>" readonly="" name="source_line_id"> </br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label></label><br>
                                        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="text" class="form-control " value="<?php echo e($row->trx_types); ?>" name="transaction_type">
                                        <input type="hidden" class="form-control " value="<?php echo e($row->trx_code); ?>" name="transaction_code">
                                        <input type="hidden" name="form_token" value="<?php echo e(uniqid()); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-50 mt-50">
                                <button type="reset" class="btn  btn-warning pull-left">Reset</button>
                                <button type="submit" class="btn btn-primary"><i data-feather='plus'></i>Save</button>
                            </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>

<script>
    function disableButton() {
        document.querySelector('button[type="submit"]').disabled = true;
    }

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/missTransaction/create.blade.php ENDPATH**/ ?>