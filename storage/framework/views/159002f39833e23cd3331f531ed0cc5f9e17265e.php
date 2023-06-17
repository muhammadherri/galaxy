<?php $__env->startSection('content'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_create')): ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mt-1 mb-50">
                    <h6 class="card-title">
                        <a href="" class="breadcrumbs__item"><?php echo e(trans('cruds.gl.title')); ?> </a>
                        <a href="<?php echo e(route("admin.gl.bank-cash")); ?>" class="breadcrumbs__item"> Bank & Cash </a>
                    </h6>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-purchase" class="table table-bordered table-striped w-100 dataTable no-footer" data-source="data-source">
                            <thead>
                                <tr>
                                    <th style="text-align: left;">
                                        Account
                                    </th>
                                    <th>
                                        Referance
                                    </th>
                                    <th>
                                        Lable
                                    </th>
                                    <th class="text-end">
                                        Original Currency
                                    </th>
                                    <th class="text-end">
                                        Debit
                                    </th>
                                    <th class="text-end">
                                        Credit
                                    </th>

                                    <th class="text-center">
                                       Matching
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

    //     var table = $('#table-purchase').DataTable({
    //         "bServerSide": true
    //         , ajax: {
    //             url: '<?php echo e(url("search/po-report")); ?>'
    //             , type: "POST"
    //             , headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //             , data: function(d) {
    //                 return d
    //             }
    //         }
    //         , responsive: true
    //         , scrollY: true
    //         , dom: '<"card-header border-bottom"<"head-label"><"dt-action-buttons text-end">>\
    //                 <"d-flex justify-content-between row mt-1"<"col-sm-12 col-md-6"Bl><"col-sm-12 col-md-2"f><"col-sm-12 col-md-2"p>t>'
    //         , displayLength: 15
    //         , "lengthMenu": [
    //             [10, 25, 50, -1]
    //             , [10, 25, 50, "All"]
    //         ]
    //         , buttons: [{
    //                 extend: 'print'
    //                 , text: feather.icons['printer'].toSvg({
    //                     class: 'font-small-4 me-50'
    //                 }) + 'Print'
    //                 , className: ''
    //                 , exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             }
    //             , {
    //                 extend: 'csv'
    //                 , text: feather.icons['file-text'].toSvg({
    //                     class: 'font-small-4 me-50'
    //                 }) + 'Csv'
    //                 , className: ''
    //                 , exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             }
    //             , {
    //                 extend: 'excel'
    //                 , text: feather.icons['file'].toSvg({
    //                     class: 'font-small-4 me-50'
    //                 }) + 'Excel'
    //                 , className: ''
    //                 , exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             }
    //             , {
    //                 extend: 'pdf'
    //                 , text: feather.icons['clipboard'].toSvg({
    //                     class: 'font-small-4 me-50'
    //                 }) + 'Pdf'
    //                 , className: ''
    //                 , exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             }
    //             , {
    //                 extend: 'copy'
    //                 , text: feather.icons['copy'].toSvg({
    //                     class: 'font-small-4 me-50'
    //                 }) + 'Copy'
    //                 , className: ''
    //                 , exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             }
    //             , {
    //                 extend: 'colvis'
    //                 , text: feather.icons['eye'].toSvg({
    //                     class: 'font-small-4 me-50'
    //                 }) + 'Colvis'
    //                 , className: ''
    //             , }
    //         , ]
    //         , columnDefs: [{
    //                 render: function(data, type, row, index) {
    //                     var info = table.page.info();
    //                     return index.row + info.start + 1;
    //                 }
    //                 , targets: [0]
    //             }
    //             , {
    //                 render: function(data, type, row, index) {
    //                     content = ` <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_show')): ?> <a target="_blank" class="badge btn-sm btn-primary" href="orders/${row.id}">
    //                         <?php echo e(trans('global.view')); ?>

    //                     </a> <?php endif; ?>   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_edit')): ?><a class="badge btn-sm btn-info" href="orders/${row.id}/edit">
    //                         <?php echo e(trans('global.open')); ?>

    //                     </a> <?php endif; ?>
    //                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_delete')): ?><a  class="badge btn-delete btn-accent btn-danger m-btn--pill btn-sm m-btn m-btn--custom" data-index="${row.id}"><?php echo e(trans('global.delete')); ?></a> <?php endif; ?>
    //                    `;
    //                     return content;
    //                 }
    //                 , targets: [9]
    //             }
    //         ]
    //         , drawCallback: function(e, response) {
    //             $(".btn-delete").click(function(event) {
    //                 var index = $(this).data('index');
    //                 var token = $("meta[name='csrf-token']").attr("content");
    //                 swal.fire({
    //                         title: "Delete " + index + " ?"
    //                         , type: "question"
    //                         , showCancelButton: true
    //                         , focusCancel: true
    //                         , dangerMode: true
    //                         , closeOnClickOutside: false
    //                     })
    //                     .then((confirm) => {
    //                         if (confirm.value) {
    //                             $.ajax({
    //                                     url: '<?php echo e(url("admin/orders")); ?>/' + index
    //                                     , method: "DELETE"
    //                                     , dataType: "JSON"
    //                                     , headers: {
    //                                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                                     }
    //                                     , data: {
    //                                         "id": index
    //                                     , }
    //                                 , })
    //                                 .done(function(resp) {
    //                                     console.log(resp);
    //                                     if (resp.success) {
    //                                         swal.fire("Info", resp.message, "success");
    //                                         table.ajax.reload();
    //                                     } else {
    //                                         swal.fire("Warning", resp.message, "warning");
    //                                     }
    //                                 })
    //                                 .fail(function() {
    //                                     swal.fire("Warning", 'Unable to process request at this moment', "warning");
    //                                 });
    //                         } else {
    //                             event.preventDefault();
    //                             return false;
    //                         }
    //                     });
    //             });
    //         }
    //         , columns: [{
    //                 data: 'id'
    //                 , className: "text-center"
    //             }
    //             , {
    //                 data: 'order_number'
    //             }, {
    //                 data: 'vendor_id'
    //             }, {
    //                 data: 'vendor_name'
    //             }, {
    //                 data: 'currency'
    //             }, {
    //                 data: 'rate_date'
    //             }, {
    //                 data: 'agent_id'
    //                 , className: "text-end"
    //             }, {
    //                 data: 'status'
    //                 , className: "text-end"
    //             }, {
    //                 data: 'created_at'
    //                 , className: "text-center"
    //             }, {
    //                 data: ''
    //                 , className: "text-center"
    //             }
    //         ],
    //         language: {
    //             paginate: {
    //                 // remove previous & next text from pagination
    //                 previous: '&nbsp;',
    //                 next: '&nbsp;'
    //             }
    //         }
    //     })
    // });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/glmanual/bankCash.blade.php ENDPATH**/ ?>