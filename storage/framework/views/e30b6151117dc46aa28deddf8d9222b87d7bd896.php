<?php $__env->startSection('content'); ?>
<!-- Main content -->
<div class="card">
    <div class="card-header mt-2 mb-25">
        <h6 class="card-title">
            <a href="<?php echo e(route("admin.category.index")); ?>" class="breadcrumbs__item">Category</a>
            <a href="#" class="breadcrumbs__item">Edit</a>
        </h6>
    </div>
    <hr>
    <div class="card-body">
        <form id="formship" action="<?php echo e(route('admin.category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="box-body">
                <br>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="mb-1">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>">
                            <input type="hidden" id="status" name="status" value="1">
                            <div class="form-group row">
                                <label class="col-sm-1 control-label" for="number"><?php echo e(trans('cruds.category.fields.code')); ?></label>
                                <div class="col-sm-3 <?php echo e($errors->get('category_code') ? 'has-error' : ''); ?>">
                                    <input autocomplete="off" readonly type="text" id="note" name="note" class="form-control" value="<?php echo e($category->category_code); ?>" required>
                                </div>

                                <label class="col-sm-1 control-label" for="number"><?php echo e(trans('cruds.category.fields.name')); ?></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="category_name" value="<?php echo e($category->category_name); ?>" maxlength="50">
                                </div>

                                <label class="col-sm-1 control-label" for="number"><?php echo e(trans('cruds.category.fields.description')); ?></label>
                                <div class="col-sm-3">
                                    <input readonly type="text" class="form-control" name="description" value="<?php echo e($category->description); ?>" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class=" form-group row">
                            <label class="col-sm-1 control-label" for="number">Inventory</label>
                            <div class="col-sm-3">
                                <select name="inventory_account_code" id="inventory_account_code" class="form-control select2" required value="<?php echo e($category->inventory_account_code); ?>">
                                    <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->account_code == $category->inventory_account_code): ?>
                                    <option selected value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('account_code')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('account_code')); ?>

                                </p>
                                <?php endif; ?>
                                <p class="helper-block">
                                </p>
                            </div>
                            <label class="col-sm-1 control-label" for="number">Payable</label>
                            <div class="col-sm-3">
                                <select name="payable_account_code" id="payable_account_code" class="form-control select2" required>
                                    <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->account_code == $category->payable_account_code): ?>
                                    <option selected value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('account_code')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('account_code')); ?>

                                </p>
                                <?php endif; ?>
                                <p class="helper-block">
                                </p>
                            </div>
                            <label class="col-sm-1 control-label" for="number">Receive</label>
                            <div class="col-sm-3">
                                <select name="receivable_account_code" id="receivable_account_code" class="form-control select2" value="<?php echo e($category->receivable_account_code); ?>" required>
                                    <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->account_code == $category->receivable_account_code): ?>
                                    <option selected value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('account_code')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('account_code')); ?>

                                </p>
                                <?php endif; ?>
                                <p class="helper-block">
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-1 control-label" for="number"><?php echo e(trans('cruds.category.fields.salescode')); ?></label>
                            <div class="col-sm-3">
                                <select name="attribute1" id="attribute1" class="form-control select2" value="<?php echo e($category->attribute1); ?>" required>
                                    <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->account_code == $category->attribute1): ?>
                                    <option selected value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('account_code')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('account_code')); ?>

                                </p>
                                <?php endif; ?>
                                <p class="helper-block">
                                </p>
                            </div>
                            <label class="col-sm-1 control-label" for="number"><?php echo e(trans('cruds.category.fields.cogscode')); ?></label>
                            <div class="col-sm-3">
                                <select name="consumption_account_code" id="consumption_account_code" class="form-control select2" value="<?php echo e($category->consumption_account_code); ?>" required>
                                    <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->account_code == $category->consumption_account_code): ?>
                                    <option selected value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($row->account_code); ?>"><?php echo e($row->account_code); ?> <?php echo e($row->description); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('account_code')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('account_code')); ?>

                                </p>
                                <?php endif; ?>
                                <p class="helper-block">
                                </p>
                            </div>
                            <label class="col-sm-1 control-label" for="number"><?php echo e(trans('cruds.category.fields.note')); ?></label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" name="Attribute2" placeholder="Country">
                            </div>
                        </div>
                        <br>
                        <!-- /.box-body -->

                        <div class="d-flex justify-content-between mb-1 mt-1">
                            <button type="reset" class="btn btn-danger pull-left">Reset</button>
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>