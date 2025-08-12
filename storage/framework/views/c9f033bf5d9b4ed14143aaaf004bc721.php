<?php echo $__env->make('partials.header', ['title'=> 'Manage Partners'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<style>
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
        padding-top: 3.5rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
}

/* Table styling */
td {
    text-align: center;
    padding: 1% 0;
}

/* Responsive table */
@media (max-width: 640px) {
    #partners {
        font-size: 0.75rem;
    }
    
    #partners th,
    #partners td {
        padding: 0.5rem 0.25rem;
    }
    
    #partners img {
        width: 2rem;
        height: 2.5rem;
    }
}

/* Modal responsive */
@media (max-width: 640px) {
    #updatePartnerModal .bg-white {
        margin: 1rem;
        max-width: calc(100% - 2rem);
    }
}
</style>
<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#168753] mb-2">Manage Partners</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage your business partners and their information</p>
        </div>
        
        <!-- Partners Table -->
        <div class="bg-white rounded-lg shadow-sm border overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table id="partners" class="w-full">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <th scope="col" class="px-3 py-3 uppercase">#</th>
                        <th scope="col" class="px-3 py-3 capitalize">Logo</th>
                        <th scope="col" class="px-3 py-3 capitalize">Link</th>
                        <th scope="col" class="px-3 py-3 capitalize">Date Created</th>
                        <th scope="col" class="px-3 py-3 capitalize" colspan="2">Action</th>
                    </thead>
                <tbody>
                    <?php
                        $i = 1;
                    ?>
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="px-3 py-3 text-sm"><?php echo e($i++); ?></td>
                        <td class="px-3 py-3">
                            <div class="flex justify-center items-center">
                                <img src="<?php echo e('./assets/partners_logo/'.$partner->logo); ?>" alt="partners logo" class="w-16 h-20 sm:w-20 sm:h-24 lg:w-24 lg:h-28 object-contain rounded">
                            </div>
                        </td>
                        <td class="px-3 py-3 text-sm break-all"><?php echo e($partner->link); ?></td>
                        <td class="px-3 py-3 text-sm"><?php echo e(\Carbon\Carbon::parse($partner->created_at)->format('M-d-Y')); ?></td>
                        <td class="px-3 py-3">
                            <form action="<?php echo e(route('delete_partners')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input type="number" value="<?php echo e($partner->id); ?>" class="hidden" name="partners_id">
                                <button class="w-full bg-red-500 rounded-lg text-white hover:bg-red-900 px-3 py-2 text-sm transition-colors" type="submit">Delete</button>
                            </form>
                        </td>
                        <td class="px-3 py-3">
                            <button type="button" data-partner='<?php echo json_encode($partner, 15, 512) ?>' class="update-partner-btn w-full bg-[#168753] rounded-lg text-white hover:bg-green-900 px-3 py-2 text-sm transition-colors">Update</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mb-6">
            <?php echo e($partners->links('vendor.pagination.tailwind')); ?>

        </div>
        
        <!-- Add Partner Form -->
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-4">Add New Partner</h3>
            <form action="<?php echo e(route('add_partners')); ?>" method="post" class="space-y-4" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" id="image" class="hidden" name="image">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Partner Logo</label>
                        <div class="w-full h-32 sm:h-40 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center cursor-pointer hover:border-[#168753] transition-colors" onclick="insertImage()">
                            <h3 class="font-medium text-gray-600" id="attach_file">Click to attach image</h3>
                            <img src="" id="img-file" class="hidden max-w-full max-h-full object-contain">
                        </div>
                        <?php $__errorArgs = ['image'];
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
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Partner Link</label>
                        <input type="text" name="link" id="link" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-[#168753] focus:border-transparent px-3 py-2" placeholder="https://example.com" value="">
                        <?php $__errorArgs = ['link'];
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
                </div>
                <div class="flex justify-end">
                    <button class="bg-[#168753] text-white px-6 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium" type="submit">Add Partner</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Update Partner Modal -->
    <div id="updatePartnerModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
            <button id="closeUpdateModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">✕</button>
            <h3 class="text-xl font-bold mb-4">Update Partner</h3>
            <form id="updatePartnerForm" action="<?php echo e(route('update_partners')); ?>" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="partners_id" id="update_partners_id">
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Current Logo</label>
                    <img id="current_logo" src="" alt="Current Logo" class="w-32 h-auto rounded border" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Replace Logo (optional)</label>
                    <input type="file" name="image" accept="image/*" class="block w-full" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Link</label>
                    <input type="text" name="link" id="update_link" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Link" required>
                </div>
                <div class="flex gap-3 justify-end mt-2">
                    <button type="button" id="cancelUpdateModal" class="px-4 py-2 rounded border">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-[#168753] text-white hover:bg-green-900">Save</button>
                </div>
            </form>
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
            
            .partner-logo {
                width: 4rem;
                height: 5rem;
            }
            
            .partner-table {
                font-size: 0.875rem;
            }
        }
    </style>
</main>
<script>
    function insertImage(){
        document.getElementById('image').click();
    }
    const photoInp = $("#image");
        photoInp.change(function (e) {
            if(document.getElementById("image").files.length !== 0 ){
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#img-file").attr("src", event.target.result);
                        document.getElementById('attach_file').style.display = 'none';
                        document.getElementById('img-file').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
</script>
<script>
    // Update Partner modal logic
    const modal = document.getElementById('updatePartnerModal');
    const closeModal = () => modal.classList.add('hidden');
    const openModal = () => modal.classList.remove('hidden');
    document.getElementById('closeUpdateModal').addEventListener('click', closeModal);
    document.getElementById('cancelUpdateModal').addEventListener('click', closeModal);

    document.querySelectorAll('.update-partner-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const partner = JSON.parse(btn.getAttribute('data-partner'));
            document.getElementById('update_partners_id').value = partner.id;
            document.getElementById('update_link').value = partner.link || '';
            document.getElementById('current_logo').src = `/assets/partners_logo/${partner.logo}`;
            openModal();
        });
    });
</script>
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminManagePartner.blade.php ENDPATH**/ ?>