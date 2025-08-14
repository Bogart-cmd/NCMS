<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'NOLITC'); ?></title>
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    <!-- Global font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Always load page-specific CSS first (if any), then load shared header/footer, then global welcome.css -->
    <?php if(isset($css_file)): ?>
        <link rel="stylesheet" href="<?php echo e($css_file); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="/css/header-footer.css?v=<?php echo e(time()); ?>">
    <link rel="stylesheet" href="/css/welcome.css?v=<?php echo e(time()); ?>">
    <style>
        :root { 
            --font-primary: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif; 
        }
        html, body, button, input, select, textarea { 
            font-family: var(--font-primary) !important; 
        }
        /* Frontend scroll container setup */
        html, body { height: 100%; }
        body { overflow: hidden !important; }
    </style>
</head>
<body>
    <div id="page-scroll" class="page-scroll">
    <header class="site-header">
        <div class="header-content">
            <img src="<?php echo e(asset('image-website/logo.png')); ?>" alt="NOLITC Logo" class="logo">
            <h2>NEGROS OCCIDENTAL LANGUANGE <br>AND INFORMATION TECHNOLOGY  CENTER</h2>
            <?php if(isset($show_hamburger) && $show_hamburger): ?>
                <button class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            <?php endif; ?>
            <nav id="nav-menu">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/#programs">Programs</a></li>
                    <li><a href="/#updates">Updates</a></li>
                    <li><a href="/#about">About Us</a></li>
                    <li><a href="/#contact">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header> <?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/partials/frontend-header.blade.php ENDPATH**/ ?>