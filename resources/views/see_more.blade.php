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
