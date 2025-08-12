@include('partials.frontend-header', [
    'show_hamburger' => true,
    'css_file' => '/css/thank_you.css',
    'title' => 'Thank You'
])

<main class="thankyou-container">
    <img src="{{ asset('image-website/mascot.png') }}" alt="NOLITC Mascot">
    <h1>Thank you!</h1>
    <h3>Your registration has been successfully submitted.</h3>
    <h3>Please check your Email for the examination link!</h3>
    <a href="{{ route('welcome') }}" class="btn">Back to home</a>
    
    {{-- Optional: quick links back to sections on the homepage --}}
    <div class="quick-links" aria-hidden="true">
        <a href="/\#programs">See Programs</a>
        <span class="sep">•</span>
        <a href="/\#updates">Latest Updates</a>
    </div>
    
    {{-- Decorative separator --}}
    <div class="thankyou-separator" aria-hidden="true"><div class="line"></div></div>
    
    {{-- Success note --}}
    <p class="note">A confirmation email has been sent to your inbox.</p>
</main>

@include('partials.frontend-footer')
