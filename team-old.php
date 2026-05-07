<!-- header -->
<?php
$title = "Our Team | Suretek Infosoft";
$description = "Our team of leaders, developers, and designers at Suretek Infosoft work together to create cutting-edge solutions that transform businesses globally.";
$keywords = "leadership team, development team, design team, Suretek Infosoft experts, software engineering team, collaborative IT team";
$url = "https://www.suretekinfosoft.com/team.php";

// og image
$ogImage = "https://www.suretekinfosoft.com/assets/images/og-image.webp";
include("components/header.php")
?>
<!-- header -->

<!-- services -->
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/our_team.webp); background-position:right;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Where Passion Meets Possibilities</h1>
                <p class="fs-5 mt-3 mb-4">
                    At Suretek Infosoft, our strength lies in our people. From visionary developers to innovative designers and strategic leaders, our team collaborates to deliver cutting-edge digital solutions that drive business growth and technological excellence.
                </p>
                <a href="#team" title="Explore Our Team" class="py-3 px-4 btn btn-dark rounded fs-5">
                    Explore Our Team <i class="fa-regular fa-arrow-up-right ms-2"></i>
                </a>
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Our Team</li>
                </ul>
            </div>

        </div>
    </div>
</section>
<!-- services -->

<!-- Services Intro -->
<section class="servicess">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <span class="border_text mx-auto d-inline-block">Our Team</span>
                <h2 class="title mb-2">Meet our Team</h2>
                <p class="text-secondary mb-4">Our people are at the heart of everything we do. Our talented team is the driving force behind us. We're proud to foster a collaborative and fun environment where everyone's voice is valued, and work-life balance is a priority.</p>
                <a href="#team" class="btn btn-dark rounded-pill px-5 py-3 shadow-sm" title="To Know More">To Know More <i class="fa fa-arrow-down"></i></a>
                <!-- <img src="<?= $baseurl ?>assets/images/team.webp" alt="Our Team - Suretek Infosoft" title="Our Team - Suretek Infosoft" class="img-fluid rounded-4 mt-4"> -->
            </div>
        </div>
    </div>
</section>


<!-- Services Intro -->
<!-- <section class="team_details bg-light" id="team">
    <div class="container">
        <div class="row">
            
            <div class="col-md-8 mx-auto text-center mb-5">
                <h2 class="title mb-2">Meet the leaders shaping our vision.</h2>
                <p class="text-secondary fs-6 mb-4">
                    Leadership is the cornerstone of progress, guiding organizations toward their goals with clarity and purpose.
                    At Suretek Infosoft, this philosophy drives everything we do.
                </p>
            </div>

            
            <div class="col-md-6 mx-auto">
                <div class="row row-cols-md-2 row-cols-2">
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Ritesh Suri - Suretek Infosoft" title="Ritesh Suri - Suretek Infosoft"></div>
                        <div class="text-center">
                            <h4>Ritesh Suri</h4>
                            <p>Founder & Director</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Sanjay Verma - Suretek Infosoft" title="Sanjay Verma - Suretek Infosoft"></div>
                        <div class="text-center">
                            <h4>Sanjay Verma</h4>
                            <p>Vice President</p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12 mt-5">
                <div class="row row-cols-3 align-items-center mb-4 justify-content-center">
                    <div class="col col-3">
                        <hr>
                    </div>
                    <div class="col-md-6 col-lg-3 col-6 mx-auto text-center">
                        <h2 class="title">Dev Team</h2>
                    </div>
                    <div class="col col-3">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row row-cols-md-5 gy-4 row-cols-2 justify-content-center">
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Amit Sharma - Suretek" title="Amit Sharma - Suretek"></div>
                        <div class="text-center">
                            <h4>Amit Sharma</h4>
                            <p>Frontend Developer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Priya Nair - Suretek" title="Priya Nair - Suretek"></div>
                        <div class="text-center">
                            <h4>Priya Nair</h4>
                            <p>Backend Developer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Karan Patel - Suretek" title="Karan Patel - Suretek"></div>
                        <div class="text-center">
                            <h4>Karan Patel</h4>
                            <p>Fullstack Engineer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Sneha Iyer - Suretek" title="Sneha Iyer - Suretek"></div>
                        <div class="text-center">
                            <h4>Sneha Iyer</h4>
                            <p>AI/ML Engineer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Rohit Das - Suretek" title="Rohit Das - Suretek"></div>
                        <div class="text-center">
                            <h4>Rohit Das</h4>
                            <p>DevOps Engineer</p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12 mt-5">
                <div class="row row-cols-3 align-items-center mb-4 justify-content-center">
                    <div class="col col-2">
                        <hr>
                    </div>
                    <div class="col-md-6 col-lg-3 col-8 mx-auto text-center">
                        <h2 class="title">Design Team</h2>
                    </div>
                    <div class="col col-2">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row row-cols-md-5 row-cols-2 gy-4 justify-content-center">
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Ananya Rao - Suretek" title="Ananya Rao - Suretek"></div>
                        <div class="text-center">
                            <h4>Ananya Rao</h4>
                            <p>UI/UX Designer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Vikas Gupta - Suretek" title="Vikas Gupta - Suretek"></div>
                        <div class="text-center">
                            <h4>Vikas Gupta</h4>
                            <p>Graphic Designer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Radhika Joshi - Suretek" title="Radhika Joshi - Suretek"></div>
                        <div class="text-center">
                            <h4>Radhika Joshi</h4>
                            <p>Product Designer</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Mohit Yadav - Suretek" title="Mohit Yadav - Suretek"></div>
                        <div class="text-center">
                            <h4>Mohit Yadav</h4>
                            <p>Visual Designer</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> -->









<?php
include("components/footer.php")
?>
<!-- footer -->