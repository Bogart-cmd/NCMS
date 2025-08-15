<?php echo $__env->make('partials.frontend-header', ['title' => 'Registration Form', 'css_file' => '/css/register.css', 'show_hamburger' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(!old('lname')): ?>
  <script>
    localStorage.removeItem('privacyAccepted');
  </script>
<?php endif; ?>
<?php echo $__env->make('students.privacy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="register-page">
  <div class="header-title">
    <a href="<?php echo e(route('welcome')); ?>" class="back-btn" aria-label="Back to Home"><span aria-hidden="true">←</span> Back to Home</a>
    
  </div>
  <main class="main-container form-container">
    <h2>REGISTRATION FORM</h2>
    <?php if(config('app.debug')): ?>
      <div style="margin: 8px 0; display:flex; gap:8px; flex-wrap:wrap">
        <button type="button" id="autofillTestDataBtn" style="background:#eef2ff;color:#3730a3;border:1px solid #c7d2fe;border-radius:6px;padding:6px 10px;font-weight:600;">Autofill Test Data (Debug)</button>
        <button type="button" id="clearFormBtn" style="background:#fef2f2;color:#991b1b;border:1px solid #fecaca;border-radius:6px;padding:6px 10px;font-weight:600;">Clear Form</button>
      </div>
    <?php endif; ?>
    <hr>
    <section class="qualification-section inputs">
      <form id="registrationForm" action="<?php echo e(route("register_student")); ?>" method="post">
        <div class="inputs preferred-qualification">
          <h3>Preferred Program</h3>
           <?php echo csrf_field(); ?>
          <div class="input-data full">
            <label for="qualification" class="label-input-tag">Program@required('program')</label>
            <select name="program" id="qualification" class="qualification-select">
                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($program->id); ?>"  <?php echo e(old('program')===$program->id?'selected':''); ?>><?php echo e($program->name); ?></option>
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
              <label for="lname" class="label-input-tag">Last Name@required('lname')</label>
              <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo e(old('lname')); ?>">
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
              <label for="fname" class="label-input-tag">First Name@required('fname')</label>
              <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo e(old('fname')); ?>">
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
              <label for="mname" class="label-input-tag">Middle Name@required('mname')</label>
              <input type="text" id="mname" name="mname" placeholder="Middle Name" value="<?php echo e(old('mname')); ?>">
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
              <label for="suffix" class="label-input-tag">Suffix@required('suffix')</label>
              <select id="suffix" name="suffix">
                <option value="" selected disabled>Select Suffix</option>
                <option value="Jr." <?php echo e(old('suffix') == 'Jr.' ? 'selected' : ''); ?>>Jr.</option>
                <option value="Sr." <?php echo e(old('suffix') == 'Sr.' ? 'selected' : ''); ?>>Sr.</option>
                <option value="II" <?php echo e(old('suffix') == 'II' ? 'selected' : ''); ?>>II</option>
                <option value="III" <?php echo e(old('suffix') == 'III' ? 'selected' : ''); ?>>III</option>
                <option value="IV" <?php echo e(old('suffix') == 'IV' ? 'selected' : ''); ?>>IV</option>
                <option value="None" <?php echo e(old('suffix') == 'None' ? 'selected' : ''); ?>>None</option>
              </select>
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
                <label for="region" class="label-input-tag">Region@required('region')</label>
                <select id="region" name="region" class="region">
                    <option value='' selected disabled>Select region</option>
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
                <label for="province" class="label-input-tag">Province@required('province')</label>
                <select id="province" name="province" class="province" disabled>
                    <option value='' selected>Select Province</option>
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
                <label for="muni" class="label-input-tag">City/Municipality@required('city-municipality')</label>
                <select id="muni" name="city-municipality" class="city-municipality" disabled>
                    <option value='' selected>Select City/Municipality</option>
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

                <input type="text" list="number-street" name="number-street" placeholder="Number, Street" value="<?php echo e(old('number-street')); ?>">
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
              <select id="dist" name="district" class="district">
                <option value="" disabled <?php echo e(old('district') ? '' : 'selected'); ?>>Select District</option>
                <option value="1st" <?php echo e(old('district') == '1st' ? 'selected' : ''); ?>>1st</option>
                <option value="2nd" <?php echo e(old('district') == '2nd' ? 'selected' : ''); ?>>2nd</option>
                <option value="3rd" <?php echo e(old('district') == '3rd' ? 'selected' : ''); ?>>3rd</option>
                <option value="4th" <?php echo e(old('district') == '4th' ? 'selected' : ''); ?>>4th</option>
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
              <input type="text" name="zip" id="zip" placeholder="ZIP code" value="<?php echo e(old('zip')); ?>" inputmode="numeric" autocomplete="postal-code" maxlength="4" pattern="\d{4}"
              oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,4)">
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
              <select id="nationality" name="nationality" class="nationality">
                <option value="" disabled selected>Select Nationality</option>
                <option value="Chinese" <?php echo e(old('nationality')==='Chinese'?'selected':''); ?>>Chinese</option>
                <option value="Japanese" <?php echo e(old('nationality')==='Japanese'?'selected':''); ?>>Japanese</option>
                <option value="Korean" <?php echo e(old('nationality')==='Korean'?'selected':''); ?>>Korean</option>
                <option value="Indian" <?php echo e(old('nationality')==='Indian'?'selected':''); ?>>Indian</option>
                <option value="Pakistani" <?php echo e(old('nationality')==='Pakistani'?'selected':''); ?>>Pakistani</option>
                <option value="Bangladeshi" <?php echo e(old('nationality')==='Bangladeshi'?'selected':''); ?>>Bangladeshi</option>
                <option value="Filipino" <?php echo e(old('nationality')==='Filipino'?'selected':''); ?>>Filipino</option>
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
              <input 
                class="contact-number" 
                type="tel"
                inputmode="tel"
                autocomplete="tel"
                placeholder="e.g. 09171234567" 
                id="contact-number" 
                name="contact-number" 
                value="<?php echo e(old('contact-number')); ?>"
                maxlength="11"
                pattern="\d{11}"
                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,11)">
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
              <input class="email-address" type="email" placeholder="Email" id="email-address" name="email" value="<?php echo e(old('email')); ?>">
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
                  <input class="radio-input sex" type="radio" id="male" name="gender" value="Male" <?php echo e(old('gender')==='Male'?'checked':''); ?>>
                  <label for="male">Male</label>
                </div>
                <div class="radio radio-input-sex">
                  <input class="radio-input sex" type="radio" id="female" name="gender" value="Female" <?php echo e(old('gender')==='Female'?'checked':''); ?>>
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
                  <input class="radio-input c-status" type="radio" id="single" name="civil-status" value="Single" <?php echo e(old('civil-status')==='Single'?'checked':''); ?>>
                  <label for="single">Single</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="married" name="civil-status" value="Married" <?php echo e(old('civil-status')==='Married'?'checked':''); ?>>
                  <label for="married">Married</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="widow-er" name="civil-status" value="Widow/er" <?php echo e(old('civil-status')==='Widow/er'?'checked':''); ?>>
                  <label for="widow-er">Widow/er</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="separated" name="civil-status" value="Separated" <?php echo e(old('civil-status')==='Separated'?'checked':''); ?>>
                  <label for="separated">Separated</label>
                </div>
                <div class="radio radio-input-civil-status">
                  <input class="radio-input c-status" type="radio" id="solo-parent" name="civil-status" value="Solo Parent" <?php echo e(old('civil-status')==='Solo Parent'?'checked':''); ?>>
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
                  <input class="radio-input employment" type="radio" id="employed" name="employment" value="Employed"  <?php echo e(old('employment')==='Employed'?'checked':''); ?>>
                  <label for="employed">Employed</label>
                </div>
                <div class="radio radio-input-employment-status">
                  <input class="radio-input employment" type="radio" id="unemployed" name="employment" value="Unemployed" <?php echo e(old('employment')==='Unemployed'?'checked':''); ?>>
                  <label for="unemployed">Unemployed</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="inputs birthdate">
          <h3>Birth Information</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="birthdate" class="label-input-tag">Date of Birth *</label>
              <input type="date" name="birthdate" id="birthdate" value="<?php echo e(old('birthdate')); ?>" min="1900-01-01" max="<?php echo e(date('Y-m-d')); ?>" autocomplete="bday">
              <div class="form-help">Format: MM/DD/YYYY</div>
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
            <div class="input-data">
                <label for="birthplace-region" class="label-input-tag">Birthplace Region *</label>
                <select id="birthplace-region" name="birthplace-region" class="region">
                    <option value='' selected disabled>Select region</option>
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
                <label for="birthplace-province" class="label-input-tag">Birthplace Province *</label>
                <select id="birthplace-province" name="birthplace-province" class="province" disabled>
                    <option value='' selected disabled>Select Province</option>
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
            <label for="birthplace-pmuni" class="label-input-tag">Birthplace City/Municipality *</label>
            <select id="birthplace-pmuni" name="birthplace-pcity-municipality" class="city-municipality" disabled>
                <option value='' selected>Select City</option>
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
              <input type="radio" name="trainee" id="no-grade-complete" class="radio-input" value="No Grade Complete" <?php echo e(old('trainee')==='No Grade Complete'?'checked':''); ?>>
              <label for="no-grade-complete">No Grade Complete</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="elementary-undergraduate" class="radio-input" value="Elementary Undergraduate" <?php echo e(old('trainee')==='Elementary Undergraduate'?'checked':''); ?>>
              <label for="elementary-undergraduate">Elementary Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="elementary-graduate" class="radio-input" value="Elementary Graduate" <?php echo e(old('trainee')==='Elementary Graduate'?'checked':''); ?>>
              <label for="elementary-graduate">Elementary Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="pre-school" class="radio-input" value="Pre-School (Nursery/Kinder/Prep)" <?php echo e(old('trainee')==='Pre-School (Nursery/Kinder/Prep)'?'checked':''); ?>>
              <label for="pre-school">Pre-School (Nursery/Kinder/Prep)</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="post-secondary-undergraduate" class="radio-input" value="Post Secondary Undergraduate" <?php echo e(old('trainee')==='Post Secondary Undergraduate'?'checked':''); ?>>
              <label for="post-secondary-undergraduate">Post Secondary Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="high-school-under-graduate" class="radio-input" value="High School Under Graduate" <?php echo e(old('trainee')==='High School Under Graduate'?'checked':''); ?>>
              <label for="high-school-under-graduate">High School Under Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="college-undergraduate" class="radio-input" value="College Undergraduate" <?php echo e(old('trainee')==='College Undergraduate'?'checked':''); ?>>
              <label for="college-undergraduate">College Undergraduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="junior-high-graduate" class="radio-input" value="Junior High Graduate" <?php echo e(old('trainee')==='Junior High Graduate'?'checked':''); ?>>
              <label for="junior-high-graduate">Junior High Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="high-school-graduate" class="radio-input" value="High School Graduate" <?php echo e(old('trainee')==='High School Graduate'?'checked':''); ?>>
              <label for="high-school-graduate">High School Graduate</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="college-graduate-or-higher" class="radio-input" value="College Graduate or Higher" <?php echo e(old('trainee')==='College Graduate or Higher'?'checked':''); ?>>
              <label for="college-graduate-or-higher">College Graduate or Higher</label>
            </div>

            <div class="input-radio">
              <input type="radio" name="trainee" id="senior-high-graduate" class="radio-input" value="Senior High Graduate" <?php echo e(old('trainee')==='Senior High Graduate'?'checked':''); ?>>
              <label for="senior-high-graduate">Senior High Graduate</label>
            </div>

          </div>
        </div>

        <div class="inputs parent-personal-data">
          <h3>Parent/Guardian</h3>
          <div class="content-info">
            <div class="input-data">
              <label for="plname" class="label-input-tag">Last Name *</label>
              <input type="text" id="plname" name="plname" placeholder="Last Name" value="<?php echo e(old('plname')); ?>">
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
              <input type="text" id="pfname" name="pfname" placeholder="First Name" value="<?php echo e(old('pfname')); ?>">
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
              <input type="text" id="pmname" name="pmname" placeholder="Middle Name" value="<?php echo e(old('pmname')); ?>">
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
              <select id="psname" name="psname">
                <option value="" selected disabled>Select Suffix</option>
                <option value="Jr." <?php echo e(old('psname') == 'Jr.' ? 'selected' : ''); ?>>Jr.</option>
                <option value="Sr." <?php echo e(old('psname') == 'Sr.' ? 'selected' : ''); ?>>Sr.</option>
                <option value="II" <?php echo e(old('psname') == 'II' ? 'selected' : ''); ?>>II</option>
                <option value="III" <?php echo e(old('psname') == 'III' ? 'selected' : ''); ?>>III</option>
                <option value="IV" <?php echo e(old('psname') == 'IV' ? 'selected' : ''); ?>>IV</option>
                <option value="None" <?php echo e(old('psname') == 'None' ? 'selected' : ''); ?>>None</option>
              </select>
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
            <input 
              type="number" 
              id="pcontact" 
              name="pcontact" 
              placeholder="e.g. 09171234567" 
              value="<?php echo e(old('pcontact')); ?>"
              oninput="if(this.value.length > 11){ this.value = this.value.slice(0,11); }">
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
                    <label for="pregion" class="label-input-tag">Region  *</label>
                    <select id="pregion" name="pregion" class="pregion">
                        <option value='' selected disabled>Select region</option>
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
                        <option value='' selected disabled>Select Province</option>
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
                        <option value='' selected>Select City/Municipality</option>
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
                    <input type="text" list="pnumber-street" name="pnumber-street" placeholder="Number, Street" value="<?php echo e(old('pnumber-street')); ?>">
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
                <select id="pdist" name="pdistrict" class="district">
                  <option value="" disabled <?php echo e(old('district') ? '' : 'selected'); ?>>Select District</option>
                  <option value="1st" <?php echo e(old('district') == '1st' ? 'selected' : ''); ?>>1st</option>
                  <option value="2nd" <?php echo e(old('district') == '2nd' ? 'selected' : ''); ?>>2nd</option>
                  <option value="3rd" <?php echo e(old('district') == '3rd' ? 'selected' : ''); ?>>3rd</option>
                  <option value="4th" <?php echo e(old('district') == '4th' ? 'selected' : ''); ?>>4th</option>
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
                    <input type="number" name="pzip" id="pzip" placeholder="zip code" value="<?php echo e(old('pzip')); ?>"
                    oninput="if(this.value.length > 4){ this.value = this.value.slice(0,4); }">
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
              <input type="checkbox" id="student" name="classification[]" value="Student" <?php echo e(is_array(old('classification'))&&in_array('Student', old('classification'))?"checked":""); ?>>
              <label for="student">Student</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="workers" name="classification[]" value="Informal Workers" <?php echo e(is_array(old('classification'))&&in_array('Informal Workers', old('classification'))?"checked":""); ?>>
              <label for="workers">Informal Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="communities" name="classification[]" value="Indigenous People & Cultural Communities" <?php echo e(is_array(old('classification'))&&in_array('Indigenous People & Cultural Communities', old('classification'))?"checked":""); ?>>
              <label for="communities">Indigenous People & Cultural Communities</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="youth" name="classification[]" value="Out of School Youth" <?php echo e(is_array(old('classification'))&&in_array('Out of School Youth', old('classification'))?"checked":""); ?>>
              <label for="youth">Out of School Youth</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="iWorkers" name="classification[]" value="Industry Workers" <?php echo e(is_array(old('classification'))&&in_array('Industry Workers', old('classification'))?"checked":""); ?>>
              <label for="iWorkers">Industry Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dWoman" name="classification[]" value="Disadvantage Woman" <?php echo e(is_array(old('classification'))&&in_array('Disadvantage Woman', old('classification'))?"checked":""); ?>>
              <label for="dWoman">Disadvantage Woman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="sParent" name="classification[]" value="Solo Parent" <?php echo e(is_array(old('classification'))&&in_array('Solo Parent', old('classification'))?"checked":""); ?>>
              <label for="sParent">Solo Parent</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="cooperatives" name="classification[]" value="Cooperatives" <?php echo e(is_array(old('classification'))&&in_array('Cooperatives', old('classification'))?"checked":""); ?>>
              <label for="cooperatives">Cooperatives</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="calamities" name="classification[]" value="Victim Of Natural Disasters and Calamities" <?php echo e(is_array(old('classification'))&&in_array('Victim Of Natural Disasters and Calamities', old('classification'))?"checked":""); ?>>
              <label for="calamities">Victim Of Natural Disasters and Calamities</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="solo" name="classification[]" value="Solo Parent's Children" <?php echo e(is_array(old('classification'))&&in_array("Solo Parent's Children", old('classification'))?"checked":""); ?>>
              <label for="solo">Solo Parent's Children</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fEnterprises" name="classification[]" value="Family Enterprises" <?php echo e(is_array(old('classification'))&&in_array('Family Enterprises', old('classification'))?"checked":""); ?>>
              <label for="fEnterprises">Family Enterprises</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="trafficking" name="classification[]" value="Victim of Survivor of Human Trafficking" <?php echo e(is_array(old('classification'))&&in_array('Victim of Survivor of Human Trafficking', old('classification'))?"checked":""); ?>>
              <label for="trafficking">Victim of Survivor of Human Trafficking</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="sCitizens" name="classification[]" value="Senior Citizens" <?php echo e(is_array(old('classification'))&&in_array('Senior Citizens', old('classification'))?"checked":""); ?>>
              <label for="sCitizens">Senior Citizens</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="mEntrepreneurs" name="classification[]" value="Micro Entrepreneurs" <?php echo e(is_array(old('classification'))&&in_array('Micro Entrepreneurs', old('classification'))?"checked":""); ?>>
              <label for="mEntrepreneurs">Micro Entrepreneurs</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dsurrenders" name="classification[]" value="Drug Dependent Surrenders" <?php echo e(is_array(old('classification'))&&in_array('Drug Dependent Surrenders', old('classification'))?"checked":""); ?>>
              <label for="dsurrenders">Drug Dependent Surrenders</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dPersonnel" name="classification[]" value="Displaced HEIs Teaching Personnel" <?php echo e(is_array(old('classification'))&&in_array('Displaced HEIs Teaching Personnel', old('classification'))?"checked":""); ?>>
              <label for="dPersonnel">Displaced HEIs Teaching Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="microentrepreneurs" name="classification[]" value="Family Member of Microentrepreneurs" <?php echo e(is_array(old('classification'))&&in_array('Family Member of Microentrepreneurs', old('classification'))?"checked":""); ?>>
              <label for="microentrepreneurs">Family Member of Microentrepreneurs</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="Dcombatants" name="classification[]" value="Rebel Returnees or Decommisioned Combatants" <?php echo e(is_array(old('classification'))&&in_array('Rebel Returnees or Decommisioned Combatants', old('classification'))?"checked":""); ?>>
              <label for="Dcombatants">Rebel Returnees or Decommisioned Combatants</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="dWorkers" name="classification[]" value="Displaced Workers" <?php echo e(is_array(old('classification'))&&in_array('Displaced Workers', old('classification'))?"checked":""); ?>>
              <label for="dWorkers">Displaced Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fFisherman" name="classification[]" value="Farmers and Fisherman" <?php echo e(is_array(old('classification'))&&in_array('Farmers and Fisherman', old('classification'))?"checked":""); ?>>
              <label for="fFisherman">Farmers and Fisherman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="idetainees" name="classification[]" value="Inmates and Detainees" <?php echo e(is_array(old('classification'))&&in_array('Inmates and Detainees', old('classification'))?"checked":""); ?>>
              <label for="idetainees">Inmates and Detainees</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="tTrainers" name="classification[]" value="TVET Trainers" <?php echo e(is_array(old('classification'))&&in_array('TVET Trainers', old('classification'))?"checked":""); ?>>
              <label for="tTrainers">TVET Trainers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="aFisherman" name="classification[]" value="Family Members of Farmers and Fisherman" <?php echo e(is_array(old('classification'))&&in_array('Family Members of Farmers and Fisherman', old('classification'))?"checked":""); ?>>
              <label for="aFisherman">Family Members of Farmers and Fisherman</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="pPersonnel" name="classification[]" value="Wounded-in-Action AFP and PNP Personnel" <?php echo e(is_array(old('classification'))&&in_array('Wounded-in-Action AFP and PNP Personnel', old('classification'))?"checked":""); ?>>
              <label for="pPersonnel">Wounded-in-Action AFP and PNP Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="eWorkers" name="classification[]" value="Currently Employed Workers" <?php echo e(is_array(old('classification'))&&in_array('Currently Employed Workers', old('classification'))?"checked":""); ?>>
              <label for="eWorkers">Currently Employed Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="eCoordinator" name="classification[]" value="Community Trng. & Employment Coordinator" <?php echo e(is_array(old('classification'))&&in_array('Community Trng. & Employment Coordinator', old('classification'))?"checked":""); ?>>
              <label for="eCoordinator">Community Trng. & Employment Coordinator</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="pnp" name="classification[]" value="Family Members of AFP and PNP killed-and-Wounded-in-Action" <?php echo e(is_array(old('classification'))&&in_array('Family Members of AFP and PNP killed-and-Wounded-in-Action', old('classification'))?"checked":""); ?>>
              <label for="pnp">Family Members of AFP and PNP killed-and-Wounded-in-Action</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="oStatus" name="classification[]" value="Employee with Contractual/Job Order Status" <?php echo e(is_array(old('classification'))&&in_array('Employee with Contractual/Job Order Status', old('classification'))?"checked":""); ?>>
              <label for="oStatus">Employee with Contractual/Job Order Status</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="fWorkers" name="classification[]" value="Returning/Repatriated Overseas Filipino Workers" <?php echo e(is_array(old('classification'))&&in_array('Returning/Repatriated Overseas Filipino Workers', old('classification'))?"checked":""); ?>>
              <label for="fWorkers">Returning/Repatriated Overseas Filipino Workers</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="iDetainees" name="classification[]" value="Family Members of Inmates and Detainees" <?php echo e(is_array(old('classification'))&&in_array('Family Members of Inmates and Detainees', old('classification'))?"checked":""); ?>>
              <label for="iDetainees">Family Members of Inmates and Detainees</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="tAlumni" name="classification[]" value="TESDA Alumni" <?php echo e(is_array(old('classification'))&&in_array('TESDA Alumni', old('classification'))?"checked":""); ?>>
              <label for="tAlumni">TESDA Alumni</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="oDependents" name="classification[]" value="Overseas Filipino Workers (OFW) Dependents" <?php echo e(is_array(old('classification'))&&in_array('Overseas Filipino Workers (OFW) Dependents', old('classification'))?"checked":""); ?>>
              <label for="oDependents">Overseas Filipino Workers (OFW) Dependents</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="uPersonnel" name="classification[]" value="Uniformed Personnel" <?php echo e(is_array(old('classification'))&&in_array('Uniformed Personnel', old('classification'))?"checked":""); ?>>
              <label for="uPersonnel">Uniformed Personnel</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="uPoor" name="classification[]" value="Urban and Rural Poor" <?php echo e(is_array(old('classification'))&&in_array('Urban and Rural Poor', old('classification'))?"checked":""); ?>>
              <label for="uPoor">Urban and Rural Poor</label>
            </div>
            <div class="input-check">
              <input type="checkbox" id="wDisabilities" name="classification[]" value="Person With Disabilities" <?php echo e(is_array(old('classification'))&&in_array('Person With Disabilities', old('classification'))?"checked":""); ?>>
              <label for="wDisabilities">Person With Disabilities</label>
            </div>


          </div>
        </div>
        <div class="btn-submit">
          <button type="submit">Next</button>
        </div>
      </form>
    </section>

  </main>
<script>
  document.getElementById('id01').style.display = 'block';

  document.addEventListener('DOMContentLoaded', function() {
    // Helper function to poll for a select element's options, then set its value.
    function pollSelect(selectId, oldValue, dispatchEvent) {
      let interval = setInterval(function() {
        let select = document.getElementById(selectId);
        if (select && select.options.length > 1) {
          console.log(`Select "${selectId}" has ${select.options.length} options. Old value: ${oldValue}`);
          if (oldValue) {
            select.value = oldValue;
            if (select.value !== oldValue) {
              console.warn(`Unable to set value "${oldValue}" on select "${selectId}".`);
            }
            if (dispatchEvent) {
              select.dispatchEvent(new Event(dispatchEvent));
            }
          }
          clearInterval(interval);
        }
      }, 300);
    }

    // Group 1: Permanent Mailing Address
    pollSelect('region', "<?php echo e(old('region')); ?>", 'change');
    pollSelect('province', "<?php echo e(old('province')); ?>", 'change');
    pollSelect('muni', "<?php echo e(old('city-municipality')); ?>", null);

    // Group 2: Birthplace Address
    pollSelect('birthplace-region', "<?php echo e(old('birthplace-region')); ?>", 'change');
    pollSelect('birthplace-province', "<?php echo e(old('birthplace-province')); ?>", 'change');
    pollSelect('birthplace-pmuni', "<?php echo e(old('birthplace-pcity-municipality')); ?>", null);

    // Group 3: Parent Address
    pollSelect('pregion', "<?php echo e(old('pregion')); ?>", 'change');
    pollSelect('pprovince', "<?php echo e(old('pprovince')); ?>", 'change');
    pollSelect('pmuni', "<?php echo e(old('pcity-municipality')); ?>", null);
  });

  // Debug-only autofill helpers
  <?php if(config('app.debug')): ?>
  (function() {
    function dispatchChange(el){ el && el.dispatchEvent(new Event('change', { bubbles:true })); }
    function firstSelectableIndex(select){
      if(!select) return -1;
      for(let i=0;i<select.options.length;i++){
        const opt = select.options[i];
        if(!opt.disabled && opt.value !== '') return i;
      }
      return -1;
    }
    function waitForOptions(selectId, min=2, timeoutMs=5000){
      return new Promise((resolve,reject)=>{
        const start = Date.now();
        const timer = setInterval(()=>{
          const el = document.getElementById(selectId);
          if(el && el.options && el.options.length >= min){ clearInterval(timer); resolve(el); }
          if(Date.now()-start>timeoutMs){ clearInterval(timer); resolve(document.getElementById(selectId)); }
        },200);
      });
    }
    async function fillCascading(regionId, provinceId, cityId){
      const regionSel = await waitForOptions(regionId);
      if(regionSel){
        const idx = firstSelectableIndex(regionSel);
        if(idx>=0){ regionSel.selectedIndex = idx; dispatchChange(regionSel); }
      }
      const provSel = await waitForOptions(provinceId);
      if(provSel){
        const idx = firstSelectableIndex(provSel);
        if(idx>=0){ provSel.selectedIndex = idx; dispatchChange(provSel); }
      }
      const citySel = await waitForOptions(cityId);
      if(citySel){
        const idx = firstSelectableIndex(citySel);
        if(idx>=0){ citySel.selectedIndex = idx; dispatchChange(citySel); }
      }
    }
    function setRadio(name, value){
      const el = document.querySelector(`input[type="radio"][name="${name}"][value="${value}"]`);
      if(el){ el.checked = true; dispatchChange(el); }
    }
    function setSelectByText(select, wanted){
      if(!select) return;
      for(let i=0;i<select.options.length;i++){
        if(select.options[i].text === wanted){ select.selectedIndex = i; dispatchChange(select); return; }
      }
      const idx = firstSelectableIndex(select);
      if(idx>=0){ select.selectedIndex = idx; dispatchChange(select); }
    }
    function setValue(id, val){ const el=document.getElementById(id); if(el){ el.value = val; el.dispatchEvent(new Event('input',{bubbles:true})); } }
    function setCheckbox(id, checked=true){ const el=document.getElementById(id); if(el){ el.checked = checked; el.dispatchEvent(new Event('change',{bubbles:true})); } }

    async function autofillTestData(){
      try{
        // Hide privacy if visible
        if(typeof acceptPrivacy === 'function'){ acceptPrivacy(); }

        // Program
        const qSel = document.getElementById('qualification');
        if(qSel){ const idx = firstSelectableIndex(qSel); if(idx>=0){ qSel.selectedIndex = idx; dispatchChange(qSel); } }

        // Learner Profile
        setValue('lname','Dela Cruz');
        setValue('fname','Juan');
        setValue('mname','Santos');
        setSelectByText(document.getElementById('suffix'),'None');

        // Address
        await fillCascading('region','province','muni');
        // Fill Number, Street via datalist (barangay)
        (function(){
          const input = document.querySelector('input[list="number-street"]');
          const list = document.getElementById('number-street');
          if (input && list && list.options && list.options.length > 0) {
            input.value = list.options[0].value;
            input.dispatchEvent(new Event('input', { bubbles: true }));
          } else {
            setValue('number-street','Poblacion');
          }
        })();
        setSelectByText(document.getElementById('dist'),'1st');
        setValue('zip','6100');
        setSelectByText(document.getElementById('nationality'),'Filipino');
        setValue('contact-number','09171234567');
        setValue('email-address',`tester${Date.now()}@example.com`);

        // Personal
        setRadio('gender','Male');
        setRadio('civil-status','Single');
        setRadio('employment','Unemployed');
        setValue('birthdate','1998-05-17');

        // Birthplace
        await fillCascading('birthplace-region','birthplace-province','birthplace-pmuni');

        // Educational Attainment
        const eduId = 'college-undergraduate';
        const eduEl = document.getElementById(eduId); if(eduEl){ eduEl.checked = true; dispatchChange(eduEl); }

        // Parent/Guardian
        setValue('plname','Dela Cruz');
        setValue('pfname','Maria');
        setValue('pmname','Reyes');
        setSelectByText(document.getElementById('psname'),'None');
        setValue('pcontact','09181234567');

        // Parent Address
        await fillCascading('pregion','pprovince','pmuni');
        (function(){
          const input = document.querySelector('input[list="pnumber-street"]');
          const list = document.getElementById('pnumber-street');
          if (input && list && list.options && list.options.length > 0) {
            input.value = list.options[0].value;
            input.dispatchEvent(new Event('input', { bubbles: true }));
          } else {
            setValue('pnumber-street','Poblacion');
          }
        })();
        setValue('pzip','6100');
        setSelectByText(document.getElementById('pdist'),'1st');

        // Classifications
        setCheckbox('student', true);
        setCheckbox('youth', true);
        setCheckbox('iWorkers', true);
      }catch(e){ console.error('Autofill error:', e); }
    }

    function clearForm(){
      const form = document.getElementById('registrationForm');
      if(!form) return;
      form.reset();
      // Clear selects to placeholder
      ['region','province','muni','birthplace-region','birthplace-province','birthplace-pmuni','pregion','pprovince','pmuni'].forEach(id=>{
        const el = document.getElementById(id);
        if(el){ el.selectedIndex = 0; dispatchChange(el); }
      });
      // Clear dynamic datalists
      const ns = document.getElementById('number-street'); if(ns) ns.innerHTML='';
      const pns = document.getElementById('pnumber-street'); if(pns) pns.innerHTML='';
    }

    const btn = document.getElementById('autofillTestDataBtn');
    if(btn){ btn.addEventListener('click', autofillTestData); }
    const clr = document.getElementById('clearFormBtn');
    if(clr){ clr.addEventListener('click', clearForm); }
  })();
  <?php endif; ?>

  document.addEventListener("DOMContentLoaded", function() {
  if (localStorage.getItem("privacyAccepted") === "true") {
    document.getElementById("id01").style.display = "none";
  } else {
    document.getElementById("id01").style.display = "block";
  }
  });

  function acceptPrivacy() {
    localStorage.setItem("privacyAccepted", "true");
    document.getElementById("id01").style.display = "none";
  }
// modal script for status of entry return
  document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("statusModal");
    var closeButton = document.querySelector(".close"); 
    var closeModalBtn = document.getElementById("modalCloseBtn");
    var modalMessageElement = document.getElementById("modalMessage");

    if (!modal || !modalMessageElement) {
        console.error("Modal elements not found.");
        return;
    }

    var showModal = "<?php echo e(session('modalMessage')); ?>";

    if (showModal.trim().length > 0) { 
        modalMessageElement.innerText = showModal;
        modal.style.display = "flex"; 
    }

    if (closeButton) {
        closeButton.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});


</script>
<?php if($errors->any()): ?>
<script>
    Swal.fire({
        title: 'Missing Information!',
        text: 'Please fill out all required fields.',
        icon: 'warning',
        confirmButtonText: 'OK'
    });
</script>
<?php endif; ?>

</div>
<div id="statusModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Application Status</h2><br>
        <p id="modalMessage"></p>
        <p class="contact-support">
            For further inquiries, please contact us at:<br>
            <strong>support@example.com</strong><br>
            or call <strong>+63 912 345 6789</strong>.
        </p>
        <button id="modalCloseBtn" class="modal-btn">Close</button>
    </div>
</div>

<!-- jQuery must load before register.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php echo $__env->make('partials.frontend-footer', ['js_file' => '/js/register.js'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/students/register.blade.php ENDPATH**/ ?>