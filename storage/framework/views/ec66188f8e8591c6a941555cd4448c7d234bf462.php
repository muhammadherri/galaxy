<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">
                        <a href="<?php echo e(route("admin.quotation.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.quotation.po')); ?> </a>
                        <a href="<?php echo e(route("admin.quotation.index")); ?>" class="breadcrumbs__item"> <?php echo e(trans('cruds.quotation.title_singular')); ?></a>
                    </h6>
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo e(route("admin.quotation.create")); ?>">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg></span>
                                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.quotation.title_singular')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable table-flush-spacing datatable-Order">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.quotation.fields.id')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.quotation.fields.site')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.quotation.fields.supplier')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.quotation.fields.number')); ?>

                                    </th>
                                    <th class="text-center">
                                        <?php echo e(trans('cruds.quotation.fields.currency')); ?>

                                    </th>
                                    <th class="text-end">
                                        <?php echo e(trans('cruds.quotation.fields.effective_date')); ?>

                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $quotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-entry-id="<?php echo e($raw->line_id); ?>">
                                    <td>

                                    </td>
                                    <td>
                                        <?php echo e($raw->vendor_id ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($raw->vendor_site_id ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($raw->vendor->vendor_name ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($raw->segment1 ?? ''); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($raw->currency_code ?? ''); ?>

                                    </td>
                                    <td class="text-end">
                                        <?php echo e($raw->effective_date ?? ''); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_show')): ?>
                                        <a class="badge btn btn-primary btn-sm" href="<?php echo e(route('admin.quotation.show', $raw->id)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_edit')): ?>
                                        <a class="badge btn btn-warning btn-sm waves-effect waves-float waves-light" href="<?php echo e(route('admin.quotation.edit', $raw->id)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_delete')): ?>
                                        <form action="<?php echo e(route('admin.quotation.destroy', $raw->id)); ?>" method="POST" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <button type="submit" class="badge btn btn-sm btn-danger hapusdata" value="" style="  vertical-align: super;"> <?php echo e(trans('global.delete')); ?> </button>
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
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function() {
        console.log('fungsi');
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_delete')): ?>
        let deleteButtonTrans = '<?php echo e(trans('
        global.datatables.delete ')); ?>'
        let deleteButton = {
            text: deleteButtonTrans
            , url: "<?php echo e(route('admin.orders.massDestroy')); ?>"
            , className: 'btn-danger'
            , action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('<?php echo e(trans('
                        global.datatables.zero_selected ')); ?>')

                    return
                }

                if (confirm('<?php echo e(trans('
                        global.areYouSure ')); ?>')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            }
                            , method: 'POST'
                            , url: config.url
                            , data: {
                                ids: ids
                                , _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        <?php endif; ?>

        $.extend(true, $.fn.dataTable.defaults, {
            order: [
                [1, 'desc']
            ]
            , pageLength: 100
        , });
        $('.datatable-Order:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/quotation/index.blade.php ENDPATH**/ ?>