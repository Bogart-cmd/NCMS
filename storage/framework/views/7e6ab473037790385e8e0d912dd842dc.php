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
<main class="w-[86.6%] absolute top-40 left-64 p-10">
    <div>
        <form action="<?php echo e(route('updateContent_program', ['id'=>$program->id])); ?>" method="post" class="flex flex-col gap-y-6" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="flex">
                <div class="inline-block w-1/2">
                    <label for="course_name" class="text-2xl">Course Name:</label>
                    <input type="text" name="course_name" id="course_name" class="h-10 bg-transparent border-green-500 border-b-4 ml-3" value="<?php echo e($program->name); ?>">
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
                    <input type="number" name="hours" id="hours" class="h-10 bg-transparent border-green-500 border-b-4 ml-3" value="<?php echo e($program->hours); ?>">
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
                <textarea name="exampleLink" id="exampleLink" cols="80" rows="10" class="h-[150px]"><?php echo e($program->exam_link); ?></textarea>
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
                <textarea name="course_caption" id="course_caption" cols="80" rows="10" class="h-[150px]"><?php echo e($program->caption); ?></textarea>
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
                <?php
                    $q=0;
                ?>
                <?php $__currentLoopData = $program->qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative qualification qualification-<?php echo e($q); ?>" id="qualification-<?php echo e($q); ?>"  data-qualification-id="<?php echo e($q); ?>">
                    <input type="text" name="qualification[]"  class="h-10 bg-transparent border-green-500 border-b-4 mr-3 w-[100%] qualification-<?php echo e($q); ?>" value="<?php echo e(!session()->has('error')?$qualification->qualification:old('qualification')[$q]); ?>" required>
                    <div class="absolute right-1 top-1 bg-slate-300 px-2 py-1 rounded-md cursor-pointer " onclick="delete_id(<?php echo e($q); ?>,'qualification-'+<?php echo e($q); ?>, 'qualification')"><i class="fa-solid fa-trash-can"></i></div>
                </div>
                    <?php
                        $q+=1;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div id="last_q" class="hidden"><?php echo e($q-1); ?></div>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="qualification-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="qualification-cancel"><i class="fa-solid fa-x"></i></div>
                </div>

            </div>

            <div class="text-2xl">
                Benefits:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                <?php
                $b = 0;
                ?>
                <?php $__currentLoopData = $program->benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative benefits benefit-<?php echo e($b); ?>" id="benefits-<?php echo e($b); ?>"  data-benefit-id="<?php echo e($b); ?>">
                    <input type="text" name="benefits[]"  class="h-10 bg-transparent border-green-500 border-b-4 mr-3 w-[100%] benefit-<?php echo e($b); ?>" value="<?php echo e(!session()->has('error')?$benefits->benefit:old('benefits')[$b]); ?>" required>
                    <div class="absolute right-1 top-1 bg-slate-300 px-2 py-1 rounded-md cursor-pointer delete-btn " onclick="delete_id(<?php echo e($b); ?>,'benefit-'+<?php echo e($b); ?>,'benefit')"><i class="fa-solid fa-trash-can"></i></div>
                </div>
                    <?php
                        $b+=1;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div id="last_b" class="hidden"><?php echo e($b-1); ?></div>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="benefits-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="benefits-cancel"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>

            <div class="text-2xl">
                Core Competencies:
            </div>
            <div class="grid grid-cols-4 gap-x-1">
                <?php
                $c = 0;
                ?>
                <?php $__currentLoopData = $program->competencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative competencies competencie-<?php echo e($c); ?>" id="competencies-<?php echo e($c); ?>"  data-competencies-id="<?php echo e($c); ?>">
                    <input type="text" name="competencies[]"  class="h-10 bg-transparent border-green-500 border-b-4 mr-3 w-[100%] " value="<?php echo e(!session()->has('error')?$competencies->competencie:old('competencies')[$c]); ?>" required>
                    <div class="absolute right-1 top-1 bg-slate-300 px-2 py-1 rounded-md cursor-pointer delete-btn competencie-<?php echo e($c); ?>" onclick="delete_id(<?php echo e($c); ?>,'competencie-'+<?php echo e($c); ?>, 'competencie')"><i class="fa-solid fa-trash-can"></i></div>
                </div>
                    <?php
                        $c+=1;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div id="last_c" class="hidden"><?php echo e($c-1); ?></div>
                <div class="flex flex-col gap-y-1">
                    <div class="bg-blue-500 w-10 text-center rounded-lg cursor-pointer" id="competencies-add"><i class="fa-solid fa-plus"></i></div>
                    <div class="bg-red-500 w-10 text-center rounded-lg cursor-pointer" id="competencies-cancel"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex gap-x-3">
                    <p>Attach file here:</p>
                    <div class="bg-slate-300 w-[20%] flex items-center justify-center h-[20vh] rounded-md cursor-pointer" >
                        <img src="<?php echo e('/assets/img/'.$program->img_name); ?>" alt="attach-file" id="img-file" class="w-full h-full">
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
            <input type="file" name="image" id="image" class="hidden" value="<?php echo e($program->img_name); ?>">
            <center class="mt-2">
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-[10%]">Save</button>
                <input type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 w-[10%]" id="btn_delete" value="Delete">
            </center>
        </form>
        <center>
            <form action="<?php echo e(route('delete.programs')); ?>" method="post" class="hidden">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="text" value="<?php echo e($program->id); ?>" name="delete_id">
                <button type="submit" id="delete_btn_submit">Delete</button>
            </form>
        </center>

    </div>
</main>
<script>
let qualification_input = parseInt($("#last_q").text());
let benefits_input = parseInt($("#last_b").text());
let competencies_input = parseInt($("#last_c").text());
$(document).ready(()=>{

    $('#qualification-add').on('click',()=>{
        if(qualification_input===0){

        }
        $(`#qualification-${qualification_input}`).eq(0).after(`<input type="text" name="qualification[]" id="qualification-${parseInt(qualification_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 qualification-${parseInt(qualification_input)+1}"  data-qualification-id=${parseInt(qualification_input)+1} required>`);
        qualification_input++;
    });
    $("#qualification-cancel").on('click', ()=>{
        if(qualification_input!==parseInt($("#last_q").text())){
            $(`#qualification-${qualification_input}`).remove();
        qualification_input--;
        }
    });

    $('#benefits-add').on('click',()=>{
        $(`#benefits-${benefits_input}`).eq(0).after(`<input type="text" name="benefits[]" id="benefits-${parseInt(benefits_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3 benefits" required data-qualification-id="${parseInt(benefits_input)+1}">`);
        benefits_input++;
    });
    $("#benefits-cancel").on('click', ()=>{
        if(benefits_input!==parseInt($("#last_b").text())){
            $(`#benefits-${benefits_input}`).remove();
            benefits_input--;
        }
    });

    $('#competencies-add').on('click',()=>{
        $(`#competencies-${competencies_input}`).eq(0).after(`<input type="text" name="competencies[]" id="competencies-${parseInt(competencies_input)+1}" class="h-10 bg-transparent border-green-500 border-b-4 mr-3" required data-competencie-id="${parseInt(competencies_input)+1}">`);
        competencies_input++;
    });
    $("#competencies-cancel").on('click', ()=>{
        if(competencies_input!==parseInt($("#last_c").text())){
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

    $("#btn_delete").on('click',()=>{
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Delete success",
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#delete_btn_submit').click();
            }
        });
    });

})
function delete_id(id, content, input_type){
    if(input_type === "qualification"){
        qualification_input--;
    }else if(input_type === "benefit"){
        benefits_input--;
    }else if(input_type === "competencie"){
        competencies_input--;
    }
    $(`.${input_type}-${id}`).remove();
}
</script>
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/pages/adminprogramsupdateform.blade.php ENDPATH**/ ?>