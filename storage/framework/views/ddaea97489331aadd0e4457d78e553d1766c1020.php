<?php $__env->startSection('content'); ?>
<section id="multiple-column-form">
    <div class="card">
        <form action="<?php echo e(route("admin.subInventory.store")); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card-header">
                <h6 class="card-title">
                    <a href="<?php echo e(route("admin.subInventory.index")); ?>" class="breadcrumbs__item">Sub Inventory List </a>
                    <a href="" class="breadcrumbs__item"><?php echo e(trans('cruds.purchaseOrder.fields.create')); ?> </a>
                </h6>
            </div>
            <hr>
            <div class="row">
                <div class="mb-1 col-md-6">
                    <label class="form-label">Sub Inventory Code</label>
                    <input type="text" name="sub_inventory_name" class="form-control" required />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.description')); ?></label>
                    <input type="text" name="description" class="form-control" required />
                </div>
            </div>
            <div class="row mb-2">
                <div class="mb-1 col-md-4">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.locator_type')); ?></label>
                    <input type="text" name="locator_type" class="form-control" required />
                </div>
                <div class="mb-1 col-md-4">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.attribute_category')); ?></label>
                    <input type="text" name="attribute_category" class="form-control" required />
                </div>
                <div class="mb-1 col-md-4">
                    <label class="form-label"><?php echo e(trans('cruds.subInventory.fields.sub_inventory_group')); ?></label>
                    <input type="text" name="sub_inventory_group" class="form-control" required />
                </div>
                <div class="d-flex justify-content-between mb-50">
                    <button class="btn btn-warning">Reset</button>
                    <button class="btn btn-success"> <?php echo e(trans('global.save')); ?></button>
                </div>
            </div>

    </div>
    </div>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/subinventory/createTabs.blade.php ENDPATH**/ ?>