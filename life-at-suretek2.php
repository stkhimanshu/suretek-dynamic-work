<!-- header -->
<?php
$title = "Life at Suretek | Suretek Infosoft";
$description = "Our team of leaders, developers, and designers at Suretek Infosoft work together to create cutting-edge solutions that transform businesses globally.";
$keywords = "leadership team, development team, design team, Suretek Infosoft experts, software engineering team, collaborative IT team";
$url = "https://www.suretekinfosoft.com/team.php";

// og image
$ogImage = "https://www.suretekinfosoft.com/assets/images/og-image.webp";
include("components/header.php")
?>
<!-- header -->

<style>
    .card_details {
        margin-top: 0px;
        z-index: 100;
        position: relative;
        background: rgba(255, 255, 255, 1);
        padding: 1rem;
        backdrop-filter: blur(10px);
    }

    .custom_card {
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
    }
    .meet-card img {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    height: 310px;
    width: 100%;
}
.bg-light-purple {
    background: #fef5ff;
}
</style>

<!-- services -->
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/independent-day/1.jpg); background-position:right;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Vibrant Suretek Vibes</h1>
                <p class="fs-5 mt-3 mb-4">
                    At Suretek Infosoft, we nurture a vibrant and inclusive workplace where collaboration, creativity, and continuous learning drive excellence. We celebrate achievements, empower growth, and inspire our people to make a meaningful impact.We’re also dedicated to building a better tomorrow through impactful CSR initiatives.

                </p>
                <!-- <a href="#team" title="Explore Our Team" class="py-3 px-4 btn btn-dark rounded fs-5">
                    Explore Our Team <i class="fa-regular fa-arrow-up-right ms-2"></i>
                </a> -->
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Life at Suretek</li>
                </ul>
            </div>

        </div>
    </div>
</section>
<!-- services -->

<!-- Event 2026 -->
<section class="bg-light">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto text-center">
                <span class="border_text mx-auto d-inline-block">Celebrations</span>
                <h2 class="title mb-2"> Celebrations & Events 2026</h2>
                <p class="text-secondary mb-4">Little moments. Lasting memories. </p>

            </div>
        </div>
        <div class="row">
            <div class="swiper moments2026">

                <div class="swiper-wrapper">
                       <!-- Slides -->
                    <div class="swiper-slide">
                      <a href="/event/lohri-2026.php" title="Suretek lohri Celebration" class="text-dark">  <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/lohri/7.jpeg" alt="Suretek Lohri Celebration">

                            <div class="card_details">
                                <h5 class="card-title fw-bold mb-2">Lohri Celebration
                                </h5>
                                <!-- <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p> -->
                                <a href="/event/lohri-2026.php" class="btn-primary text-white">View All</a>
                            </div>
                        </div></a>
                    </div>


                </div>


            </div>
            <!-- <div class="moments-btn d-flex gap-2 justify-content-center py-2">
                <div class="momentPrevious1 btn rounded-pill border border-1 bg-white fs-5 text-default "><i class="fa-solid fa-angle-left"></i></div>
                <div class="momentNext1 btn rounded-pill border border-1 bg-white fs-5 text-default "><i class="fa-solid fa-angle-right"></i></i></div>
            </div> -->
        </div>


    </div>
</section>

<!-- End 2026 -->

<!-- event2025 -->
<section class="bg-light-purple">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto text-center">
                <!-- <span class="border_text mx-auto d-inline-block">Celebrations</span> -->
                <h2 class="title mb-2"> Celebrations & Events 2025</h2>
                <p class="text-secondary mb-4">Moments That Inspire. Memories That Last.
                </p>

            </div>
        </div>
        <div class="row">
            <div class="swiper moments2025">

                <div class="swiper-wrapper">
                       <!-- Slides -->
                    <div class="swiper-slide">
                      <a href="/event/Independence-2025.php" title="Suretek Independence day Celebration" class="text-dark">  <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/independent-day/1.jpg" alt="Suretek Diwali Celebration">

                            <div class="card_details">
                                <h5 class="card-title fw-bold mb-2">Independence day
                                </h5>
                                <!-- <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p> -->
                                <a href="/event/Independence-2025.php" class="btn-primary text-white">View All</a>
                            </div>
                        </div></a>
                    </div>
                    <!-- Slides -->
                    <div class="swiper-slide">
                      <a href="/event/diwali-2025.php" title="Suretek Diwali Celebration" class="text-dark">  <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/diwali-2025/7.jpeg" alt="Suretek Diwali Celebration">

                            <div class="card_details">
                                <h5 class="card-title fw-bold mb-2">Diwali Bash
                                </h5>
                                <!-- <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p> -->
                                <a href="/event/diwali-2025.php" class="btn-primary text-white">View All</a>
                            </div>
                        </div></a>
                    </div>
                    <div class="swiper-slide">
                          <a href="/event/navratri-2025.php" title="Suretek Navratri Celebration" class="text-dark"> 
                            <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/garba/14.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold mb-2">Colors of Navratri- Dandiya Eve
                                </h5>
                                <!-- <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p> -->
                                <a href="/event/navratri-2025.php" class="btn-primary text-white">View All</a>
                            </div>
                        </div>
</a>
                    </div>
                    <div class="swiper-slide">
                           <a href="/event/thanksgiving-2025.php" title="Suretek thanksgiving Celebration" class="text-dark"> 
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/thanksgiving/7.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold mb-2">Thanksgiving
                                </h5>
                                <!-- <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p> -->
                                <a href="event/thanksgiving-2025.php" class="btn-primary text-white">View All</a>
                            </div>
                        </div>
</a>
                    </div>
                    <div class="swiper-slide">
                         <a href="/event/christmas-2025.php" title="Suretek thanksgiving Celebration" class="text-dark"> 
                              <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/christmas_newyear/7.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold mb-2">Christmas & New Year</h5>
                                <!-- <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p> -->
                                <a href="/event/christmas-2025.php" class="btn-primary text-white">View All</a>
                            </div>
                        </div>
</a>
                    </div>

                </div>


            </div>
            <div class="moments-btn d-flex gap-2 justify-content-center py-2">
                <div class="momentPrevious btn rounded-pill border border-1 bg-white fs-5 text-default "><i class="fa-solid fa-angle-left"></i></div>
                <div class="momentNext btn rounded-pill border border-1 bg-white fs-5 text-default "><i class="fa-solid fa-angle-right"></i></i></div>
            </div>
        </div>


    </div>
</section>

<!-- event 2024 -->
<!-- <section class="bg-white">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto text-center">
              
                <h2 class="title mb-2"> Celebrations & Events 2024</h2>
                <p class="text-secondary mb-4">Little moments. Lasting memories..

                </p>

            </div>
        </div>
        <div class="row">
            <div class="swiper moments2024">

                <div class="swiper-wrapper">
                 
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/community-services.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Community Commitment </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/diwali-image.jpg" alt="Diwali Celebration">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Diwali Bash
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/garba.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Colors of Navratri- Dandiya Eve
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/holi.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Crazy Holi
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
            <div class="moments-btn d-flex gap-2 justify-content-center py-2">
                <div class="momentPrevious2 btn rounded-pill border border-1 bg-white fs-5 text-default"><i class="fa-solid fa-angle-left"></i></div>
                <div class="momentNext2 btn rounded-pill border border-1 bg-white fs-5 text-default"><i class="fa-solid fa-angle-right"></i></i></div>
            </div>
        </div>


    </div>
</section> -->

<!--event 2023 -->
<!-- <section class="bg-light">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto text-center">
                <h2 class="title mb-2"> Celebrations & Events 2023</h2>
                <p class="text-secondary mb-4">Light up moments. Hold on to memories.
                </p>

            </div>
        </div>
        <div class="row">
            <div class="swiper moments2023">

                <div class="swiper-wrapper">
                
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/community-services.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Community Commitment </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/diwali-image.jpg" alt="Diwali Celebration">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Diwali Bash
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/garba.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Colors of Navratri- Dandiya Eve
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/holi.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Crazy Holi
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
            <div class="moments-btn d-flex gap-2 justify-content-center py-2">
                <div class="momentPrevious3 btn rounded-pill border border-1 bg-white fs-5 text-default"><i class="fa-solid fa-angle-left"></i></div>
                <div class="momentNext3 btn rounded-pill border border-1 bg-white fs-5 text-default"><i class="fa-solid fa-angle-right"></i></i></div>
            </div>
        </div>


    </div>
</section> -->
<!-- <section class="bg-white">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto text-center">
                <h2 class="title mb-2"> Celebrations & Events 2022</h2>
                <p class="text-secondary mb-4">Light up moments. Hold on to memories.
                </p>

            </div>
        </div>
        <div class="row">
            <div class="swiper moments2022">

                <div class="swiper-wrapper">
                    
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/community-services.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Community Commitment </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/diwali-image.jpg" alt="Diwali Celebration">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Diwali Bash
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/garba.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Colors of Navratri- Dandiya Eve
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="custom_card meet-card">
                            <img src="<?= $baseurl ?>/assets/images/life-at-suretek/holi.jpg" alt="">

                            <div class="card_details">
                                <h5 class="card-title fw-bold">Crazy Holi
                                </h5>
                                <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                                <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
            <div class="moments-btn d-flex gap-2 justify-content-center py-2">
                <div class="momentPrevious4 btn rounded-pill border border-1 bg-white fs-5 text-default"><i class="fa-solid fa-angle-left"></i></div>
                <div class="momentNext4 btn rounded-pill border border-1 bg-white fs-5 text-default"><i class="fa-solid fa-angle-right"></i></i></div>
            </div>
        </div>


    </div>
</section> -->






<!-- <section class="previous-meets bg-white">

    <div class="container">

        <h2 class="title text-center ">Our Moments Timeline</h2>
        <p class="text-secondary mb-4 text-center mb-5">Journey of Joy, Growth & Togetherness
        </p>

        <div class="row g-4">



            <div class="col-md-4">

                <a href="javascript:void(0)" title="Moments-2024" class="card  w-100 h-100 border-0 shadow-sm past-meet-card">

                    <div class="img-container">

                        <img src="<?= $baseurl ?>assets/images/country/uae.webp" class="card-img-top grayscale" alt="UAE - Suretek Infosoft" title="UAE - Suretek Infosoft">

                    </div>

                    <div class="card-body">

                        <h5 class="card-title fw-bold" style="color:#111827;">Moments 2024</h5>

                        <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i> 2024</p>

                        <p class="card-text text-secondary">Building Bonds, Creating Memories, Growing Together</p>

                    </div>

                </a>

            </div>



            <div class="col-md-4">

                <a href="javascript:void(0)" title="Moments-2023" class="card h-100 w-100 border-0 shadow-sm past-meet-card">

                    <div class="img-container">

                        <img src="<?= $baseurl ?>assets/images/country/sweden.webp" class="card-img-top grayscale" alt="Sweden - Suretek Infosoft" title="Sweden - Suretek Infosoft">

                    </div>

                    <div class="card-body ">

                        <h5 class="card-title fw-bold" style="color:#111827;">Moments 2023</h5>

                        <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>2023</p>

                        <p class="card-text text-secondary">Moments That Inspire, Memories That Last</p>

                    </div>

                </a>

            </div>



            <div class="col-md-4">

                <a href="javascript:void(0)" title="Moments-2022" class="card  w-100 h-100 border-0 shadow-sm past-meet-card">

                    <div class="img-container">

                        <img src="<?= $baseurl ?>assets/images/country/netherland.webp" class="card-img-top grayscale" alt="Netherlands - Suretek Infosoft" title="Netherlands - Suretek Infosoft">

                    </div>

                    <div class="card-body">

                        <h5 class="card-title fw-bold" style="color:#111827;">Moments 2022</h5>

                        <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>2022</p>

                        <p class="card-text text-secondary">Moments That Reflect Our Spirit and Togetherness</p>

                    </div>

                </a>

            </div>


        </div>





    </div>

</section> -->







<section class="call clean-cta">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h5 class="text_default d-block mx-auto mb-3">Let’s Collaborate</h5>
                <h2 class="title">Let’s Build Something Powerful, Together!</h2>
                <p class="cta-text">
                    From small MVPs to enterprise-grade platforms, Suretek Infosoft helps turn your ideas into scalable, high-performance solutions. Let’s discuss how we can build the right software for your business.
                </p>
                <a href="<?= $baseurl ?>contact-us.php" class="butn mx-auto" title="Schedule a Free Consultation">Schedule a Free Consultation</a>
            </div>
        </div>
    </div>
</section>


<?php
include("components/footer.php")
?>
<!-- footer -->