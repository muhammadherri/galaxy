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
        <div class="card">
            <div class="card-header  mt-1 mb-25">
                <h6 class="card-title">
                    <a href="<?php echo e(route("admin.arCalendar.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.aReceivable.title')); ?> </a>
                    <a href="<?php echo e(route("admin.arCalendar.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.aReceivable.cal')); ?> </a>
                    <a href="<?php echo e(route("admin.arCalendar.create")); ?>" class="breadcrumbs__item">Create </a>
                </h6>
            </div>
            <hr>

            <div class="card-body">
                <form action="<?php echo e(route('admin.arCalendar.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="box box-default">
                            <div class="box-body scrollx" style="height: 450px;overflow: scroll;">
                                    <table class="table table-striped tableFixHead">
                                    <thead>
                                        <th>Line</th>
                                        <th scope="col"><?php echo e(trans('cruds.aReceivable.ar_calendar.num')); ?></th>
                                        <th scope="col"> <?php echo e(trans('cruds.aReceivable.ar_calendar.name')); ?></th>
                                        <th scope="col"><?php echo e(trans('cruds.aReceivable.ar_calendar.year')); ?></th>
                                        <th scope="col"><?php echo e(trans('cruds.aReceivable.ar_calendar.from')); ?></th>
                                        <th scope="col"><?php echo e(trans('cruds.aReceivable.ar_calendar.to')); ?></th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="arCalendar_container">
                                        <tr class="tr_input">
                                            
                                            <td class="rownumber">1</td>
                                            <td width="5%">
                                                <input type="number" class="form-control" name="num[]" id="year_1" autocomplete="off">
                                            </td>
                                            <td width="30%">
                                                <input type="text" class="form-control"  name="setname[]" id="name_1" autocomplete="off" required >
                                                <input type="number" hidden id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>" class="form-control">
                                            </td>
                                            <td width="20%">
                                                <input type="number" class="form-control" name="year[]" id="year_1" autocomplete="off">
                                            </td>
                                            <td width="20%">
                                                    <input type="date" name="startdate[]" class="form-control datepicker" id="from_1" autocomplete="off" required>
                                            </td>
                                            <td width="20%">
                                                    <input type="date" name="enddate[]" class="form-control datepicker" id="to_1"  autocomplete="off">
                                            </td>
                                            <td width="5%"><button type="button"  class="btn btn-ligth btn-sm remove_tr_quotation" disabled>X</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td colspan="2">
                                            <button type="button" class="btn btn-light btn-sm add_arCalendar" style="font-size: 12px;"><i data-feather='plus'></i> Add Rows</button>
                                        </td>
                                        <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    </br>
                        <div class="d-flex justify-content-between mb-2">
                            <button class="btn btn-warning" type="reset"><i data-feather='refresh-ccw'></i> Reset</button>
                            <button class="btn btn-primary btn-submit"><i data-feather='save'></i> <?php echo e(trans('global.save')); ?></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function () {
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_delete')): ?>
            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.purchase-requisition.massDestroy')); ?>",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

                        return
                    }

                    if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                        $.ajax({
                        headers: {'x-csrf-token': _token},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }})
                        .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
        <?php endif; ?>
    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/arCalendar/create.blade.php ENDPATH**/ ?>