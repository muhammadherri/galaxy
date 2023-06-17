<?php $__env->startSection('styles'); ?>
<style>
    .card-body {
        padding-bottom: 0em;
    }

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('admin.salesorder.update',[$sales->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            <a href="<?php echo e(route("admin.salesorder.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OrderManagement.title')); ?> </a>
                            <a href="<?php echo e(route("admin.salesorder.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.OrderManagement.title_singular')); ?> </a>
                            <a href="" class="breadcrumbs__item">Edit </a>
                        </h6>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row  mb-25">
                            <div class="col-md-12">
                                <div class="row  mb-25">
                                    <div class="col-md-4">
                                        <label class="form-label" for="order_number"><?php echo e(trans('cruds.order.fields.order_number')); ?></label>
                                        <input type="text" id="purpose_date" name="purpose_date" class="form-control" hidden value="<?php echo e(now()->format ('Y-m-d')); ?>">
                                        <input type="number" hidden id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>" class="form-control">
                                        <input type="text" id="order_number" name="order_number" class="form-control" value="<?php echo e($sales->order_number); ?>" readonly>
                                        <input type="hidden" name="header_id" class="form-control" value="<?php echo e($sales->id); ?>" readonly>
                                        <input type="hidden" name="headerId" class="form-control" value="<?php echo e($sales->header_id); ?>" readonly>
                                        <input type="hidden" name="flag" class="form-control" value="<?php echo e($sales->open_flag); ?>" readonly>
                                        <input type="hidden" name="booked" class="form-control" value="<?php echo e($sales->booked_flag); ?>" readonly>
                                        <input type="hidden" name="org" class="form-control" value="<?php echo e($sales->org_id); ?>" readonly>
                                        <?php if($errors->has('order_number')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('order_number')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="currency"><?php echo e(trans('cruds.order.fields.type')); ?></label>
                                        <select type="text" id="type" name="type" class="form-control select2" value="<?php echo e(old('type', isset($order) ? $order->type : '')); ?>" required>
                                            <?php if(($sales->attribute2)== 50): ?>
                                            <option value="50" selected>Local Sales</option>
                                            <option value="51">Oversea Sales</option>
                                            <option value="60">Return Local Sales</option>
                                            <option value="61">Return Oversea Sales</option>
                                            <?php elseif(($sales->attribute2)== 51): ?>
                                            <option value="50">Local Sales</option>
                                            <option value="51" selected>Oversea Sales</option>
                                            <option value="60">Return Local Sales</option>
                                            <option value="61">Return Oversea Sales</option>
                                            <?php elseif(($sales->attribute2)== 60): ?>
                                            <option value="50">Local Sales</option>
                                            <option value="51">Oversea Sales</option>
                                            <option value="60" selected>Return Local Sales</option>
                                            <option value="61">Return Oversea Sales</option>
                                            <?php else: ?>
                                            <option value="50">Local Sales</option>
                                            <option value="51">Oversea Sales</option>
                                            <option value="60">Return Local Sales</option>
                                            <option value="61" selected>Return Oversea Sales</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="customer_currency"><?php echo e(trans('cruds.order.fields.customer_currency')); ?></label>
                                        <select name="customer_currency" id="customer_currency" class="form-control select2" required value="<?php echo e($sales->attribute1); ?>">
                                            
                                            <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($raw->currency_code); ?>" <?php echo e($sales->attribute1 == $raw->currency_code ? 'selected' : ''); ?>><?php echo e($raw->currency_code); ?> - <?php echo e($raw->currency_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('customer_currency')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('customer_currency')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row  mb-25">
                                    <div class="col-md-4">
                                        <label class="form-label" for="bill_to"><?php echo e(trans('cruds.order.fields.bill_to')); ?></label>
                                        <select name="bill_to" id="customer" class="form-control select2" required>
                                            <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(($row->cust_party_code)== $sales->invoice_to_org_id): ?>)
                                            <option value="<?php echo e($sales->invoice_to_org_id); ?>" <?php echo e(old('customer_name') ? 'selected' : ''); ?> selected> <?php echo e($sales->customer->party_name); ?> - <?php echo e($sales->customer->address1); ?>, <?php echo e($sales->customer->city); ?> </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($row->cust_party_code); ?>" <?php echo e(old('customer_name') ? 'selected' : ''); ?>> <?php echo e($row->party_name); ?> - <?php echo e($row->address1); ?>, <?php echo e($row->city); ?> </option>
                                            <?php endif; ?>
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
                                        <input type="text" id="fp-default" name="ordered_date" class="form-control flatpickr-basic flatpickr-input active" value="<?php echo e($sales->ordered_date->format('Y-m-d')); ?>" autocomplete="off">
                                        <?php if($errors->has('sales_order_date')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('sales_order_date')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="currency"><?php echo e(trans('cruds.order.fields.po_number')); ?> </label>
                                        <select name="po_number" id="po_number" class="form-control select2" required>
                                            <?php $__currentLoopData = $price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(($row->id)== $sales->price_list_id): ?>)
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('price_list_name') ? 'selected' : ''); ?> selected> <?php echo e($row->description); ?> </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('price_list_name') ? 'selected' : ''); ?>> <?php echo e($row->description); ?> </option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('po_number')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('po_number')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row  mb-25">
                                    <div class="col-md-4">
                                        <label class="form-label" for="ship_to"><?php echo e(trans('cruds.order.fields.ship_to')); ?></label>
                                        
                                        <select id="ship_to" name="deliver_to_org_id" class="form-control select2" required>
                                            <?php $__currentLoopData = $site; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(($row->site_code)== $sales->deliver_to_org_id): ?>)
                                            <option value="<?php echo e($row->site_code); ?>" <?php echo e(old('customer_name') ? 'selected' : ''); ?> selected> <?php echo e($row->address1); ?>, <?php echo e($row->address2); ?>, <?php echo e($row->city); ?> </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($row->site_code); ?>" <?php echo e(old('customer_name') ? 'selected' : ''); ?>> <?php echo e($row->address1); ?>, <?php echo e($row->address2); ?>, <?php echo e($row->city); ?> </option>
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
                                            <?php if(($row->id)== $sales->freight_terms_code): ?>)
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('terms') ? 'selected' : ''); ?> selected> <?php echo e($row->term_code); ?> - <?php echo e($row->terms_name); ?> </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($row->id); ?>" <?php echo e(old('terms') ? 'selected' : ''); ?>> <?php echo e($row->term_code); ?> - <?php echo e($row->terms_name); ?> </option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('terms')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('terms')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="terms_start"><?php echo e(trans('cruds.order.fields.customer_po')); ?></label>
                                        <input type="text" id="terms_start" name="cust_po_number" class="form-control" value="<?php echo e(old('cust_po_number', isset($sales) ? $sales->cust_po_number : '')); ?>" required>
                                        <?php if($errors->has('terms_start')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('terms_start')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                    <div class="card-header">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-sales-tab" data-bs-toggle="tab" data-bs-target="#nav-sales" type="button" role="tab" aria-controls="nav-sales" aria-selected="true">
                                    <span class="bs-stepper-box">
                                        <i data-feather="shopping-bag" class="font-medium-3"></i>
                                    </span>
                                    <?php echo e(trans('cruds.OrderManagement.field.sales')); ?>

                                </button>
                                <button class="nav-link" id="nav-priceList-tab" data-bs-toggle="tab" data-bs-target="#nav-priceList" type="button" role="tab" aria-controls="nav-priceList" aria-selected="false">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    <?php echo e(trans('cruds.OrderManagement.field.pricelistdetail')); ?>

                                </button>
                                <button class="nav-link" id="nav-shipment-tab" data-bs-toggle="tab" data-bs-target="#nav-shipment" type="button" role="tab" aria-controls="nav-shipment" aria-selected="false">
                                    <span class="bs-stepper-box">
                                        <i data-feather="truck" class="font-medium-3"></i>
                                    </span>
                                    <?php echo e(trans('cruds.OrderManagement.field.shipping')); ?>

                                </button>

                                <button class="nav-link" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" type="button" role="tab" aria-controls="nav-document" aria-selected="false">
                                    <span class="bs-stepper-box">
                                        <i data-feather="image" class="font-medium-3"></i>
                                    </span>
                                    Image
                                </button>
                            </div>
                        </nav>

                        <div class="text-right">

                            <button type="button" class="btn btn btn-outline-success float-right dropdown-toggle " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(trans('cruds.OrderManagement.field.action')); ?>

                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a id="btnCopyLines" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#copyLine">
                                    <?php echo e(trans('cruds.OrderManagement.field.copyline')); ?>

                                </a>
                                <button id="btnDelete" type="submit" class="btn btn btn-link" name='action' value="multipleDelete">
                                    <?php echo e(trans('cruds.OrderManagement.field.multipledelete')); ?>

                                </button>
                                <a id="btnSplit" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalSplit">
                                    <?php echo e(trans('cruds.OrderManagement.field.splitline')); ?>

                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            
                            <div class="tab-pane fade show active" id="nav-sales" role="tabpanel" aria-labelledby="nav-sales-tab">
                                <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                                    <table class="table table-striped tableFixHead" id="tab_logic">
                                        <thead>
                                            <tr>
                                                <th width="auto">
                                                    
                                                </th>
                                                <th scope="col" class="text-center"><?php echo e(trans('cruds.OrderManagement.field.line')); ?></th>
                                                <th scope="col">Product Category</th>
                                                <th scope="col" class="text-center">Product Detail (GSM L x W)</th>
                                                <th scope="col" class="text-center">Seq</th>
                                                <th scope="col" class="text-center"><?php echo e(trans('cruds.OrderManagement.field.qty')); ?></th>

                                                <th scope="col" class="text-center"><?php echo e(trans('cruds.OrderManagement.field.price')); ?></th>
                                                <th width="auto" scope="col"><?php echo e(trans('cruds.OrderManagement.field.shipmentschedule')); ?></th>

                                                <th scope="col" class="text-end"><?php echo e(trans('cruds.OrderManagement.field.subtotal')); ?></th>
                                                <th scope="col" class="text-center">#</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sales_order_container">
                                            <?php $no = 1; ?>
                                            <?php $subtotal=0; $taxAfter=0; $subtotal2=0; $taxAfter2=0;?>
                                            <?php $__currentLoopData = $salesDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr class="tr_input" data-entry-id="<?php echo e($row->id); ?>">
                                                <td width="auto" class="text-center">

                                                    <input type="checkbox" name="item_ids[]" id="item_ids" value="<?php echo e($row->id); ?>" class="form-check-input sub_chk text-center" data-id="<?php echo e($row->id); ?>">
                                                    <input type="hidden" name="item_code[]" value="<?php echo e($row->itemMaster->item_code); ?>" class="form-check-input sub_chk" data-id="<?php echo e($row->itemMaster->item_code); ?>">
                                                    
                                                    
                                                    <input type="hidden" name="item_qty[]" value="<?php echo e($row->ordered_quantity); ?>" class="form-check-input sub_chk" data-id="<?php echo e($row->ordered_quantity); ?>">
                                                    <input type="hidden" name="item_price[]" value="<?php echo e($row->unit_selling_price); ?>" class="form-check-input sub_chk" data-id="<?php echo e($row->unit_selling_price); ?>">
                                                    <input type="hidden" name="order_quantity_uom[]" value="<?php echo e($row->order_quantity_uom); ?>" class="form-check-input sub_chk" data-id="<?php echo e($row->order_quantity_uom); ?>">

                                                    <input type="hidden" name="checkid[]" value="<?php echo e($row->id); ?>">

                                                </td>
                                                <td class="rownumber text-center" width="3%"><?php echo e($no); ?></td>
                                                <td width="30%">
                                                    <input type="hidden" class="line_id" value="<?php echo e($row->line_id); ?>" name="line_id[]">
                                                    <input type="hidden" value="<?php echo e($row->id); ?>" name="id_line[]">
                                                    <input type="hidden" value="<?php echo e($row->split_line_id); ?>" name="split_line_id[]">
                                                    <input type="text" class="form-control search_sales" value="<?php echo e($row->itemMaster->item_code); ?> <?php echo e($row->user_description_item); ?>" name="item_sales[]" autocomplete="off" required>
                                                    <span class="help-block search_item_code_empty glyphicon" style="display: none;"> No Results Found </span>
                                                    <input type="hidden" class="search_inventory_item_id" value='<?php echo e($row->inventory_item_id); ?>' name="inventory_item_id[]" value=""></td>
                                                <td width="20%">
                                                    <div class="col-xs-2">
                                                        <input class="form-control text-center" id="gsm_<?php echo e($key+1); ?>" name='attribute_number_gsm[]' value="<?php echo e((float)$row->attribute_number_gsm ?? ''); ?>" type="number" oninput="validity.valid||(value='');" min=0 placeholder="GSM" style="width: 30%;">/
                                                        <input class="form-control text-center" id="l_<?php echo e($key+1); ?>" name='attribute_number_l[]' value="<?php echo e((float)$row->attribute_number_l ?? ''); ?>" type="number" oninput="validity.valid||(value='');" min=0 placeholder="L" style="width: 30%;">/
                                                        <input class="form-control text-center" id="w_<?php echo e($key+1); ?>" name='attribute_number_w[]' value="<?php echo e((float)$row->attribute_number_w ?? ''); ?>" type="number" oninput="validity.valid||(value='');" min=0 placeholder="W" style="width: 30%;">
                                                    </div>
                                                    <input type="hidden" class="form-control" value="<?php echo e($row->user_description_item); ?>" readonly id="product_name_<?php echo e($key+1); ?>" autocomplete="off">
                                                    <input type="hidden" class="search_inventory_item_id" name="product_name[]" value="<?php echo e($row->user_description_item); ?>">
                                                </td>
                                                <td width="5%">
                                                    <input class="form-control text-center" id="roll_<?php echo e($key+1); ?>" name='line_number[]' type="number" value="<?php echo e($row->line_number); ?>">
                                                </td>
                                                <td width="auto">
                                                    <?php if(($row->flow_status_code) ==5 || ($row->flow_status_code)==6): ?>
                                                    <input type="number" class="form-control recount text-end" value="<?php echo e((float)$row->ordered_quantity); ?>" name="ordered_quantity[]" oninput="validity.valid||(value='');" min=1 required>
                                                    <?php else: ?>
                                                    <input type="number" class="form-control recount text-end" readonly value="<?php echo e((float)$row->ordered_quantity); ?>" name="ordered_quantity[]" required>
                                                    <?php endif; ?>
                                                </td>

                                                <td width="auto">
                                                    <input type="number" style="text-align: right" class="form-control harga text-end" step=0.000001 value="<?php echo e($row->unit_selling_price); ?>" name="unit_selling_price[]">
                                                </td>
                                                <td width="auto">
                                                    <?php if(($row->flow_status_code) ==5 || ($row->flow_status_code)==6): ?>
                                                    <input type="date" value="<?php echo e($row->schedule_ship_date->format ('Y-m-d')); ?>" name="schedule_ship_date[]" class="form-control text-end">
                                                    <?php else: ?>
                                                    <input type="date" class="form-control text-end" readonly value="<?php echo e($row->schedule_ship_date->format ('Y-m-d')); ?>" name="schedule_ship_date[]" required>
                                                    <?php endif; ?>
                                                </td>

                                                <?php $taxAfter = (($row->unit_selling_price * $row->ordered_quantity)*($row->tax->tax_rate ?? 0)); ?>
                                                <input type="hidden" style="text-align: right" readonly id="pajak_hasil_<?php echo e($key+1); ?>" class="form-control pajak_hasil" value="<?php echo e(number_format($taxAfter, 2, ',', '.')); ?>" name="pajak_hasil[]">

                                                <?php $subtotal =($row->unit_selling_price * $row->ordered_quantity + $taxAfter); ?>
                                                <td width="auto">
                                                    <input type="text" style="text-align: right" readonly id="subtotal1_<?php echo e($key+1); ?>" class="form-control" name="subtotal[]" value="<?php echo e(number_format($subtotal, 2, ',', '.')); ?>">
                                                    <input type="hidden" style="text-align: right" readonly id="subtotal_<?php echo e($key+1); ?>" class="form-control subtotal123" name="" value="<?php echo e($subtotal); ?>">
                                                </td>
                                                <td>
                                                    <?php if($row->flow_status_code==12 || $row->flow_status_code==11 ): ?>
                                                    <button type="submit" class="btn btn-secondary" disabled style="position: inherit;">X</button>
                                                    <?php else: ?>
                                                    <?php if($loop->first): ?> <form></form> <?php endif; ?>
                                                    <form type="hidden" action="<?php echo e(route('admin.salesOrder-detail.destroy',$row->id)); ?>" enctype="multipart/form-data" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <button type="submit" class="btn btn-ligth btn-sm" --disabled- style="position: inherit;">X</button>
                                                    </form>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                            $subtotal2 += $subtotal;
                                            $taxAfter2 += $taxAfter;
                                            ?>
                                            <?php $no++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <button type="button" class="btn btn-light add_sales_order btn-sm" style="font-size: 12px;"><i data-feather='plus'></i> <?php echo e(trans('cruds.OrderManagement.field.addrow')); ?></button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <br>
                            
                            <div class="tab-pane fade" id="nav-priceList" role="tabpanel" aria-labelledby="nav-priceList-tab">
                                <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                                    <table class="table table-striped tableFixHead" id="tab_logic">
                                        <thead>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.line')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.tax')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.document')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.price')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.effectivedate')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.disc')); ?></th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="sales_order_detail_container">
                                            <?php $no = 1; ?>
                                            <?php $__currentLoopData = $salesDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="tr_input1">
                                                <td class="rownumber1" style="width:3%"><?php echo e($no); ?></td>
                                                <td width="5%">
                                                    <select class="form-control pajak " name="tax_code[]" required value="<?php echo e($row->tax_code); ?>">
                                                        <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($raw->tax_code); ?>" <?php echo e($row->tax->tax_code == $raw->tax_code ? 'selected' : ''); ?>><?php echo e($raw->tax_code); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                                <td width="20%">
                                                    <input type="hidden" class="line_id">
                                                    <input type="text" class="form-control " id="price_list_name_<?php echo e($key+1); ?>" value="<?php echo e($row->price_list_detail->header_id ??''); ?>" name="price_list_name[]" autocomplete="off" required readonly>
                                                    <input type="hidden" class="form-control " id="price_list_id_<?php echo e($key+1); ?>" value="<?php echo e($row->price_list_detail->header_id ??''); ?>" name="price_list_id[]" autocomplete="off" required readonly>
                                                    <input type="hidden" class="form-control" id="price_id_<?php echo e($key+1); ?>" value="<?php echo e($row->price_list_detail->id??''); ?>" name="pricing_attribute1[]" autocomplete="off" required readonly>
                                                </td>
                                                <td> <input type="number" id="harga2_<?php echo e($key+1); ?>" value="<?php echo e($row->unit_selling_price); ?>" class="form-control harga" readonly></td>
                                                <td><input type="date" name="pricing_date[]" value="<?php echo e($row->price_list_detail->effective_from ??''); ?>" readonly class="form-control"></td>
                                                <td width="auto">
                                                    <input type="number" class="form-control disc text-end" value="<?php echo e($row->price_list_detail->discount ?? ''); ?>" name="disc[]" readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                            
                                            <?php $no++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-shipment" role="tabpanel" aria-labelledby="nav-shipment-tab">
                                <div class="box-body scrollx" style="height: 300px;overflow: scroll;">
                                    <table class="table table-striped tableFixHead" id="tab_logic">
                                        <thead>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.line')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.uom')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.subinv')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.packingstyle')); ?></th>
                                            <th scope="col"><?php echo e(trans('cruds.OrderManagement.field.status')); ?></th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="sales_order_shipment_container">
                                            <?php $no = 1; ?>
                                            <?php $__currentLoopData = $salesDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr class="tr_input">
                                                <td class="rownumber" style="width:3%"><?php echo e($no); ?></td>
                                                <td style="width:10%">
                                                    <input type="text" readonly id="uom_1" class="form-control uom" value="<?php echo e($row->order_quantity_uom); ?>" name="uom[]">
                                                </td>
                                                <td width="auto">
                                                    <input type="hidden" class="line_id" id="line_id_<?php echo e($key+1); ?>">
                                                    <input type="text" class="form-control" name="subinventory_from[]" id="subinventoryfrom_<?php echo e($key+1); ?>" value="<?php echo e($row->shipping_inventory); ?>" readonly>
                                                    <input type="hidden" class="form-control subinvfrom_<?php echo e($key+1); ?>" name="shipping_inventory[]" id="subinventory_<?php echo e($key+1); ?>" value="<?php echo e($row->shipping_inventory); ?>" autocomplete="off">
                                                </td>
                                                <td width="auto">
                                                    <select class="form-control" id="packingstyle_<?php echo e($key+1); ?>" name="packing_style[]" required>

                                                        <?php if($row->packing_style=="Roll"): ?>
                                                        <option value="Roll" selected>ROLL</option>
                                                        <option value="Pallet">PALLET</option>
                                                        <?php else: ?>
                                                        <option value="Roll">ROLL</option>
                                                        <option value="Pallet" selected>PALLET</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </td>
                                                <td width="auto">
                                                    <select class="form-control" id="" name="flow_status[]" required>
                                                        <option value="<?php echo e($row->trx_code->trx_code ?? ''); ?>" selected><?php echo e($row->trx_code->trx_name ??''); ?></option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                
                                                <?php $no++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab">
                                <div class="box-body scrollx" style="height: 300px;overflow: scroll;">

                                    <div class="d-flex justify-content-center" style="margin-top: 5%;">
                                        <a href="#imgModal" data-bs-toggle="modal" class="link-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="60" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                                                <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z" />
                                            </svg>
                                            <?php echo e(trans('cruds.itemMaster.fields.img')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> <?php echo e(trans('cruds.OrderManagement.field.level')); ?></label>
                                    <?php if(($row->flow_status_code==5) || ($row->flow_status_code==6) && $row->shipping_interfaced_flag == NULL): ?>
                                    <select class="form-control select2 " id="" name="flow_status_code" required>
                                        <?php if(($sales->booked_flag)==11): ?>
                                        <option value="14">Open</option>
                                        <option value="1">Book</option>
                                        <option value="12">Close</option>
                                        <option value="11" selected>Cancel</option>
                                        <?php elseif(($sales->booked_flag)==1): ?>
                                        
                                        <option value="1" selected>Book</option>
                                        <option value="12">Close</option>
                                        <option value="11">Cancel</option>
                                        <?php elseif(($sales->booked_flag)==12): ?>
                                        <option value="14">Open</option>
                                        <option value="1">Book</option>
                                        <option value="12" selected>Close</option>
                                        <option value="11">Cancel</option>
                                        <?php else: ?>
                                        <option value="14" selected>Open</option>
                                        <option value="1">Book</option>
                                        <option value="12">Close</option>
                                        <option value="11">Cancel</option>
                                        <?php endif; ?>
                                    </select>
                                    <?php else: ?>
                                    <select class="form-control select2 " id="" name="flow_status_code" readonly required>
                                        <option value="<?php echo e($sales->booked_flag); ?>" selected>Book</option>
                                    </select>
                                    <?php endif; ?>
                                    <input type="hidden" class="form-control" name="status_name" value='1' readonly="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-end">
                                    <label><?php echo e(trans('cruds.OrderManagement.field.taxamount')); ?></label><br>
                                    <input type="text" class="form-control text-end" id="tax_amount" name="tax_amount" value="<?php echo e(number_format($taxAfter2, 2, ',', '.')); ?>">
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="form-group text-end">
                                    <label><?php echo e(trans('cruds.OrderManagement.field.total')); ?></label>
                                    <input type="text" class="form-control purchase_total text-end" value="<?php echo e(number_format($subtotal2, 2, ',', '.')); ?>" id="total" readonly="" name="purchase_total">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-1 mb-50">
                            <button type="reset" class="btn btn-warning pull-left">Reset</button>
                            <button class="btn btn-primary btn-submit" name='action' value="save" type="submit"><i data-feather='save'></i>
                                <?php echo e(trans('global.save')); ?></button>
                        </div>
                        <br>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- Modal Example Start-->
                <div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle">Split Line </h4>
                                <div class="modal-header bg-primary">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="col-sm-0 control-label" for="number">ID</label>
                                                <input class="form-control" name="req_line_id">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="col-sm-0 control-label" for="number">Header Id</label>
                                                <input class="form-control" name="header">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="col-sm-0 control-label" for="number">Line Id</label>
                                                <input class="form-control" name="line">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="col-sm-0 control-label" for="site">Items</label>
                                                <input class="form-control" name="item">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="col-sm-0 control-label" for="site">Quantity</label>
                                                <input class="form-control" name="split_quantity">
                                                <input type="hidden" class="form-control" name="id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary " name='action' value="add_lines" data-dismiss="modal"><i data-feather='plus'></i><?php echo e(trans('global.add')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Modal Example Start-->
                <div class="input-group">
                    
                    <div class="modal fade" id="copyLine" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title text-white"><?php echo e(trans('cruds.OrderManagement.field.copyline')); ?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="card box-default overflow-auto">
                                        <div class="card-body" style="height: 350px;">
                                            <br>
                                            
                                            <table class="table table-striped w-100" id="copyLines" data-toggle="1">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.ordernumber')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.productname')); ?></th>
                                                        <th scope="col" class="text-center">Product Detail (GSM L x W)</th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.line')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.qty')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.uom')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.pricelist')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.shippinginv')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.shippingschedule')); ?></th>
                                                    </tr>
                                                </thead>
                                            </table>

                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div class="form-group row col-sm-5">
                                            <label class="col-sm-2 control-label" for="header_id"><?php echo e(trans('cruds.OrderManagement.field.type')); ?></label>
                                            <div class="col-sm-6">
                                                <select type="text" id="actionreturn" name="actionreturn" class="form-control select2" required>
                                                    <option value="50" selected>Local Sales</option>
                                                    <option value="51">Oversea Sales</option>
                                                    <option value="60">Return Local Sales</option>
                                                    <option value="61">Return Oversea Sales</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name='action' value="CpyLines">
                                            <i data-feather='plus'></i> <?php echo e(trans('cruds.OrderManagement.field.submmitline')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="modal fade" id="modalSplit" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title text-white"> <?php echo e(trans('cruds.OrderManagement.field.splitline')); ?></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <br>
                                            <table class="table table-striped w-100" id="splitLine">
                                                <thead>
                                                    <tr>
                                                        <th> <?php echo e(trans('cruds.OrderManagement.field.id')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.headerid')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.line')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.items')); ?></th>
                                                        <th><?php echo e(trans('cruds.OrderManagement.field.qty')); ?></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="d-flex justify-content-between mb-50">
                                                <button type="reset" class="btn btn-warning pull-left">Reset</button>

                                                <button type="submit" class="btn btn-outline-secondary" name='action' value="split_lines" data-dismiss="modal">
                                                    <?php echo e(trans('cruds.OrderManagement.field.add')); ?>

                                                </button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</section>
<?php echo $__env->make('admin.sales.img', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {

        var idReturn = [];
        $(".sub_chk:checked").each(function() {
            idReturn.push($(this).attr('data-id'));

        });

        var idSplit = [];
        $(".sub_chk:checked").each(function() {
            idSplit.push($(this).attr('data-id'));
        });

        console.log(idSplit);

        // CHECK ALL
        $('#masterckcbx').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        // CHECK ALL
        $('.add_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");

            } else {
                var check = alert("Add Row Success");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url')
                        , type: 'POST'
                        , headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , data: 'id=' + join_selected_values
                        , success: function(data) {
                            alert(data['success']);
                        }
                        , error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function deleteItem(id) {
        console.log(id);
        var check = confirm("Are you sure you want to Delete this row?");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (check == true) {
            $.ajax({
                url: "./../salesOrder-detail/destroy" + id
                , type: "DELETE"
                , data: {
                    id: id
                , }
                , success: function(result) {
                    location.reload();
                    alert('Success');
                }
                , error: function(result) {
                    alert('error');
                }
            , });
        }
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/sales/edit.blade.php ENDPATH**/ ?>