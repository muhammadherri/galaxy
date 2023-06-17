<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>
    <?php $__env->startSection('breadcrumbs'); ?>
    <a href="<?php echo e(route("admin.ap-payment.index")); ?>" class="breadcrumbs__item">Account Payable </a>
    <a href="<?php echo e(route("admin.ap-payment.index")); ?>" class="breadcrumbs__item">AP List </a>
    <a href="" class="breadcrumbs__item active">Open</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><b>Draft</b></h4>
                    </div>
                    <hr>

                    <br>
                    <div class="card-body">
                        <form action="<?php echo e(route("admin.ap-payment.update",$payment->id)); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <input type="hidden" id="created_by" name="created_by"value="<?php echo e(auth()->user()->id); ?>">
                                        <input type="hidden" id="status" name="status" value="1">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.internal')); ?></label>
                                            <div class="col-sm-3 ">
                                                <input type="checkbox" class="form-check-input" name="status" id="Check4" value="1">
                                            </div>

                                            <div class="col-sm-2"></div>

                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.journal')); ?></label>
                                            <div class="col-sm-3">
                                                <select disabled name="attribute_category" id="attribute_category" class="form-control select2" required value="<?php echo e($payment->attribute_category); ?>">
                                                    <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option readonly value="<?php echo e($row->category_code); ?>"<?php echo e($payment->attribute_category == $row->category_code ? 'selected' : ''); ?>><?php echo e($row->description); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.type')); ?></label>
                                            <div class="col-sm-3">
                                                <?php if($payment->global_attribute1=='Send'): ?>
                                                <div class=" form-check-inline">
                                                    <input class="form-check-input" type="radio" name="logo" id="inlineRadio1" value="Send" checked="">
                                                    <label class="form-check-label" for="inlineRadio1">&nbsp Send</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="logo" id="inlineRadio2" value="Receive">
                                                    <label class="form-check-label" for="inlineRadio2">&nbsp Receive</label>
                                                </div>
                                                <?php else: ?>
                                                <div class=" form-check-inline">
                                                    <input class="form-check-input" type="radio" name="logo" id="inlineRadio1" value="Send" >
                                                    <label class="form-check-label" for="inlineRadio1">&nbsp Send</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="logo" id="inlineRadio2" value="Receive"checked="">
                                                    <label class="form-check-label" for="inlineRadio2">&nbsp Receive</label>
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-sm-2"></div>

                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.method')); ?></label>
                                            <div class="col-sm-3">
                                                <?php if($payment->invoice_payment_type=='Auto'): ?>
                                                    <select disabled name="invoice_payment_type" id="payment_method" class="form-control select2" required value="<?php echo e($payment->invoice_payment_type); ?>">
                                                        <option value="Auto">Auto</option>
                                                        <option value="Manual">Manual</option>
                                                    </select>
                                                <?php else: ?>
                                                    <select disabled name="invoice_payment_type" id="payment_method" class="form-control select2" required value="<?php echo e($payment->invoice_payment_type); ?>">
                                                        <option value="Manual">Manual</option>
                                                        <option value="Auto">Auto</option>
                                                    </select>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.vendor')); ?></label>
                                            <div class="col-sm-3 ">
                                                <select disabled name="vendor" id="vendor" class="form-control select2" required value="<?php echo e($payment->invoicing_vendor_site_id); ?>">
                                                    <?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->vendor_id); ?>"<?php echo e($payment->invoicing_vendor_site_id == $row->vendor_id ? 'selected' : ''); ?>><?php echo e($row->vendor_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-2"></div>

                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.bank')); ?></label>
                                            <div class="col-sm-3">
                                                <select disabled name="vendor_bank_account" id="vendor_bank_account" class="form-control select2" required value="<?php echo e($payment->bank_num); ?>">
                                                    <?php $__currentLoopData = $bankaccount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->bank_account_id); ?>"<?php echo e($payment->bank_num == $row->bank_account_id ? 'selected' : ''); ?>><?php echo e($row->attribute2); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.amount')); ?></label>
                                            <div class="col-sm-2 ">
                                                <input readonly type="text" class="form-control text-end" name="amount" placeholder="0.00" value="<?php echo e(number_format($payment->amount, 2, ',', '.')); ?>">
                                            </div>
                                            <div class="col-sm-1 ">
                                                <select disabled name="payment_currency_code" id="currency" class="form-control select2" required value="<?php echo e($payment->payment_currency_code); ?>">
                                                    <?php $__currentLoopData = $curr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->currency_code); ?>"<?php echo e($payment->payment_currency_code == $row->currency_code ? 'selected' : ''); ?>> <?php echo e($row->currency_code); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.date')); ?></label>
                                            <div class="col-sm-3 ">
                                                <input disabled required id="accounting_date" name="accounting_date"type="date" value="<?php echo e($payment->accounting_date); ?>" class="form-control flatpickr-basic-custom flatpickr-input active text-end">
                                            </div>

                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.reference')); ?></label>
                                            <div class="col-sm-3 ">
                                                <input type="text" class="form-control" name="reference">
                                            </div>

                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.memo')); ?></label>
                                            <div class="col-sm-3 ">
                                                <input readonly type="text" class="form-control" name="memo"value="<?php echo e($payment->attribute1); ?>">
                                            </div>

                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    
                                </div>
                        </form> <!-- /.box-body -->
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/apPayment/edit.blade.php ENDPATH**/ ?>