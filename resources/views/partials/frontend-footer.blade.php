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

    @if(isset($js_file))
        <script src="{{ $js_file }}"></script>
    @else
        <script src="js/welcome.js"></script>
    @endif
</body>
</html> 