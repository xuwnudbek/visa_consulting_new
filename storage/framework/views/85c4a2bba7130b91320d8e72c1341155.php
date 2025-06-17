<?php $__env->startSection('content'); ?>
    <!-- Login Form Section Start -->
    <div class="contact-form-section my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-5">
                        <h2 class="text-anime-style-3" data-cursor="-opaque"><?php echo app('translator')->get('messages.login_title'); ?></h2>
                    </div>
                    <!-- Login Form Start -->
                    <div class="contact-form">
                        <form action="<?php echo e(route('login.submit')); ?>" method="POST" data-wow-delay="0.4s"> 
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="<?php echo app('translator')->get('messages.contact_form_email_placeholder'); ?>" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4 position-relative">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="<?php echo app('translator')->get('messages.login_form_password_placeholder'); ?>" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default"><?php echo app('translator')->get('messages.login_submit'); ?></button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Section End -->

    <?php if($errors->has('email')): ?>
        <div class="row">
            <div class="col-lg-4 mx-auto alert alert-danger " role="alert">
                <?php echo e($errors->first('email')); ?>

            </div>
        </div>

        <script>
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/client/login.blade.php ENDPATH**/ ?>