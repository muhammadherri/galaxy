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
            <form action="<?php echo e(route('admin.salesorder.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            <a href="<?php echo e(route("admin.salesorder.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OrderManagement.title')); ?> </a>
                            <a href="<?php echo e(route("admin.salesorder.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OrderManagement.title_singular')); ?> </a>
                            <a href="" class="breadcrumbs__item">Create </a>
                        </h6>
                    </div>
                    <hr>

                    <div class="card-body">
                        <div class="row mb-25">
                            <div class="col-md-12">
                                <div class="row mb-25">
                                    <div class="col-md-4">
                                        <label class="form-label" for="order_number"><?php echo e(trans('cruds.order.fields.order_number')); ?></label>
                                        <input type="text" id="purpose_date" name="purpose_date" class="form-control" hidden value="<?php echo e(now()->format ('Y-m-d')); ?>">
                                        <input type="number" hidden id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>" class="form-control">
                                        <input type="text" id="order_number" name="order_number" class="form-control" value="<?php echo e(old('order_number', isset($order) ? $order->order_number : '')); ?>" readonly>
                                        <?php if($errors->has('order_number')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('order_number')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="currency"><?php echo e(trans('cruds.order.fields.type')); ?></label>
                                        <select type="text" id="type" name="type" class="form-control select2" value="<?php echo e(old('type', isset($order) ? $order->type : '')); ?>" required>
                                            <option value="50" selected>Local Sales</option>
                                            <option value="51">Oversea Sales</option>
                                            <option value="60">Return Local Sales</option>
                                            <option value="61">Return Oversea Sales</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="customer_currency"><?php echo e(trans('cruds.order.fields.customer_currency')); ?></label>
                                        <select name="customer_currency" id="customer_currency" class="form-control select2" required>
                                            <option value='IDR'> IDR - Rupiah</option>
                                            <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($row->currency_code != "IDR"): ?>
                                                    <option value="<?php echo e($row->currency_code); ?>"  <?php echo e(old('customer_currency') == $row->currency_code ? 'selected' : ''); ?>> <?php echo e($row->currency_code); ?> - <?php echo e($row->currency_name); ?> </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('customer_currency')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('customer_currency')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="conversion_rate_date" id="conversion_rate_date">
                                    <input type="hidden" name="conversion_rate" id="conversion_rate">
                                    <input type="hidden" name="conversion_type_code" id="conversion_type_code">
                                </div>

                                <div class="row mb-25">
                                    <div class="col-md-4">
                                        <label class="form-label" for="bill_to"><?php echo e(trans('cruds.order.fields.bill_to')); ?></label>
                                        <select name="bill_to" id="bill_to" class="form-control select2" required>
                                            <option hidden disabled selected></option>
                                            <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->cust_party_code); ?>"  <?php echo e(old('bill_to') == $row->cust_party_code ? 'selected' : ''); ?>> <?php echo e($row->party_name); ?> - <?php echo e($row->address1); ?>, <?php echo e($row->city); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('bill_to')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('bill_to')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="sales_order_date"><?php echo e(trans('cruds.order.fields.sales_order_date')); ?></label>
                                        <input type="text" id="datepicker-1" name="ordered_date" class="form-control datepicker" value="<?php echo e(date('d-M-Y')); ?>" required>
                                        <?php if($errors->has('sales_order_date')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('sales_order_date')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="currency"><?php echo e(trans('cruds.order.fields.po_number')); ?></label>
                                        <select name="po_number" id="po_number" class="form-control select2" required>
                                            
                                            <?php $__currentLoopData = $price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->id); ?>" <?php echo e(old('price_list_name') ? 'selected' : ''); ?>> <?php echo e($row->description); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('po_number')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('po_number')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-25">

                                    <div class="col-md-4">
                                        <label class="form-label" for="ship_to"><?php echo e(trans('cruds.order.fields.ship_to')); ?></label>
                                        <select id="ship_to" name="deliver_to_org_id" class="form-control select2" required>
                                            <option value="BM-000000000" <?php echo e(old('cust_party_code') ? 'selected' : ''); ?>>Default</option>
                                            <?php $__currentLoopData = $site; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($row->site_code!='BM-000000000'): ?>
                                            <option value="<?php echo e($row->site_code); ?>" <?php echo e(old('deliver_to_org_id') == $row->site_code ? 'selected' : ''); ?>><?php echo e($row->address1); ?>, <?php echo e($row->city); ?> </option>
                                            <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('ship_to')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('ship_to')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="currency"><?php echo e(trans('cruds.order.fields.terms')); ?></label>
                                        <select name="freight_terms_code" id="terms" class="form-control select2" required>
                                            <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('freight_terms_code') == $row->id ? 'selected' : ''); ?>> <?php echo e($row->term_code); ?> - <?php echo e($row->terms_name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('terms')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('terms')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="terms_start"><?php echo e(trans('cruds.order.fields.customer_po')); ?></label>
                                        <input type="text" id="terms_start" name="cust_po_number" class="form-control" value="<?php echo e(old('terms_start', isset($order) ? $order->terms_start : '')); ?>" required>
                                        <?php if($errors->has('terms_start')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('terms_start')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="form-label form-check-label mb-50 text-end" for="customSwitch10">Organization</label>
                                        <div class="form-check form-switch form-check-primary text-end">
                                            <input name="org" type="checkbox" class="form-check-input" id="customSwitch10" value="222" checked="">
                                            <label class="form-check-label" for="customSwitch10">
                                                <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg></span>
                                                <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                        <line x1="20" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </br>
                    
                    <div class="card">
                        <div class="card-header">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-sales-tab" data-bs-toggle="tab" data-bs-target="#nav-sales" type="button" role="tab" aria-controls="nav-sales" aria-selected="true">
                                        <span class="bs-stepper-box"> Sales<i data-feather="shopping-bag" class="font-medium-3"></i></span></button>
                                    <button class="nav-link" id="nav-priceList-tab" data-bs-toggle="tab" data-bs-target="#nav-priceList" type="button" role="tab" aria-controls="nav-priceList" aria-selected="false">
                                        <span class="bs-stepper-box">Price List Detail
                                            <i data-feather="file-text" class="font-medium-3"></i>
                                        </span>
                                    </button>
                                    <button class="nav-link" id="nav-shipment-tab" data-bs-toggle="tab" data-bs-target="#nav-shipment" type="button" role="tab" aria-controls="nav-shipment" aria-selected="false">
                                        <span class="bs-stepper-box">
                                            <i data-feather="truck" class="font-medium-3"></i>
                                        </span>
                                        Shipping
                                    </button>
                                </div>
                            </nav>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-sales" role="tabpanel" aria-labelledby="nav-sales-tab">
                                    <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                                        <table class="table table-striped tableFixHead" id="tab_logic">
                                            <thead>
                                                <th width="auto">
                                                </th>
                                                <th scope="col">Line</th>
                                                <th scope="col">Product Category</th>
                                                <th scope="col" class="text-center">Product Detail (GSM L x W)</th>
                                                <th scope="col" class="text-center">Seq</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                                <th width="auto" scope="col">Shippement Date</th>
                                                <th scope="col" class="text-end">Sub. Total</th>
                                                <th scope="col" class="text-center">#</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sales_order_container">
                                                <tr class="tr_input">
                                                    <td width="auto">
                                                    </td>
                                                    <td class="rownumber" style="width:3%">1</td>
                                                    <td width="30%">
                                                        <input type="hidden" class="line_id" id="line_id_1" name="line_id[]" value="1">
                                                        <input type="text" class="form-control search_sales" id="item_sales_1" placeholder="Type here ..." name="item_sales[]" autocomplete="off" required>
                                                        <span class="help-block search_item_code_empty glyphicon" style="display: none;"> No Results Found </span>
                                                        <input type="hidden" class="search_inventory_item_id" id="id_1" name="inventory_item_id[]" value=""></td>
                                                    <td width="20%">
                                                        <div class="col-xs-2">
                                                            <input class="form-control text-center" id="gsm_1" name='attribute_number_gsm[]' type="number" oninput="validity.valid||(value='');" min=0 placeholder="GSM" style="width: 30%;">/
                                                            <input class="form-control text-center" id="l_1" name='attribute_number_l[]' type="number" oninput="validity.valid||(value='');" min=0 placeholder="L" style="width: 30%;">/
                                                            <input class="form-control text-center" id="w_1" name='attribute_number_w[]' type="number" oninput="validity.valid||(value='');" min=0 placeholder="W" style="width: 30%;">
                                                        </div>
                                                        <input type="hidden" class="form-control" placeholder="Product Name here ..." id="product_name_1" name="product_name[]" autocomplete="off">
                                                        <input type="hidden" class="search_inventory_item_id" id="id_1" name="user_description_item[]">
                                                    </td>
                                                    <td width="5%">
                                                        <input class="form-control text-center" id="roll_1" name='line_number[]' type="number">
                                                    </td>
                                                    <td width="auto">
                                                        <input type="number" class="form-control recount text-end" min=1 id="jumlah_1" oninput="validity.valid||(value='');" name="ordered_quantity[]" required>
                                                    </td>
                                                    <td width="auto">
                                                        <input type="number" id="harga_1" class="form-control harga text-end" step=0.0001 oninput="validity.valid||(value='');" name="unit_selling_price[]" required>
                                                    </td>
                                                    <td width="auto" class="text-end"><input type="date" id="" name="schedule_ship_date[]" class="form-control text-end" required></td>
                                                    <td width="auto">
                                                        <input type="text" readonly id="subtotal_1" class="form-control subtotal123 text-end" name="subtotal[]">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-ligth btn-sm" style="position: inherit;">X</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="9">
                                                        
                                                        <button type="button" class="btn btn-light add_sales_order btn-sm" style="font-size: 12px;"><i data-feather='plus'></i> <?php echo e(trans('cruds.OrderManagement.field.addrow')); ?></button>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="nav-priceList" role="tabpanel" aria-labelledby="nav-priceList-tab">
                                    <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                                        <table class="table table-striped tableFixHead" id="tab_logic">
                                            <thead>
                                                <th scope="col">Line</th>
                                                <th scope="col">Tax</th>
                                                <th scope="col">Document</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Price Effective Date</th>
                                                <th scope="col">Disc.%</th>
                                                <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="sales_order_detail_container">
                                                <tr class="tr_input1">
                                                    <td class="rownumber1" width="2%">1</td>
                                                    <td width="10%">
                                                        <select class="form-control pajak" id="pajak_1" name="tax_code[]" required>
                                                            <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($row->tax_rate); ?>" <?php echo e(old('tax_code') == $row->tax_rate ? 'selected' : ''); ?>><?php echo e($row->tax_code); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <input type="hidden" readonly id="pajak_hasil_1" class="form-control pajak_hasil" name="pajak_hasil[]">
                                                    </td>
                                                    <td width="20%">
                                                        <input type="hidden" class="line_id" name="line_id[]" value="1">
                                                        <input type="text" class="form-control " id="price_list_name_1" name="price_list_name[]" autocomplete="off" required readonly>
                                                        <input type="hidden" class="form-control " id="price_list_id_1" name="price_list_id[]" autocomplete="off" required readonly>
                                                        <input type="hidden" class="form-control" id="price_id_1" name="pricing_attribute1[]" autocomplete="off" required readonly>
                                                    </td>
                                                    <td width="30%"> <input type="number" id="harga2_1" class="form-control harga" readonly></td>
                                                    <td width="20%"><input type="date" id="effective_date_1" name="pricing_date[]" readonly class="form-control "></td>
                                                    <td width="20%">
                                                        <input type="number" id="disc_1" class="form-control disc text-end" name="disc[]" readonly>
                                                    </td>
                                                    <td width="10%">
                                                        <button type="button" class="btn btn-ligth btn-sm" style="position: inherit;">X</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                <div class="tab-pane fade" id="nav-shipment" role="tabpanel" aria-labelledby="nav-shipment-tab">
                                    <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                                        <table class="table table-striped tableFixHead" id="tab_logic">
                                            <thead>
                                                <th scope="col">Line</th>
                                                <th scope="col">UOM</th>
                                                <th scope="col">Sub Inventory</th>
                                                <th scope="col">Packing Style</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="sales_order_shipment_container">
                                                <tr class="tr_input">
                                                    <td class="rownumber">1</td>
                                                    <td width=10%>
                                                        <input type="text" readonly id="uom_1" class="form-control uom" name="uom[]">
                                                    </td>
                                                    <td width="30%">
                                                        <input type="hidden" class="line_id" id="line_id_1" name="line_id[]" value="1">
                                                        <input type="text" class="form-control search_subinventory" value="" name="subinventory_from[]" id="subinventoryfrom_1" required>
                                                        <input type="hidden" class="form-control subinvfrom_1" name="shipping_inventory[]" id="subinvfrom_1" autocomplete="off">
                                                    </td>
                                                    <td width="30%">
                                                        <select type="text" class="form-control Select2" id="packingstyle_1" name="packing_style[]">
                                                            <option value="Roll" selected>ROLL</option>
                                                            <option value="Pallet">PALLET</option>
                                                            <option value="Pack">PACK</option>
                                                        </select>
                                                    </td>
                                                    <td width="30%">
                                                        <select class="form-control" id="" name="flow_status[]" required>
                                                            <option value="5" selected>Entered</option>
                                                        </select>
                                                    </td>
                                                    <td width="5%"><button type="button" class="btn btn-ligth btn-sm" style="position: inherit;">X</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-25 ">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Status</label>
                                        <input type="text" class="form-control grand_total " value="Enter" name="status_name" readonly="">
                                        <input type="hidden" class="form-control grand_total " name="status_name" value='1' readonly="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tax ( Amount )</label><br>
                                        <input type="text" class="form-control text-end" id="tax_amount" name="tax_amount">
                                    </div>
                                </div>
                                <div class=" col-md-5">
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" class="form-control purchase_total text-end " id="total" readonly="" name="purchase_total">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-50 mt-1">
                                <button type="reset" class="btn btn-warning pull-left">Reset</button>
                                <button class="btn btn-primary btn-submit" type="submit"><i data-feather='save'></i>
                                    <?php echo e(trans('global.save')); ?></button>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                </div>
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

    $(function() {
        $("#datepicker-1").datepicker({
            maxDate: 0
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        , }
    });
    $("#customer_currency").change(function() {
        var curr = $("#customer_currency").val();
        $.ajax({
            url: '<?php echo e(url("search/getRate")); ?>'
            , type: 'POST'
            , data: {
                id: curr
            , }
            , success: function(result) {
                document.getElementById('conversion_rate_date').value = result['rate_date'];
                document.getElementById('conversion_rate').value = result['rate'];
                document.getElementById('conversion_type_code').value = result['currency_id'];
            }

        })
    })

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/sales/create.blade.php ENDPATH**/ ?>