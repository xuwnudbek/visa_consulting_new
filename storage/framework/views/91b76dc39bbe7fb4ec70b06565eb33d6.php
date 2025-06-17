<!-- Our Testimonial Section Start -->
<div class="our-testimonial" id="posts">
    <div class="container">
        <div class="row section-row align-items-center">
            <div class="col-lg-6">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp"><?php echo app('translator')->get('messages.blog_section_title'); ?></h3>
                    <h2 class="text-anime-style-3" data-cursor="-opaque"><?php echo app('translator')->get('messages.blog_section_subtitle'); ?></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-6">
                <!-- Section Title Content Start -->
                <div class="section-title-content wow fadeInUp" data-wow-delay="0.2s">
                    <p><?php echo app('translator')->get('messages.blog_section_paragraph'); ?></p>
                </div>
                <!-- Section Title Content End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Testimonial Slider Start -->
                <div class="testimonial-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper" data-cursor-text="Drag">
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Testimonial Slide Start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-header">
                                            <div class="mb-4">
                                                <figure class="image-anime">
                                                    <img src="<?php echo e(asset('storage/' . $field->image)); ?>" alt="<?php echo e($field->title); ?>" class="img-fluid">
                                                </figure>
                                            </div>
                                            <div class="author-content">
                                                <h3><?php echo e($field->title); ?></h3>
                                                <p><?php echo e(__('messages.salary')); ?>: <?php echo e(number_format($field->amount)); ?>$</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-body">
                                            <p><?php echo e($field->description); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide End -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="testimonial-pagination"></div>
                    </div>
                </div>
                <!-- Testimonial Slider End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Testimonial Section End -->
<?php /**PATH /home/ftpuser/resources/views/client/sections/posts.blade.php ENDPATH**/ ?>