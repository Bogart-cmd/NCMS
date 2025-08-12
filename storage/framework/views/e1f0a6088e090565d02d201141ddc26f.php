<?php echo $__env->make('partials.header', ['title'=> 'Score Cards'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
<?php if (isset($component)) { $__componentOriginal88b0e6813f5b80100a19437aa80e29ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $attributes = $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $component = $__componentOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>

<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Score Cards</h1>
            <p class="text-gray-600 text-sm lg:text-base">Track graduate employment statistics</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Graduates</h2>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#168753]"><?php echo e($scoreCard->number_of_graduates); ?></div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Employed</h2>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#168753]"><?php echo e($scoreCard->number_of_employed); ?></div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Employment Rate</h2>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#168753]"><?php echo e($scoreCard->employment_rate); ?>%</div>
            </div>
        </div>

        <!-- Edit Form Section -->
        <div class="flex flex-col items-center gap-4">
            <div class="edit-form-content w-full max-w-md rounded-lg shadow-sm border bg-white p-4 lg:p-6 animate__animated animate__fadeInDown" style="display: none" id="form-edit">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Edit Score Card</h3>
                <form action="<?php echo e(route('updateScoreCards', ['id' => $scoreCard->id])); ?>" method="post" class="space-y-4">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="number_of_graduates" class="block text-sm font-medium text-gray-700 mb-2">Graduates</label>
                        <input type="number" name="number_of_graduates" id="number_of_graduates" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-[#168753] focus:border-transparent block w-full p-2.5" placeholder="Graduates" value="<?php echo e(!session()->has('error')?$scoreCard->number_of_graduates:old('number_of_graduates')); ?>" oninput="calRate()">
                        <?php $__errorArgs = ['number_of_graduates'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="number_of_employed" class="block text-sm font-medium text-gray-700 mb-2">Employed</label>
                        <input type="number" name="number_of_employed" id="number_of_employed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-[#168753] focus:border-transparent block w-full p-2.5" placeholder="Employed" value="<?php echo e(!session()->has('error')?$scoreCard->number_of_employed:old('number_of_employed')); ?>" oninput="calRate()">
                        <?php $__errorArgs = ['number_of_employed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="employment_rate" class="block text-sm font-medium text-gray-700 mb-2">Employment Rate</label>
                        <input type="number" name="employment_rate" id="employment_rate" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Employment Rate" value="<?php echo e($scoreCard->employment_rate); ?>" readonly>
                    </div>
                    <div>
                        <button class="w-full bg-[#168753] rounded-lg text-white hover:bg-green-900 py-2.5 px-4 font-semibold transition-colors" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="flex gap-3">
                <button class="bg-[#168753] rounded-lg text-white hover:bg-green-900 py-2.5 px-4 font-semibold transition-colors" onclick="show()" id="showForm">Edit</button>
                <button class="bg-red-500 rounded-lg text-white hover:bg-red-900 py-2.5 px-4 font-semibold transition-colors" onclick="hide()" id="hideForm" style="display: none">Hide</button>
            </div>
        </div>
    </div>
    
    <style>
        .admin-content {
            transition: all 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .admin-content {
                padding-top: 5rem;
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }
    </style>
</main>

<script>
    function calRate() {
        let num_grand = parseInt(document.getElementById("number_of_graduates").value);
        let num_emp = parseInt(document.getElementById("number_of_employed").value);
        if (num_grand > 0) {
            var employmentRate = (num_emp / num_grand) * 100;
            document.getElementById('employment_rate').value = employmentRate.toFixed(2);
        } else {
            document.getElementById('employment_rate').value = '';
        }
    }

    function show() {
        document.getElementById("form-edit").style.display = "block";
        document.getElementById("showForm").style.display = "none";
        document.getElementById("hideForm").style.display = "block";
    }
    
    function hide() {
        document.getElementById("form-edit").style.display = "none";
        document.getElementById("showForm").style.display = "block";
        document.getElementById("hideForm").style.display = "none";
    }
</script>

<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/score_card.blade.php ENDPATH**/ ?>