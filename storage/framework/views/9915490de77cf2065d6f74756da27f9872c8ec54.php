<section class="banner-section-nine" style="background-image: url(<?php if(!empty($banner_image)): ?> <?php echo e($banner_image_url); ?> <?php endif; ?>)">
    <div class="auto-container">
        <div class="cotnent-box">
            <div class="title-box wow fadeInUp" data-wow-delay='300ms'>
                <h3><?php echo $title; ?></h3>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>

            <!-- Job Search Form -->
            
            <!-- Job Search Form -->

            <!-- Fun Fact Section -->
            <?php if(!empty($list_counter)): ?>
            <div class="fun-fact-section">
                <div class="row">
                    <!--Column-->
                    <?php $__currentLoopData = $list_counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="<?php echo e($counter['title']); ?>">0</span></div>
                            <h4 class="counter-title"><?php echo e($counter['sub_title']); ?></h4>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
            <!-- Fun Fact Section -->
        </div>
    </div>
</section>
<?php /**PATH /Users/macbook/GitHub/superio200/modules/Template/Views/frontend/blocks/hero-banner/style_9.blade.php ENDPATH**/ ?>