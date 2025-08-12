<?php echo $__env->make('partials.frontend-header', [
    'show_hamburger' => true,
    'css_file' => '/css/thank_you.css',
    'title' => 'Thank You'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="thankyou-container">
    <img src="<?php echo e(asset('image-website/mascot.png')); ?>" alt="NOLITC Mascot">
    <h1>Thank you!</h1>
    <h3>Your registration has been successfully submitted.</h3>
    <h3>Please check your Email for the examination link!</h3>
    <a href="<?php echo e(route('welcome')); ?>" class="btn">Back to home</a>
    
    
    <div class="quick-links" aria-hidden="true">
        <a href="/\#programs">See Programs</a>
        <span class="sep">•</span>
        <a href="/\#updates">Latest Updates</a>
    </div>
    
    
    <div class="thankyou-separator" aria-hidden="true"><div class="line"></div></div>
    
    
    <p class="note">A confirmation email has been sent to your inbox.</p>
</main>

<?php echo $__env->make('partials.frontend-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/thank_you.blade.php ENDPATH**/ ?>