<?php echo $__env->make('partials.frontend-header', ['title' => 'Registration Form Review', 'css_file' => '/css/register.css', 'show_hamburger' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('students.privacy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="header-title">
    <a href="<?php echo e(route('welcome')); ?>" class="back-btn" aria-label="Back to Home"><span aria-hidden="true">←</span> Back to Home</a>
    
  </div>
  <main class="main-container form-container">
    <h2>REVIEW YOUR SUBMISSION</h2>
    <hr>
    <section class="qualification-section inputs">
      <form action="<?php echo e(route("register_student_submit")); ?>" method="POST">
        <div class="btn-div">
            <button class="edit-btn" id="btn_edit" onclick="removeDisabled()" type="button">Edit Submission</button>
        </div>
        <div class="inputs preferred-qualification">
          <h3>Preferred Program</h3>
           <?php echo csrf_field(); ?>
          <div class="input-data full">
            <label for="qualification" class="label-input-tag">Program *</label>
            <select name="program" id="qualification" class="qualification-select" style="width: 25%" disabled>
                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($program->id); ?>"  <?php echo e((int)$data['program']===$program->id?'selected':''); ?>><?php echo e($program->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--  -->
            </select>
            <?php $__errorArgs = ['program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>
        <div class="inputs fullname">
          <h3>Learner Profile/Manpower Profile</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="lname" class="label-input-tag">Last Name *</label>
              <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo e($data['lname']); ?>" disabled>
              <?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="fname" class="label-input-tag">First Name *</label>
              <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo e($data['fname']); ?>" disabled>
              <?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="mname" class="label-input-tag">Middle Name *</label>
              <input type="text" id="mname" name="mname" placeholder="Middle Name" value="<?php echo e($data['mname']); ?>" disabled>
              <?php $__errorArgs = ['mname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="suffix" class="label-input-tag">Suffix *</label>
              <input type="text" id="suffix" name="suffix" placeholder="Suffix" value="<?php echo e($data['suffix']); ?>" disabled>
              <?php $__errorArgs = ['suffix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
        </div>

        <div class="complete-address inputs">

          <h3>Complete Permanent Mailing Address</h3>
          <div class="content-info">
            <div class="input-data">

              <label for="region" class="label-input-tag">Region  *</label>
              <select id="region" name="region" class="region" disabled>
                <option value="<?php echo e($data['region']); ?>" selected><?php echo e($data['region']); ?></option>
              </select>
              <?php $__errorArgs = ['region'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>
            <div class="input-data">
                <label for="province" class="label-input-tag">Province *</label>
                <select id="province" name="province" class="province" disabled>
                    <option value="<?php echo e($data['province']); ?>" selected><?php echo e($data['province']); ?></option>
                </select>
                <?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
                <label for="muni" class="label-input-tag">City/Municipality *</label>
                <select id="muni" name="city-municipality" class="city-municipality" disabled>
                  <option value="<?php echo e($data['city-municipality']); ?>" selected><?php echo e($data['city-municipality']); ?></option>
                </select>
                <?php $__errorArgs = ['city-municipality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
                <label for="number-street" class="label-input-tag">Number, Street *</label>
                <input type="text" list="number-street" name="number-street" placeholder="Number, Street" value="<?php echo e($data['number-street']); ?>" disabled>
                <datalist id="number-street">

                </datalist>
                <?php $__errorArgs = ['number-street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>
            <div class="input-data">
              <label for="dist" class="label-input-tag">District *</label>
              <select id="dist" name="district" class="district" disabled>
                <option value="<?php echo e($data['district']); ?>" selected id="selected_zip"><?php echo e($data['district']); ?></option>
              </select>
              <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="zip" class="label-input-tag">Zip *</label>
              <input type="number" name="zip" id="zip" placeholder="zip code" value="<?php echo e($data['zip']); ?>" disabled>
              <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="nationality" class="label-input-tag">Nationality *</label>
              <select id="nationality" name="nationality" class="nationality" disabled>
                <option value="" disabled selected>Select Nationality</option>
                <option value="Chinese" <?php echo e($data['nationality']==='Chinese'?'selected':''); ?>>Chinese</option>
                <option value="Japanese" <?php echo e($data['nationality']==='Chinese'?'selected':''); ?>>Japanese</option>
                <option value="Korean" <?php echo e($data['nationality']==='Korean'?'selected':''); ?>>Korean</option> <option value="">Indian</option>
                <option value="Pakistani" <?php echo e($data['nationality']==='Pakistani'?'selected':''); ?>>Pakistani</option>
                <option value="Bangladeshi" <?php echo e($data['nationality']==='Pakistani'?'selected':''); ?>>Bangladeshi</option>
                <option value="Filipino" <?php echo e($data['nationality']==='Filipino'?'selected':''); ?>>Filipino</option>
              </select>
              <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="contact-number" class="label-input-tag">Contact Number *</label>
              <input class="contact-number" type="number" placeholder="cellphone number" id="contact-number" name="contact-number" value="<?php echo e($data['contact-number']); ?>" disabled>
              <?php $__errorArgs = ['contact-number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="email-address" class="label-input-tag">Email Address *</label>
              <input class="email-address" type="email" placeholder="Email" id="email-address" name="email" value="<?php echo e($data['email']); ?>" disabled>
              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

          </div>
        </div>



        <div class="personal-information inputs">
          <h3>Personal Information</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="gender" class="label-input-tag">Sex *</label>
              <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <div id="gender" class="radio radio-sex">
                <div class="radio radio-input-sex">
                  <input class="radio-input sex" type="radio" id="male" name="gender" value="Male" <?php echo e($data['gender']==='Male'?'checked':''); ?> disabled>
                  <label for="male">Male</label>
                </div>
                <div class="radio radio-input-sex">
                  <input class="radio-input sex" type="radio" id="female" name="gender" value="Female" <?php echo e($data['gender']==='Female'?'checked':''); ?> disabled>
                  <label for="female">Female</label>
                </div>
              </div>
            </div>

            <div class="input-data">
              <label for="civil-status" class="label-input-tag">Civil Status *</label>
              <?php $__errorArgs = ['civil-status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <div id="civil-status" class="radio radio-civil-status">
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="single" name="civil-status" value="Single" <?php echo e($data['civil-status']==='Single'?'checked':''); ?> disabled>
                  <label for="single">Single</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="married" name="civil-status" value="Married" <?php echo e($data['civil-status']==='Married'?'checked':''); ?> disabled>
                  <label for="married">Married</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="widow-er" name="civil-status" value="Widow/er" <?php echo e($data['civil-status']==='Widow/er'?'checked':''); ?> disabled>
                  <label for="widow-er">Widow/er</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="separated" name="civil-status" value="Separated" <?php echo e($data['civil-status']==='Separated'?'checked':''); ?> disabled>
                  <label for="separated">Separated</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="solo-parent" name="civil-status" value="Solo Parent" <?php echo e($data['civil-status']==='Solo Parent'?'checked':''); ?> disabled>
                  <label for="solo-parent">Solo Parent</label>
                </div>
              </div>
            </div>

            <div class="input-data">
              <label for="employment-status" class="label-input-tag">Employment Status *</label>
              <?php $__errorArgs = ['employment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <div id="employment-status" class="radio radio-employment-status">
                <div class="radio radio-input-employment-status">
                  <input class="radio-input employment" type="radio" id="employed" name="employment" value="Employed"  <?php echo e($data['employment']==='Employed'?'checked':''); ?> disabled>
                  <label for="employed">Employed</label>
                </div>
                <div class="radio radio-input-employment-status">
                  <input class="radio-input employment" type="radio" id="unemployed" name="employment" value="Unemployed" <?php echo e($data['employment']==='Unemployed'?'checked':''); ?> disabled>
                  <label for="unemployed">Unemployed</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="inputs birthdate">
          <h3>Birthdate</h3>
          <div class="input-data">
            <label for="birthdate" class="label-input-tag">Date *</label>
            <input type="date" name="birthdate" id="birthdate" value="<?php echo e($data['birthdate']); ?>" disabled>
            <div class="label">MM/DD/YYYY</div>
            <?php $__errorArgs = ['birthdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
        </div>

        <div class="inputs birthdate">
          <h3>Birthplace</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="birthplace-region" class="label-input-tag">Region  *</label>
              <select id="birthplace-region" name="birthplace-region" class="region"  disabled>
                <option value="<?php echo e($data['birthplace-region']); ?>" selected><?php echo e($data['birthplace-region']); ?></option>
              </select>
              <?php $__errorArgs = ['birthplace-region'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
                <label for="birthplace-province" class="label-input-tag">Province *</label>
                <select id="birthplace-province" name="birthplace-province" class="province" disabled>
                    <option value="<?php echo e($data['birthplace-province']); ?>" selected><?php echo e($data['birthplace-province']); ?></option>
                </select>
                <?php $__errorArgs = ['birthplace-province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="birthplace-pmuni" class="label-input-tag">City/Municipality *</label>
              <select id="birthplace-pmuni" name="birthplace-pcity-municipality" class="city-municipality" disabled>
                <option value="<?php echo e($data['birthplace-pcity-municipality']); ?>" selected><?php echo e($data['birthplace-pcity-municipality']); ?></option>
              </select>
              <?php $__errorArgs = ['birthplace-pcity-municipality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>

        </div>

        <div class="inputs Trainee">
          <h3>Educational Attainment Before the Training (Trainee)</h3>
          <?php $__errorArgs = ['trainee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="error"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <div class="trainee radio">

            <div class="input-radio">
              <input type="radio" name="trainee" id="no-grade-complete" class="radio-input" value="No Grade Complete" <?php echo e($data['trainee']==='No Grade Complete'?'checked':''); ?> disabled>
              <label for="no-grade-complete">No Grade Complete</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="elementary-undergraduate" class="radio-input" value="Elementary Undergraduate" <?php echo e($data['trainee']==='Elementary Undergraduate'?'checked':''); ?> disabled>
              <label for="elementary-undergraduate">Elementary Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="elementary-graduate" class="radio-input" value="Elementary Graduate" <?php echo e($data['trainee']==='Elementary Graduate'?'checked':''); ?> disabled>
              <label for="elementary-graduate">Elementary Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="pre-school" class="radio-input" value="Pre-School (Nursery/Kinder/Prep)" <?php echo e($data['trainee']==='Pre-School (Nursery/Kinder/Prep)'?'checked':''); ?> disabled>
              <label for="pre-school">Pre-School (Nursery/Kinder/Prep)</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="post-secondary-undergraduate" class="radio-input" value="Post Secondary Undergraduate" <?php echo e($data['trainee']==='Post Secondary Undergraduate'?'checked':''); ?> disabled>
              <label for="post-secondary-undergraduate">Post Secondary Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="high-school-under-graduate" class="radio-input" value="High School Under Graduate" <?php echo e($data['trainee']==='High School Under Graduate'?'checked':''); ?> disabled>
              <label for="high-school-under-graduate">High School Under Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="college-undergraduate" class="radio-input" value="College Undergraduate" <?php echo e($data['trainee']==='College Undergraduate'?'checked':''); ?> disabled>
              <label for="college-undergraduate">College Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="junior-high-graduate" class="radio-input" value="Junior High Graduate" <?php echo e($data['trainee']==='Junior High Graduate'?'checked':''); ?> disabled>
              <label for="junior-high-graduate">Junior High Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="high-school-graduate" class="radio-input" value="High School Graduate" <?php echo e($data['trainee']==='High School Graduate'?'checked':''); ?> disabled>
              <label for="high-school-graduate">High School Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="college-graduate-or-higher" class="radio-input" value="College Graduate or Higher" <?php echo e($data['trainee']==='College Graduate or Higher'?'checked':''); ?> disabled>
              <label for="college-graduate-or-higher">College Graduate or Higher</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="senior-high-graduate" class="radio-input" value="Senior High Graduate" <?php echo e($data['trainee']==='Senior High Graduate'?'checked':''); ?> disabled>
              <label for="senior-high-graduate">Senior High Graduate</label>
            </div>

          </div>
        </div>

        <div class="inputs parent-personal-data">
          <h3>Parent/Guardian</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="plname" class="label-input-tag">Last Name *</label>
              <input type="text" id="plname" name="plname" placeholder="Last Name" value="<?php echo e($data['plname']); ?>" disabled>
              <?php $__errorArgs = ['plname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="pfname" class="label-input-tag">First Name *</label>
              <input type="text" id="pfname" name="pfname" placeholder="First Name" value="<?php echo e($data['pfname']); ?>" disabled>
              <?php $__errorArgs = ['pfname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="pmname" class="label-input-tag">Middle Name *</label>
              <input type="text" id="pmname" name="pmname" placeholder="Middle Name" value="<?php echo e($data['pmname']); ?>" disabled>
              <?php $__errorArgs = ['pmname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="psname" class="label-input-tag">Suffix *</label>
              <input type="text" id="psname" name="psname" placeholder="Suffix" value="<?php echo e($data['psname']); ?>" disabled>
              <?php $__errorArgs = ['psname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-data">
              <label for="pcontact" class="label-input-tag">Contact Number *</label>
              <input type="text" id="pcontact" name="pcontact" placeholder="Contact Number" value="<?php echo e($data['pcontact']); ?>" disabled>
              <?php $__errorArgs = ['pcontact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p class="error"><?php echo e($message); ?></p>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
        </div>

        <div class="complete-address inputs">

            <h3>Complete Permanent Mailing Address</h3>
            <div class="content-info">
                <div class="input-data">
                    <label for="region" class="label-input-tag">Region  *</label>
                    <select id="pregion" name="pregion" class="pregion" disabled>
                        <option value="<?php echo e($data['pregion']); ?>" selected><?php echo e($data['pregion']); ?></option>
                    </select>
                    <?php $__errorArgs = ['pregion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-data">
                    <label for="pprovince" class="label-input-tag">Province *</label>
                    <select id="pprovince" name="pprovince" class="province" disabled>
                        <option value="<?php echo e($data['pprovince']); ?>" selected><?php echo e($data['pprovince']); ?></option>
                    </select>
                    <?php $__errorArgs = ['pprovince'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-data">
                    <label for="pmuni" class="label-input-tag">City/Municipality *</label>
                    <select id="pmuni" name="pcity-municipality" class="city-municipality" disabled>
                        <option value="<?php echo e($data['pcity-municipality']); ?>" selected><?php echo e($data['pcity-municipality']); ?></option>
                    </select>
                    <?php $__errorArgs = ['pcity-municipality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-data">
                    <label for="pnumber-street" class="label-input-tag">Number, Street *</label>
                    <input type="text" list="pnumber-street" name="pnumber-street" placeholder="Number, Street" value="<?php echo e($data['pnumber-street']); ?>" disabled>
                    <datalist id="pnumber-street">

                    </datalist>
                    <?php $__errorArgs = ['pnumber-street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="input-data">
                    <label for="pdist" class="label-input-tag">District *</label>
                    <select id="pdist" name="pdistrict" class="district" disabled>
                        <option value="<?php echo e($data['pdistrict']); ?>" selected id="pselected_zip"><?php echo e($data['pdistrict']); ?></option>
                    </select>
                    <?php $__errorArgs = ['pdistrict'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="input-data">
                    <label for="pzip" class="label-input-tag">Zip *</label>
                    <input type="number" name="pzip" id="pzip" placeholder="zip code" value="<?php echo e($data['pzip']); ?>" disabled>
                    <?php $__errorArgs = ['pzip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>


            </div>
        </div>

        <div class="inputs parent-address">
          <h3>Learner/Trainee/Student(Clients)Classification</h3>
          <?php $__errorArgs = ['classification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <p class="error"><?php echo e($message); ?></p>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <div class="content-info">
            <div class="input-check">
              <input type="checkbox" id="student" name="classification[]" value="Student" <?php echo e(is_array($data['classification'])&&in_array('Student', $data['classification'])?"checked":""); ?> disabled>
              <label for="student">Student</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="workers" name="classification[]" value="Informal Workers" <?php echo e(is_array($data['classification'])&&in_array('Informal Workers', $data['classification'])?"checked":""); ?> disabled>
              <label for="workers">Informal Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="communities" name="classification[]" value="Indigenous People & Cultural Communities" <?php echo e(is_array($data['classification'])&&in_array('Indigenous People & Cultural Communities', $data['classification'])?"checked":""); ?> disabled>
              <label for="communities">Indigenous People & Cultural Communities</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="youth" name="classification[]" value="Out of School Youth" <?php echo e(is_array($data['classification'])&&in_array('Out of School Youth', $data['classification'])?"checked":""); ?> disabled>
              <label for="youth">Out of School Youth</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="iWorkers" name="classification[]" value="Industry Workers" <?php echo e(is_array($data['classification'])&&in_array('Industry Workers', $data['classification'])?"checked":""); ?> disabled>
              <label for="iWorkers">Industry Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dWoman" name="classification[]" value="Disadvantage Woman" <?php echo e(is_array($data['classification'])&&in_array('Disadvantage Woman', $data['classification'])?"checked":""); ?> disabled>
              <label for="dWoman">Disadvantage Woman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="sParent" name="classification[]" value="Solo Parent" <?php echo e(is_array($data['classification'])&&in_array('Solo Parent', $data['classification'])?"checked":""); ?> disabled>
              <label for="sParent">Solo Parent</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="cooperatives" name="classification[]" value="Cooperatives" <?php echo e(is_array($data['classification'])&&in_array('Cooperatives', $data['classification'])?"checked":""); ?> disabled>
              <label for="cooperatives">Cooperatives</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="calamities" name="classification[]" value="Victim Of Natural Disasters and Calamities" <?php echo e(is_array($data['classification'])&&in_array('Victim Of Natural Disasters and Calamities', $data['classification'])?"checked":""); ?> disabled>
              <label for="calamities">Victim Of Natural Disasters and Calamities</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="solo" name="classification[]" value="Solo Parent's Children" <?php echo e(is_array($data['classification'])&&in_array("Solo Parent's Children", $data['classification'])?"checked":""); ?> disabled>
              <label for="solo">Solo Parent's Children</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fEnterprises" name="classification[]" value="Family Enterprises" <?php echo e(is_array($data['classification'])&&in_array('Family Enterprises', $data['classification'])?"checked":""); ?> disabled>
              <label for="fEnterprises">Family Enterprises</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="trafficking" name="classification[]" value="Victim of Survivor of Human Trafficking" <?php echo e(is_array($data['classification'])&&in_array('Victim of Survivor of Human Trafficking', $data['classification'])?"checked":""); ?> disabled>
              <label for="trafficking">Victim of Survivor of Human Trafficking</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="sCitizens" name="classification[]" value="Senior Citizens" <?php echo e(is_array($data['classification'])&&in_array('Senior Citizens', $data['classification'])?"checked":""); ?> disabled>
              <label for="sCitizens">Senior Citizens</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="mEntrepreneurs" name="classification[]" value="Micro Entrepreneurs" <?php echo e(is_array($data['classification'])&&in_array('Micro Entrepreneurs', $data['classification'])?"checked":""); ?> disabled>
              <label for="mEntrepreneurs">Micro Entrepreneurs</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dsurrenders" name="classification[]" value="Drug Dependent Surrenders" <?php echo e(is_array($data['classification'])&&in_array('Drug Dependent Surrenders', $data['classification'])?"checked":""); ?> disabled>
              <label for="dsurrenders">Drug Dependent Surrenders</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dPersonnel" name="classification[]" value="Displaced HEIs Teaching Personnel" <?php echo e(is_array($data['classification'])&&in_array('Displaced HEIs Teaching Personnel', $data['classification'])?"checked":""); ?> disabled>
              <label for="dPersonnel">Displaced HEIs Teaching Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="microentrepreneurs" name="classification[]" value="Family Member of Microentrepreneurs" <?php echo e(is_array($data['classification'])&&in_array('Family Member of Microentrepreneurs', $data['classification'])?"checked":""); ?> disabled>
              <label for="microentrepreneurs">Family Member of Microentrepreneurs</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="Dcombatants" name="classification[]" value="Rebel Returnees or Decommisioned Combatants" <?php echo e(is_array($data['classification'])&&in_array('Rebel Returnees or Decommisioned Combatants', $data['classification'])?"checked":""); ?> disabled>
              <label for="Dcombatants">Rebel Returnees or Decommisioned Combatants</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dWorkers" name="classification[]" value="Displaced Workers" <?php echo e(is_array($data['classification'])&&in_array('Displaced Workers', $data['classification'])?"checked":""); ?> disabled>
              <label for="dWorkers">Displaced Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fFisherman" name="classification[]" value="Farmers and Fisherman" <?php echo e(is_array($data['classification'])&&in_array('Farmers and Fisherman', $data['classification'])?"checked":""); ?> disabled>
              <label for="fFisherman">Farmers and Fisherman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="idetainees" name="classification[]" value="Inmates and Detainees" <?php echo e(is_array($data['classification'])&&in_array('Inmates and Detainees', $data['classification'])?"checked":""); ?> disabled>
              <label for="idetainees">Inmates and Detainees</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="tTrainers" name="classification[]" value="TVET Trainers" <?php echo e(is_array($data['classification'])&&in_array('TVET Trainers', $data['classification'])?"checked":""); ?> disabled>
              <label for="tTrainers">TVET Trainers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="aFisherman" name="classification[]" value="Family Members of Farmers and Fisherman" <?php echo e(is_array($data['classification'])&&in_array('Family Members of Farmers and Fisherman', $data['classification'])?"checked":""); ?> disabled>
              <label for="aFisherman">Family Members of Farmers and Fisherman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="pPersonnel" name="classification[]" value="Wounded-in-Action AFP and PNP Personnel" <?php echo e(is_array($data['classification'])&&in_array('Wounded-in-Action AFP and PNP Personnel', $data['classification'])?"checked":""); ?> disabled>
              <label for="pPersonnel">Wounded-in-Action AFP and PNP Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="eWorkers" name="classification[]" value="Currently Employed Workers" <?php echo e(is_array($data['classification'])&&in_array('Currently Employed Workers', $data['classification'])?"checked":""); ?> disabled>
              <label for="eWorkers">Currently Employed Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="eCoordinator" name="classification[]" value="Community Trng. & Employment Coordinator" <?php echo e(is_array($data['classification'])&&in_array('Community Trng. & Employment Coordinator', $data['classification'])?"checked":""); ?> disabled>
              <label for="eCoordinator">Community Trng. & Employment Coordinator</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="pnp" name="classification[]" value="Family Members of AFP and PNP killed-and-Wounded-in-Action" <?php echo e(is_array($data['classification'])&&in_array('Family Members of AFP and PNP killed-and-Wounded-in-Action', $data['classification'])?"checked":""); ?> disabled>
              <label for="pnp">Family Members of AFP and PNP killed-and-Wounded-in-Action</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="oStatus" name="classification[]" value="Employee with Contractual/Job Order Status" <?php echo e(is_array($data['classification'])&&in_array('Employee with Contractual/Job Order Status', $data['classification'])?"checked":""); ?> disabled>
              <label for="oStatus">Employee with Contractual/Job Order Status</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fWorkers" name="classification[]" value="Returning/Repatriated Overseas Filipino Workers" <?php echo e(is_array($data['classification'])&&in_array('Returning/Repatriated Overseas Filipino Workers', $data['classification'])?"checked":""); ?> disabled>
              <label for="fWorkers">Returning/Repatriated Overseas Filipino Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="iDetainees" name="classification[]" value="Family Members of Inmates and Detainees" <?php echo e(is_array($data['classification'])&&in_array('Family Members of Inmates and Detainees', $data['classification'])?"checked":""); ?> disabled>
              <label for="iDetainees">Family Members of Inmates and Detainees</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="tAlumni" name="classification[]" value="TESDA Alumni" <?php echo e(is_array($data['classification'])&&in_array('TESDA Alumni', $data['classification'])?"checked":""); ?> disabled>
              <label for="tAlumni">TESDA Alumni</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="oDependents" name="classification[]" value="Overseas Filipino Workers (OFW) Dependents" <?php echo e(is_array($data['classification'])&&in_array('Overseas Filipino Workers (OFW) Dependents', $data['classification'])?"checked":""); ?> disabled>
              <label for="oDependents">Overseas Filipino Workers (OFW) Dependents</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="uPersonnel" name="classification[]" value="Uniformed Personnel" <?php echo e(is_array($data['classification'])&&in_array('Uniformed Personnel', $data['classification'])?"checked":""); ?> disabled>
              <label for="uPersonnel">Uniformed Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="uPoor" name="classification[]" value="Urban and Rural Poor" <?php echo e(is_array($data['classification'])&&in_array('Urban and Rural Poor', $data['classification'])?"checked":""); ?> disabled>
              <label for="uPoor">Urban and Rural Poor</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="wDisabilities" name="classification[]" value="Person With Disabilities" <?php echo e(is_array($data['classification'])&&in_array('Person With Disabilities', $data['classification'])?"checked":""); ?> disabled>
              <label for="wDisabilities">Person With Disabilities</label>
            </div>


          </div>
        </div>
        <div class="btn-submit">
            <div class="accept-content">
                <input type="checkbox" name="accept" id="accept" value="isAccept" checked disabled>
                <p>I have read and accept the <span id="privacyPolicy">Privacy Policy *</span></p>
            </div>
          <button type="submit" onclick="removeDisabled()">Submit</button>
        </div>
      </form>
    </section>

  </main>
<!-- jQuery must load before register.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php echo $__env->make('partials.frontend-footer', ['js_file' => '/js/register.js'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/students/register_review.blade.php ENDPATH**/ ?>