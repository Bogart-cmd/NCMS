<?php echo $__env->make('partials.header', ['title' => 'Manage NOLITC Updates'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Manage NOLITC Updates</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage news updates and announcements</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Updates</h2>
                <button onclick="openAddModal()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Update
                </button>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Updates Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-3 py-3 border-b text-left text-sm font-medium text-gray-700">Image</th>
                            <th class="px-3 py-3 border-b text-left text-sm font-medium text-gray-700">Title</th>
                            <th class="px-3 py-3 border-b text-left text-sm font-medium text-gray-700">Date</th>
                            <th class="px-3 py-3 border-b text-left text-sm font-medium text-gray-700">Status</th>
                            <th class="px-3 py-3 border-b text-left text-sm font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50 border-b">
                                <td class="px-3 py-3">
                                    <?php if($update->image): ?>
                                        <img src="<?php echo e($update->image_url); ?>" alt="<?php echo e($update->title); ?>" class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded">
                                    <?php else: ?>
                                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-200 rounded flex items-center justify-center text-gray-500 text-xs">
                                            No Image
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="font-medium text-sm lg:text-base"><?php echo e($update->title); ?></div>
                                    <div class="text-xs lg:text-sm text-gray-600 mt-1"><?php echo e(Str::limit($update->content, 80)); ?></div>
                                </td>
                                <td class="px-3 py-3 text-sm"><?php echo e($update->formatted_date); ?></td>
                                <td class="px-3 py-3">
                                    <span class="px-2 py-1 text-xs rounded-full <?php echo e($update->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                        <?php echo e($update->is_active ? 'Active' : 'Inactive'); ?>

                                    </span>
                                </td>
                                <td class="px-3 py-3">
                                    <div class="flex space-x-2">
                                        <button onclick="openEditModal(<?php echo e($update->id); ?>)" class="text-blue-600 hover:text-blue-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <form action="<?php echo e(route('admin.updates.toggle')); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="update_id" value="<?php echo e($update->id); ?>">
                                            <button type="submit" class="text-yellow-600 hover:text-yellow-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="<?php echo e(route('admin.updates.delete')); ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this update?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="update_id" value="<?php echo e($update->id); ?>">
                                            <button type="submit" class="text-red-600 hover:text-red-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-3 py-8 text-center text-gray-500">
                                    <div class="text-center">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <p class="text-sm font-medium">No updates found</p>
                                        <p class="text-xs text-gray-400">Add your first update!</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
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

<!-- Add Update Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Add New Update</h2>
                <button onclick="closeAddModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form action="<?php echo e(route('admin.updates.add')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                    <input type="text" name="title" id="title" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content *</label>
                    <textarea name="content" id="content" rows="4" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
                
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date *</label>
                    <input type="date" name="date" id="date" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="facebook_embed" class="block text-sm font-medium text-gray-700">Facebook Embed Code</label>
                    <textarea name="facebook_embed" id="facebook_embed" rows="3" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Paste your Facebook embed code here" onpaste="debouncedParse(this.value, false)" oninput="debouncedParse(this.value, false)"></textarea>
                    <p class="text-xs text-gray-500 mt-1">Paste the embed code to auto-fill title and date</p>
                    <div id="embed-loading" class="hidden text-xs text-blue-600 mt-1">🔄 Parsing Facebook post...</div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Add Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Update Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Edit Update</h2>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                    <label for="edit_title" class="block text-sm font-medium text-gray-700">Title *</label>
                    <input type="text" name="title" id="edit_title" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="edit_content" class="block text-sm font-medium text-gray-700">Content *</label>
                    <textarea name="content" id="edit_content" rows="4" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
                
            <div>
                    <label for="edit_date" class="block text-sm font-medium text-gray-700">Date *</label>
                    <input type="date" name="date" id="edit_date" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                    <label for="edit_image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="edit_image" accept="image/*" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                    <label for="edit_facebook_embed" class="block text-sm font-medium text-gray-700">Facebook Embed Code</label>
                    <textarea name="facebook_embed" id="edit_facebook_embed" rows="3" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Paste your Facebook embed code here" onpaste="debouncedParse(this.value, true)" oninput="debouncedParse(this.value, true)"></textarea>
                    <p class="text-xs text-gray-500 mt-1">Paste the embed code to auto-fill title and date</p>
                    <div id="edit-embed-loading" class="hidden text-xs text-blue-600 mt-1">🔄 Parsing Facebook post...</div>
            </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update
                    </button>
                </div>
        </form>
    </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
}

function openEditModal(updateId) {
    // Fetch update data and populate form
    fetch(`/admin-updates/${updateId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit_title').value = data.title;
            document.getElementById('edit_content').value = data.content;
            document.getElementById('edit_date').value = data.date;
            document.getElementById('edit_facebook_embed').value = data.facebook_embed || '';
            
            // Update form action
            document.getElementById('editForm').action = `<?php echo e(url('/admin-updates')); ?>/${updateId}`;
            
            document.getElementById('editModal').classList.remove('hidden');
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

// Close modals when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('fixed')) {
        event.target.classList.add('hidden');
    }
}

// Debounce function to limit API calls
let parseTimeout;
function debouncedParse(embedCode, isEdit = false) {
    clearTimeout(parseTimeout);
    parseTimeout = setTimeout(() => {
        if (isEdit) {
            parseFacebookEmbedEdit(embedCode);
        } else {
            parseFacebookEmbed(embedCode);
        }
    }, 500); // Wait 500ms after user stops typing
}

// Parse Facebook embed and auto-fill title and date (Add Modal)
function parseFacebookEmbed(embedCode) {
    if (!embedCode.trim()) return;
    
    console.log('Parsing Facebook embed:', embedCode);
    
    const loadingIndicator = document.getElementById('embed-loading');
    loadingIndicator.classList.remove('hidden');

    fetch('<?php echo e(route("admin.updates.parse-embed")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ facebook_embed: embedCode })
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        loadingIndicator.classList.add('hidden');
        if (data.success) {
            document.getElementById('title').value = data.title;
            document.getElementById('date').value = data.date;
            document.getElementById('content').value = data.message;
            
            // Show success message
            showNotification('Facebook post data auto-filled successfully!', 'success');
        } else {
            showNotification('Could not parse Facebook post: ' + data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        loadingIndicator.classList.add('hidden');
        showNotification('Error parsing Facebook post', 'error');
    });
}

// Parse Facebook embed and auto-fill title and date (Edit Modal)
function parseFacebookEmbedEdit(embedCode) {
    if (!embedCode.trim()) return;
    
    console.log('Parsing Facebook embed (edit):', embedCode);
    
    const loadingIndicator = document.getElementById('edit-embed-loading');
    loadingIndicator.classList.remove('hidden');

    fetch('<?php echo e(route("admin.updates.parse-embed")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ facebook_embed: embedCode })
    })
    .then(response => {
        console.log('Response status (edit):', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data (edit):', data);
        loadingIndicator.classList.add('hidden');
        if (data.success) {
            document.getElementById('edit_title').value = data.title;
            document.getElementById('edit_date').value = data.date;
            document.getElementById('edit_content').value = data.message;
            
            // Show success message
            showNotification('Facebook post data auto-filled successfully!', 'success');
        } else {
            showNotification('Could not parse Facebook post: ' + data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error (edit):', error);
        loadingIndicator.classList.add('hidden');
        showNotification('Error parsing Facebook post', 'error');
    });
}

// Show notification function
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-md shadow-lg z-50 ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.textContent = message;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>

<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminUpdates.blade.php ENDPATH**/ ?>