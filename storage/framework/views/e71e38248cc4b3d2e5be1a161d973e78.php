<?php echo $__env->make('partials.header', ['title'=> 'Account Settings'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if (isset($component)) { $__componentOriginalbdf4bf8aeaec15063b1d61968f7ab880 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbdf4bf8aeaec15063b1d61968f7ab880 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.adminHeader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminHeader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbdf4bf8aeaec15063b1d61968f7ab880)): ?>
<?php $attributes = $__attributesOriginalbdf4bf8aeaec15063b1d61968f7ab880; ?>
<?php unset($__attributesOriginalbdf4bf8aeaec15063b1d61968f7ab880); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdf4bf8aeaec15063b1d61968f7ab880)): ?>
<?php $component = $__componentOriginalbdf4bf8aeaec15063b1d61968f7ab880; ?>
<?php unset($__componentOriginalbdf4bf8aeaec15063b1d61968f7ab880); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginala02d9270a4078ccf48d43b5f01474ab2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala02d9270a4078ccf48d43b5f01474ab2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.adminSidebar','data' => ['user' => auth()->user()->usertype]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('adminSidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth()->user()->usertype)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala02d9270a4078ccf48d43b5f01474ab2)): ?>
<?php $attributes = $__attributesOriginala02d9270a4078ccf48d43b5f01474ab2; ?>
<?php unset($__attributesOriginala02d9270a4078ccf48d43b5f01474ab2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala02d9270a4078ccf48d43b5f01474ab2)): ?>
<?php $component = $__componentOriginala02d9270a4078ccf48d43b5f01474ab2; ?>
<?php unset($__componentOriginala02d9270a4078ccf48d43b5f01474ab2); ?>
<?php endif; ?>
<section class="bg-green-100 w-[86.6%] absolute top-40 left-64 p-10">
    <?php if (isset($component)) { $__componentOriginale0fe3213b1c2d7839cc7ea8e1283ce0b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0fe3213b1c2d7839cc7ea8e1283ce0b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alertmessage','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alertmessage'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0fe3213b1c2d7839cc7ea8e1283ce0b)): ?>
<?php $attributes = $__attributesOriginale0fe3213b1c2d7839cc7ea8e1283ce0b; ?>
<?php unset($__attributesOriginale0fe3213b1c2d7839cc7ea8e1283ce0b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0fe3213b1c2d7839cc7ea8e1283ce0b)): ?>
<?php $component = $__componentOriginale0fe3213b1c2d7839cc7ea8e1283ce0b; ?>
<?php unset($__componentOriginale0fe3213b1c2d7839cc7ea8e1283ce0b); ?>
<?php endif; ?>
    <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:px-10 xl:py-[0.1%] dark:bg-gray-800 dark:border-gray-700 relative mx-auto">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center lg:mt-10">
            Account Settings
        </h1>
        <form class="space-y-4" action="<?php echo e(route('update', ['id'=>auth()->user()->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php if(session()->has('invalid')): ?>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium"><?php echo e(session('invalid')); ?></span> Please try again.
                </div>
            <?php endif; ?>

            <?php $__currentLoopData = ['fname' => 'First Name', 'lname' => 'Last Name', 'email' => 'Email', 'username' => 'Username']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <label for="<?php echo e($field); ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><?php echo e($label); ?></label>
                <input type="text" name="<?php echo e($field); ?>" id="<?php echo e($field); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo e($label); ?>" value="<?php echo e($dataAdmin->$field); ?>">
                <?php $__errorArgs = [$field];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-600"><?php echo e($label); ?> required</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Current Password Field -->
            <div>
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Password</label>
                <div class="relative w-full">
                    <input type="password" name="current_password" id="current_password" placeholder="Current Password" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center toggle-password" data-target="current_password">
                        <i class="fas fa-eye text-gray-500 dark:text-gray-400 cursor-pointer"></i>
                    </button>
                </div>
                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-600">Current password is required</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Password Field -->
            <?php $__currentLoopData = ['password' => 'New Password', 'password_confirmation' => 'Confirm Password']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <label for="<?php echo e($field); ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><?php echo e($label); ?></label>
                <div class="relative w-full">
                    <input type="password" name="<?php echo e($field); ?>" id="<?php echo e($field); ?>" placeholder="<?php echo e($label); ?>" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center toggle-password" data-target="<?php echo e($field); ?>">
                        <i class="fas fa-eye text-gray-500 dark:text-gray-400 cursor-pointer"></i>
                    </button>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-600"><?php echo e($label); ?> required</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="w-full flex items-center justify-center">
                 <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full">Update</button>
            </div>
        </form>
    </div>
</section>

<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            let targetId = this.getAttribute('data-target');
            let passwordInput = document.getElementById(targetId);
            let icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>

<?php if(session('password_changed')): ?>
<script>
    Swal.fire({
         title: 'Success!',
         text: 'Your password has been changed!',
         icon: 'success',
         showConfirmButton: false,
         timer: 1000
    });
</script>
<?php endif; ?>

<?php if($errors->any()): ?>
<script>
    Swal.fire({
         title: 'Error!',
         html: '<ul style="text-align: left;"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>',
         icon: 'error',
         confirmButtonText: 'OK'
    });
</script>
<?php endif; ?>

<?php if(session('invalid')): ?>
<script>
    Swal.fire({
         title: 'Error!',
         text: '<?php echo e(session("invalid")); ?>',
         icon: 'error',
         confirmButtonText: 'OK'
    });
</script>
<?php endif; ?>


<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminSetting.blade.php ENDPATH**/ ?>