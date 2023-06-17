<?php $__env->startSection('content'); ?>
<div class="auth-wrapper auth-cover">
    <div class="auth-inner row m-0">
        <!-- Brand logo--><a class="brand-logo" href="index.html">
            <img class="img-fluid" src="<?php echo e(asset('app-assets/images/logo/bm.png')); ?>" width="250px;" alt="svg3" />
        </a>
        <!-- /Brand logo-->
        <!-- Left Text-->
        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="<?php echo e(asset('app-assets/images/pages/login-v2.png')); ?>" alt="svg3" /></div>
        </div>
        <!-- /Left Text-->
        <!-- Login-->
        <div class="d-lg-flex col-sm-12 col-lg-4 align-items-center auth-bg px-2 p-lg-5">
            <div class="shadow-lg p-3 bg-green rounded card col-lg-12">
                <div class="card-body">
                    <h1 class="text-center card-title fw-bold mb-1" style="color:#40963b; font-weight:700; font-size:40px; font-family: monospace"><strong>
                        GALAXY</strong> </h1>
                    
                    <?php if(\Session::has('message')): ?>
                    <p class="alert alert-info">
                        <?php echo e(\Session::get('message')); ?>

                    </p>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <form class="auth-login-form mt-2" action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="mb-1">
                            <label class="form-label"style="color:#acacac; font-size:12px; font-family: monospace" for="name">User ID</label>
                            <input class="form-control" id="userid" type="text" name="userID"  placeholder="<?php echo e(trans('global.username')); ?>" aria-describedby="name" value="<?php echo e(old('name', null)); ?>" autofocus="" tabindex="1" autocomplete="off" required />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label"style="color:#acacac;font-size:12px; font-family: monospace" for="password">Password</label>
                                
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="Password" tabindex="2" required />
                            </div>
                        </div>
                        <div class=" mb-2">
                            <div style="text-align:right;">
                                <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                <label class="form-check-label "style="color:#40963b;font-size:12px; font-family: monospace" for="remember-me"><?php echo e(trans('global.remember_me')); ?></label>
                            </div>
                        </div>

                        <div class="mb-1">
                            <button style="color:#40963b;font-size:12px; font-family: monospace" class="btn btn-primary w-100 btn-lg text-white" type="submit" tabindex="4"><?php echo e(trans('global.login')); ?></button>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
        <!-- /Login-->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>