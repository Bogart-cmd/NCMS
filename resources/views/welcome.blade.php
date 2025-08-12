@include('partials.frontend-header', ['show_hamburger' => true])

    <section id="home" class="intro hero-split">
        <div class="intro-text hero-left">
            <div class="hero-content">
                <h1>Upskill Your Way to Success at NOLITC</h1>
                <p>Unlock your potential and pave the way to success with NOLITC's upskilling programs!</p>
                <a href="/register" class="intro-btn"><button>🎓 Register Now!</button></a>
            </div>
        </div>
        <div class="hero-right">
            @if(count($datas) > 0)
                <img id="intro-slideshow" src="{{ './assets/img/' . $datas[0]->image }}" alt="Group of Students" class="student slideshow-image" />
            @else
                <img src="{{ './assets/img/default.jpg' }}" alt="Default Image" class="student" />
            @endif
        </div>
    </section>

    <div class="section-separator" aria-hidden="true"><div class="line"></div></div>

    @if(count($datas) > 1)
    <style>
        .slideshow-image {
            transition: opacity 0.8s ease-in-out;
        }
        .slideshow-image.fade-out {
            opacity: 0;
        }
        .slideshow-image.fade-in {
            opacity: 1;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = [
                @foreach($datas as $img)
                    "{{ './assets/img/' . $img->image }}",
                @endforeach
            ];
            let idx = 0;
            const imgEl = document.getElementById('intro-slideshow');
            
            if (imgEl && images.length > 1) {
                function changeImage() {
                    // Fade out
                    imgEl.classList.add('fade-out');
                    
                    setTimeout(() => {
                        // Change image
                        idx = (idx + 1) % images.length;
                        imgEl.src = images[idx];
                        
                        // Fade in
                        imgEl.classList.remove('fade-out');
                        imgEl.classList.add('fade-in');
                        
                        setTimeout(() => {
                            imgEl.classList.remove('fade-in');
                        }, 100);
                    }, 400);
                }
                
                // Change image every 3 seconds with smooth transition
                setInterval(changeImage, 3000);
            }
        });
    </script>
    @endif

    <section id="about" class="about">
        <div class="about-content">
            <div class="about-left">
                <img src="image-website/mascot.png" alt="NOLITC Mascot" class="mascot">
            </div>
            <div class="about-right">
                <div class="about-text-section">
                    <img src="image-website/mascot.png" alt="NOLITC Mascot" class="mascot-inline">
                    <h3 class="about-title">About NOLITC</h3>
                    <p>
                        The Negros Occidental Language and Information Technology Center (NOLITC) is a preferred human resource provider of leading Business Process Management companies in Negros Occidental. It is the only government-run language and IT center in Negros island, duly registered and accredited by TESDA. NOLITC is a talent development initiative of the Provincial Government of Negros Occidental geared towards poverty reduction in the countryside.
                    </p>
                    <a href="{{route('know_more')}}"><button class="know">Know more!</button></a>
                </div>
                <div class="about-logos">
                    <img src="image-website/Abanse-Negrense-Logo-horizontal-Transparent 1.png" alt="abanse negrense" class="abanse">
                    <img src="image-website/nolitc inspire 1.png" alt="nolitc" class="nolitc">
                </div>
            </div>
        </div>
    </section>

    <div class="section-separator" aria-hidden="true"><div class="line"></div></div>

    <section id="programs" class="programs">
        <h1 class="program">Our Programs</h1>
        <div class="carousel-wrapper">
            <button class="carousel-arrow left" aria-label="Scroll left">&#8249;</button>
            <div class="program-cards">
                @forelse($programs as $program)
                    <div class="card">
                        @if($program->img_name)
                            <img src="{{ asset('assets/img/' . $program->img_name) }}" alt="{{ $program->name }}" class="tesda">
                        @else
                            <img src="image-website/program 1.png" alt="{{ $program->name }}" class="tesda">
                        @endif
                        <h3>{{ $program->name }}</h3>
                        <a href="{{ route('see-more', ['id' => $program->id]) }}" class="program-btn">See more</a>
                    </div>
                @empty
                    <div class="card">
                        <img src="image-website/program 1.png" alt="Programs" class="tesda">
                        <h3>Programs</h3>
                        <a href="#programs" class="program-btn">See more</a>
                    </div>
                    <div class="card">
                        <img src="image-website/program 2.png" alt="Assessment Center" class="tesda">
                        <h3>Assessment Center</h3>
                        <a href="#programs" class="program-btn">See more</a>
                    </div>
                    <div class="card">
                        <img src="image-website/program 3.png" alt="Special Programs" class="tesda">
                        <h3>Special Programs</h3>
                        <a href="#programs" class="program-btn">See more</a>
                    </div>
                @endforelse
            </div>
            <button class="carousel-arrow right" aria-label="Scroll right">&#8250;</button>
        </div>
    </section>

    <div class="section-separator" aria-hidden="true"><div class="line"></div></div>

    <section id="updates" class="updates">
        <h1>NOLITC Updates</h1>

        <div class="carousel">
        <div class="update-cards">
            @forelse($updates as $update)
                <div class="card" id="update-{{ $update->id }}">
                    @if($update->image)
                        <img src="{{ asset('assets/img/' . $update->image) }}" alt="{{ $update->title }}">
                    @elseif($update->facebook_embed)
                        <div class="facebook-embed-container">
                            {!! $update->facebook_embed !!}
                        </div>
                    @else
                        <div class="no-image-placeholder">
                            <p>No Image</p>
                        </div>
                    @endif
                    <p>{{ $update->title }}</p>
                    <span>{{ $update->formatted_date }}</span>
                    @if($update->facebook_embed)
                        <a href="#" class="read" onclick="openFacebookPost('{{ $update->facebook_embed }}')">View on Facebook</a>
                    @else
                        <a href="#" class="read">Read more</a>
                    @endif
                </div>
            @empty
                <div class="card">
                    <div class="no-image-placeholder">
                        <p>No Updates Available</p>
                    </div>
                    <p>No updates at the moment</p>
                    <span>Check back later</span>
                    <a href="#" class="read">Stay tuned</a>
                </div>
            @endforelse
        </div>
        
        <div class="carousel-controls">
            <button class="carousel-btn" id="prevUpdate" aria-label="Previous update">&#8249;</button>
            <button class="carousel-btn" id="nextUpdate" aria-label="Next update">&#8250;</button>
        </div>
    </div>
    </section>

    <div class="section-separator" aria-hidden="true"><div class="line"></div></div>

    <section id="scorecard" class="scorecard">
        <div class="container">
            <h1>Our Success Metrics</h1>
            <div class="scorecard-metrics">
                <div class="metric">
                    <div class="metric-icon">🎓</div>
                    <h3>{{ optional($scoreCard)->number_of_graduates ?? 0 }}</h3>
                    <p>Graduates</p>
                    <div class="metric-subtitle">Successfully completed programs</div>
                </div>
                <div class="metric">
                    <div class="metric-icon">💼</div>
                    <h3>{{ optional($scoreCard)->number_of_employed ?? 0 }}</h3>
                    <p>Employed</p>
                    <div class="metric-subtitle">Currently working professionals</div>
                </div>
                <div class="metric">
                    <div class="metric-icon">📈</div>
                    <h3>{{ optional($scoreCard)->employment_rate ?? 0 }}%</h3>
                    <p>Employment Rate</p>
                    <div class="metric-subtitle">Graduates successfully employed</div>
                </div>
            </div>
        </div>
    </section>

    <section id="partners" class="partners">
        <h1>Our Partners</h1>
        <div class="partner-logos">
            @php
                // chunk partners into groups of 4, to preserve the current 4-per-slide design
                $partnerChunks = $partners->chunk(4);
            @endphp

            @foreach($partnerChunks as $chunk)
            <div class="mySlides fade">
                @foreach($chunk as $partner)
                    <a href="{{ $partner->link }}" target="_blank" rel="noopener">
                        <img src="{{ asset('assets/partners_logo/' . $partner->logo) }}" alt="Partner" class="image1">
                    </a>
                @endforeach
            </div>
            @endforeach

            <div style="text-align:center">
                @for($i = 0; $i < max(1, $partnerChunks->count()); $i++)
                    <span class="dot"></span>
                @endfor
            </div>
        </div>
    </section>

@include('partials.frontend-footer')

@push('scripts')
@endpush

<script>
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe all sections
    const sections = document.querySelectorAll('.about, .programs, .updates, .scorecard, .partners');
    sections.forEach(section => {
        observer.observe(section);
    });

    // Observe card containers for staggered animations
    const cardContainers = document.querySelectorAll('.program-cards, .update-cards, .scorecard-metrics, .partner-logos');
    cardContainers.forEach(container => {
        observer.observe(container);
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.program-cards');
    const leftBtn = document.querySelector('.carousel-arrow.left');
    const rightBtn = document.querySelector('.carousel-arrow.right');
    const getScrollAmount = () => {
        if (!carousel) return 0;
        const firstCard = carousel.querySelector('.card');
        if (!firstCard) return 0;
        const cardStyles = window.getComputedStyle(firstCard);
        const cardWidth = firstCard.getBoundingClientRect().width;
        const gap = parseFloat(window.getComputedStyle(carousel).gap || '0');
        return Math.ceil(cardWidth + gap);
    };
    let programAutoScrollId;

    // Only enable horizontal carousel behavior on tablet/desktop
    const enableCarousel = () => window.matchMedia('(min-width: 768px)').matches;

    const setupCarousel = () => {
        if (!carousel || !leftBtn || !rightBtn) return;
        if (!enableCarousel()) return; // skip on mobile where cards stack vertically

        // Disable arrows and auto-scroll when content fits without horizontal scroll
        const updateControlsVisibility = () => {
            const needsScroll = carousel.scrollWidth > carousel.clientWidth + 1;
            leftBtn.style.display = needsScroll ? '' : 'none';
            rightBtn.style.display = needsScroll ? '' : 'none';
            if (!needsScroll && programAutoScrollId) {
                clearInterval(programAutoScrollId);
                programAutoScrollId = null;
            }
        };

        // Initial state
        updateControlsVisibility();

        leftBtn.addEventListener('click', () => {
            const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
            if (carousel.scrollLeft <= 0) {
                carousel.scrollTo({ left: maxScrollLeft, behavior: 'auto' });
            } else {
                carousel.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
            }
        });

        rightBtn.addEventListener('click', () => {
            const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
            const nearEnd = carousel.scrollLeft >= (maxScrollLeft - 1);
            if (nearEnd) {
                carousel.scrollTo({ left: 0, behavior: 'auto' });
            } else {
                carousel.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            }
        });

        const startProgramAutoScroll = () => {
            stopProgramAutoScroll();
            programAutoScrollId = setInterval(() => {
                const maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
                const atEnd = carousel.scrollLeft >= (maxScrollLeft - 1);
                if (atEnd) {
                    carousel.scrollTo({ left: 0, behavior: 'auto' });
                } else {
                    const nextLeft = Math.min(carousel.scrollLeft + getScrollAmount(), maxScrollLeft);
                    carousel.scrollTo({ left: nextLeft, behavior: 'smooth' });
                }
            }, 3500);
        };

        const stopProgramAutoScroll = () => {
            if (programAutoScrollId) clearInterval(programAutoScrollId);
        };

        startProgramAutoScroll();

        ['mouseenter', 'focusin', 'touchstart'].forEach(evt => {
            carousel.addEventListener(evt, stopProgramAutoScroll, { passive: true });
        });
        ['mouseleave', 'focusout', 'touchend'].forEach(evt => {
            carousel.addEventListener(evt, startProgramAutoScroll, { passive: true });
        });

        // Re-check on resize or content changes
        window.addEventListener('resize', updateControlsVisibility, { passive: true });
        const resizeObserver = new ResizeObserver(updateControlsVisibility);
        resizeObserver.observe(carousel);
    };

    setupCarousel();
    // Re-evaluate on resize/orientation change
    window.addEventListener('resize', () => {
        if (!enableCarousel() && programAutoScrollId) {
            clearInterval(programAutoScrollId);
            programAutoScrollId = null;
        }
    }, { passive: true });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Updates carousel functionality
    const updateCards = document.querySelector('.update-cards');
    const prevBtn = document.getElementById('prevUpdate');
    const nextBtn = document.getElementById('nextUpdate');
    const scrollAmount = 420; // card width + gap
    let updatesAutoScrollId;

    if (prevBtn && nextBtn && updateCards) {
        prevBtn.addEventListener('click', () => {
            updateCards.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
        
        nextBtn.addEventListener('click', () => {
            updateCards.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        // Update button states based on scroll position
        updateCards.addEventListener('scroll', () => {
            const isAtStart = updateCards.scrollLeft <= 0;
            const isAtEnd = updateCards.scrollLeft >= updateCards.scrollWidth - updateCards.clientWidth;
            
            prevBtn.disabled = isAtStart;
            nextBtn.disabled = isAtEnd;
        });

        // Initial button state
        prevBtn.disabled = true;

        // Auto-scroll updates carousel
        const startUpdatesAutoScroll = () => {
            stopUpdatesAutoScroll();
            updatesAutoScrollId = setInterval(() => {
                const maxScrollLeft = updateCards.scrollWidth - updateCards.clientWidth;
                const atEnd = updateCards.scrollLeft >= (maxScrollLeft - 1);
                const nextLeft = atEnd ? 0 : Math.min(updateCards.scrollLeft + scrollAmount, maxScrollLeft);
                updateCards.scrollTo({ left: nextLeft, behavior: 'smooth' });
            }, 4000);
        };

        const stopUpdatesAutoScroll = () => {
            if (updatesAutoScrollId) clearInterval(updatesAutoScrollId);
        };

        startUpdatesAutoScroll();

        // Pause on hover/focus, resume on leave/blur
        ['mouseenter', 'focusin', 'touchstart'].forEach(evt => {
            updateCards.addEventListener(evt, stopUpdatesAutoScroll, { passive: true });
        });
        ['mouseleave', 'focusout', 'touchend'].forEach(evt => {
            updateCards.addEventListener(evt, startUpdatesAutoScroll, { passive: true });
        });
    }
});

// Function to open Facebook posts
function openFacebookPost(embedCode) {
    // Extract the Facebook post URL from the embed code
    const urlMatch = embedCode.match(/href="([^"]+)"/);
    if (urlMatch && urlMatch[1]) {
        window.open(urlMatch[1], '_blank');
    } else {
        // Fallback: try to find any URL in the embed code
        const urlRegex = /https:\/\/[^\s"<>]+/;
        const match = embedCode.match(urlRegex);
        if (match) {
            window.open(match[0], '_blank');
        }
    }
}
</script>

<!-- Facebook SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Re-initialize Facebook embeds after page load
    if (typeof FB !== 'undefined') {
        FB.XFBML.parse();
    } else {
        // If FB SDK hasn't loaded yet, wait for it
        window.fbAsyncInit = function() {
            FB.init({
                appId: '', // Leave empty if you don't have an app ID
                cookie: true,
                xfbml: true,
                version: 'v18.0'
            });
            FB.XFBML.parse();
        };
    }
    
    // Also re-parse when updates are loaded dynamically
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' && typeof FB !== 'undefined') {
                FB.XFBML.parse();
            }
        });
    });
    
    const updateCards = document.querySelector('.update-cards');
    if (updateCards) {
        observer.observe(updateCards, { childList: true, subtree: true });
    }
});
</script>
