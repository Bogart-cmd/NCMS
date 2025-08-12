<?php echo $__env->make('partials.header', ['title'=> 'Program Management'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Program Management</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage training programs and their content</p>
        </div>

        <!-- Action Bar -->
        <div class="flex items-center justify-between mb-6">
            <div class="text-xl sm:text-2xl font-bold text-[#168753]">
                Programs
            </div>
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('programs_addform')); ?>" class="bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Program
                </a>
            </div>
        </div>

        <!-- Programs Grid -->
        <div class="mt-8">
            <?php if(isset($programs) && $programs->count()): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-lg shadow-sm border p-4 flex flex-col hover:shadow-md transition-shadow">
                            <div class="h-32 sm:h-40 lg:h-48 overflow-hidden rounded-md mb-3">
                                <img src="<?php echo e($program->img_name ? asset('assets/img/' . $program->img_name) : asset('image-website/program 1.png')); ?>" alt="<?php echo e($program->name); ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-[#168753] font-bold text-lg sm:text-xl mb-2"><?php echo e($program->name); ?></h3>
                                <p class="text-sm text-gray-600 mb-2"><?php echo e($program->hours); ?> hours</p>
                                <p class="text-sm text-gray-700 line-clamp-3"><?php echo e($program->caption); ?></p>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <a href="<?php echo e(route('see_more_program', ['id' => $program->id])); ?>" class="bg-white border border-[#168753] text-[#168753] font-semibold px-3 py-1.5 rounded-md hover:bg-[#168753] hover:text-white transition text-sm">See more</a>
                                <a href="<?php echo e(route('updateContent', ['id' => $program->id])); ?>" class="bg-blue-600 text-white px-3 py-1.5 rounded-md hover:bg-blue-700 transition text-sm">Edit</a>
                                <form method="POST" action="<?php echo e(route('delete.programs')); ?>" onsubmit="return confirm('Delete this program?');" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <input type="hidden" name="delete_id" value="<?php echo e($program->id); ?>" />
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1.5 rounded-md hover:bg-red-700 transition text-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-6">
                    <?php echo e($programs->links()); ?>

                </div>
            <?php else: ?>
                <div class="w-full h-[40vh] flex items-center justify-center text-gray-500">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p class="text-lg font-medium">No programs found</p>
                        <p class="text-sm text-gray-400">Click "Add Program" to create one.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <style>
        .admin-content {
            transition: all 0.3s ease;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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

<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminprogrammanagemant.blade.php ENDPATH**/ ?>