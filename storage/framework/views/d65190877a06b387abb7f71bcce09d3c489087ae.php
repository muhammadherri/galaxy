<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route("admin.subInventory.update", [$sub->id])); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <?php echo csrf_field(); ?>
    <div class="bs-stepper wizard-modern modern-wizard-example">
        <div class="bs-stepper-content">
            <div class="card-header mb-50">
                <h6 class="card-title">
                    <a href="<?php echo e(route("admin.subInventory.index")); ?>" class="breadcrumbs__item">Sub Inventory List </a>
                    <a href="" class="breadcrumbs__item"><?php echo e(trans('cruds.purchaseOrder.fields.edit')); ?> </a>
                </h6>
            </div>
            <hr>
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.sub_inventory_name')); ?></label>
                    <input type="text" name="sub_inventory_name" value="<?php echo e($sub ->sub_inventory_name); ?>" class="form-control" readonly required />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.description')); ?></label>
                    <input type="text" name="description" value="<?php echo e($sub ->description); ?>" class="form-control" required />
                </div>
            </div>
            <div class="row mb-2">
                <div class="mb-1 col-md-4">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.locator_type')); ?></label>
                    <input type="text" name="locator_type" value="<?php echo e($sub ->locator_type); ?>" class="form-control" required />
                </div>
                <div class="mb-1 col-md-4">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.attribute_category')); ?></label>
                    <input type="text" name="attribute_category" value="<?php echo e($sub ->attribute_category); ?>" class="form-control" required />
                </div>
                <div class="mb-1 col-md-4">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.sub_inventory_group')); ?></label>
                    <input type="text" name="sub_inventory_group" value="<?php echo e($sub ->sub_inventory_group); ?>" class="form-control" required />
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-warning"><i data-feather='save'></i> Reset</button>
                <button class="btn btn-success"><i data-feather='save'></i> <?php echo e(trans('global.save')); ?></button>
            </div>
        </div>
    </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/subinventory/edit.blade.php ENDPATH**/ ?>