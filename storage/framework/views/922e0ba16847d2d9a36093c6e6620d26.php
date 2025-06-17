<?php $__env->startSection('content'); ?>
    <!-- Page Team Single Start -->
    <div class="page-team-single">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="page-single-form">
                        <h3><?php echo e(ucfirst(__('messages.menu'))); ?></h3>
                        <div class="row mb-2">
                            <a href="<?php echo e(route('client.dashboard.profile')); ?>" class="btn-default <?php echo e(request()->routeIs('client.dashboard.profile') ? 'bg-danger text-white' : ''); ?>"><?php echo e(ucfirst(__('messages.profile'))); ?></a>
                        </div>
                        <div class="row">
                            <a href="<?php echo e(route('client.dashboard.applications')); ?>" class="btn-default <?php echo e(request()->routeIs('client.dashboard.applications') ? 'bg-danger text-white' : ''); ?>"><?php echo e(ucfirst(__('messages.applications'))); ?></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 align-self-center">
                    <?php if(request()->routeIs('client.dashboard.profile')): ?>
                        <div class="team-single-content">
                            <div class="team-single-entry">
                                <!-- Team Member Header Start -->
                                <div class="team-member-header">
                                    <!-- Section Title  -->
                                    <div class="section-title">
                                        <h2 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                            <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                <div style="position:relative;display:inline-block;">
                                                    <?php echo e(__('messages.about_me')); ?>

                                                </div>
                                            </div>
                                        </h2>
                                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            <?php echo e(__('messages.profile_note')); ?>

                                        </p>
                                    </div>
                                </div>
                                <!-- Team Member Header End -->

                                <!-- Team Member Body Start -->
                                <div class="team-member-body wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3><?php echo app('translator')->get('messages.name'); ?></h3>
                                        <p> <?php echo e(auth()->user()->name); ?></p>
                                    </div>

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3><?php echo app('translator')->get('messages.email'); ?></h3>
                                        <p> <?php echo e(auth()->user()->email ?? __('messages.email_not_found')); ?></p>
                                    </div>
                                    <!-- Team Member Box End -->

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3><?php echo app('translator')->get('messages.phone'); ?></h3>
                                        <p><?php echo e(auth()->user()->phone ?? __('messages.phone_not_found')); ?></p>
                                    </div>
                                    <!-- Team Member Box End -->

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3><?php echo app('translator')->get('messages.birthday'); ?></h3>
                                        <p><?php echo e(auth()->user()->birthday ?? __('messages.birthday_not_found')); ?></p>
                                    </div>
                                    <!-- Team Member Box End -->

                                    <!-- Team Member Box Start -->
                                    <div class="team-contact-box">
                                        <h3><?php echo app('translator')->get('messages.passport'); ?></h3>
                                        <p><?php echo e(auth()->user()->passport ?? __('messages.passport_not_found')); ?></p>
                                    </div>
                                    <!-- Team Member Box End -->
                                </div>
                                <!-- Team Member Body End -->
                            </div>
                        </div>
                    <?php elseif(request()->routeIs('client.dashboard.applications')): ?>
                        <div class="team-single-content">
                            <?php if($applications->isEmpty()): ?>
                                
                                <div class="team-single-entry card px-4 py-3">
                                    <div class="team-member-header">
                                        <div class="section-title">
                                            <h2 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                                <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                    <?php echo e(__('messages.no_applications_found')); ?>

                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="team-member-body wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <p><?php echo e(__('messages.no_applications_description')); ?></p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="team-single-entry card px-4 py-3">
                                        <!-- Team Member Header Start -->
                                        <div class="team-member-header">
                                            <!-- Section Title  -->
                                            <div class="section-title">
                                                <h2 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                                    <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                        <?php echo e(__('messages.application')); ?> № <?php echo e($application->id); ?>

                                                    </div>
                                                </h2>
                                            </div>
                                        </div>

                                        <!-- Team Member Header End -->
                                        <div class="team-member-body wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                            <!-- Team Member Box Start -->
                                            <div class="team-contact-box">
                                                <h3><?php echo app('translator')->get('messages.field_name'); ?></h3>
                                                <p> <?php echo e($application->field->title); ?></p>
                                            </div>

                                            <div class="team-contact-box">
                                                <h3><?php echo app('translator')->get('messages.country'); ?></h3>
                                                <p> <?php echo e($application->country->name); ?></p>
                                            </div>

                                            <div class="team-contact-box">
                                                <h3><?php echo app('translator')->get('messages.status'); ?></h3>
                                                <p><?php echo e(__('messages.' . $application->status)); ?></p>
                                            </div>

                                            <div class="team-contact-box">
                                                <h3><?php echo app('translator')->get('messages.passport'); ?></h3>
                                                <p><?php echo e(auth()->user()->passport ?? __('messages.passport_not_found')); ?></p>
                                            </div>

                                            <?php if($application->status == 'approved' && $application->document): ?>
                                                <div class="team-contact-box">
                                                    <h3><?php echo app('translator')->get('messages.document'); ?></h3>
                                                    <p>
                                                        <a href="<?php echo e(asset('storage/' . $application->document)); ?>" target="_blank" class="">
                                                            <?php echo e(__('messages.download_document')); ?>

                                                        </a>
                                                    </p>
                                                </div>
                                                <div class="team-contact-box">
                                                    <h3><?php echo app('translator')->get('messages.comment'); ?></h3>
                                                    <p>
                                                        <?php echo e($application->comment ?? __('messages.no_comment')); ?>

                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <!-- Team Member Header Start -->
                                        <div>
                                            <!-- Section Title  -->
                                            <div class="section-title mb-0">
                                                <h4 class="text-anime-style-3" data-cursor="-opaque" style="perspective: 400px;">
                                                    <div style="display: block; text-align: start; position: relative;" class="split-line">
                                                        <?php echo e(__('messages.payments')); ?>

                                                    </div>
                                                </h4>

                                            </div>
                                            <hr />

                                            <table class="table  wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col"><?php echo e(__('messages.amount')); ?></th>
                                                        <th scope="col"><?php echo e(__('messages.status')); ?></th>
                                                        <th scope="col"><?php echo e(__('messages.payment_date')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $application->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th class="col-1"><?php echo e($loop->iteration); ?></th>
                                                            <td class="col-5"><?php echo e(number_format($payment->amount)); ?> sum</td>
                                                            <td class="col-2"><?php echo e(__('messages.' . $payment->payment_type)); ?></td>
                                                            <td class="col-3"><?php echo e($payment->created_at->format('Y-m-d H:i')); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
    <!-- Page Team Single End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/client/dashboard/index.blade.php ENDPATH**/ ?>