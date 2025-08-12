<?php echo $__env->make('partials.header', ['title'=> 'Manage Intro Images'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#168753] mb-2">Manage Intro Images</h1>
            <p class="text-gray-600 text-sm lg:text-base">Organize and manage your introduction images</p>
        </div>
        
        <!-- Add New Image Button -->
        <div class="mb-6">
            <a href="<?php echo e(route('intro_images_form')); ?>" class="inline-flex items-center gap-2 bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Image
            </a>
        </div>

        <!-- Reorder / Renumber Controls -->
        <div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center gap-3 p-4 bg-white rounded-lg shadow-sm border">
        <?php if(count($introImages) > 1): ?>
            <form action="<?php echo e(route('renumber_intro_images')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition-all duration-300 flex items-center gap-2" title="Set order to 0,1,2,...">
                    <span>🔢</span>
                    <span>Reset Order</span>
                </button>
            </form>
            <span class="text-sm text-gray-500">Drag cards to reorder. Changes auto-save.</span>
            <span id="saveStatus" class="text-sm"></span>
        <?php endif; ?>
    </div>

    <!-- Images List -->
    <div class="mb-6">
        <?php if(count($introImages) > 0): ?>
            <div id="imagesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php $__currentLoopData = $introImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg shadow-md p-3 transform transition-all duration-300 hover:scale-105 hover:shadow-xl draggable-item group cursor-move ring-2 ring-transparent" 
                         style="animation: fadeInUp 0.6s ease-out <?php echo e($index * 0.1); ?>s both;" 
                         draggable="true" data-id="<?php echo e($image->id); ?>">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="<?php echo e(asset('assets/img/' . $image->image)); ?>" alt="Intro Image" 
                                 class="w-full h-32 sm:h-40 lg:h-48 object-cover rounded-lg transition-transform duration-300 hover:scale-110">
                            <div class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center cursor-pointer transform transition-all duration-200 hover:scale-110 hover:bg-red-600" 
                                 onclick="deleteImage(<?php echo e($image->id); ?>)">
                                <i class="fa-solid fa-trash text-xs sm:text-sm"></i>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="flex items-center justify-between">
                                <p class="text-xs sm:text-sm text-gray-600">Order: <span class="order-label font-medium"><?php echo e($image->order); ?></span></p>
                                <span class="text-xs text-blue-600">drag me</span>
                            </div>
                            <p class="text-xs sm:text-sm text-gray-600">Status: <?php echo e($image->is_active ? 'Active' : 'Inactive'); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-8 animate-pulse">
                <p class="text-gray-500">No intro images found. Add your first image!</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: .5;
    }
}

/* Responsive admin content */
.admin-content {
    transition: all 0.3s ease;
}

@media (max-width: 1024px) {
    .admin-content {
        margin-left: 0;
    }
}

@media (max-width: 768px) {
    .admin-content {
        padding-top: 5rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
}

/* Save status styling */
.save-status {
    padding: 0.25rem 0.5rem;
    border-radius: 0.375rem;
    font-weight: 500;
}

.save-status.success {
    background-color: #dcfce7;
    color: #166534;
}

.save-status.error {
    background-color: #fee2e2;
    color: #dc2626;
}
</style>

<script>
let dragSrcEl = null;

document.addEventListener('DOMContentLoaded', function() {
    const enableBtn = document.getElementById('enableDragBtn');
    const imagesGrid = document.getElementById('imagesGrid');
    const saveStatus = document.getElementById('saveStatus');
    const updateUrl = "<?php echo e(route('update_intro_image_order')); ?>";
    const csrf = "<?php echo e(csrf_token()); ?>";

    if (imagesGrid) {
        imagesGrid.addEventListener('dragstart', (e) => {
            const target = e.target.closest('.draggable-item');
            if (!target) return;
            dragSrcEl = target;
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/plain', target.dataset.id);
            target.classList.add('opacity-50');
            target.classList.add('ring-blue-400');
        });

        imagesGrid.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            const over = e.target.closest('.draggable-item');
            if (!over || over === dragSrcEl) return;
            const all = Array.from(imagesGrid.children);
            const srcIndex = all.indexOf(dragSrcEl);
            const overIndex = all.indexOf(over);
            if (srcIndex < overIndex) {
                imagesGrid.insertBefore(dragSrcEl, over.nextSibling);
            } else {
                imagesGrid.insertBefore(dragSrcEl, over);
            }
        });

        imagesGrid.addEventListener('dragend', (e) => {
            const target = e.target.closest('.draggable-item');
            if (target) target.classList.remove('opacity-50');
            if (target) target.classList.remove('ring-blue-400');
            // Update visible order labels based on current DOM order
            Array.from(imagesGrid.querySelectorAll('.draggable-item')).forEach((el, idx) => {
                const lbl = el.querySelector('.order-label');
                if (lbl) lbl.textContent = idx;
            });

            // Auto-save order via AJAX
            const idsInOrder = Array.from(imagesGrid.querySelectorAll('.draggable-item')).map(el => el.dataset.id);
            if (saveStatus) { saveStatus.textContent = 'Saving...'; saveStatus.className = 'text-sm text-gray-500'; }
            const formData = new FormData();
            formData.append('_token', csrf);
            formData.append('_method', 'PUT');
            idsInOrder.forEach(id => formData.append('order[]', id));
            fetch(updateUrl, { method: 'POST', body: formData })
              .then(r => {
                if (!r.ok) throw new Error('Failed to save');
                return r.text();
              })
              .then(() => {
                if (saveStatus) { saveStatus.textContent = 'Saved'; saveStatus.className = 'text-sm text-green-600'; }
                setTimeout(() => { if (saveStatus) saveStatus.textContent = ''; }, 1500);
              })
              .catch(() => {
                if (saveStatus) { saveStatus.textContent = 'Save failed'; saveStatus.className = 'text-sm text-red-600'; }
              });
        });
    }
});
function deleteImage(imageId) {
    if (confirm('Are you sure you want to delete this image?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo e(route("delete_intro_image")); ?>';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '<?php echo e(csrf_token()); ?>';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        const imageIdField = document.createElement('input');
        imageIdField.type = 'hidden';
        imageIdField.name = 'intro_image_id';
        imageIdField.value = imageId;
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        form.appendChild(imageIdField);
        
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminIntroImages.blade.php ENDPATH**/ ?>