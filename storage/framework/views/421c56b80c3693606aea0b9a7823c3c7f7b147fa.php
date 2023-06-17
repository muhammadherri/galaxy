<?php $__env->startSection('content'); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<div class="card">
    <div class="card-header  mt-1 mb-1">

        <h6 class="card-title">
            <a href="<?php echo e(route("admin.inventory.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.physic.fields.inv')); ?> </a>
            <a href="<?php echo e(route("admin.inventory.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.inventory.title_singular')); ?> </a>
        </h6>
    </div>
    <div class="card-body">
        <table id="report_onhand" class=" table display  w-100" class="display">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        <?php echo e(trans('cruds.inventory.fields.item_number')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.inventory.fields.description')); ?>

                    </th>
                    <th class="text-center">
                        <?php echo e(trans('cruds.inventory.fields.category')); ?>

                    </th>
                    <th class="text-center">
                        <?php echo e(trans('cruds.inventory.fields.subinventory')); ?>

                    </th>
                    <th class="text-center">
                        <?php echo e(trans('cruds.inventory.fields.location')); ?>

                    </th>
                    <th class="text-center">
                        UOM
                    </th>

                    <th class="text-end">
                        <?php echo e(trans('cruds.inventory.fields.qty')); ?>

                    </th>
                    <th class="text-center">
                        <?php echo e(trans('cruds.inventory.fields.updated_at')); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <th colspan="4" id="total_order" class="text-end"></th>
                </tr>
            </tfoot>
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
        vendor = $("#vendor_id").val();
        min = $("#min").val();
        max = $("#max").val();
        rev = $("#rev").val();

        const table = $('#report_onhand').DataTable({
            "bServerSide": true
            , ajax: {
                url: '<?php echo e(url("search/onhand-report")); ?>'
                , type: "POST"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: function(d) {
                    d.vendor = $('#vendor_id').val();
                    d.min = $("#min").val();
                    d.max = $("#max").val();
                    d.rev = $("#rev").val();
                    return d
                }
            }
            , responsive: false
            , scrollX: true
            , searching: true
            , dom: '<"card-header border-bottom"<"head-label"><"dt-action-buttons text-end">>\
                    <"d-flex justify-content-between row mt-1"<"col-sm-12 col-md-6"Bl><"col-sm-12 col-md-2"f><"col-sm-12 col-md-2"p>t>'
            , displayLength: 20
            , "lengthMenu": [
                [10, 25, 50, -1]
                , [10, 25, 50, "All"]
            ]
            , buttons: [{
                    extend: 'print'
                    , text: feather.icons['printer'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Print'
                    , className: ''
                    , exportOptions: {
                        columns: ':visible'
                    }
                }
                , {
                    extend: 'csv'
                    , text: feather.icons['file-text'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Csv'
                    , className: ''
                    , exportOptions: {
                        columns: ':visible'
                    }
                }
                , {
                    extend: 'excel'
                    , text: feather.icons['file'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Excel'
                    , className: ''
                    , exportOptions: {
                        columns: ':visible'
                    }
                }
                , {
                    extend: 'pdf'
                    , text: feather.icons['clipboard'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Pdf'
                    , className: ''
                    , exportOptions: {
                        columns: ':visible'
                    }
                }
                , {
                    extend: 'copy'
                    , text: feather.icons['copy'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Copy'
                    , className: ''
                    , exportOptions: {
                        columns: ':visible'
                    }
                }
                , {
                    extend: 'colvis'
                    , text: feather.icons['eye'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Colvis'
                    , className: ''
                }
                // , {
                //     text: feather.icons['filter'].toSvg({
                //         class: 'font-small-4 me-50 '
                //     }) + 'Filter'
                //     , className: 'btn-warning'
                //     , action: function(e, node, config) {
                //         $('#modalFilter').modal('show')
                //     }
                // , }
            ]
            , columnDefs: [{

                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                    , targets: [0]
                }, {
                    render: function(data, type, row, index) {
                        return type === 'display' && data.length > 50 ?
                            '<span id="outer" title="' + data + '">' + data.substr(0, 60) + '</span><span id="show"> ...</span>' :
                            data;
                    }
                    , targets: [2]
                }

            ]
            , columns: [{
                    data: 'id'
                    , className: "text-center"
                }
                , {
                    data: 'item_code'
                }, {
                    data: 'description'
                }, {
                    data: 'category'
                }, {
                    data: 'subinventory_code'
                }, {
                    data: 'fix_loc'
                }, {
                    data: 'primary_uom_code'
                    , className: "text-center"
                }, {
                    data: 'transaction_quantity'
                    , className: "text-end"
                }, {
                    data: 'transaction_date'
                    , className: "text-end"
                }
            ]
            , language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;'
                    , next: '&nbsp;'
                }
            }
            , "footerCallback": function(tfoot, data, start, end, display) {
                var api = this.api();

                var length = table.page.info().recordsTotal;

                $(api.column(5).footer()).html(length.toLocaleString() + ' Active Items');
            }
        })
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/inventory/index.blade.php ENDPATH**/ ?>