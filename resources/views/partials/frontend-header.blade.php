<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'NOLITC' }}</title>
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    @if(isset($css_file))
        <link rel="stylesheet" href="{{ $css_file }}">
    @else
        <link rel="stylesheet" href="/css/welcome.css">
    @endif
</head>
<body>
    <header>
        <div class="header-content">
            <img src="image-website/logo.png" alt="NOLITC Logo" class="logo">
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