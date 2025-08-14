@include('partials.frontend-header', ['title' => 'Re-Application', 'css_file' => '/css/reapply.css', 'show_hamburger' => true])
    <header>
        <div class="header-content">
            <img src="image-website/logo.png" alt="NOLITC Logo" class="logo">
            <h2>NEGROS OCCIDENTAL LANGUANGE <br>AND INFORMATION TECHNOLOGY  CENTER</h2>
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav id="nav-menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#programs">Programs</a></li>
                    <li><a href="#updates">Updates</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <img src="image-website/mascot.png" alt="Mascot">
        
        <div class="message-container">
            <h1>SORRY!</h1>
            <h3>Your previous registration was declined.</h3>
            <h3>Would you like to re-apply in this course?</h3>
            <h3>NOTE: You can also apply to other programs!</h3>
            
            <div class="btn-container">
                <form id="reapplyForm" action="{{ route('reapply') }}" method="POST">
                    @csrf
                    <button type="button" class="btn" id="reapplyButton">REAPPLY</button>
                </form>

                <a href="{{ route('welcome') }}" class="btn btn-secondary">Back to Home</a>
            </div>

        </div>

    </div>


    <footer class="footer">
        <h3 class="republic">REPUBLIC OF THE PHILIPPINES</h3><br>
        <p class="content">All content is the public domain unless<br>otherwise stated</p>
        <h3 class="ph">ABOUT GOV.PH</h3><br>
        <p class="learn">Learn more about Philippine Goverment, its<br>structure, how government works and the<br>people behind it</p>
        <p class="gov1">GOV.PH</p>
        <p class="gov2">Open Data Patrol</p>
        <p class="gov3">Official Gazettte</p>

        <h3 class="goverment">GOVERMENT LINKS</h3>
        <div class="links">
          <a href="https://op-proper.gov.ph/" class="pres">Office of the President</a>
          <a href="https://www.ovp.gov.ph/" class="vice">Office of the Vice President</a>
          <a href="https://legacy.senate.gov.ph/" class="senate">Senate of the Philippines</a>
          <a href="https://www.congress.gov.ph/" class="house">House of the Representative</a>
          <a href="https://sc.judiciary.gov.ph/" class="supreme">Supreme Court</a>
          <a href="https://ca.judiciary.gov.ph/" class="appeals">Court of Appeals</a>
          <a href="https://sb.judiciary.gov.ph/" class="sandigan">Sandigan Bayan</a>
          <a href="https://www.negros-occ.gov.ph/" class="negros">Province of Negros Occidental</a>

          <h3 class="visit">Visit Us</h3>
          <p class="paglaum">Paglaum Sports Complex<br>Hernaez St.Bacolod City,<br>Negros Occidental</p>
          <p class="phone">Telephone: (034) 435 6092<br>Email: nolitc@gmail.com</p>
          <img src="image-website/phil-seal 1.png" alt="logo" class="pic">
        </div>
    </footer>
    <script>
            document.getElementById("reapplyButton").addEventListener("click", function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to submit your reapplication?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, reapply!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("reapplyForm").submit();
                    }
                });
            });
    </script>    

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Error!",
                    text: "{{ $errors->first() }}",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif
@include('partials.frontend-footer')
