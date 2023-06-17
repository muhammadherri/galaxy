<?php $__env->startSection('content'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php if(session()->has('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session()->get('error')); ?>

</div>
<?php endif; ?>
<div class="row">
    <div class="card">
        <div class="card-header  mt-1 mb-25">
            <h6 class="card-title">
                <a href="<?php echo e(route("admin.ap.index")); ?>" class="breadcrumbs__item">Accounting </a>
                <a href="<?php echo e(route("admin.ap.index")); ?>" class="breadcrumbs__item">Account Payable </a>
                <a href="<?php echo e(route("admin.ap.index")); ?>" class="breadcrumbs__item">Edit </a>
            </h6>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route("admin.ap.update",[$ap->invoice_id])); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal create_purchase" novalidate>
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                        </div>
                        <hr>
                        <div class="box-body">
                            <div class="card-body mt-1 centered">
                                <div class="row mb-50">
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start text-nowrap"><?php echo e(trans('cruds.aPayable.fields.invoiceno')); ?>

                                                <p>
                                        </b>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="invoice_num" value="<?php echo e($ap->invoice_num); ?>" class="form-control " id="invoice_num" autocomplete="off">
                                        <input type="hidden" name="invoice_id" value="<?php echo e($ap->invoice_id); ?>" class="form-control " id="invoice_id" autocomplete="off">
                                        <input type="hidden" name="ap_id" value="<?php echo e($ap->id); ?>" class="form-control" id="invoice_id" autocomplete="off">
                                        <input type="hidden" name="exchange_date" value="<?php echo e($ap->exchange_date); ?>" class="form-control " id="invoice_id" autocomplete="off">
                                        <input type="hidden" name="exchange_rate" value="<?php echo e($ap->exchange_rate); ?>" class="form-control " id="invoice_id" autocomplete="off">
                                        <?php if($errors->any()): ?>
                                        <div class="badge bg-danger">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($error); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" name="voucher_number" value="<?php echo e($ap->voucher_num); ?>" readonly class="form-control " id="" autocomplete="off">
                                    </div>

                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.invoicedate')); ?></p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="datepicker-1" name="datepicker1" value="<?php echo e($ap->invoice_date->format('d-M-Y')); ?>" class="form-control datepicker text-end" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.gldate')); ?></p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="datepicker-2" name="datepicker2" value="<?php echo e($ap->gl_date->format('d-M-Y')); ?>" class="form-control text-end" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row mb-50">
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.vendor')); ?>

                                                <p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo e($ap->vendor_id ?? ''); ?>" class="form-control" placeholder="Search this blog">
                                            <input type="hidden" name="job_definition_name" class="form-control" id="" value="<?php echo e($ap->job_definition_name); ?>" autocomplete="off" required>
                                            <input type="number" hidden id="status " name="je_batch_id" value="<?php echo e(random_int(0, 999999)); ?>" class="form-control">
                                            <input type="text" name="vendor_name" id="vendor_name" class="form-control" value="<?php echo e($ap->vendor->vendor_name ?? ''); ?>" autocomplete="off">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" id="btn-vendor" data-bs-toggle="modal" data-bs-target="#demoModal" type="button">
                                                    <i data-feather="search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.duedate')); ?></p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" id="datepicker-3" name="duedate" class="form-control datepicker text-end" value="<?php echo e($ap->invoice_received_date->format('d-M-Y')); ?>" autocomplete="off" required>
                                        <input type="number" hidden id="created_by" name="created_by" value="<?php echo e(auth()->user()->id); ?>" class="form-control">
                                    </div>
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.amount')); ?></p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="invoice_amount" class="form-control currency calculate text-end" autocomplete="off" value="<?php echo e(number_format($ap->invoice_amount, 2)); ?>" required>
                                    </div>
                                </div>

                                <div class="row mb-50">
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.curr')); ?>

                                                <p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="customer_currency" id="customer_currency" class="form-control select2" required>
                                            <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ap->invoice_currency_code == $row->currency_code): ?>
                                            <option value="<?php echo e($row->currency_code); ?>" <?php echo e(old('customer_currency') ? 'selected' : ''); ?> selected> <?php echo e($row->currency_code); ?> - <?php echo e($row->currency_name); ?> </option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('customer_currency')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('customer_currency')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.type')); ?></p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="invoice_type_lookup_code" id="invoice_type_lookup_code" value="Standard" class="form-control datepicker " id="" autocomplete="off" readonly required>
                                    </div>
                                    <div class="col-md-1">
                                        <b>
                                            <p class="text-start"><?php echo e(trans('cruds.aPayable.fields.terms')); ?></p>
                                        </b>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="terms_id" id="terms_id" class="form-control select2" required>
                                            <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ap->terms_id == $row->term_code): ?>
                                            <option value="<?php echo e($row->term_code); ?>" <?php echo e(old('terms') ? 'selected' : ''); ?> selected> <?php echo e($row->term_code); ?> - <?php echo e($row->terms_name); ?> </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($row->term_code); ?>" <?php echo e(old('terms') ? 'selected' : ''); ?>> <?php echo e($row->term_code); ?> - <?php echo e($row->terms_name); ?> </option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('terms')): ?>
                                        <em class="invalid-feedback">
                                            <?php echo e($errors->first('terms')); ?>

                                        </em>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            
                            <div class="card-header">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active btn btn-ligth" id="nav-ap-tab" data-bs-toggle="tab" data-bs-target="#nav-ap" type="button" role="tab" aria-controls="nav-ap" aria-selected="true">
                                            <span class="bs-stepper-box">
                                                <i data-feather="file-text" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Main</span>
                                            </span>
                                        </button>
                                        <button class="nav-link btn btn-ligth" id="nav-ap-det-tab" data-bs-toggle="tab" data-bs-target="#nav-ap-det" type="button" role="tab" aria-controls="nav-ap-det" aria-selected="false">
                                            <span class="bs-stepper-box">
                                                <i data-feather="dollar-sign" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Account</span>
                                            </span>

                                        </button>
                                    </div>
                                </nav>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="nav-tabContent">
                                    
                                    <div class="tab-pane fade show active" id="nav-ap" role="tabpanel" aria-labelledby="nav-ap-tab">
                                        <div class="box-body scrollx tableFixHead" style="height: 380px;overflow: scroll;">
                                            <table class="table table-fixed table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Desc</th>
                                                        <th>Account Code</th>
                                                        <th class="text-end">Quantity</th>
                                                        <th class="text-end">Price</th>
                                                        <th class="text-end">Total Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="requisition_container">
                                                    <?php $subtotal =0; ?>
                                                    <?php $__currentLoopData = $ap_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($row->line_type_lookup_code == false): ?>
                                                    <tr class="tr_input" id="rowTab1_<?php echo e($key+1); ?>">
                                                        <td width="25%">
                                                            <input type="text" class="form-control search_purchase_item" value="<?php echo e($row->ItemMaster->item_code); ?>" name="item_code[]" id="searchitem_1" autocomplete="off" required><span class="help-block search_item_code_empty" style="display: none;">No Results Found ...</span>
                                                            <input type="hidden" class="search_inventory_item_id" id="id_1'" value='<?php echo e($row->inventory_item_id); ?>' name="inventory_item_id[]" autocomplete="off">
                                                            <input type="hidden" class="form-control" id="description_1" value="<?php echo e($row->unit_meas_lookup_code); ?>" name="unit_meas_lookup_code[]" autocomplete="off">
                                                        </td>
                                                        <td width="18%">
                                                            <input type="text" class="form-control float-center " name="pr_uom_code[]" value="<?php echo e($row->item_description); ?>" id="description_<?php echo e($key+1); ?>" autocomplete="off" readonly>
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" class="form-control purchase_quantity search_acc" value="<?php echo e($row->account_segment); ?>" name="payable_account_code[]" id="accDes_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                            <input type="hidden" name="" value="<?php echo e($row->account_segment); ?>" class="form-control datepicker" id="acc_<?php echo e($key+1); ?>" autocomplete="off">
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" name="quantity_invoiced[]" class="form-control recount_ap float-center text-end" value="<?php echo e(number_format($row->quantity_invoiced)); ?>" id="qty_<?php echo e($key+1); ?>" autocomplete="off">
                                                        </td>
                                                        <td width="10%">
                                                            <input type="text" name="unit_price[]" class="form-control recount_ap float-center text-end" value="<?php echo e($row->unit_price); ?>" id="price_<?php echo e($key+1); ?>" autocomplete="off">
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" name="stat_amount[]" class="form-control recount_ap float-center text-end" value="<?php echo e(number_format($row->stat_amount,2)); ?>" id="subtotalAdd_<?php echo e($key+1); ?>" autocomplete="off">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-ligth btn-sm" style="position: inherit;">X</button>
                                                        </td>
                                                    </tr>

                                                    <?php $subtotal += $row->unit_price * $row->quantity_invoiced; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <?php $tax= $subtotal * $lines->tax_rate ?>
                                    <div class="tab-pane fade show " id="nav-ap-det" role="tabpanel" aria-labelledby="nav-ap-det-tab">
                                        <div class="box-body scrollx tableFixHead" style="height: 380px;overflow: scroll;">
                                            <table class="table table-fixed table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Account</th>
                                                        <th class="text-center">Label</th>
                                                        <th class="text-center">Debit</th>
                                                        <th class="text-center">Credit</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="journal_container">
                                                    <?php $__currentLoopData = $ap_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($row->line_type_lookup_code == false): ?>
                                                    <tr class="tr_input">
                                                        <td width="20%">
                                                            <input type="text" class="form-control search_acc" value="<?php echo e($row->account_segment); ?>  <?php echo e($row->item_description ?? ''); ?>" name="quantity[]" id="accDes2_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                            <input type="hidden" name="account_segment[]" class="form-control" id="acc2_<?php echo e($key+1); ?>" value="<?php echo e($row->account_segment ?? $row->ItemMaster->category->payable_account_code); ?>" autocomplete="off"></td>
                                                            <input type="hidden" class="form-control" id="category_1" value="<?php echo e($row->id); ?>" name="id[]" autocomplete="off">
                                                            <input type="hidden" class="form-control" id="category_1" value="<?php echo e($row->line_id); ?>" name="line_id[]" autocomplete="off">
                                                        <td width="37%">
                                                            <input type="text" readonly class="form-control" value="<?php echo e($row->item_description); ?>" name="label[]" id="des2_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                        </td>
                                                        <td width="20%">
                                                            <label class="form-control text-end" id="price2_<?php echo e($key+1); ?>"><?php echo e(number_format($row->total_rec_tax_amount,2)); ?></label>
                                                            <input type="hidden" name="total_rec_tax_amount[]" readonly class="form-control float-center text-end" id="subtotal_<?php echo e($key+1); ?>" value="<?php echo e($row->total_rec_tax_amount); ?>" autocomplete="off">
                                                            <input type="hidden" name="line_type_lookup_code[]" readonly class="form-control float-center text-end" value="<?php echo e($row->line_type_lookup_code); ?>" autocomplete="off">
                                                        </td>
                                                        <td width="20%">
                                                            <label class="form-control  text-end"><?php echo e(number_format($row->total_nrec_tax_amount,2)); ?></label>
                                                            <input type="hidden" name="total_nrec_tax_amount[]" readonly value="<?php echo e($row->total_nrec_tax_amount); ?>" class="form-control datepicker float-center text-end" id="price_<?php echo e($key+1); ?>" autocomplete="off">
                                                        </td>
                                                        <td>
                                                            <button type="button" disabled class="btn btn-ligth  btn-sm hapusdata" style="position: inherit;">X</button>
                                                        </td>
                                                    </tr>
                                                    <?php $tax_rate = $row->tax_rate;$tax_rate_code = $row->tax_rate_code; ?>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                                <tfoot>
                                                    <?php $__currentLoopData = $ap_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($row->line_type_lookup_code == true): ?>
                                                    <tr class="">
                                                        <td width="20%">
                                                            <input type="text" class="form-control search_acc" value="<?php echo e($row->account_segment); ?>  <?php echo e($row->item_description ?? ''); ?>" name="quantity[]" id="accDes2_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                            <input type="hidden" name="account_segment[]" class="form-control datepicker" id="acc2_<?php echo e($key+1); ?>" value="<?php echo e($row->account_segment); ?>" autocomplete="off"></td>
                                                        <input type="hidden" class="form-control" id="category_1" value="<?php echo e($row->id); ?>" name="id[]" autocomplete="off">
                                                        <input type="hidden" class="form-control" id="category_1" value="<?php echo e($row->line_id); ?>" name="line_id[]" autocomplete="off">
                                                        <td width="37%">
                                                            <input type="text" readonly class="form-control" value="<?php echo e($row->item_description); ?>" name="label[]" id="0" autocomplete="off" required>
                                                            <input type="hidden" name="line_type_lookup_code[]" readonly class="form-control float-center text-end" value="<?php echo e($row->line_type_lookup_code); ?>" autocomplete="off">
                                                        </td>
                                                        <td width="20%">
                                                            <label class="form-control text-end"><?php echo e(number_format($row->total_rec_tax_amount,2)); ?></label>
                                                            <input type="hidden" name="total_rec_tax_amount[]" readonly class="form-control datepicker float-center text-end" id="subtotal_<?php echo e($key+1); ?>" value="<?php echo e($row->total_rec_tax_amount); ?>" autocomplete="off">
                                                        </td>
                                                        <td width="20%">
                                                            <?php if($row->total_nrec_tax_amount == 0): ?>
                                                                <label class="form-control  text-end"><?php echo e(number_format($row->total_nrec_tax_amount,2)); ?></label>
                                                                <input type="hidden" name="total_nrec_tax_amount[]" readonly value="<?php echo e($row->total_nrec_tax_amount); ?>" class="form-control datepicker float-center text-end" id="price_<?php echo e($key+1); ?>" autocomplete="off">
                                                            <?php else: ?>
                                                                <label class="form-control calculate text-end"><?php echo e(number_format($row->total_nrec_tax_amount,2)); ?></label>
                                                                <input type="hidden" name="total_nrec_tax_amount[]" readonly value="<?php echo e($row->total_nrec_tax_amount); ?>" class="form-control datepicker float-center text-end calculate" id="amount" autocomplete="off">
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($row->total_nrec_tax_amount == 0): ?>
                                                                <button type="button" class="btn btn-ligth btn-sm remove_tax" data-id="<?php echo e($row->id); ?>" data-term="<?php echo e($ap->job_definition_name); ?>" style="position: inherit;">X</button>
                                                                <input type="hidden" name="tax_rate" readonly class="form-control float-center text-end" id="tax_rate_<?php echo e($key+1); ?>" value="<?php echo e($tax_rate); ?>" autocomplete="off">
                                                                <input type="hidden" name="tax_rate_code" readonly class="form-control float-center text-end" id="pajak_code" value="<?php echo e($tax_rate_code); ?>" autocomplete="off">
                                                            <?php else: ?>
                                                                <button type="button" disabled class="btn btn-ligth btn-sm" style="position: inherit;">X</button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="">
                                                        <td colspan="2"></td>
                                                        <td class="text-end" width="20%">
                                                            <label id="calculate_debit" class="form-control calculate text-end"><?php echo e(number_format($subtotal + $tax  ,2)); ?></label>
                                                            <input type="hidden" name="calculate_debit" id="calculate_debit" readonly class="form-control calculate float-center text-end" value="<?php echo e($subtotal + $tax); ?>" autocomplete="off">
                                                        </td>
                                                        <td class="text-end" width="20%">
                                                            <label id="calculate_debit" class="form-control calculate text-end"><?php echo e(number_format($subtotal + $tax  ,2)); ?></label>
                                                            <input type="hidden" name="calculate_credit" id="calculate_debit" readonly class="form-control calculate float-center text-end" value="<?php echo e($subtotal + $tax); ?>" autocomplete="off">
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-1 mb-1">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Status</label>
                                            <?php if($ap->routing_status_lookup_code == 1): ?>
                                            <input type="text" class="form-control grand_total " value="Validate" name="status_name" readonly="">
                                            <?php elseif($ap->routing_status_lookup_code == 2): ?>
                                            <input type="text" class="form-control grand_total " value="Posted" name="status_name" readonly="">
                                            <?php elseif($ap->routing_status_lookup_code == 3): ?>
                                            <input type="text" class="form-control grand_total " value="Canceled" name="status_name" readonly="">
                                            <?php elseif($ap->routing_status_lookup_code == 4): ?>
                                            <input type="text" class="form-control grand_total " value="<?php echo e($ap->payment_status_flag); ?>" name="status_name" readonly="">
                                            <?php else: ?>
                                            <input type="text" class="form-control grand_total " value="Draft" name="status_name" readonly="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tax ( Amount )</label><br>
                                            <input type="hidden" class="form-control" value="<?php echo e($ap->total_tax_amount ?? $tax); ?>" id="pajak" name="tax_amount">
                                            <input type="hidden" class="form-control tax" value="<?php echo e($ap->total_tax_amount ?? $tax); ?>" id="tax_main" name="tax">
                                            <label class="form-control text-end tax" id="tax_main2"><?php echo e(number_format($ap->total_tax_amount ?? $tax,2)); ?></label>
                                        </div>
                                    </div>
                                    <div class=" col-md-5">
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="hidden" class="form-control calculate" value="<?php echo e($subtotal + $tax); ?>" id="total" readonly="" name="purchase_total">
                                            <label class="form-control text-end calculate" id="total"><?php echo e(number_format($subtotal + $tax,2)); ?></label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php if($ap->payment_status_flag == 'Partial'): ?>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-10">
                                    </div>
                                    <div class=" col-md-2">
                                        <div class="form-group">
                                            <label class="text-end"> &nbsp; Amount Due : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                <b><?php echo e(number_format($ap->invoice_amount - $ap->amount_paid,2)); ?></b></label>
                                            <b>
                                                <hr></b>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- /.box-body -->

                            <div class="d-flex justify-content-between mb-1">
                                <?php if($ap->routing_status_lookup_code == 2 || $ap->payment_status_flag == 'Partial'): ?>
                                <div>
                                    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#paymentModal"> <span class="bs-stepper-box">
                                            <i data-feather="settings" class="font-medium-1"></i>
                                        </span>Actions</button> &nbsp;&nbsp;

                                    <?php else: ?>
                                    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#actionModal"> <span class="bs-stepper-box">
                                            <i data-feather="settings" class="font-medium-3"></i>
                                        </span>Actions</button>
                                    <button type="button" id="btn-grn" class="btn btn-sm btn-info " data-bs-toggle="modal" data-bs-target="#poModal"> <span class="bs-stepper-box">
                                            <i data-feather="check-circle" class="font-medium-3"></i>
                                        </span>PO Match</button>
                                    <button type="submit" name='action' value="save" class="btn btn-sm btn-primary pull-right"> <i data-feather="corner-down-right" class="font-medium-3"></i> Submit</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('admin.accountPayable.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.accountPayable.vendor-src', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.accountPayable.grn-src', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
            <?php echo $__env->make('admin.accountPayable.creditMemo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
</div>
</div>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        , }
    });

    $(document).ready(function() {
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/accountPayable/edit.blade.php ENDPATH**/ ?>