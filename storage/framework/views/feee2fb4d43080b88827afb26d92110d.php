<?php echo $__env->make('partials.header', ['title'=> 'TESDA QUALIFICATIONS ADD'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div>
        <form action="<?php echo e(route('addTesdaQualification')); ?>" method="post" class="flex flex-col gap-y-6" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="flex">
                <div class="inline-block w-1/2">
                    <label for="course_name" class="text-2xl">Course Name:</label>
                    <input type="text" name="course_name" id="course_name" class="h-10 bg-transparent border-green-500 border-b-4 ml-3">
                    <?php $__errorArgs = ['course_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500">Required</p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="inline-block w-1/2">
                    <label for="hours" class="text-2xl">Hours:</label>
                    <input type="number" name="hours" id="hours" class="h-10 bg-transparent border-green-500 border-b-4 ml-3">
                    <?php $__errorArgs = ['hours'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500">Required</p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </div>
            <div class="w-1/2 flex flex-col">
                <label for="exampleLink" class="text-2xl align-top">Example Link:</label>
                <textarea name="exampleLink" id="exampleLink" cols="80" rows="10" class="h-[150px]"></textarea>
                <?php $__errorArgs = ['exampleLink'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500">Required</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="inline-block w-1/2">
                <label for="course_caption" class="text-2xl align-top">Course Captions:</label>
                <textarea name="course_caption" id="course_caption" cols="80" rows="10" class="h-[150px]"></textarea>
                <?php $__errorArgs = ['course_caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500">Required</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="text-2xl">
                Qualification:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                <?php if(count($errors->all())!==0): ?>
                    <?php
                        $q = 0;
                    ?>
                    <?php $__currentLoopData = old('qualification'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="text" name="qualification[]" data-qualification-id="<?php echo e($q); ?>" id="qualification-<?php echo e($q); ?>" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 qualification" value="<?php echo e($qualification); ?>" required>
                        <?php
                            $q+=1;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php elseif(count($errors->all())===0): ?>
                <input type="text" name="qualification[]" data-qualification-id="0" id="qualification-0" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 qualification" required>
                <?php endif; ?>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="qualification-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="qualification-cancel"><i class="fa-solid fa-x"></i></div>
                </div>

            </div>

            <div class="text-2xl">
                Benefits:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                <?php if(count($errors->all())!==0): ?>
                <?php
                $b = 0;
                ?>
                <?php $__currentLoopData = old('benefits'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="text" name="benefits[]" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 benefits" required data-benefit-id="<?php echo e($b); ?>" id="benefits-<?php echo e($b); ?>" value="<?php echo e($benefits); ?>">
                    <?php
                        $b+=1;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php elseif(count($errors->all())===0): ?>
                <input type="text" name="benefits[]" id="benefits-0" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 benefits" required data-benefit-id="0">
                <?php endif; ?>

                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="benefits-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="benefits-cancel"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>

            <div class="text-2xl">
                Core Competencies:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                <?php if(count($errors->all())!==0): ?>
                <?php
                $c = 0;
                ?>
                 <?php $__currentLoopData = old('competencies'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="text" name="competencies[]" id="competencies-0" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 competencies" required data-competencies-id="<?php echo e($c); ?>" id="competencies-<?php echo e($c); ?>" value="<?php echo e($competencies); ?>">
                     <?php
                         $c+=1;
                     ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php elseif(count($errors->all())===0): ?>
                    <input type="text" name="competencies[]" id="competencies-0" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 competencies" required data-competencies-id="0">
                <?php endif; ?>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="competencies-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="competencies-cancel"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex gap-x-3">
                    <p>Attach file here:</p>
                    <div class="bg-slate-300 w-[20%] flex items-center justify-center h-[20vh] rounded-md cursor-pointer" >
                        <img src="/images/attach-file.png" alt="attach-file" id="img-file" class="w-full h-full">
                    </div>
                </div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500">Invalid Image</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <input type="file" name="image" id="image" class="hidden" required>
            <div class="mx-auto">
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full">Submit</button>
            </div>

        </form>
    </div>
</main>
<script>
$(document).ready(()=>{
    let qualification_input = $(".qualification").attr("data-qualification-id");
    let benefits_input = $(".benefits").attr("data-benefit-id");
    let competencies_input = $(".competencies").attr("data-competencies-id");;
    $('#qualification-add').on('click',()=>{
        $(`#qualification-${qualification_input}`).eq(0).after(`<input type="text" name="qualification[]" id="qualification-${parseInt(qualification_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 qualification-${parseInt(qualification_input)+1}"  data-qualification-id=${parseInt(qualification_input)+1} required>`);
        qualification_input++;
    });
    $("#qualification-cancel").on('click', ()=>{
        if(qualification_input!==0){
            $(`#qualification-${qualification_input}`).remove();
        qualification_input--;
        }
    });

    $('#benefits-add').on('click',()=>{
        $(`#benefits-${benefits_input}`).eq(0).after(`<input type="text" name="benefits[]" id="benefits-${parseInt(benefits_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 benefits" required data-qualification-id="${parseInt(benefits_input)+1}">`);
        benefits_input++;
    });
    $("#benefits-cancel").on('click', ()=>{
        if(benefits_input!==0){
            $(`#benefits-${benefits_input}`).remove();
            benefits_input--;
        }
    });

    $('#competencies-add').on('click',()=>{
        $(`#competencies-${competencies_input}`).eq(0).after(`<input type="text" name="competencies[]" id="competencies-${parseInt(competencies_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3" required data-competencie-id="${parseInt(competencies_input)+1}">`);
        competencies_input++;
    });
    $("#competencies-cancel").on('click', ()=>{
        if(competencies_input!==0){
            $(`#competencies-${competencies_input}`).remove();
            competencies_input--;
        }
    });

    $("#img-file").on('click',()=>{
        $("#image").click();
    });

    const photoInp = $("#image");
        photoInp.change(function (e) {
            if(document.getElementById("image").files.length !== 0 ){
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#img-file")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

})
</script>
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminprogramsinsertform.blade.php ENDPATH**/ ?>