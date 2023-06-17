<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">
                <a href="<?php echo e(route('admin.opunit.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OpUnit.title')); ?>

                </a>
                <a href="<?php echo e(route('admin.opunit.index')); ?>"
                    class="breadcrumbs__item"><?php echo e(trans('cruds.OpUnit.title_singular')); ?></a>
            </h6>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-primary" href="<?php echo e(route('admin.opunit.create')); ?>" style="margin-top: 1%;">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg></span>
                            <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.OpUnit.title_add')); ?>

                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-body">

            <table data-toggle="table" id="table-item" class=" table  table-hover datatable display" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                                <?php echo e(trans('cruds.OpUnit.fields.short_name')); ?>

                        </th>
                        <th>
                                <?php echo e(trans('cruds.OpUnit.fields.name')); ?>

                        </th>
                        <th>
                                <?php echo e(trans('cruds.OpUnit.fields.capacity')); ?>

                        </th>
                        <th>
                                <?php echo e(trans('cruds.OpUnit.fields.range_capacity_max')); ?>

                        </th>
                        <th>
                                <?php echo e(trans('cruds.OpUnit.fields.range_capacity_min')); ?>

                        </th>
                        <th>
                                <?php echo e(trans('cruds.OpUnit.fields.machine_status')); ?>

                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
                    $.fn.dataTable.ext.errMode = 'none';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var table = $('#table-item').DataTable({
                        "bServerSide": true,
                        ajax: {
                            url: '<?php echo e(url('search/op-unit')); ?>',
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: function(d) {
                                return d
                            }
                        },
                        responsive: true,
                        scrollX: true,
                        dom: '<"card-header border-bottom"<"head-label"><"dt-action-buttons text-end">>\
                                <"d-flex justify-content-between row mt-1"<"col-sm-12 col-md-6"Bl><"col-sm-12 col-md-2"f><"col-sm-12 col-md-2"p>t>',
                        displayLength: 20,
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        buttons: [{
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Print',
                            className: '',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Csv',
                            className: '',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Excel',
                            className: '',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Pdf',
                            className: '',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Copy',
                            className: '',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, {
                            extend: 'colvis',
                            text: feather.icons['eye'].toSvg({
                                class: 'font-small-4 me-50'
                            }) + 'Colvis',
                            className: '',
                        }, ],
                        columns: [{
                            data: 'id',
                            className: "text-center"
                        }, {
                            data: 'short_name'
                        }, {
                            data: 'name'
                        }, {
                            data: 'capacity'
                        }, {
                            data: 'range_capacity_max',
                            className: "text-center"
                        }, {
                            data: 'range_capacity_min',
                            className: "text-center"
                        },{
                            data: 'machine_status',
                            className: "text-center",
                            render: function (data, type, row) {
                                if(row.machine_status == 0) {
                                    return '<span class="badge bg-warning"> Maintenance </span>';
                                }else if(row.machine_status == 1) {
                                    return '<span class="badge bg-primary"> Ready </span>';
                                }else{
                                    return '<span class="badge bg-danger"> Off </span>';
                                }
                            }
                        },{
                            data: 'id',
                            className: "text-center",
                            render: function (data, type, row) {
                                return `<a class="btn btn-sm btn-warning" href="opunit/${row.id}/edit">
                                        <?php echo e(trans('global.edit')); ?>

                                    </a>`
                            }
                        }
                ],
                });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/opunit/index.blade.php ENDPATH**/ ?>