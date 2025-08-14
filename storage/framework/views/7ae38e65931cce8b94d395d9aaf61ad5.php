<?php echo $__env->make('partials.header', ['title'=> $student->fname], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<main class="w-[86.6%] absolute top-40 left-64 p-20 flex flex-col gap-y-8 z-0">
    <div class="flex justify-between mx-40">
        <?php if($student->status === 1): ?>
            <h1 class="text-2xl font-black text-[#168753]">Registered</h1>
        <?php elseif($student->status === 0): ?>
            <h1 class="text-2xl font-black text-[#F59E0B]">Applicant (Pending)</h1>
        <?php elseif($student->status === 2): ?>
            <h1 class="text-2xl font-black text-[#D33]">Declined</h1>
        <?php endif; ?>

        <?php if($student->status === 1): ?>
            <a class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900 flex items-center justify-center" href="<?php echo e(route('print.pdf', ['id' => $student->id])); ?>">
                Export
            </a>
        <?php endif; ?>
    </div>
    <div class="shadow-md rounded-lg bg-white mx-80 px-20 py-10">
        <div class="grid grid-cols-2">
            <div>
                <h2 class="text-3xl font-black capitalize">
                    <?php echo e($student->fname." ".$student->lname); ?>

                </h2>
                <p>Full name</p>
            </div>
            <div class="text-right">
                <h2 class="text-2xl font-black">
                    <?php echo e($student->program->name ?? 'No Program'); ?>

                </h2>
                <p>Program</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->gender); ?>

                </h2>
                <p>Sex</p>
            </div>
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->birthdate); ?>

                </h2>
                <p>Birthdate</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    0<?php echo e($student->contact_number); ?>

                </h2>
                <p>Contact number</p>
            </div>
            <div>
                <h2 class="text-2xl font-black">
                    <?php echo e($student->email); ?>

                </h2>
                <p>Email</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->city); ?>

                </h2>
                <p>City</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->district); ?>

                </h2>
                <p>District</p>
            </div>
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->zipcode); ?>

                </h2>
                <p>Zip Code</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->nationality); ?>

                </h2>
                <p>Nationality</p>
            </div>
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->civil_status); ?>

                </h2>
                <p>Civil Status</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->employment); ?>

                </h2>
                <p>Employment Status</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->birthplace); ?>

                </h2>
                <p>Birthplace</p>
            </div>
        </div>
        <div class="grid grid-cols-2 mt-2">
            <div>
                <h2 class="text-2xl font-black capitalize">
                    <?php echo e($student->education); ?>

                </h2>
                <p>Educational Attainment</p>
            </div>
        </div>
        <div class="border border-black relative mt-8 p-4">
            <div class="absolute bg-white left-4 top-[-20px] text-2xl">
                Parent/Guardian
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        <?php echo e($student->parent->pfname." ".$student->parent->plname); ?>

                    </h2>
                    <p>Full name</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        0<?php echo e($student->parent->pcontact_number); ?>

                    </h2>
                    <p>Contact number</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black">
                        <?php echo e($student->parent->pdistrict); ?>

                    </h2>
                    <p>District</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        <?php echo e($student->parent->pzipcode); ?>

                    </h2>
                    <p>Zip Code</p>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-2">
                <div>
                    <h2 class="text-2xl font-black capitalize">
                        <?php echo e($student->parent->pmunicipality); ?>

                    </h2>
                    <p>City</p>
                </div>
            </div>
        </div>
        <div class="border border-black relative mt-8 p-4">
            <div class="absolute bg-white left-4 top-[-20px] text-2xl">
                Learner/Trainee/Student(Clients)Classification:
            </div>
            <ul>
                <?php $__currentLoopData = $student->classification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul><?php echo e($classification->classification_data); ?></ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php if($student->status===0): ?>
            <div class="flex flex-row w-full justify-center mt-10 gap-x-10">
                <form action="<?php echo e(route('accept.applicant')); ?>" method="post" class="hidden">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="student_id" value='<?php echo e($student->id); ?>'>
                    <button class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit" id="accept">Accept</button>
                </form>
                <button class="w-20 h-10 bg-[#168753] rounded-md text-white hover:bg-green-900" type="submit" onclick="acceptApplicant()">Accept</button>
                <form action="<?php echo e(route('decline.applicant')); ?>" method="post" class="hidden">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="student_id" value='<?php echo e($student->id); ?>'>
                    <button class="w-20 h-10 bg-red-700 rounded-md text-white hover:bg-red-900" type="submit" id="decline">Decline</button>
                </form>
                <button class="w-20 h-10 bg-red-700 rounded-md text-white hover:bg-red-900" type="button" onclick="declineApplicant()">Decline</button>
            </div>
        <?php endif; ?>

    </div>
</main>

<script>
    function declineApplicant(){
        Swal.fire({
            title: "Are you sure?",
            text: "This applicant will be marked as declined.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, decline it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Application declined",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#decline').click();
            }
        });
    }

    function acceptApplicant(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, accept it!"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Accept success",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#accept').click();
                getNumber(parseInt(<?php echo e($total_numbers); ?>)-1);
            }
        });
    }

</script>
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminuser_profile.blade.php ENDPATH**/ ?>