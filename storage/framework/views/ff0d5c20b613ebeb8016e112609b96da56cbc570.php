<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<style>
    .card-body {
        padding-bottom: 0em;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/currency.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('admin.prodplan.update',[$plan->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card">
                    <div class="card-header  mt-1">
                        <h6 class="card-title">
                            <a href="<?php echo e(route('admin.prodplan.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.bom.manufacture')); ?></a>
                            <a href="<?php echo e(route('admin.prodplan.index')); ?>" class="breadcrumbs__item">Production Planning</a>
                            <a href="" class="breadcrumbs__item ">Edit</a>
                        </h6>
                    </div>
                    <hr>
                    </br>
                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="form-label" for="prod_planning_id"><?php echo e(trans('cruds.planning.fields.id')); ?></label>
                                        <input type="number" hidden id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>" class="form-control">
                                        <input type="text" id="prod_planning_id" name="prod_planning_id" class="form-control" value="<?php echo e($plan->prod_planning_id); ?>" readonly>
                                    </div>
                                     <div class="col-md-3">
                                        <label class="form-label" for="order_number"><?php echo e(trans('cruds.planning.fields.order_num')); ?></label>
                                        <input type="text" id="order_number" name="order_number" class="form-control" value="<?php echo e($plan->order_number); ?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="customer_code"><?php echo e(trans('cruds.planning.fields.customer')); ?></label>
                                        <input type="text" id="customer_code" name="customer_code" class="form-control" value="<?php echo e($plan->customer_code); ?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                       <label class="form-label" for="customer_po_number"><?php echo e(trans('cruds.planning.fields.po_num')); ?></label>
                                       <input type="text" id="customer_po_number" name="customer_po_number" class="form-control" value="<?php echo e($plan->customer_po_number); ?>" readonly>
                                   </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label class="form-label" for="planning_schedule"><?php echo e(trans('cruds.planning.fields.plan_date')); ?></label>
                                        <input type="text" id="datepicker-1"  class="form-control text-center" value="<?php echo e($plan->planning_schedule->format('d-M-Y')); ?>"  name="planning_schedule" >
                                    </div>
                                    <div class="col-md-1">
                                       <label class="form-label" for="item_code"><?php echo e(trans('cruds.planning.fields.item')); ?></label>
                                       <input type="text" id="item_code" name="item_code" class="form-control" value="<?php echo e($plan->item_code); ?>" readonly>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label" for="attribute_number_gsm"><?php echo e(trans('cruds.planning.fields.gsm')); ?></label>
                                        <input type="text" id="attribute_number_gsm" name="attribute_number_gsm" class="form-control" value="<?php echo e($plan->attribute_number_gsm); ?>">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label" for="attribute_number_gsm"><?php echo e(trans('cruds.planning.fields.width')); ?></label>
                                        <input type="text" id="attribute_number_w" name="attribute_number_w" class="form-control" value="<?php echo e($plan->attribute_number_w); ?>">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label" for="ordered_quantity"><?php echo e(trans('cruds.planning.fields.qty')); ?></label>
                                        <input type="text" id="ordered_quantity" name="ordered_quantity" class="form-control" value="<?php echo e($plan->ordered_quantity); ?>">
                                    </div>
                                    <div class="col-md-2">
                                       <label class="form-label" for="operation_unit"><?php echo e(trans('cruds.planning.fields.opration')); ?></label>
                                        <select name="operation_unit" id="pm" class="form-control select2" required>
                                            <?php $__currentLoopData = $pm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->short_name); ?>"<?php echo e($plan->operation_unit == $row->short_name ? 'selected' : ''); ?>><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                       <label class="form-label" for="completed_schedule"><?php echo e(trans('cruds.planning.fields.complate_date')); ?></label>
                                       <input type="text" id="datepicker-2"  class="form-control text-center" value="<?php echo e($plan->completed_schedule->format('d-M-Y')); ?>"  name="completed_schedule" >
                                   </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <hr>
                        <div class="box-body scrollx" style="height: 350px; overflow: scroll;">
                            <table class="table table-striped tableFixHead" id="tab_logic">
                                <thead>
                                    <th width="auto">
                                    </th>
                                    <th scope="col" class="text-center"><?php echo e(trans('cruds.planning.fields.no')); ?></th>
                                    <th scope="col" class="text-center"><?php echo e(trans('cruds.planning.fields.item')); ?></th>
                                    <th scope="col" class="text-center" >Product Detail (GSM L x  W)</th>
                                    <th scope="col" class="text-center" ><?php echo e(trans('cruds.planning.fields.estimation')); ?></th>
                                    <th scope="col" class="text-center" ><?php echo e(trans('cruds.planning.fields.roll')); ?></th>
                                    <th scope="col" class="text-center"><?php echo e(trans('cruds.planning.fields.qty')); ?></th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="sales_order_container">
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="tr_input">
                                        <td width="auto">
                                        </td>
                                        <td class="rownumber text-center" style="width:3%"><?php echo e($key+1); ?></td>
                                        <td width="30%">
                                            <input type="text" class="form-control search_sales" id="item_sales_1" placeholder="Type here ..." name="item_description[]" value="<?php echo e($row->item_description); ?>" autocomplete="off" required>
                                            <input type="hidden" class="form-control" id="inventory_item_id" name="inventory_item_id[]" value="<?php echo e($row->inventory_item_id); ?>" autocomplete="off" required>
                                            <input type="hidden" class="form-control" id="inventory_item_id" name="detail_id[]" value="<?php echo e($row->id); ?>" autocomplete="off" required>
                                        <td width="35%">
                                            <div class="col-xs-2">
                                                <input class="form-control text-center" id="gsm_1" name='attribute_gsm_line[]' type="number"  value="<?php echo e($row->attribute_gsm_line); ?>" placeholder="GSM"   style="width: 30%;">/
                                                <input class="form-control text-center" id="l_1" name='attribute_l_line[]' type="number" value="<?php echo e($row->attribute_l_line ?? 0); ?>" placeholder="L"  style="width: 30%;">/
                                                <input class="form-control text-center" id="w_1" name='attribute_w_line[]' type="number" value="<?php echo e($row->attribute_w_line); ?>" placeholder="W"  style="width: 30%;">
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <input class="form-control text-center" id="roll_1"  value="<?php echo e($row->qty_estimation); ?>" name='qty_estimation[]' type="number" >
                                        </td>
                                        <td width="10%">
                                            <input class="form-control text-center" id="roll_1"  value="<?php echo e($row->total_roll_by_line); ?>" name='total_roll_by_line[]' type="number" >
                                        </td>
                                        <td width="auto">
                                            <input type="number" class="form-control recount text-end"  value="<?php echo e($row->total_qty); ?>" id="jumlah_1" name="total_qty[]" required>
                                        </td>
                                        <td><button type="button" class="btn btn-sm btn-danger remove_tr_sales" disabled>&times;</button></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-2 mb-2">
                            <?php if($plan->status == 'Enter'): ?>
                            <div class="d-flex justify-content-between mb-2">
                                <form action="<?php echo e(route('admin.prodplan.destroy', $plan->id)); ?>" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="submit" class="btn btn-sm btn-danger hapusdata" value="<?php echo e(trans('global.delete')); ?>">
                                </form>
                                <button class="btn btn-primary btn-submit" type="submit"><i data-feather='save'></i>
                                    <?php echo e(trans('global.save')); ?></button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});
    $("#customer_currency").change(function(){
        var curr=$("#customer_currency").val();
        $.ajax({
            url:'<?php echo e(url("search/getRate")); ?>',
            type: 'POST',
            data: {
                id: curr,
            },
            success: function(result) {
                document.getElementById('conversion_rate_date').value = result['rate_date'];
                document.getElementById('conversion_rate').value = result['rate'];
                document.getElementById('conversion_type_code').value = result['currency_id'];
            }

        })
    })

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/productionPlanning/edit.blade.php ENDPATH**/ ?>