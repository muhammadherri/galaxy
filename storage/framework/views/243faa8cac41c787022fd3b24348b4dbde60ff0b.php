<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('script'); ?>
        <script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
    
<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_create')): ?>
    <?php endif; ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">
                <a href="<?php echo e(route('admin.qm-material.index')); ?>"
                    class="breadcrumbs__item"><?php echo e(trans('cruds.quality_management.title')); ?> </a>
                <a href="<?php echo e(route('admin.qm-material.index')); ?>" class="breadcrumbs__item">
                    <?php echo e(trans('cruds.quality_management.material')); ?> </a>
            </h6>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg></span>
                            Material Quality </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="qm" class="table table-striped " data-source="data-source">
                    <thead>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.id')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.aju')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.supplier')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.item')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.qty')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.long')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.short')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.out_throw')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.prohibitive')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.moisture')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.grade')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.hasil1')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.hasil2')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.hasil3')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.hasil4')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.total')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.waktu')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.free')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.gsm')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.thick')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.bright')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.light')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.ash')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.bst')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.rct')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.density')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.strength')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.hydra')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.quality_management.fields.keterangan')); ?>

                            </th>
                            <th>
                                #
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <form action="<?php echo e(route('admin.qm-material.create')); ?>" method="GET" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <!-- Modal Example Start-->
        <div class="modal fade" id="modaladd" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="control-label" for="number" required>AJU</label>
                                </div>
                                <div class="mb-3 col-md-8">
                                    <select id="aju" name="aju" class="form-control select2 filterMissExpense">
                                        <option selected></option>
                                        <?php $__currentLoopData = $rcv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($row->transaction_type == 'RECEIVE'): ?>
                                                <option value="<?php echo e($row->attribute1); ?>"><?php echo e($row->attribute1); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i data-feather='plus'></i>Transaction
                                Lines</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
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
            vendor = $("#vendor_id").val();
            min = $("#min").val();
            max = $("#max").val();
            rev = $("#rev").val();

            const table = $('#qm').DataTable({
                "bServerSide": true,
                ajax: {
                    url: '<?php echo e(url('search/qm_report')); ?>',
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        return d
                    }
                },
                responsive: false,
                scrollY: true,
                dom: '<"card-header border-bottom"<"head-label"><"dt-action-buttons text-end">>\
                        <"d-flex justify-content-between row mt-1"<"col-sm-12 col-md-6"Bl><"col-sm-12 col-md-2"f><"col-sm-12 col-md-2"p>t>',
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                },
                displayLength: 10,
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
                    className: ''
                }, {
                    text: feather.icons['filter'].toSvg({
                        class: 'font-small-4 me-50 '
                    }) + 'Filter',
                    className: 'btn-warning',
                    action: function(e, node, config) {
                        $('#modalFilter').modal('show')
                    },
                }, {
                    text: feather.icons['edit'].toSvg({
                        class: 'font-small-4 me-50 '
                    }) + 'Set',
                    className: 'btn-secondary',
                    action: function(e, node, config) {
                        $('#modalSet').modal('show')
                    },
                }, ],
                columnDefs: [{
                    render: function(data, type, row, index) {
                        var info = table.page.info();
                        return index.row + info.start + 1;
                    },
                    targets: [0]
                }, {
                    render: function(data, type, row, index) {
                        content = `<a class="btn btn-sm btn-info" href="qm-material/${row.id}/edit">
                                <?php echo e(trans('global.actions')); ?>

                                  </a>`;
                        return content;
                    },
                    targets: [29]
                }],
                columns: [{
                    data: 'id',
                    className: "text-center"
                }, {
                    data: 'attribute_aju'
                }, {
                    data: 'vendor'
                }, {
                    data: 'inventory_item_id'
                }, {
                    data: 'quantity',
                    className: "text-end"
                }, {
                    data: 'attribute_long',
                    className: "text-end"
                }, {
                    data: 'attribute_short',
                    className: "text-end"
                }, {
                    data: 'attribute_outtrhow',
                    className: "text-end"
                }, {
                    data: 'attribute_prohibitive',
                    className: "text-end"
                }, {
                    data: 'attribute_moisture',
                    className: "text-end"
                }, {
                    data: 'attribute_grade',
                    className: "text-end"
                }, {
                    data: 'intattribute1',
                    className: "text-end"
                }, {
                    data: 'intattribute2',
                    className: "text-end"
                }, {
                    data: 'intattribute3',
                    className: "text-end"
                }, {
                    data: 'intattribute4',
                    className: "text-end"
                }, {
                    data: 'intattribute5',
                    className: "text-end"
                }, {
                    data: 'date_time',
                    className: "text-end"
                }, {
                    data: 'attribute_free',
                    className: "text-end"
                }, {
                    data: 'attribute_gsm',
                    className: "text-end"
                }, {
                    data: 'attribute_thick',
                    className: "text-end"
                }, {
                    data: 'attribute_bright',
                    className: "text-end"
                }, {
                    data: 'attribute_light',
                    className: "text-end"
                }, {
                    data: 'attribute_ash',
                    className: "text-end"
                }, {
                    data: 'attribute_bst',
                    className: "text-end"
                }, {
                    data: 'attribute_rct',
                    className: "text-end"
                }, {
                    data: 'attribute_density',
                    className: "text-end"
                }, {
                    data: 'attribute_strength',
                    className: "text-end"
                }, {
                    data: 'attribute_hydra',
                    className: "text-end"
                }, {
                    data: 'attribute_note'
                }]
            })

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/materialQuality/index.blade.php ENDPATH**/ ?>