<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Global font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root { 
            --font-primary: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif; 
        }
    </style>
    <link rel="stylesheet" href="/css/see_more.css">
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    <title>Program Info - {{ $datas->name }}</title>
</head>
<body>
@include('partials.frontend-header', ['title' => 'Program Info - ' . $datas->name, 'css_file' => '/css/see_more.css', 'show_hamburger' => true])
    <main>
        <section class="qualification-banner">
            <img src="{{URL::asset('image-website/Polygon 1.png');}}" alt="polygon" class="polygon">
            <h1>PROGRAM INFO</h1>
        </section>
        <section class="qualification-details">
            <h2>{{ $datas->name }}</h2>
            <p class="hours">({{ $datas->hours }} hours)</p>
            <div class="image-container">
                <img src="{{URL::asset('assets/img/'.$datas->img_name);}}" alt="{{ $datas->name }}">
            </div>
            <p class="description">
                {{ $datas->caption }}
            </p>
        </section>
        <section class="additional-details">
            <div class="qualifications">
                <h3>QUALIFICATIONS</h3>
                <ul>
                   @foreach ($datas->qualifications as $qualification)
                    <li>{{ $qualification->qualification }}</li>
                   @endforeach
                </ul>
                <a href="/register"><button class="register-button">Register Now</button></a>
            </div>
            <div class="benefits">
                <h3>Benefits:</h3>
                <ul>
                    @foreach ($datas->benefits as $benefits)
                    <li>{{ $benefits->benefit }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="core-competencies">
                <h3>Core Competencies:</h3>
                <ul>
                    @foreach ($datas->competencies as $competencies)
                    <li>{{ $competencies->competencie }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </main>
@include('partials.frontend-footer')
</body>
</html>
