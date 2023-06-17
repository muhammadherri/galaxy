<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-validation.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-wizard.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/forms/form-wizard.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/default.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/js/scripts/jquery-ui.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<div class="card">
    <div class="card-header mt-1">
        <h6 class="card-title">
            <a href="<?php echo e(route("admin.customer.index")); ?>" class="breadcrumbs__item">Customer</a>
            <a href="" class="breadcrumbs__item">Edit</a>
        </h6>
    </div>
    <hr>

    <div class="card-body">
        <form action="<?php echo e(route("admin.customer.update", $customer)); ?>" method="POST" enctype="multipart/form-data" id="jquery-val-form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="homeIcon-tab" data-bs-toggle="tab" href="#homeIcon" aria-controls="home" role="tab" aria-selected="true"><i data-feather="user"></i> Customer Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profileIcon-tab" data-bs-toggle="tab" href="#profileIcon" aria-controls="profile" role="tab" aria-selected="false"><i data-feather="tool"></i> Site</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row mt-1">
                                <div class="col-md-12 form-check-primary">
                                    <div class="p-1">
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="customer_type" id="inlineRadio1" value="1" checked="">
                                                <label class="form-check-label" for="inlineRadio1">Individual</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="customer_type" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">Company</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-2 col-12">
                                    <div class="mb-">
                                        <label class="col-sm-0 control-label" for="cust_party_code"><?php echo e(trans('cruds.customer.fields.cust_party_code')); ?></label>
                                        <input type="text" id="purpose_date" name="purpose_date" class="form-control" hidden value="<?php echo e(now()->format ('Y-m-d')); ?>" required>
                                        <input type="number" id="cust_party_code" name="cust_party_code" class="form-control" value="<?php echo e(old('cust_party_code', isset($customer) ? $customer->cust_party_code : '')); ?>" required>
                                        <?php if($errors->first('cust_party_code')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('cust_party_code')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="party_name"><?php echo e(trans('cruds.customer.fields.party_name')); ?></label>
                                        <input type="text" id="party_name" name="party_name" class="form-control" value="<?php echo e(old('party_name', isset($customer) ? $customer->party_name : '')); ?>" required>
                                        <?php if($errors->first('party_name')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('party_name')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="title"><?php echo e(trans('cruds.customer.fields.title')); ?></label>
                                        <select name="title" id="title" class="form-control select2" required>
                                            <option value="1" <?php echo e(old('title') ? 'selected' : ''); ?>>Mr.</option>
                                            <option value="2" <?php echo e(old('title') ? 'selected' : ''); ?>>Mrs.</option>
                                            <option value="3" <?php echo e(old('title') ? 'selected' : ''); ?>>Miss</option>
                                            <option value="4" <?php echo e(old('title') ? 'selected' : ''); ?>>Ms.</option>
                                        </select>
                                        <?php if($errors->first('title')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('title')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-5 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="pic"><?php echo e(trans('cruds.customer.fields.pic')); ?></label>
                                        <input type="text" id="pic" name="pic" class="form-control" value="<?php echo e(old('pic', isset($customer) ? $customer->pic : '')); ?>" required>
                                        <?php if($errors->first('pic')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('pic')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="email"><?php echo e(trans('cruds.customer.fields.email')); ?></label>
                                        <input type="email" id="email" name="email" class="form-control" value="<?php echo e(old('email', isset($customer) ? $customer->email : '')); ?>" required>
                                        <?php if($errors->first('email')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('email')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="status"><?php echo e(trans('cruds.customer.fields.type')); ?></label>
                                        <select name="status" id="status" class="form-control select2" required>
                                            <option value="1" <?php echo e(old('status') ? 'selected' : ''); ?>>Bill To</option>
                                            <option value="2" <?php echo e(old('status') ? 'selected' : ''); ?>>Ship To</option>
                                            <option value="2" <?php echo e(old('status') ? 'selected' : ''); ?>>Delivered To</option>
                                        </select>
                                        <?php if($errors->first('status')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('status')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="address1"><?php echo e(trans('cruds.customer.fields.address1')); ?></label>
                                        <input type="text" id="address1" name="address1" class="form-control" value="<?php echo e(old('address1', isset($customer) ? $customer->address1 : '')); ?>" required>
                                        <?php if($errors->first('address1')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('address1')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="phone"><?php echo e(trans('cruds.customer.fields.phone')); ?></label>
                                        <input type="number" id="phone" name="phone" class="form-control" min="8" onKeyPress="if(this.value.length==12) return false;" value="<?php echo e(old('phone', isset($customer) ? $customer->phone : '')); ?>" required>
                                        <?php if($errors->first('phone')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('phone')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="mobile"><?php echo e(trans('cruds.customer.fields.mobile')); ?></label>
                                        <input type="number" id="mobile" name="mobile" class="form-control" min="8" onKeyPress="if(this.value.length==12) return false;" value="<?php echo e(old('mobile', isset($customer) ? trim($customer->mobile) : '')); ?>" required>
                                        <?php if($errors->first('mobile')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('mobile')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="address2"><?php echo e(trans('cruds.customer.fields.address2')); ?></label>
                                        <input type="text" id="address2" name="address2" class="form-control" value="<?php echo e(old('address2', isset($customer) ? $customer->address2 : '')); ?>" required>
                                        <?php if($errors->first('address2')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('address2')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" <label class="form-label" for="district"><?php echo e(trans('cruds.customer.fields.district')); ?></label>
                                        <input type="text" id="attribute5" name="attribute5" class="form-control" value="<?php echo e(old('attribute5', isset($customer) ? trim($customer->attribute5) : '')); ?>" required>
                                        <?php if($errors->first('attribute5')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('attribute5')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="neighborhoods"><?php echo e(trans('cruds.customer.fields.neighborhoods')); ?></label>
                                        <input type="text" id="attribute6" name="attribute6" class="form-control" value="<?php echo e(old('attribute6', isset($customer) ? $customer->attribute6 : '')); ?>" required>
                                        <?php if($errors->first('attribute6')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('attribute6')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="city"><?php echo e(trans('cruds.customer.fields.city')); ?></label>
                                        <input type="text" id="city" name="city" class="form-control" value="<?php echo e(trim($customer->city)); ?>" required>
                                        <?php if($errors->first('city')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('city')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="province"><?php echo e(trans('cruds.customer.fields.province')); ?></label>
                                        <input type="text" id="province" name="province" class="form-control" value="<?php echo e(old('province', isset($customer) ? trim($customer->province) : '')); ?>" required>
                                        <?php if($errors->first('province')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('province')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="postal_code"><?php echo e(trans('cruds.customer.fields.postal_code')); ?></label>
                                        <input type="number" id="postal_code" name="postal_code" class="form-control" min="5" onKeyPress="if(this.value.length==5) return false;" value="<?php echo e(old('postal_code', isset($customer) ? $customer->postal_code : '')); ?>" required>
                                        <?php if($errors->first('postal_code')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('postal_code')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="country"><?php echo e(trans('cruds.customer.fields.country')); ?></label>
                                        <input type="text" id="country" name="country" class="form-control" value="<?php echo e(old('country', isset($customer) ? $customer->country : '')); ?>" required>
                                        <?php if($errors->first('country')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('country')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="col-sm-0 control-label" for="npwp"><?php echo e(trans('cruds.customer.fields.npwp')); ?></label>
                                        <input type="number" class="form-control" min="15" onKeyPress="if(this.value.length==15) return false;" value="<?php echo e(old('attribute7', isset($customer) ? $customer->attribute7 : '')); ?>" name="attribute7" aria-describedby="basic-addon2">
                                        <?php if($errors->first('attribute7')): ?>
                                        <div class="danger">
                                            <span class="badge bg-danger"><?php echo e($errors->first('attribute7')); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label class="col-sm-0 control-label" for="currency_code"><?php echo e(trans('cruds.customer.fields.currency_code')); ?></label>
                                    <select name="currency_code" id="currency_code" class="form-control select2" required>
                                        <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" <?php echo e($customer->currency_code == $row->currency_code ? 'selected' : ''); ?>> <?php echo e($row->currency_code); ?> - <?php echo e($row->currency_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm-0 control-label" for="sales_tax_code"><?php echo e(trans('cruds.customer.fields.sales_tax_code')); ?></label>
                                    <select type="text" id="type" name="sales_tax_code" class="form-control select2" required>
                                        <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->tax_code); ?>" <?php echo e($customer->sales_tax_code == $row->tax_code ? 'selected' : ''); ?>><?php echo e($row->tax_code); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->first('sales_tax_code')): ?>
                                    <div class="danger">
                                        <span class="badge bg-danger"><?php echo e($errors->first('sales_tax_code')); ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-sm-0 control-label" for="address3">Short Name</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" value="<?php echo e($row->address3); ?>" name="address3" aria-describedby="basic-addon2" required>
                                    </div>
                                    <?php if($errors->first('address3')): ?>
                                    <div class="danger">
                                        <span class="badge bg-danger"><?php echo e($errors->first('address3')); ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <a href="#" data-bs-original-title="" title="">
                                        <img src="http://localhost/hris/public/assets/images/user/1649132118.jpg" class="img-fluid w-10" alt="user Photo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2 align-content-center text-center">
                                <input type="file" name="image" class="image form-control" data-bs-original-title="" title="">
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                    <div class="row  mt-1">
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="site_code"><?php echo e(trans('cruds.customer.fields.site_code')); ?></label>
                                <input type="text" id="site_code_1" name="site_code" class="form-control" value="<?php echo e($site->cust_party_code ??''); ?>">
                                <input type="hidden" id="site_code_1" name="site_id" class="form-control" value="<?php echo e($site->id ?? ''); ?>">
                                <?php if($errors->first('site_code')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('site_code')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="phone_site"><?php echo e(trans('cruds.customer.fields.phone_site')); ?></label>
                                <input type="number" id="phone_site_1" name="phone_site" class="form-control" value="<?php echo e($site->phone ??''); ?>" min="10" onKeyPress="if(this.value.length==12) return false;" value="<?php echo e(old('phone_site', isset($customer) ? $customer->phone_site : '')); ?>">
                                <?php if($errors->first('phone_site')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('phone_site')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="mobile_site"><?php echo e(trans('cruds.customer.fields.mobile_site')); ?></label>
                                <input type="number" id="mobile_site_1" name="mobile_site" class="form-control" value="<?php echo e($site->phone ??''); ?>" min="10" onKeyPress="if(this.value.length==12) return false;">
                                <?php if($errors->first('mobile_site')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('mobile_site')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="email_site"><?php echo e(trans('cruds.customer.fields.email_site')); ?></label>
                                <input type="email_site" id="email_site_1" name="email_site" class="form-control" value="<?php echo e($site->email ??''); ?>">
                                <?php if($errors->first('email_site')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('email_site')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="address1_site"><?php echo e(trans('cruds.customer.fields.address1_site')); ?></label>
                                <input type="text" id="address1_site" name="address1_site" class="form-control" value="<?php echo e($site->address1 ??''); ?>">
                                <?php if($errors->first('address1_site')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('address1_site')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="address2_site"><?php echo e(trans('cruds.customer.fields.address2_site')); ?></label>
                                <input type="text" id="address2_site" name="address2_site" class="form-control" value="<?php echo e($site->address2 ??''); ?>">
                                <?php if($errors->first('address2_site')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('address2_site')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="district"><?php echo e(trans('cruds.customer.fields.district')); ?></label>
                                <input type="text" id="attribute5" name="attribute5_site" class="form-control" value="<?php echo e($site->address3 ??''); ?>">
                                <?php if($errors->first('attribute5')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('attribute5')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="col-sm-0 control-label" for="neighborhoods"><?php echo e(trans('cruds.customer.fields.neighborhoods')); ?></label>
                                <input type="text" id="attribute6" name="attribute6" class="form-control" value="<?php echo e(old('attribute6', isset($customer) ? $customer->attribute6 : '')); ?>">
                                <?php if($errors->first('attribute6')): ?>
                                <div class="danger">
                                    <span class="badge bg-danger"><?php echo e($errors->first('attribute6')); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-3">
                            <label class="col-sm-0 control-label" for="city"><?php echo e(trans('cruds.customer.fields.city')); ?></label>
                            <input type="text" id="city" name="city_site" class="form-control" value="<?php echo e($site->city ??''); ?>">
                            <?php if($errors->first('city')): ?>
                            <div class="danger">
                                <span class="badge bg-danger"><?php echo e($errors->first('city')); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm-0 control-label" for="province"><?php echo e(trans('cruds.customer.fields.province')); ?></label>
                            <input type="text" id="province" name="province_site" class="form-control" value="<?php echo e($site->province ??''); ?>">
                            <?php if($errors->first('province')): ?>
                            <div class="danger">
                                <span class="badge bg-danger"><?php echo e($errors->first('province')); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm-0 control-label" for="postal_code"><?php echo e(trans('cruds.customer.fields.postal_code')); ?></label>
                            <input type="number" id="postal_code" name="postal_code_site" class="form-control" min="5" onKeyPress="if(this.value.length==5) return false;" value="<?php echo e($site->postal_code ??''); ?>">
                            <?php if($errors->first('postal_code')): ?>
                            <div class="danger">
                                <span class="badge bg-danger"><?php echo e($errors->first('postal_code')); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm-0 control-label" for="country"><?php echo e(trans('cruds.customer.fields.country')); ?></label>
                            <input type="text" id="country" name="country_site" class="form-control" value="<?php echo e($site->country ??''); ?>">
                            <?php if($errors->first('country')): ?>
                            <div class="danger">
                                <span class="badge bg-danger"><?php echo e($errors->first('country')); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-1">
                <button class="btn btn-warning" type="reset"><i data-feather='refresh-ccw'></i> Reset</button>
                <button type="submit" class="btn btn-primary btn-submit"><i data-feather='save'></i> <?php echo e(trans('global.save')); ?></button>
            </div>
    </div>


    <br>
</div>
</div>

</form>
</div>
</div>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/customer/edit.blade.php ENDPATH**/ ?>