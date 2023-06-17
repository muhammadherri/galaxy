<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h6 class="card-title">
            <a href="<?php echo e(route("admin.completion.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.bom.manufacture')); ?> </a>
            <a href="<?php echo e(route("admin.completion.index")); ?>" class="breadcrumbs__item"> <?php echo e(trans('cruds.workorder.serial.completion')); ?> </a>
        </h6>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus me-50 font-small-4"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></span>
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.workorder.serial.completion')); ?>

                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="completionTable" class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th width="5">
                            <input class="form-check-input item_check text-end" id="filtercheck" type="checkbox" value="" />
                        </th>
                        <th>
                            <?php echo e(trans('cruds.workorder.serial.invitem')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.workorder.serial.roll')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.workorder.serial.qty')); ?>

                        <th>
                            <?php echo e(trans('cruds.workorder.serial.gsm')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.workorder.serial.width')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.workorder.serial.created')); ?>

                        </th>
                        <th>
                            Work Order Number
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                           <?php echo e(trans('cruds.workorder.serial.action')); ?>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $__currentLoopData = $completion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="">
                            <td width="5px" class="text-center"></td>
                            <td><?php echo e($row->itemmaster->item_code ?? $row->inventory_item_id); ?> - <?php echo e($row->itemmaster->description ?? ''); ?>   </td>
                            <td><?php echo e($row->uniq_attribute_roll); ?></td>
                            <td class="text-end"><?php echo e($row->primary_quantity ?? ''); ?></td>
                            <td class="text-end"><?php echo e($row->attribute_number_gsm); ?> </td>
                            <td class="text-end"><?php echo e($row->attribute_number_w); ?> </td>
                            <td class="text-center"><?php echo e($row->completion_date ?? ''); ?></td>
                            <td class="text-center"><?php echo e($row->attribute_char ?? ''); ?></td>
                            <td class="text-center">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('item_edit')): ?>
                                    <a class="btn btn-info btn-sm waves-effect waves-float waves-light" href="<?php echo e(route('admin.completion.edit', $row->id)); ?>">
                                        <?php echo e(trans('global.open')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="<?php echo e(route("admin.completion.create")); ?>" method="GET" class="form_submit" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <!-- Modal Example Start-->
    <div class="modal fade" id="modaladd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header mb-2">
                    <label class="control-label" for="number" required>Select Code</label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="control-label" for="number" required> Work Order Number</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control search_work_order " placeholder="Type here ..." name="item_code[]" id="searchitem_1" autocomplete="off" required>
                                <span class="help-block search_item_code_empty glyphicon" style="display: none;"> No Results Found </span>
                                <input type="hidden" class="form-control" id="id" name="code_id" autocomplete="off">
                                <input type="hidden" class="form-control" id="type" name="type">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i data-feather='plus'></i>Transaction Lines</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<form action="#">
    <div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white" id="exampleModalLongTitle">Filter</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="number">Created at</label>
                                    <input type="date" class="form-control search_supplier_name" id="min" name="transaction_datefrom" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="col-sm-0 control-label" for="rate"><?php echo e(trans('cruds.rcv.fields.orderto')); ?></label>
                                    <input type="date" class="form-control search_supplier_name" id="max" name="transaction_dateto" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="completion_filter" class="btn btn-primary completion_filter" name="action">View</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        , }
    });
    $(document).on('click', '.completion_filter', function() {
            var min = $("#min").val();
            var max = $("#max").val();
            console.log(min);
            console.log(max);
            $('#modalFilter').modal('hide');
            $('#completionTable').DataTable().ajax.reload()
    });
    $(document).ready(function() {
        var table = $('#completionTable').DataTable({
            "bServerSide": true
            ,"bDestroy": true
            , "lengthMenu": [
                [10, 25, 'All']
                , [10, 25, 'All']
            ],

            searching: true
            , displayLength: 15
            , responsive: false
            , scrollX: true
            , dom: '<"card-header border-bottom"<"head-label"><"dt-action-buttons text-end">>\
                    <"d-flex justify-content-between row mt-1"<"col-sm-12 col-md-6"Bl><"col-sm-12 col-md-2"f><"col-sm-12 col-md-2"p>t>'
            , buttons: [{
                    text: feather.icons['printer'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Print'
                    , className: 'print'
                    , attr: {
                        id: 'print'
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
                },
                {
                    text: feather.icons['filter'].toSvg({
                        class: 'font-small-4 me-50 '
                    }) + 'Filter'
                    , className: 'btn-warning'
                    , action: function(e, node, config) {
                        $('#modalFilter').modal('show')
                    }
                , },
                {
                    extend: 'colvis'
                    , text: feather.icons['eye'].toSvg({
                        class: 'font-small-4 me-50'
                    }) + 'Colvis'
                    , className: ''
                , }
            , ]
            , ajax: {
                url: '<?php echo e(url("search/completion-data")); ?>'
                , type: "GET"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: function(d) {
                    d.min = $("#min").val();
                    d.max = $("#max").val();
                    return d
                }
            , }
            , drawCallback: function(e, response) {

                $(".print").click(function(event) {

                    var cb = $(".cb-child:checked");
                    var data =[];
                    for(var i=0; i<cb.length; i++){
                        var id = cb[i].getAttribute("value");
                        data.push(id);
                    }
                    console.log(data);

                    var data_arr = JSON.stringify(data);
                    var url = 'label/myaction?data=' + encodeURIComponent(data_arr);
                    window.open(url, '_blank');
                })

            }
            , columnDefs: [{
                    "targets": 0
                    , render: function(data, type, row, index) {
                        var info = ` <input type="checkbox" style="margin-left:20px;" class="form-check-input cb-child item_check text-center" name="id[]" id="${row.id}" value="${row.id}"> `;

                        return info;
                    }
                }
                , {
                    "targets": 1
                    , "render": function(data, type, row, meta) {
                        return row.invitem+row.desc;
                    }
                }
                , {
                    "targets": 2
                    , "render": function(data, type, row, meta) {
                        return row.roll_code;
                    }
                }
                , {
                    "targets": 3
                    , "render": function(data, type, row, meta) {
                        return row.qty;
                    }
                }
                , {
                    "targets": 4
                    , "render": function(data, type, row, meta) {
                        return row.gsm;
                    }
                }
                , {
                    "targets": 5
                    , "render": function(data, type, row, meta) {
                        return row.width;
                    }
                }
                , {
                    "targets": 6
                    , "class": "text-center"
                    , "render": function(data, type, row, meta) {
                        return row.transdate;
                    }
                }
                , {
                    "targets": 7
                    , "render": function(data, type, row, meta) {
                        return row.wonum;
                    }
                }
                , {
                    "targets": 8
                    , "render": function(data, type, row, meta) {
                        return row.type;
                    }
                }

                , {
                    "targets": 9
                    , "class": "text-center"
                    , render: function(data, type, row, index) {
                        content = `
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('price_list_edit')): ?>
                            <a class="badge btn  btn-sm btn-warning" href="completion/${row.id}/edit">
                                <?php echo e(trans('global.open')); ?>

                            </a>
                            <?php endif; ?>`;
                        del = `
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_delete')): ?>
                                    <button type="button" class=" badge btn btn-delete btn-accent btn-danger m-btn--pill btn-sm m-btn m-btn--custom" data-index="${row.id}"><?php echo e(trans('global.delete')); ?></button>
                            <?php endif; ?>`;

                        return content;
                    }
                }
            , ]
            , language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;'
                    , next: '&nbsp;'
                }
            }

        })

    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/woCompletion/index.blade.php ENDPATH**/ ?>