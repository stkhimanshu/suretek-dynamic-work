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
</style>

<!-- services -->
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/our_team.webp); background-position:right;">
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

<!-- Services Intro -->
<section class="events bg-light">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto text-center">
                <!-- <span class="border_text mx-auto d-inline-block">Celebrations</span> -->
                <h2 class="title mb-2"> Celebrations & Events 2025</h2>
                <p class="text-secondary mb-4">Moments That Inspire. Memories That Last.
                </p>

            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 rounded-4 overflow-hidden">
                <div class="custom_card meet-card">
                    <div class="swiper diwali">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                        </div>
                    </div>
                    <div class="card_details">
                        <h5 class="card-title fw-bold">Diwali Celebrations</h5>
                        <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                        <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 rounded-4 overflow-hidden">
                <div class="custom_card meet-card">
                    <div class="swiper navratri">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                        </div>
                    </div>
                    <div class="card_details">
                        <h5 class="card-title fw-bold">Navratri Celebrations</h5>
                        <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                        <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 rounded-4 overflow-hidden">
                <div class="custom_card meet-card">
                    <div class="swiper Holi">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                            <div class="swiper-slide"><img src="<?= $baseurl ?>/assets/images/about-us.webp" alt=""></div>
                        </div>
                    </div>
                    <div class="card_details">
                        <h5 class="card-title fw-bold">Holi Celebrations</h5>
                        <p class="text-muted mb-2"><i class="fa-regular fa-calendar me-2"></i>Oct 21, 2025</p>
                        <a href="javasript:void(0)" class="btn-primary text-white">View All</a>
                    </div>
                </div>
            </div>




        </div>
    </div>
</section>



<section class="previous-meets bg-white">

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

</section>







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