<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->has('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session()->get('error')); ?>

</div>
<?php endif; ?>
<br>
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route("admin.ar.update",[$cust->id])); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" novalidate>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header  mt-1 mb-25">
                                    <h6 class="card-title">
                                        <a href="<?php echo e(route("admin.ar.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.aReceivable.title')); ?> </a>
                                        <a href="<?php echo e(route("admin.ar.index")); ?>" class="breadcrumbs__item"><?php echo e(trans('cruds.aReceivable.title')); ?> </a>
                                        <a href="<?php echo e(route("admin.ar.create")); ?>" class="breadcrumbs__item">Create </a>
                                    </h6>
                                </div>
                                <hr>
                                <div class="box-body">
                                    <div class="card-body mt-1 centered">
                                        <div class="row mb-50">
                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start text-nowrap"><?php echo e(trans('cruds.aReceivable.ar.trx_number')); ?>

                                                        <p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="invoice_num" class="form-control " id="invoice_num" value="<?php echo e($cust->trx_number); ?>" autocomplete="off">
                                                <?php if($errors->any()): ?>
                                                <div class="badge bg-danger">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($error); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start"><?php echo e(trans('cruds.aReceivable.ar.trx_date')); ?></p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="datepicker-1" name="trx_date" value="<?php echo e($cust->trx_date); ?>" class="form-control datepicker" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start">Delivery</p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="attribute1" value="<?php echo e($cust->attribute1); ?>" class="form-control" autocomplete="off" required>

                                            </div>
                                        </div>
                                        <div class="row mb-50">
                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start"><?php echo e(trans('cruds.aReceivable.ar.bill_to')); ?>

                                                        <p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="hidden" name="vendor_id" id="vendor_id" class="form-control" placeholder="Search this blog">
                                                    <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo e($cust->customer->party_name); ?>" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start"><?php echo e(trans('cruds.aReceivable.ar.terms')); ?></p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="term_id" id="terms" class="form-control select2" required>
                                                    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($row->id == $cust->term_id): ?>
                                                    <option selected value="<?php echo e($row->term_code); ?>" <?php echo e(old('terms') ? 'selected' : ''); ?>> <?php echo e($row->term_code); ?> - <?php echo e($row->terms_name); ?> </option>
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
                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start">Note No</p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="attribute2" class="form-control" autocomplete="off" value="<?php echo e($cust->attribute2); ?>" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start"><?php echo e(trans('cruds.aReceivable.ar.ship_to')); ?></p>
                                                </b>
                                            </div>

                                            <div class="col-md-3">
                                                <input type="text" name="address" class="form-control" autocomplete="off" value="<?php echo e($cust->party_site->address1 ?? ''); ?>" required>
                                                <input type="hidden" name="bill_to_customer_id" class="form-control value1" value="<?php echo e($cust->bill_to_customer_id); ?>" id="input" autocomplete="off" required>
                                                <input type="hidden" name="ship_to_party_id" class="form-control value1" value="<?php echo e($cust->ship_to_customer_id); ?>" id="input" autocomplete="off" required>
                                                <input type="hidden" name="exchange_date" class="form-control value1" value="<?php echo e($cust->exchange_date); ?>" id="input" autocomplete="off" required>
                                                <input type="hidden" name="exchange_rate" class="form-control value1" value="<?php echo e($cust->exchange_rate); ?>" id="input" autocomplete="off" required>
                                                <input type="number" hidden id="status " name="je_batch_id" value="<?php echo e(random_int(0, 999999)); ?>" class="form-control">
                                                <input type="number" hidden id="status " name="organization_id" value="<?php echo e(random_int(0, 999999)); ?>" class="form-control">
                                            </div>
                                            <div class="col-md-1">
                                                <b>
                                                    <p class="text-start"><?php echo e(trans('cruds.aReceivable.ar.curr')); ?>

                                                </b>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="invoice_currency_code" id="customer_currency" class="form-control select2" required>
                                                    <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($row->currency_code == $cust->invoice_currency_code): ?>
                                                    <option selected value="<?php echo e($row->currency_code); ?>"> <?php echo e($row->currency_code); ?> - <?php echo e($row->currency_name); ?> </option>
                                                    <?php else: ?>
                                                    <option value="<?php echo e($row->currency_code); ?>"> <?php echo e($row->currency_code); ?> - <?php echo e($row->currency_name); ?> </option>
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
                                                    <p class="text-start">GL Date</p>
                                                </b>
                                            </div>
                                            <div class="col-md-3">

                                                <input type="text" id="datepicker-2" name="gl_date" value="<?php echo e($ar->gl_date); ?>" class="form-control datepicker" autocomplete="off" required>
                                                <input type="hidden" id="created_by" name="created_by" value="<?php echo e(auth()->user()->id?? ''); ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    
                                    <div class="card-header">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active btn btn-light" id="nav-ap-tab" data-bs-toggle="tab" data-bs-target="#nav-ap" type="button" role="tab" aria-controls="nav-ap" aria-selected="true">
                                                    <span class="bs-stepper-box">
                                                        <i data-feather="file-text" class="font-medium-3"></i>
                                                    </span>
                                                    <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">Main</span>
                                                    </span>
                                                </button>
                                                <button class="nav-link btn btn-light" id="nav-ap-det-tab" data-bs-toggle="tab" data-bs-target="#nav-ap-det" type="button" role="tab" aria-controls="nav-ap-det" aria-selected="false">
                                                    <span class="bs-stepper-box">
                                                        <i data-feather="dollar-sign" class="font-medium-3"></i>
                                                    </span>
                                                    <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">Journal Items</span>
                                                    </span>

                                                </button>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="card-body ">
                                        <div class="tab-content" id="nav-tabContent">
                                            
                                            <div class="tab-pane fade show active" id="nav-ap" role="tabpanel" aria-labelledby="nav-ap-tab">
                                                <div class="box-body scrollx tableFixHead" style="height: 380px;overflow: scroll;">
                                                    <table class="table table-fixed table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Product</th>
                                                                <th class="text-center">Desc</th>
                                                                <th class="text-center">Account Code</th>
                                                                <th class="text-center">Quantity</th>
                                                                <th class="text-center">Price</th>
                                                                <th class="text-center">Total Amount</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="receivable_container">
                                                            <?php $subtotal =0;$ar_account = 'XXXX'; ?>
                                                            <?php $__currentLoopData = $line; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($row->line_type == 0 ||$row->line_type == 3): ?>
                                                            <tr class="">
                                                                <td width="15%">
                                                                    <input type="text" readonly class="form-control" value="<?php echo e($row->ItemMaster->item_code ?? $row->description); ?>" name="item_code[]" id="searchitem_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                    <input type="hidden" readonly class="form-control" value="<?php echo e($row->inventory_item_id ?? ''); ?>" name="inventory_item_id[]" autocomplete="off" required>
                                                                </td>
                                                                <td width="20%">
                                                                    <input type="text" readonly class="form-control" value="<?php echo e($row->description); ?>" name="description[]" id="searchitem_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                    <input type="hidden" readonly class="form-control" value="<?php echo e($row->sales_order ?? ''); ?>" name="sales_order[]" id="sales_order_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                </td>
                                                                <td width="20%">
                                                                    <input type="text" class="form-control search_acc" value="<?php echo e($row->code_combinations ?? $row->ItemMaster->category->inventory_account_code); ?>  <?php echo e($row->acc->description ?? ''); ?>" name="account_dess[]" id="accDes_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                    <input type="hidden" name="" value="<?php echo e($row->code_combinations ?? $row->ItemMaster->category->attribute1); ?>" class="form-control datepicker" id="acc_<?php echo e($key+1); ?>" autocomplete="off">
                                                                </td>
                                                                <input type="hidden" name="accts_pay_code_combination_id" class="form-control datepicker" id="acc_<?php echo e($key+1); ?>" value="<?php echo e($row->ItemMaster->category->attribute1 ?? ''); ?>" autocomplete="off">
                                                                <?php $ar_account = $row->ItemMaster->category->receivable_account_code ?? ''; ?>
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" class="form-control ar_recount float-end text-end" readonly value="<?php echo e($row->quantity_invoiced); ?>" name="quantity_invoiced[]" id="qty_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                    <input type="hidden" class="form-control ar_recount float-end text-end" readonly value="<?php echo e($row->quantity_ordered); ?>" name="quantity_ordered[]" id="qty2_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                </td>
                                                                <td width="20%">
                                                                    <input type="text" name="unit_selling_price[]" readonly class="form-control datepicker float-end text-end" value="<?php echo e($row->unit_selling_price); ?>" id="price_<?php echo e($key+1); ?>" autocomplete="off">
                                                                </td>
                                                                <td width="20%">
                                                                    <input type="text" name="amount_due_original[]" readonly class="form-control subtotal float-center text-end grandSub" id="subtotalAdd_<?php echo e($key+1); ?>" value="<?php echo e($row->amount_due_original); ?>" autocomplete="off">
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn  btn-ligth btn-sm" style="position: inherit;">X</button>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php $subtotal += $row->unit_selling_price * $row->quantity_invoiced; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <?php if($cust->status_trx != 2): ?>
                                                                <td colspan="2">
                                                                    <button type="button" class="btn btn-light btn-sm add_receivable " style="font-size: 12px;"><i data-feather='plus'></i> Add Rows</button>
                                                                </td>
                                                                <?php endif; ?>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                                <div class="row mt-2 mb-2">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label> Status</label>
                                                            <?php if($cust->status_trx == 1): ?>
                                                            <input type="text" class="form-control grand_total " value="Validate" name="status_name" readonly="">
                                                            <?php elseif($cust->status_trx == 2): ?>
                                                            <input type="text" class="form-control grand_total " value="Posted" name="status_name" readonly="">
                                                            <?php elseif($cust->status_trx == 3): ?>
                                                            <input type="text" class="form-control grand_total " value="Canceled" name="status_name" readonly="">
                                                            <?php elseif($cust->status_trx == 4): ?>
                                                            <input type="text" class="form-control grand_total " value="<?php echo e($cust->payment_attributes); ?>" name="status_name" readonly="">
                                                            <?php else: ?>
                                                            <input type="text" class="form-control grand_total " value="Draft" name="status_name" readonly="">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tax ( Amount )</label><br>
                                                            <input type="hidden" class="form-control tax" id="tax_main" value="<?php echo e($ar->tax_applied); ?>" name="tax_amount">
                                                            <input type="hidden" class="form-control" id="pajak" value="<?php echo e($data->tax_rate); ?>" name="pajak">
                                                            <label class="form-control text-end tax" id="tax_main2"><?php echo e(number_format( $ar->tax_applied )); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-5">
                                                        <div class="form-group">
                                                            <label>Total</label>
                                                            <input type="hidden" class="form-control calculate" value="<?php echo e($ar->amount_applied); ?>" id="amount" readonly="" name="ar_amount">
                                                            <label class="form-control text-end calculate" id="total"> <?php echo e(number_format($ar->amount_applied)); ?></label>

                                                        </div>
                                                    </div>
                                                    <?php if($cust->payment_attributes == 'Partial'): ?>
                                                    <div class="row mt-2 mb-2">
                                                        <div class="col-md-10">
                                                        </div>
                                                        <div class=" col-md-2">
                                                            <div class="form-group">
                                                                <label class="text-end"> &nbsp; Amount Due : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                    <b><?php echo e(number_format($ar->amount_applied - $ar->amount_applied_from)); ?></b></label>
                                                                <b>
                                                                    <hr></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
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
                                                            <?php $total =0;$inv_total =0; ?>
                                                            <?php $__currentLoopData = $line; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($row->line_type == 0): ?>
                                                            <tr class="tr_input">
                                                                <td width="20%">
                                                                    <input type="text" class="form-control search_acc" value="<?php echo e($row->code_combinations); ?>  <?php echo e($row->acc->description ?? ''); ?>" name="quantity1[]" id="accDes2_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                    <input type="hidden" name="code_combinations[]" class="form-control datepicker" id="acc2_<?php echo e($key+1); ?>" value="<?php echo e($row->code_combinations); ?>" autocomplete="off">
                                                                    <input type="hidden" readonly class="form-control" value="<?php echo e($row->id); ?>" name="lineId[]" id="lineId_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                </td>
                                                                <td width="32%">
                                                                    <input type="text" readonly class="form-control" value="<?php echo e($row->description); ?>" name="label[]" id="searchitem_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                </td>
                                                                <td width="20%">
                                                                    <label class="form-control  text-end"><?php echo e(number_format($row->frt_ed_amount )); ?></label>
                                                                    <input type="hidden" name="" readonly class="form-control datepicker float-center text-end" id="price_<?php echo e($key+1); ?>" autocomplete="off">
                                                                    <input type="hidden" name="entered_dr[]" readonly class="form-control datepicker float-center text-end" id="" value="<?php echo e($row->frt_ed_amount); ?>" autocomplete="off">
                                                                </td>
                                                                <td width="25%">
                                                                    <label class="form-control text-end"><?php echo e(number_format($row->frt_uned_amount )); ?></label>
                                                                    <input type="hidden" name="entered_cr[]" readonly class="form-control datepicker float-center text-end" id="subtotal_<?php echo e($key+1); ?>" value="<?php echo e($row->frt_uned_amount); ?>" autocomplete="off">
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-ligth btn-sm" disabled style="position: inherit;">X</button>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <?php $__currentLoopData = $line; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($row->line_type == 1 || $row->line_type == 3): ?>
                                                            <tr class="tr_input_journal">
                                                                <td width="20%">
                                                                    <input type="text" class="form-control search_coa" value="<?php echo e($row->code_combinations); ?>  <?php echo e($row->acc->description); ?>" name="quantity1[]" id="coa_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                    <input type="hidden" name="code_combinations[]" class="form-control datepicker" id="search_coa_<?php echo e($key+1); ?>" value="<?php echo e($row->code_combinations); ?>" autocomplete="off">
                                                                    <input type="hidden" readonly class="form-control" value="<?php echo e($row->id); ?>" name="lineId[]" id="lineId_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                </td>
                                                                <td width="32%">
                                                                    <input type="text" readonly class="form-control" value="<?php echo e($row->description); ?>" name="label[]" id="searchitem_<?php echo e($key+1); ?>" autocomplete="off" required>
                                                                </td>
                                                                <td width="20%">
                                                                    <?php if($row->code_combinations == $ar_account): ?>
                                                                    <label id="calculate" class="form-control calculate text-end"><?php echo e(number_format($row->frt_ed_amount  )); ?></label>
                                                                    <input type="hidden" name="entered_dr[]" id="calculate" readonly class="form-control calculate float-center text-end" value="<?php echo e($row->frt_ed_amount); ?>" autocomplete="off">
                                                                    <input type="hidden" name="" id="tax" readonly class="form-control tax float-center text-end" value="<?php echo e($ar->tax_applied); ?>" autocomplete="off">
                                                                    <input type="hidden" name="" id="sales" readonly class="form-control datepicker float-center text-end" value="<?php echo e($row->frt_ed_amount); ?>" autocomplete="off">
                                                                    <?php else: ?>
                                                                    <label class="form-control  text-end"><?php echo e(number_format($row->frt_ed_amount )); ?></label>
                                                                    <input type="hidden" name="" readonly class="form-control datepicker float-center text-end" id="price_<?php echo e($key+1); ?>" autocomplete="off">
                                                                    <input type="hidden" name="entered_dr[]" readonly class="form-control datepicker float-center text-end" id="" value="<?php echo e($row->frt_ed_amount); ?>" autocomplete="off">
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td width="25%">
                                                                    <?php if($row->code_combinations == $data->tax_code->tax_account): ?>
                                                                    <label class="form-control text-end tax"><?php echo e(number_format($row->frt_uned_amount)); ?></label>
                                                                    <input type="hidden" name="entered_cr[]" readonly class="form-control datepicker tax float-center text-end" value="<?php echo e($row->frt_uned_amount); ?>" autocomplete="off">
                                                                    <?php else: ?>
                                                                    <label class="form-control text-end"><?php echo e(number_format($row->frt_uned_amount )); ?></label>
                                                                    <input type="hidden" name="entered_cr[]" readonly class="form-control datepicker float-center text-end" id="subtotal_<?php echo e($key+1); ?>" value="<?php echo e($row->frt_uned_amount); ?>" autocomplete="off">
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($row->code_combinations == $data->tax_code->tax_account): ?>
                                                                    <button type="button" class="btn btn-ligth btn-sm remove_tax " data-id="<?php echo e($row->id); ?>" data-term="<?php echo e($cust->bill_template_name); ?>" style="position: inherit;">X</button>
                                                                    <?php else: ?>
                                                                    <button type="button" class="btn btn-ligth btn-sm" disabled style="position: inherit;">X</button>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php
                                                            if($row->line_type != 3){
                                                            $total += $row->frt_ed_amount;
                                                            }
                                                            ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="">
                                                                <td colspan="2"></td>
                                                                <td class="text-end" width="20%">
                                                                    <label id="calculate_debit" class="form-control calculate text-end"><?php echo e(number_format( $total )); ?></label>
                                                                    <input type="hidden" name="calculate_debit" id="calculate_debit" readonly class="form-control calculate float-center text-end" value="<?php echo e($total); ?>" autocomplete="off">
                                                                </td>
                                                                <td class="text-end" width="20%">
                                                                    <label id="calculate_debit" class="form-control calculate text-end"><?php echo e(number_format( $total)); ?></label>
                                                                    <input type="hidden" name="calculate_credit" id="calculate_debit" readonly class="form-control calculate float-center text-end" value="<?php echo e($total); ?>" autocomplete="off">
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="d-flex justify-content-between mt-2 mb-2">
                                            <?php if($cust->status_trx == 2 || $cust->payment_attributes == 'Partial'): ?>
                                            <div>
                                                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#paymentModal"> <span class="bs-stepper-box">
                                                        <i data-feather="settings" class="font-medium-3"></i>
                                                    </span>Actions</button> &nbsp;&nbsp;
                                            </div>
                                            <?php else: ?>
                                            <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#actionModal"> <span class="bs-stepper-box">
                                                    <i data-feather="settings" class="font-medium-3"></i>
                                                </span>Actions</button>
                                            <?php endif; ?>
                                            <?php if($cust->status_trx != 2): ?>
                                                <button type="submit" name='action' value="save" class="btn btn-sm btn-primary pull-right"> <i data-feather="corner-down-right" class="font-medium-3"></i> Submit</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->make('admin.arReceivable.action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                    <?php echo $__env->make('admin.arReceivable.creditNote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>

</section>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/arReceivable/edit.blade.php ENDPATH**/ ?>