<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-validation.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-wizard.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/forms/form-wizard.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/currency.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    
    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="modern-horizontal-wizard">
        <div class="bs-stepper wizard-modern modern-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#step1" role="tab" id="step1-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                            <i data-feather="file-text" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Work Order</span>
                            <span class="bs-stepper-subtitle">Work Order</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#step2" role="tab" id="step2-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">
                            <i data-feather="info" class="font-medium-3"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Out Standing</span>
                            <span class="bs-stepper-subtitle">Out Standing</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>

            </div>
            
            <div id="step1" class="content" role="tabpanel" aria-labelledby="step1-trigger">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            <a href="<?php echo e(route('admin.prodplan.index')); ?>"
                                class="breadcrumbs__item"><?php echo e(trans('cruds.bom.manufacture')); ?> </a>
                            <a href="<?php echo e(route('admin.prodplan.index')); ?>" class="breadcrumbs__item">
                                <?php echo e(trans('cruds.workorder.title')); ?> </a>
                        </h6>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                            <div class="row">
                                <div class="">
                                    <a class="btn btn-primary" href="<?php echo e(route('admin.work-order.create')); ?>">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-plus me-50 font-small-4">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg></span>
                                        <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.workorder.title')); ?>

                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="wotables" class="table table-bordered table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox"name="" class="" id="">
                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.wonum')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.invitem')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.type')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.needdate')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.crtby')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.status')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('cruds.workorder.table.action')); ?>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="step2" class="content" role="tabpanel" aria-labelledby="step2-trigger">
                <?php echo $__env->make('admin.workOrder.outstanding', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <!-- Start Modal Filter -->
        <?php echo $__env->make('admin.stdReports.globalFilter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.stdReports.bsFilter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END  Modal Filter -->
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
            var table = $('#wotables').DataTable({
                ajax: {
                    url: "/search/workorder",
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(d) {
                        return d
                    }
                },
                responsive: false,
                searching: true,
                scrollY: true,
                dom: '<"card-header border-bottom"\
                        <"head-label">\
                        <"dt-action-buttons text-end">\
                    >\
                    <"d-flex justify-content-between row mt-1"\
                        <"col-sm-12 col-md-8"Bl>\
                        <"col-sm-12 col-md-2"f>\
                        <"col-sm-12 col-md-2"p>\
                      ti>',
                "lengthMenu": [
                    [5, 25, 50, -1],
                    [5, 25, 50, "All"]
                ],
                columnDefs: [{
                        "targets": 0,
                        width: "0%",
                        className: "text-center",
                        "render": function(data, type, row, meta) {
                            return (`
                            <input type="checkbox" class="form-check-input cb-child item_check" name="id[]" id="${row.id}" value="${row.id}">
                        `);
                        }
                    },
                    {
                        "targets": 1,
                        "render": function(data, type, row, meta) {
                            return row.wonumber;
                        }
                    },
                    {
                        "targets": 2,
                        "render": function(data, type, row, meta) {
                            return row.invitem;
                        }
                    },
                    {
                        "targets": 3,
                        className: "text-center",
                        "render": function(data, type, row, meta) {
                            return row.work_order_type;
                        }
                    },
                    {
                        "targets": 4,
                        "render": function(data, type, row, meta) {
                            return row.needdate;
                        }
                    },
                    {
                        "targets": 5,
                        "render": function(data, type, row, meta) {
                            return row.created;
                        }
                    },
                    {
                        "targets": 6,
                        className: "text-center",
                        render: function(data, type, row, meta) {
                            if (row.closed_date != null || row.status_change_reason != null) {
                                return '<a class="badge bg-primary text-white">Done</a>'
                            } else if (row.canceled_date != null) {
                                return '<a class="badge bg-danger text-white">Cancel</a>'
                            } else {
                                return '<a class="badge bg-info text-white">On Progress</a>'
                            }
                        }
                    },
                    {
                        "targets": 7,
                        "render": function(data, type, row, index) {
                            view = `
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_show')): ?>
                                <a class="btn btn-primary btn-sm" href="work-order/${row.id}">
                                    <?php echo e(trans('global.view')); ?>

                                </a>
                            <?php endif; ?>
                        `;
                            edit = `
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_edit')): ?>
                                <a class="btn btn-info btn-sm waves-effect waves-float waves-light" href="work-order/${row.id}/edit">
                                    <?php echo e(trans('global.open')); ?>

                                </a>
                            <?php endif; ?>
                        `;
                            return view + edit;

                        }
                    },

                ],
                language: {
                    paginate: {
                        // remove previous & next text from pagination
                        previous: '&nbsp;',
                        next: '&nbsp;'
                    }
                }
            })
        });
        // $(function () {
        //     let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        //     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete')): ?>
        //         let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
        //         let deleteButton = {
        //             text: deleteButtonTrans,
        //             url: "<?php echo e(route('admin.roles.massDestroy')); ?>",
        //             className: 'btn-danger',
        //             action: function (e, dt, node, config) {
        //                 var ids = $.map(dt.rows({
        //                     selected: true
        //                 }).nodes(), function (entry) {
        //                     return $(entry).data('entry-id')
        //                 });

        //                 if (ids.length === 0) {
        //                     alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        //                     return
        //                 }

        //                 if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        //                     $.ajax({
        //                             headers: {
        //                                 'x-csrf-token': _token
        //                             },
        //                             method: 'POST',
        //                             url: config.url,
        //                             data: {
        //                                 ids: ids,
        //                                 _method: 'DELETE'
        //                             }
        //                         })
        //                         .done(function () {
        //                             location.reload()
        //                         })
        //                 }
        //             }
        //         }
        //         dtButtons.push(deleteButton)
        //     <?php endif; ?>

        //     $.extend(true, $.fn.dataTable.defaults, {
        //         order: [
        //             [1, 'desc']
        //         ],
        //         pageLength: 10,
        //     });
        // });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/workOrder/index.blade.php ENDPATH**/ ?>