<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-validation.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="card-title">
            <a href="<?php echo e(route("admin.gsm.index")); ?>" class="breadcrumbs__item">Manufacturing </a>
            <a href="<?php echo e(route("admin.gsm.index")); ?>" class="breadcrumbs__item"> Gramatur </a>
        </h6>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_create')): ?>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="<?php echo e(route("admin.gsm.create")); ?>">
                    <span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
					</span>
					<?php echo e(trans('global.add')); ?>

                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">
                            <?php echo e(trans('cruds.user.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.user.fields.name')); ?>

                        </th>
                        <th class="text-end">
                           GSM
                        </th>
                        <th class="text-end">
                            Value
                        </th>
                        <th class="text-center">
                            Operation
                        </th>
                        <th class="text-center">
                            <?php echo e(trans('global.action')); ?>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $gramatur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-entry-id="<?php echo e($row->id); ?>">
                        <td>
                            <?php echo e($row->id ?? ''); ?>

                        </td>
                        <td>
                            <?php echo e($row->item_description ?? ''); ?>

                        </td>
                        <td class="text-end">
                            <?php echo e($row->gsm ?? ''); ?>

                        </td>
                        <td class="text-end">
                            <?php echo e($row->value ?? ''); ?>

                        </td>
                        <td class="text-center">
                            <?php echo e($row->operation ?? ''); ?>

                        </td>
                         <td class="text-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_show')): ?>
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.gsm.show', $row->id)); ?>">
                                <?php echo e(trans('global.view')); ?>

                            </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_edit')): ?>
                            <a class="btn btn-sm btn-warning" href="<?php echo e(route('admin.gsm.edit', $row->id)); ?>">
                                <?php echo e(trans('global.edit')); ?>

                            </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                            <form action="<?php echo e(route('admin.gsm.destroy', $row->id)); ?>" method="POST" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="submit" class="btn btn-sm btn-danger hapusdata" value="<?php echo e(trans('global.delete')); ?>">
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/gramaturstd/index.blade.php ENDPATH**/ ?>