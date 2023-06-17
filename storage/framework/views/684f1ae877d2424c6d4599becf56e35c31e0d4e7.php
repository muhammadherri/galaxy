<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header ">
        <h6 class="card-title">
            <a href="<?php echo e(route('admin.bom.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.bom.manufacture')); ?> </a>
            <a href="<?php echo e(route('admin.bom.index')); ?>" class="breadcrumbs__item"> <?php echo e(trans('cruds.prod.bom')); ?> </a>
        </h6>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="<?php echo e(route('admin.bom.create')); ?>">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.prod.bom')); ?>

                </a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table-bordered table-hover datatable table-flush-spacing table-responsive-lg table">
                <thead>
                    <tr>
                        <th class="display:none;">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.parent_item')); ?>

                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.child_item')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.child_item_uom')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.child_item_type')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.usage')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.cost')); ?>

                        </th>
                        <th class="text-end">
                            <?php echo e(trans('cruds.bom.fields.created_at')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.bom.fields.action')); ?>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php($first = true) ?>
                    <?php $__currentLoopData = $bom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-entry-id="">
                        <td class=" text-center;display:none; "><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($row->parent_item ?? ''); ?> - <?php echo e($row->parent_description ?? ''); ?></td>
                        <td><?php echo e($row->parent_item_type ?? ''); ?></td>
                        <td title="<?php echo e($row->child_description ?? ''); ?>"><?php echo e(substr($row->child_description ?? '', 0, 35)); ?> . . . </td>
                        <td class="text-center"><?php echo e($row->uom ?? ''); ?> </td>
                        <td class="text-center"><?php echo e($row->child_item_type ?? ''); ?></td>
                        <td class="text-end"><?php echo e($row->usage ?? ''); ?></td>
                        <td class="text-end"><?php echo e($row->standard_cost ?? ''); ?></td>
                        <td class="text-end"><?php echo e($row->created_at->isoFormat('D-MM-Y') ?? ''); ?></td>
                        <td class="text-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_show')): ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.bom.show', $row->id)); ?>">
                                <?php echo e(trans('global.view')); ?>

                            </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_edit')): ?>
                            <a class="btn btn-warning btn-sm waves-effect waves-float waves-light" href="<?php echo e(route('admin.bom.edit', $row->id)); ?>">
                                <?php echo e(trans('global.edit')); ?>

                            </a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/bom/index.blade.php ENDPATH**/ ?>