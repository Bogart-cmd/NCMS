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

    <section id="programs" class="programs">
        <h1 class="program">Programs</h1>
        <div class="carousel-wrapper">
            <button class="carousel-arrow left" aria-label="Scroll left">&#8249;</button>
            <div class="program-cards">
                <div class="card">
                    <img src="image-website/program 1.png" alt="TESDA Qualifications" class="tesda">
                    <h3>TESDA<br>Qualifications</h3>
                    <a href="{{route('tesda_qual')}}" class="program-btn"><button>See more</button></a>
                </div>
                <div class="card">
                    <img src="image-website/program 2.png" alt="TESDA Accredited Assessment Center" class="tesda">
                    <h3>TESDA Accredited <br> Assessment Center</h3>
                    <a href="#" class="program-btn"><button>See more</button></a>
                </div>
                <div class="card">
                    <img src="image-website/program 3.png" alt="Special Programs" class="tesda">
                    <h3>Special <br> Programs</h3>
                    <a href="#" class="program-btn"><button>See more</button></a>
                </div>
            </div>
            <button class="carousel-arrow right" aria-label="Scroll right">&#8250;</button>
        </div>
    </section>

    <section id="updates" class="updates">
        <h1>NOLITC Updates</h1>

        <div class="carousel">
        <div class="update-cards">
            <div class="card" id="mindset">
                <img src="image-website/mask group 3.jpg" alt="Update 1">
                <p>Talk Focusing Positive Mindset</p>
                <span>May 7, 2024</span>
                <a href="#" class="read">Read more</a>
            </div>

            <div class="card" id="216th">
                <img src="image-website/Mask group.png" alt="Update 2">
                <p>NOLITC's 216th Culmination Ceremony</p>
                <span>May 7, 2024</span>
                <a href="#" class="read">Read more</a>
            </div>

            <div class="card" id="panaad">
                <img src="image-website/Mask group (1).png" alt="Update 3">
                <p>2nd Panaad sa Negros Festival: MLBB <br> Governor's Cup Esports Competition 2024</p>
                <span class="date">April 18, 2024</span>
                <a href="#" class="more">Read more</a>
            </div>

            <div class="card" id="215th" >
                <img src="image-website/mask group 2.jpg" alt="Update 4">
                <p>NOLITC's 215th Culmination Ceremony</p>
                <span>April 12, 2024</span>
                <a href="#" class="read">Read more</a>
            </div>

            <!-- Facebook Post Embed Example -->
            <div class="card">
                <div class="fb-post" data-href="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FNOLITC%2Fposts%2Fpfbid02example" data-width="400">
                    <div class="fb-post-placeholder">
                        <p>Facebook Post Loading...</p>
                    </div>
                </div>
                <p>Latest Facebook Update</p>
                <span>Recent</span>
                <a href="#" class="read">View on Facebook</a>
            </div>
        </div>
        
        <div class="carousel-controls">
            <button class="carousel-btn" id="prevUpdate" aria-label="Previous update">&#8249;</button>
            <button class="carousel-btn" id="nextUpdate" aria-label="Next update">&#8250;</button>
        </div>
    </div>
    </section>

    <section id="scorecard" class="scorecard">
        <h1>Our score card</h1>
        <div class="scorecard-metrics">
            <div class="metric">
                <h3>{{$scoreCard->number_of_graduates}}</h3>
                <p>Graduates</p>
            </div>
            <div class="metric">
                <h3>{{$scoreCard->number_of_employed}}</h3>
                <p>Employed</p>
            </div>
            <div class="metric">
                <h3>{{$scoreCard->employment_rate}}%</h3>
                <p>Employment Rate</p>
            </div>
        </div>
    </section>

    <section id="partners" class="partners">
        <h1>Our partners</h1>
        <div class="partner-logos">

            <div class="mySlides fade">
                <a href="https://www.negros-occ.gov.ph/abanse-negrense/"><img src="image-website/abanse.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.deped.gov.ph/"><img src="image-website/education.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.tesda.gov.ph/"><img src="image-website/tesda.png" alt="Partner 1" class="image1"></a>
                <a href="https://dict.gov.ph/"><img src="image-website/dict.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://tech4edcenters.wordpress.com/what-is-tech4ed/"><img src="image-website/tech4ed.png" alt="Partner 1" class="image1"></a>
                <a href="https://nt.gov.au/"><img src="image-website/northern.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.hugedomains.com/domain_profile.cfm?d=bnefit.com"><img src="image-website/bnefit.png" alt="Partner 1" class="image1"></a>
                <a href="https://afs.org/"><img src="image-website/afs.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.animationcouncil.org/"><img src="image-website/acpi.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.facebook.com/OutdoMediaSolutions/"><img src="image-website/outdo.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.tooncityanimation.com/Home.php"><img src="image-website/toon.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.coderstribe.net/"><img src="image-website/coders tribe.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.facebook.com/stratiumsoftware/"><img src="image-website/stratium.png" alt="Partner 1" class="image1"></a>
                <a href="https://transcom.com/"><img src="image-website/transcom.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.linkedin.com/company/arbcallfacilitiesinc"><img src="image-website/arb.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.ttec.com/"><img src="image-website/teletech.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.panasiaticsolutions.com/"><img src="image-website/panasiatic.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.concentrix.com/"><img src="image-website/concentrix.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.focusservices.com/"><img src="image-website/focus.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.iqor.com/"><img src="image-website/iqor.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.ubiquity.com/"><img src="image-website/ubiq.png" alt="Partner 1" class="image1"></a>
            </div>

            <div class="mySlides fade">
                <a href="https://www.servicefirstcx.com/"><img src="image-website/service.png" alt="Partner 1" class="image1"></a>
                <a href="https://www.teleperformance.com/"><img src="image-website/teleporformance.png" alt="Partner 1" class="image1"></a>
            </div>


            <div style="text-align:center" >
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
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
    const scrollAmount = 340; // match card width

    if (leftBtn && rightBtn && carousel) {
        leftBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
        rightBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Updates carousel functionality
    const updateCards = document.querySelector('.update-cards');
    const prevBtn = document.getElementById('prevUpdate');
    const nextBtn = document.getElementById('nextUpdate');
    const scrollAmount = 420; // card width + gap

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
    }
});
</script>

<!-- Facebook SDK -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0"></script>
