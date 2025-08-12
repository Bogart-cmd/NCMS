    <footer class="footer site-footer">
        <div class="footer-container">
            <div class="footer-col">
                <img src="<?php echo e(asset('image-website/phil-seal 1.png')); ?>" alt="Philippine Seal" class="pic">
            </div>
            <div class="footer-col">
                <h3 class="ph">ABOUT GOV.PH</h3>
                <p class="learn">Learn more about Philippine Government, its<br>structure, how the government works and the<br>people behind it</p>
                <div class="gov-minor">
                    <p class="gov1">GOV.PH</p>
                    <p class="gov2">Open Data Patrol</p>
                    <p class="gov3">Official Gazettte</p>
                </div>
            </div>
            <div class="footer-col">
                <h3 class="goverment">GOVERMENT LINKS</h3>
                <div class="gov-links">
                    <a href="https://op-proper.gov.ph/" class="pres">Office of the President</a>
                    <a href="https://www.ovp.gov.ph/" class="vice">Office of the Vice President</a>
                    <a href="https://legacy.senate.gov.ph/" class="senate">Senate of the Philippines</a>
                    <a href="https://www.congress.gov.ph/" class="house">House of the Representative</a>
                    <a href="https://sc.judiciary.gov.ph/" class="supreme">Supreme Court</a>
                    <a href="https://ca.judiciary.gov.ph/" class="appeals">Court of Appeals</a>
                    <a href="https://sb.judiciary.gov.ph/" class="sandigan">Sandigan Bayan</a>
                    <a href="https://www.negros-occ.gov.ph/" class="negros">Province of Negros Occidental</a>
                </div>
            </div>
            <div class="footer-col">
                <h3 class="republic">REPUBLIC OF THE PHILIPPINES</h3>
                <p class="content">All content is the public domain unless<br>otherwise stated</p>
                <h3 class="visit">Visit Us</h3>
                <p class="paglaum">Paglaum Sports Complex<br>Hernaez St.Bacolod City,<br>Negros Occidental</p>
                <p class="phone">Telephone: (034) 435 6092<br>Email: nolitc@gmail.com</p>
            </div>
        </div>
    </footer>

    <!-- Global header behavior and back-to-top -->
    <script src="<?php echo e(asset('js/header.js')); ?>?v=<?php echo e(time()); ?>" defer></script>

    <?php if(isset($js_file)): ?>
        <script src="<?php echo e($js_file); ?>?v=<?php echo e(time()); ?>" defer></script>
    <?php else: ?>
        <script src="<?php echo e(asset('js/welcome.js')); ?>?v=<?php echo e(time()); ?>" defer></script>
    <?php endif; ?>
</body>
</html> <?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/partials/frontend-footer.blade.php ENDPATH**/ ?>