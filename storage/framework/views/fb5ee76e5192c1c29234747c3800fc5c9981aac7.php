<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/jquery-ui.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.js')); ?>"></script>
<?php $__env->stopPush(); ?>
    <?php $__env->startSection('breadcrumbs'); ?>
    <a href="<?php echo e(route("admin.ap-payment.index")); ?>" class="breadcrumbs__item">Account Payable </a>
    <a href="<?php echo e(route("admin.ap-payment.index")); ?>" class="breadcrumbs__item">Payment List </a>
    <a href="" class="breadcrumbs__item active">Create</a>
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
                        <form action="<?php echo e(route('admin.ap-payment.store')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <input type="hidden" id="created_by" name="created_by"value="<?php echo e(auth()->user()->id); ?>">
                                        <input type="hidden" id="status" name="status" value="1">
                                        <input type="number" hidden id="status " name="je_batch_id" value="<?php echo e(random_int(0, 999999)); ?>" class="form-control">
                                        <input type="hidden" class="form-control " name="payment[]" value="21010000" autocomplete="off" required>
                                        <input type="hidden" class="form-control " name="payment[]" value="21010100" autocomplete="off" required>
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.internal')); ?></label>
                                            <div class="col-sm-3 ">
                                                <input type="checkbox" class="form-check-input" name="status" id="Check4" value="1">
                                            </div>

                                            <div class="col-sm-2"></div>

                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.acc')); ?></label>
                                            <div class="col-sm-3">
                                                <select name="acc" id="attribute_category" class="form-control select2" required>
                                                    <option hidden selected></option>
                                                    <?php $__currentLoopData = $acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->account_code); ?>"><?php echo e($row->description); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.type')); ?></label>
                                            <div class="col-sm-3">
                                                <div class=" form-check-inline">
                                                    <input class="form-check-input" type="radio" name="global_attribute1" id="inlineRadio1" value="Send" checked="">
                                                    <label class="form-check-label" for="inlineRadio1">&nbsp Send</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="global_attribute1" id="inlineRadio2" value="Receive">
                                                    <label class="form-check-label" for="inlineRadio2">&nbsp Receive</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-2"></div>

                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.method')); ?></label>
                                            <div class="col-sm-3">
                                                <select name="invoice_payment_type" id="payment_method" class="form-control select2" required>
                                                    <option hidden selected></option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="Auto">Auto</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.vendor')); ?></label>
                                            <div class="col-sm-3 ">
                                                <select name="vendor" id="vendor" class="form-control select2" required>
                                                    <option hidden selected></option>
                                                    <?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->vendor_id); ?>"><?php echo e($row->vendor_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-2"></div>

                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.bank')); ?></label>
                                            <div class="col-sm-3">
                                                <select name="bank_num" id="vendor_bank_account" class="form-control select2" required>
                                                    <option hidden selected></option>
                                                    <?php $__currentLoopData = $ba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->bank_account_id); ?> "><?php echo e($row->attribute1); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.amount')); ?></label>
                                            <div class="col-sm-2 ">
                                                <input type="text" class="form-control text-end" name="amount" placeholder="0.00">
                                            </div>
                                            <div class="col-sm-1 ">
                                                <select name="payment_currency_code" id="currency" class="form-control select2" required>
                                                    <option hidden selected></option>
                                                    <?php $__currentLoopData = $curr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->currency_code); ?>"> <?php echo e($row->currency_code); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-2"></div>
                                            <label class="col-sm-2 control-label"for="number"><?php echo e(trans('cruds.payment.fields.journal')); ?></label>
                                            <div class="col-sm-3">
                                                <select name="attribute_category" id="journal" class="form-control select2" required>
                                                    <option hidden selected></option>
                                                    <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($row->trx_source_types); ?>"><?php echo e($row->trx_source_types); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="number"><?php echo e(trans('cruds.payment.fields.date')); ?></label>
                                            <div class="col-sm-3 ">
                                                <input type="date" class="form-control flatpickr-basic flatpickr-input" name="accounting_date" autocomplete="off">
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
                                                <input type="text" class="form-control" name="memo">
                                            </div>

                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="d-flex justify-content-between">
                                        <button type="reset" class="btn btn-danger pull-left">Reset</button>
                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add</button>
                                    </div>
                                </div>
                        </form> <!-- /.box-body -->
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/apPayment/create.blade.php ENDPATH**/ ?>