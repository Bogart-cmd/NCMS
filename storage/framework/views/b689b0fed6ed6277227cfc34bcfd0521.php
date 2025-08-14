<?php echo $__env->make('partials.frontend-header', ['title' => 'Program Info - ' . $datas->name, 'css_file' => '/css/see_more.css', 'show_hamburger' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <section class="qualification-banner">
            <img src="<?php echo e(URL::asset('image-website/Polygon 1.png')); ?>" alt="polygon" class="polygon">
            <h1>PROGRAM INFO</h1>
        </section>
        <section class="qualification-details">
            <h2><?php echo e($datas->name); ?></h2>
            <p class="hours">(<?php echo e($datas->hours); ?> hours)</p>
            <div class="image-container">
                <img src="<?php echo e(URL::asset('assets/img/'.$datas->img_name)); ?>" alt="<?php echo e($datas->name); ?>">
            </div>
            <p class="description">
                <?php echo e($datas->caption); ?>

            </p>
        </section>
        <section class="additional-details">
            <div class="qualifications">
                <h3>QUALIFICATIONS</h3>
                <ul>
                   <?php $__currentLoopData = $datas->qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($qualification->qualification); ?></li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <a href="/register"><button class="register-button">Register Now</button></a>
            </div>
            <div class="benefits">
                <h3>Benefits:</h3>
                <ul>
                    <?php $__currentLoopData = $datas->benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($benefits->benefit); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="core-competencies">
                <h3>Core Competencies:</h3>
                <ul>
                    <?php $__currentLoopData = $datas->competencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($competencies->competencie); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </section>
    </main>
<?php echo $__env->make('partials.frontend-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/see_more.blade.php ENDPATH**/ ?>