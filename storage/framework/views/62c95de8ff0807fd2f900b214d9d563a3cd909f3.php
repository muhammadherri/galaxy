<?php $__env->startSection('content'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<div class="card">
    <div class="card-header">
        <h6 class="card-title mb-1 mt-1">
            <a href="<?php echo e(route("admin.gsm.index")); ?>"  class="breadcrumbs__item">Manufacturing</a>
            <a href="<?php echo e(route("admin.gsm.index")); ?>" class="breadcrumbs__item">Gramatur</a>
            <a href="" class="breadcrumbs__item">Edit</a>
        </h6>
    </div>
    <hr>

    <div class="card-body">
        <form action="<?php echo e(route("admin.gsm.update", [$edit->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
           <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name"><?php echo e(trans('cruds.planning.fields.item')); ?> *</label>

                <input type="text" class="form-control search_item_code_r" placeholder="Type here ..."  id="item_code"  readonly value=" <?php echo e($edit->item->item_code ??''); ?>" autocomplete="off" required>
                <span class="help-block search_item_code_empty" style="display: none;" required>No Results Found ...</span>
                <input type="hidden" class="inventory_item_id" id="search_inventory_item_id" name="inventory_item_id" value="<?php echo e($edit->inventory_item_id ??''); ?>" autocomplete="off">
                <input type="hidden" class="form-control search_item_code" value="<?php echo e($edit->item_description ??''); ?>" id="search_item_code" name="item_description" autocomplete="off">
                <input type="hidden" class="form-control" value="222" id="org_id" name="org_id" autocomplete="off">

                <?php if($errors->has('name')): ?>
                    <p class="help-block">
                        <?php echo e($errors->first('name')); ?>

                    </p>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.name_helper')); ?>

                </p>
            </div>
            <div class="form-group <?php echo e($errors->has('gsm') ? 'has-error' : ''); ?>">
                <label for="email"><?php echo e(trans('cruds.OrderManagement.field.gsm')); ?> *</label>
                <input type="number" id="gsm" name="gsm" class="form-control" value="<?php echo e($edit->gsm ??''); ?>" readonly required>
                <?php if($errors->has('value')): ?>
                    <p class="help-block">
                        <?php echo e($errors->first('value')); ?>

                    </p>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.email_helper')); ?>

                </p>
            </div> <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                <label for="email"><?php echo e(trans('cruds.assetMng.field.value')); ?> *</label>
                <input type="number" id="value" name="value" class="form-control" value="<?php echo e($edit->value ??''); ?>" required>
                <?php if($errors->has('value')): ?>
                    <p class="help-block">
                        <?php echo e($errors->first('value')); ?>

                    </p>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.user.fields.email_helper')); ?>

                </p>
            </div>
            <div class="form-group">
                <label ><?php echo e(trans('cruds.OpUnit.title')); ?> *</label>
                <select id="operation" name="operation" class="form-control select2" readonly>
                    <option value="<?php echo e($edit->operation??''); ?>" selected> <?php echo e($edit->operation??''); ?></option>
                    <?php $__currentLoopData = $op; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($edit->operation !=$row->short_name): ?>
                    <option value="<?php echo e($row->short_name); ?>"><?php echo e($row->short_name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </select>
            </div>
            <br>
            <div>
                <button class="btn btn-primary btn-submit waves-effect waves-float waves-light" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Save</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/gramaturstd/edit.blade.php ENDPATH**/ ?>