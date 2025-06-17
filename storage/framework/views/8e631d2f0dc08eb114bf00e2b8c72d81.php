    <!-- Our Blog Section Start -->
    <div class="our-blog">
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
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <!-- Post Item Start -->
                        <div class="post-item wow fadeInUp">
                            <!-- Post Featured Image Start-->
                            <div class="post-featured-image">
                                <a href="blog-single.html" data-cursor-text="View">
                                    <figure class="image-anime">
                                        <img src="<?php echo e(asset('storage/' . $field->image)); ?>" alt="<?php echo e($field->title); ?>" class="img-fluid">
                                    </figure>
                                </a>
                            </div>
                            <!-- Post Featured Image End -->

                            <!-- Post Item Body Start -->
                            <div class="post-item-body">
                                <!-- Post Item Content Start -->
                                <div class="post-item-content">
                                    <h2><a href="#"><?php echo e($field->title); ?></a></h2>
                                </div>
                                <!-- Post Item Content End -->

                                
                                <div class="post-item-description">
                                    <p><?php echo e($field->description); ?></p>
                                </div>

                                
                                <div class="post-item-salary mb-2">
                                    <span><?php echo app('translator')->get('messages.salary'); ?>:</span>
                                    <span class="salary"><?php echo e($field->amount); ?>$</span>
                                </div>
                            </div>
                            <!-- Post Item Body End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <!-- Our Blog Section End -->
<?php /**PATH /home/ftpuser/resources/views/client/sections/blog.blade.php ENDPATH**/ ?>