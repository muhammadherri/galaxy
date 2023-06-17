<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">

        <h6 class="card-title">
            <a href="<?php echo e(route("admin.mtl-transfer.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.physic.fields.inv')); ?> </a>
            <a href="<?php echo e(route("admin.mtl-transfer.index")); ?>" class="breadcrumbs__item">Subinventory Transfer </a>
        </h6>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd" onclick="generateRandomNumber()">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg></span>
                    <?php echo e(trans('global.add')); ?> Transfer
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <table id="table-trf" class=" table table-striped display" style="width:100%" data-source="data-source">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Item Code
                    </th>
                    <th>
                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo e(trans('cruds.trx.fields.item')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        <?php echo e(trans('cruds.trx.fields.from')); ?>

                    </th>
                    <th class="text-start">
                        <?php echo e(trans('cruds.trx.fields.to')); ?>

                    </th>
                    <th class="text-center">
                        Qty
                    </th>
                    <th class="text-center">
                        UOM
                    </th>
                    <th class="text-start">
                        Reference
                    </th>
                    <th class="text-center">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>
<!-- Modal Example Start-->
<div class="modal fade" id="modaladd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="<?php echo e(route("admin.mtl-transfer.create")); ?>" method="GET" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <input type="text" id="datepicker-1" class="form-control datepicker" value="<?php echo e(date('m/d/Y')); ?>" autocomplete="off" required name="transaction_date">
                                <br>
                            </div>
                        </div>
                        </br>
                        <div class=" form-group row">
                            <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" name="transaction_type">
                                    <?php $__currentLoopData = $trx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($trx->trx_code); ?>"> <?php echo e($trx->trx_actions); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </br>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="inputPassword3" class="col-sm-2 control-label">Source</label>
                            <div class="col-sm-10">
                                <input type="text" name="source" value="" class="form-control" id="idtrf" autocomplete="off"> </br>
                            </div>
                        </div>
                        </br>
                        <div class="d-flex justify-content-between">
                            <div> </div>
                            <button type="submit" class="btn btn-primary pull-right"><i data-feather='plus'></i>Transaction Lines</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Example Start-->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    function generateRandomNumber() {
        var date = new Date();

        var year = date.getFullYear();
        var twoDigitYear = year.toString().slice(-2);
        var hours = date.getHours();
        var day = date.getDate();
        var seconds = date.getSeconds();
        var randomNumber = "T-" + twoDigitYear + day + hours + seconds;
        document.getElementById("idtrf").value = randomNumber;
    }
    $(function() {
        $("#datepicker-1").datepicker({
            maxDate: 0
        });
    });
    $(document).ready(function() {


        $.fn.dataTable.ext.errMode = 'none';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#table-trf').DataTable({
            "bServerSide": true
            , ajax: {
                url: '<?php echo e(url("search/trf-report")); ?>'
                , type: "GET"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: function(d) {
                    return d
                }
            }
            , responsive: true
            , scrollX: true
            , searching: true
            , dom: '<"card-header border-bottom"<"head-label"><"dt-action-buttons text-end">>\
                    <"d-flex justify-content-between row mt-1"<"col-sm-12 col-md-6"Bl><"col-sm-12 col-md-2"f><"col-sm-12 col-md-2"p>t>'
            , displayLength: 15
            , "lengthMenu": [
                    [10, 25, 50, -1]
                    , [10, 25, 50, "All"]
                ]

            , columnDefs: [{

                    render: function(data, type, row, index) {
                        var info = table.page.info();
                        return index.row + info.start + 1;
                    }
                    , targets: [0]
                }, {
                    render: function(data, type, row, index) {
                        return type === 'display' && data.length > 50 ?
                            '<span id="outer" title="' + data + '">' + data.substr(0, 50) + '</span><span id="show"> ...</span>' :
                            data;
                    }
                    , targets: [2]
                }

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
                    , customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt')


                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', '10pt');
                    }
                    , header: true
                    , title: '<i>Internal</i> Surat Jalan</br> '
                    , orientation: 'landscape'
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
                // ,
                // {
                //     text: feather.icons['filter'].toSvg({
                //         class: 'font-small-4 me-50 '
                //     }) + 'Filter'
                //     , className: 'btn-warning'
                //     , action: function(e, node, config) {
                //         $('#modalFilter').modal('show')
                //     }
                // , }
            , ]
            , columns: [{
                    data: 'id'
                    , className: "text-center"
                , }
                , {
                    data: 'item_code'
                    , className: "text-start"
                }, {
                    data: 'product'
                    , className: "text-start"
                }, {
                    data: 'category'
                    , className: "text-start"
                }, {
                    data: 'subinventory_code'
                    , className: "text-start"
                }, {
                    data: 'transfer_subinventory'
                    , className: "text-start"
                }, {
                    data: 'transaction_quantity'
                    , className: "text-end"
                }, {
                    data: 'primary_uom_code'
                    , className: "text-center"
                }, {
                    data: 'transaction_reference'
                    , className: "text-start"
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

        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/mtlTransfer/index.blade.php ENDPATH**/ ?>