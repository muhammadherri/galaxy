<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
<a href="<?php echo e(route('admin.work-order.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.bom.manufacture')); ?></a>
<a href="<?php echo e(route('admin.work-order.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.workorder.title')); ?> <?php echo e(trans('global.list')); ?></a>
<a href="#" class="breadcrumbs__item active"><?php echo e(trans('cruds.workorder.fields.create')); ?></a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($error); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session()->get('error')); ?>

</div>
<?php endif; ?>

<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route("admin.work-order.store")); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal create_purchase">
                <?php echo e(csrf_field()); ?>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-25 mt-1">
                            <a href="<?php echo e(route('admin.work-order.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.bom.manufacture')); ?></a>
                            <a href="<?php echo e(route('admin.work-order.index')); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.workorder.title')); ?> <?php echo e(trans('global.list')); ?></a>
                            <a href="#" class="breadcrumbs__item "><?php echo e(trans('cruds.workorder.fields.create')); ?></a>
                        </h6>
                    </div>
                    <hr>
                    <div class="card-body mt-25">
                        <div class="row mb-1">
                            <div class="col-md-1">
                                <b>
                                    <p class="text-end">Product :<p>
                                </b>
                            </div>
                            <div class="col-md-5">
                                <div class="row p-0">
                                    <div class="col-md-4">
                                        <input type="text" id="item_code" class="form-control filter_WorkOrder" autocomplete="off" required>
                                        <input type="hidden" id="parent" name="parent_inventory_item_id" class="form-control" autocomplete="off" required>
                                        <input type="hidden" id="parent-des" name="parent_des" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="gsm" name="attribute_float1" class="form-control text-center" value="" placeholder="GSM" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="l" name="attribute_float10" class="form-control text-center" value="" placeholder="L" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="w" name="attribute_float2" class="form-control text-center" value="" placeholder="W" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <b>
                                    <p class="text-end">Date :</p>
                                </b>
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="datepicker-1" name="need_by_date" value="<?php echo e(date('d-M-Y')); ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-1">
                                <b>
                                    <p class="text-end">Quantity :<p>
                                </b>
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="planned_start_quantity" id="sales_qty" class="form-control" value="1" required>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-1">
                                <b>
                                    <p class="text-end">PM :</p>
                                </b>
                            </div>
                            <div class="col-md-5">
                                <select id="pm" name="pm" class="form-control select2 filter_WorkOrder">
                                    <option selected></option>
                                    <?php $__currentLoopData = $pm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pm->short_name); ?>"><?php echo e($pm->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="number" hidden id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                <b>
                                    <p class="text-end">BOM :<p>
                                </b>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="" id="parent-bom" name="parentbom" autocomplete="off" readonly required>
                                <input type="hidden" class="form-control" value="" id="compl_subinventory_code" name="compl_subinventory_code" autocomplete="off" required>
                                <input type="hidden" class="form-control" value="" id="cust_code" name="cust_code" autocomplete="off" required>
                                <input type="hidden" class="form-control" value="" id="cust_po" name="cust_po" autocomplete="off" required>
                                <input type="hidden" class="form-control" value="" id="sales_seq" name="sales_seq" autocomplete="off" required>
                                <input type="hidden" class="form-control" value="" id="sales_head" name="sales_head" autocomplete="off" required>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-1">
                                <b>
                                    <p class="text-end">Source :</p>
                                </b>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="source_line_ref" class="form-control datepicker" id="source" autocomplete="off" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" id="btn-sales" class="btn btn-sm btn-secondary " data-bs-toggle="modal" data-bs-target="#salesModal"> <span class="bs-stepper-box">
                                        <i data-feather="archive" class="font-medium-3"></i>
                                    </span></button>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    
                    <div class="card-header mt-2">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-micellaneous-tab" data-bs-toggle="tab" data-bs-target="#nav-micellaneous" type="button" role="tab" aria-controls="nav-micellaneous" aria-selected="true">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    Expected Result
                                </button>
                                <button class="nav-link" id="nav-component-tab" data-bs-toggle="tab" data-bs-target="#nav-component" type="button" role="tab" aria-controls="nav-component" aria-selected="false">
                                    <span class="bs-stepper-box">
                                        <i data-feather="tool" class="font-medium-3"></i>
                                    </span>
                                    Component
                                </button>
                            </div>
                        </nav>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            
                            <div class="tab-pane fade show active" id="nav-micellaneous" role="tabpanel" aria-labelledby="nav-micellaneous-tab">
                                <div class="box-body scrollx" style="height: 350px; overflow: scroll;">
                                    <table class="table table-striped tableFixHead">
                                        <thead>
                                            <th width="auto">
                                            </th>
                                            <th scope="col" class="text-center"><?php echo e(trans('cruds.planning.fields.no')); ?></th>
                                            <th scope="col" class="text-center"><?php echo e(trans('cruds.planning.fields.item')); ?></th>
                                            <th scope="col" class="text-center">Product Detail (GSM L x W)</th>
                                            <th scope="col" class="text-center">Qty(KG) / Roll</th>
                                            <th scope="col" class="text-center">Roll</th>
                                            <th scope="col" class="text-center"><?php echo e(trans('cruds.planning.fields.qty')); ?></th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="expected_container">
                                            <tr class="tr_input">
                                                <td width="auto">
                                                </td>
                                                <td class="rownumber text-center" style="width:3%">1</td>
                                                <td width="30%">
                                                    <input type="text" class="form-control search_item_code" id="item_1" placeholder="Type here ..." name="item_sales[]" value="" autocomplete="off" required>
                                                    <input type="hidden" class="search_inventory_item_id" id="id_1" name="inventory_item_id[]">
                                                    <input type="hidden" class="search_inventory_item_id" id="uom_1" name="uom[]">
                                                    <input type="hidden" class="form-control" value="" id="item_code_1" name="item_code[]">
                                                    <input type="hidden" class="form-control" value="" id="description_1" name="description[]">
                                                    <input type="hidden" class="form-control" value="" id="sub_category_1" name="sub_category[]">
                                                    <input type="hidden" class="form-control" value="" id="type_code_1" name="type_code[]">
                                                <td width="35%">
                                                    <div class="col-xs-2">
                                                        <input class="form-control text-center" id="gsm_1" name='attribute_number_gsm[]' type="number" value="" placeholder="GSM" style="width: 30%;">/
                                                        <input class="form-control text-center" id="l_1" name='attribute_number_l[]' type="number" value="" placeholder="L" style="width: 30%;">/
                                                        <input class="form-control text-center" id="w_1" name='attribute_number_w[]' type="number" value="" placeholder="W" style="width: 30%;">
                                                    </div>
                                                </td>
                                                <td width="auto">
                                                    <input type="number" class="form-control recount text-end" value="" id="jumlah_1" name="qty_roll[]" required>
                                                </td>
                                                <td width="10%">
                                                    <input class="form-control text-end" id="roll_1" value="" name='roll[]' type="number">
                                                </td>
                                                <td width="auto">
                                                    <input type="number" class="form-control recount text-end" value="" id="jumlah_1" name="ordered_quantity[]" required>
                                                </td>
                                                <td><button type="button" class="btn btn-ligth btn-sm remove_tr_sales" disabled>X</button></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4"><input type="hidden" name="revision[]" class="form-control " id="rev_1" autocomplete="off">
                                                    <button type="button" class="btn btn-outline-success add_expected_result btn-sm" style="font-size: 12px;"><i data-feather='plus'></i> Add Rows</button></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane show" id="nav-component" role="tabpanel" aria-labelledby="nav-component-tab">
                                <table id="tableWO" class=" table table-striped w-100">
                                    <thead>
                                        
                                        <th class="text-center" scope="col">Item</th>
                                        <th class="text-center" scope="col">Description</th>
                                        <th class="text-center" scope="col">UOM</th>
                                        <th class="text-center" scope="col">To Consume</th>
                                        <th class="text-center" scope="col">Sub Inventory</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="workOrder_container">

                                        <tr>
                                            <td><input type="hidden" name="revision[]" class="form-control " id="rev_1" autocomplete="off">
                                                <button type="button" class="btn btn-outline-success add_workOrder btn-sm" style="font-size: 12px;"><i data-feather='plus'></i> Add Rows</button></td>
                                        </tr>
                                    </tbody>
                                    
                                    
                                </table><br>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between mb-2 mt-2">
                            <button type="reset" class="btn btn-danger pull-left">Reset</button>
                            <button type="submit" class="btn btn-primary pull-right " Value='save' name="action"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>

                <?php echo $__env->make('admin.workOrder.sales-src', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </form>
        </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/workOrder/create.blade.php ENDPATH**/ ?>