<?php $__env->startSection('content'); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/currency.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="card" >
    <div class="card-header">
        <h6 class="card-title">
            <a href="<?php echo e(route('admin.opunit.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OpUnit.title')); ?>

            </a>
            <a href="<?php echo e(route('admin.opunit.index')); ?>"
                class="breadcrumbs__item"><?php echo e(trans('cruds.OpUnit.title_singular')); ?></a>
        </h6>
    </div>
    <hr>
    <br>
    <div class="card-body">
        <form id = "formship" action="<?php echo e(route("admin.opunit.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <div class="form-group">

                <div class="form-group row">
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.OpUnit.fields.short_name')); ?></label>
                            <input type="text" id="short_name" name="short_name" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label"for="segment1"><?php echo e(trans('cruds.OpUnit.fields.name')); ?></label>
                            <input type="text" id="name" name="name" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label"
                                for="segment1"><?php echo e(trans('cruds.OpUnit.fields.capacity')); ?></label>
                            <input required id="capacity" name="capacity"type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.OpUnit.fields.range_capacity_min')); ?></label>
                            <input type="text" id="range_capacity_min" name="range_capacity_min" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.OpUnit.fields.range_capacity_max')); ?></label>
                            <input type="text" id="range_capacity_max" name="range_capacity_max" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label"
                                for="segment1"><?php echo e(trans('cruds.OpUnit.fields.range_gsm_min')); ?></label>
                            <input type="text" id="range_gsm_min" name="range_gsm_min" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label"
                                for="segment1"><?php echo e(trans('cruds.OpUnit.fields.range_gsm_max')); ?></label>
                            <input type="text" id="range_gsm_max" name="range_gsm_max" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="segment1"><?php echo e(trans('cruds.OpUnit.fields.machine_status')); ?></label>
                            <select name="machine_status" id="mechine_status" class="form-control select2" required>
                                <option value="1"> Ready </option>
                                <option value="2"> Off </option>
                                <option value="0"> Maintenance </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div></div>
                <button class="btn btn-primary btn-submit"name='action' value="create" id="add_all" type="submit"><i data-feather='save'></i> <?php echo e(trans('global.save')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/opunit/create.blade.php ENDPATH**/ ?>