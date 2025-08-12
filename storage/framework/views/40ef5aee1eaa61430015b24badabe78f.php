<?php echo $__env->make('partials.header', ['title'=> 'Register Student'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script></script>

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
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#168753] mb-2">Registered Students</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage and filter student registrations</p>
        </div>
        
        <!-- Filter Form -->
        <div class="bg-white rounded-lg shadow-sm border p-4 mb-6">
            <form action="<?php echo e(route('filter')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Program</label>
                        <select name="program" id="course" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent">
                            <option value="" selected disabled>Filter by Program</option>
                            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($program->id); ?>"><?php echo e($program->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent">
                            <option value="" selected disabled>Filter by Status</option>
                            <option value="1">Accepted</option>
                            <option value="0">Pending</option>
                            <option value="2">Declined</option>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="text" name="start_date" id="start_date" placeholder="Start Date" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent" onfocus="(this.type='date')">
                        <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <input type="text" name="end_date" id="end_date" placeholder="End Date" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent" onfocus="(this.type='date')">
                        <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="flex flex-col justify-end">
                        <button class="bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Students Table -->
        <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <table id="myTable" class="display w-full">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <th scope="col" class="px-3 py-3 uppercase">#</th>
                <th scope="col" class="px-3 py-3 capitalize">Name</th>
                <th scope="col" class="px-3 py-3 capitalize">Program</th>
                <th scope="col" class="px-3 py-3 capitalize">Contact</th>
                <th scope="col" class="px-3 py-3 capitalize">Email</th>
                <th scope="col" class="px-3 py-3 capitalize">Date</th>
                <th scope="col" class="px-3 py-3 capitalize">Status</th>
            </thead>
            <tbody>
                <?php
                    $x=1;
                ?>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer" onclick="clickRow('<?php echo e(route('student_profile', $student->id)); ?>')">
                        <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">
                            <?php echo e($x++); ?>

                        </th>
                        <td class="px-3 py-3 capitalize text-sm">
                            <?php echo e($student->fname." ".$student->lname); ?>

                        </td>
                        <td class="px-3 py-3 capitalize text-sm">
                            <?php echo e($student->program->name); ?>

                        </td>
                        <td class="px-3 py-3 capitalize text-sm">
                            0<?php echo e($student->contact_number); ?>

                        </td>
                        <td class="px-3 py-3 uppercase text-sm">
                            <?php echo e($student->email); ?>

                        </td>
                        <td class="px-3 py-3 uppercase text-sm">
                            <?php echo e($student->created_at->format('M-d-Y')); ?>

                        </td>
                        <td class="px-3 py-3 capitalize">
                            <?php if($student->status == 0): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            <?php elseif($student->status == 1): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Accepted</span>
                            <?php elseif($student->status == 2): ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Declined</span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Unknown</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>

        <!-- Export Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <?php if($isAll==true): ?>
                <a href="<?php echo e(route('export_excel')); ?>" class="inline-flex items-center gap-2 bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export All Students
                </a>
            <?php else: ?>
                <form action="<?php echo e(route('export')); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <input type="number" name="program" value="<?php echo e($filter['id_program']); ?>" class="hidden">
                    <input type="number" name="status" value="<?php echo e($filter['status']); ?>" class="hidden">
                    <input type="date" name="start_date" value="<?php echo e($filter['start_date']); ?>" class="hidden">
                    <input type="date" name="end_date" value="<?php echo e($filter['end_date']); ?>" class="hidden">
                    <button type="submit" class="inline-flex items-center gap-2 bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export Filtered Results
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</main>

<script src="js/student-table.js"></script>

<script>
function clickRow(url) {
    window.location.href = url;
}

// Initialize DataTable with responsive options
$(document).ready(function() {
    $('#myTable').DataTable({
        responsive: true,
        pageLength: 25,
        language: {
            search: "Search students:",
            lengthMenu: "Show _MENU_ students per page",
            info: "Showing _START_ to _END_ of _TOTAL_ students"
        },
        columnDefs: [
            { responsivePriority: 1, targets: 1 }, // Name column
            { responsivePriority: 2, targets: 2 }, // Program column
            { responsivePriority: 3, targets: 6 }, // Status column
        ]
    });
});
</script>

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
        padding-top: 5rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
    
    /* Make table responsive on mobile */
    .dataTables_wrapper {
        font-size: 0.875rem;
    }
    
    .dataTables_length,
    .dataTables_filter {
        margin-bottom: 1rem;
    }
}

/* DataTable responsive styling */
.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.5rem;
    font-size: 0.875rem;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.5rem 0.75rem;
    margin: 0 0.125rem;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #168753;
    color: white !important;
    border-color: #168753;
}
</style>
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminRegisterStudent.blade.php ENDPATH**/ ?>