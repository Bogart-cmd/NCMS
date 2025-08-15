<?php echo $__env->make('partials.frontend-header', ['title' => 'Know More', 'css_file' => '/css/about.css', 'show_hamburger' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="header-title">
        <a href="<?php echo e(route('welcome')); ?>" class="back-btn" aria-label="Back to Home"><span aria-hidden="true">←</span> Back to Home</a>
        <h1>About NOLITC</h1>
    </div>

    <main class="about-wrapper">

    <div class="history about-card">
        <div class="history-content">
            <div class="history-text">
                <h2 class="nolitic">HISTORY OF NOLITC</h2>
                <p class="address">To address the gap in the human resource requirements of BPO companies relocating in Negros Occidental, the provincial government under the leadership of the late Governor Joseph G. Marañon established the Negros Occidental Language and Information Technology Center in 2008. It was created pursuant to Sangguniang Panlalawigan Ordinance No. 001, series of 2008.With Marañon's untimely demise in March 12, 2009, former Governor Isidro P. Zayco took over and continued the legacy program of his predecessor.The training center was inaugurated in September 15, 2009 as a division under the Economic Enterprise Development Department of the Provincial Government.
                    In 2010, the Technological Education and Skills Development Authority (TESDA) granted authority to the center to offer English Language Proficiency and Contact Center Services NC II.</p>

                    <p class="second">In October 2011, the training center started the implementation of the Training for Work Scholarship Program (TWSP) in partnership with TESDA and the Industry-Training for Work Scholarship Program (I-TWSP) in collaboration with the National ICT Confederation of the Philippines (NICP), Business Processing Association of the Philippines and Bacolod-Negros Federation for ICT.</p>

                    <p class="third">Since then, it has produced two thousand graduates in the call center training and other programs, 70 percent of which, have had gainful employment in the BPO industry and other companies.</p>
            </div>
            <div class="mascot-container">
                <img src="image-website/mascot.png" alt="NOLITC Mascot" class="mascot">
            </div>
        </div>
    </div>

        <hr class="line">

        <div class="about-grid">
        <div class="vision about-card">
            <img src="image-website/logo.png" alt="NOLITC LOGO" class="bert">
            <h1>Vision</h1>
            <p>A leading institution that inspires to provide relevant and technology-driven human resource programs; promotes <b>GENDER RESPONSIVE SERVICES</b> and produces globally-ready workforce in various competitive industries.</p>
        </div>

        <div class="mission about-card">
            <img src="image-website/logo.png" alt="NOLITC LOGO" class="logo">
            <h1>Mission</h1>
            <p>A leading institution that nurtures and empowers globally competitive workplace; helps build a <b>GENDER-FAIR SOCIETY</b> and enables inclusive and sustainable growth by 2030.</p>

        </div>
        </div>

        <hr class="line1">

        <div class="core about-card">
            <img src="image-website/logo.png" alt="NOLITC LOGO" class="nolitc">
            <h1 class="values">Core Values</h1>
            <h3>NOLITC INSPIRE</h3>
            <p>
            <b class="bold">Ingenuity</b> – Learning experience inspires creativity and innovation. <br>
            <b class="bold">Nationalism</b> – Learning experience inculcates love of country and fellowmen as a strong motivation to contribute to development. <br>
            <b class="bold">Social Empowerment</b> – Learning experience contributes to social awareness of stakeholders. <br>
            <b class="bold">Professionalism</b> – Learning experience inculcates proper work ethics and attitudes. <br>
            <b class="bold">Independence</b> – Learning experience motivates self-reliance, critical thinking and emotional stability. <br>
            <b class="bold">Respect and Responsibility</b> – Learning experience instills utmost respect for institution, gender and cultural diversity. <br>
            <b class="bold">Excellence</b> – Learning experience instills the principle that any endeavor is an opportunity to excel and achieve goals in life. <br>
            <b class="bold">Purpose and Goal</b> - To enhance the adeptness, competency and efficiency in English and other foreign languages and technology skills of Negrenses, especially, students / trainees in public schools and out–of–school youth.
            </p>

        </div>

        <hr class="line2">

        <div class="about-grid">
        <div class="qualobj about-card">
            <h1 class="objectives">Quality Objectives</h1>
            <p>
                To enhance the knowledge, skills and attitudes of young Negrenses, particularly students in public schools and out-of-school youth, in the utilization of information and communication technology (ICT);
                To improve the knowledge, skills and attitudes of trainees in English and other international languages;
                To provide opportunities for holistic development through employment in call centers and other industries;
                To instill and foster the appropriate personal and social qualities to become concerned, involved, productive and patriotic citizens of the country;
            </p>
            <p>To strengthen and increase human resource and development linkages with local and international organizations.</p>
        </div>

        <div class="qualstate about-card">
            <h1 class="statement">Quality Statement</h1>
            <p>NOLITC commits to deliver quality service to its clientele through : </p>
            <h3><b>CARES</b></h3>
            <ul class="list">
                <li><b>C</b>ommitted</li>
                <li><b>A</b>ccountable</li>
                <li><b>R</b>eliable</li>
                <li><b>E</b>ffcient and Effective</li>
                <li><b>S</b>ervices</li>
            </ul>
        </div>
        </div>

    </main>

<?php echo $__env->make('partials.frontend-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/about.blade.php ENDPATH**/ ?>