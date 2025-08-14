<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
  <!-- Global font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  

  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root { 
      --font-primary: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif; 
    }
    html, body, button, input, select, textarea { 
      font-family: var(--font-primary) !important; 
    }
    /* Ensure admin pages remain scrollable regardless of global overrides */
    /* Keep admin pages scrollable even if frontend uses body-only scrolling */
    html { overflow-y: auto !important; }
    body { overflow-y: auto !important; overscroll-behavior-y: contain; }
  </style>
  <link rel="stylesheet" href="/css/header-footer.css?v=<?php echo e(time()); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <script src="//unpkg.com/alpinejs" defer></script>

  <title><?php echo e($title); ?></title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-green-100">
<?php /**PATH C:\xampp\htdocs\ncms_turn_over-main\resources\views/partials/header.blade.php ENDPATH**/ ?>