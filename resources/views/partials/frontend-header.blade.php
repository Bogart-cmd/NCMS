<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'NOLITC' }}</title>
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    <!-- Global font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Always load page-specific CSS first (if any), then load shared header/footer, then global welcome.css -->
    @if(isset($css_file))
        <link rel="stylesheet" href="{{ $css_file }}">
    @endif
    <link rel="stylesheet" href="/css/header-footer.css">
    <link rel="stylesheet" href="/css/welcome.css">
    <style>
        :root { 
            --font-primary: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif; 
        }
        html, body, button, input, select, textarea { 
            font-family: var(--font-primary) !important; 
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-content">
            <img src="{{ asset('image-website/logo.png') }}" alt="NOLITC Logo" class="logo">
            <h2>NEGROS OCCIDENTAL LANGUANGE <br>AND INFORMATION TECHNOLOGY  CENTER</h2>
            @if(isset($show_hamburger) && $show_hamburger)
                <button class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            @endif
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
    </header> 