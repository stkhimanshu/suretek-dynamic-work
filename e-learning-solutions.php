<!-- header -->
<?php
$title = "E-Learning – Student Portals & Admin Systems | Suretek Infosoft";
$description = "Suretek Infosoft specializes in e-learning systems featuring student microsites, university admin portals, content sharing, timetable scheduling, and robust security controls.";
$keywords = "E-learning software development, custom LMS solutions, mobile learning app development, online training platforms, virtual classroom solutions";
$url = "https://www.suretekinfosoft.com/e-learning-solutions.php";

// og image
$ogImage = "https://www.suretekinfosoft.com/assets/images/og-image.webp";
include("components/header.php")
?>
<!-- header -->

<!-- services -->
<section class="team" style="background-image: url(<?= $baseurl ?>assets/images/e_learning_solutions.webp);background-position:bottom left;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="title mt-5 mb-2">E-Learning Solutions</h1>
                <p class="fs-5 mt-3 mb-4">
                    In the digital learning era, your organization needs interactive, scalable, and engaging platforms. 
                    At Suretek Infosoft, we design and develop cutting-edge e-learning applications that deliver rich learning experiences, track learner progress, and support remote education across devices.
                    Our solutions empower institutions, corporates, and startups to educate effectively while enhancing learner engagement.
                </p>
                <a href="<?= $baseurl ?>contact-us.php" title="Request a Consultation" class="py-3 px-4 btn btn-dark rounded fs-5">Request a Consultation <i class="fa-regular fa-arrow-up-right ms-2"></i>
                </a>
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li><a href="<?= $baseurl ?>industries.php" title="Industries">Industries</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">E-Learning Solutions</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- services -->


<!-- Overview Section -->
<section class="overview">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <img src="<?= $baseurl ?>assets/images/e-learning.webp" class="img-fluid rounded shadow-lg" alt="E-Learning - Suretek Infosoft" title="E-Learning - Suretek Infosoft">
            </div>
            <div class="col-lg-6">
                <h2 class="title">Transforming Learning Experiences with Technology</h2>
                <p>Our e-learning solutions are designed to deliver interactive, intuitive, and scalable learning experiences. 
                We combine LMS platforms, gamification, and analytics to create content that engages learners and drives measurable results.</p>
                <ul class="list mt-4">
                    <li class="mb-2">Custom LMS Development & Integration</li>
                    <li class="mb-2">Gamified & Interactive Learning Modules</li>
                    <li class="mb-2">Mobile & Web-Enabled Learning Platforms</li>
                    <li class="mb-2">AI & ML-Powered Personalized Learning</li>
                    <li>Real-Time Learner Progress Tracking & Analytics</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Interactive E-Learning Expertise Section -->
<section class="mobile-expertise bg-light">
    <div class="container">
        <h2 class="text-center mb-5 title">Our E-Learning Expertise</h2>
        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="expertise-card position-relative overflow-hidden rounded-4 shadow-lg p-4 text-center bg-white h-100">
                    <div class="icon-circle bg-gradient1 mx-auto mb-3">
                        <i class="fas fa-chalkboard-teacher fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Custom LMS Development</h5>
                    <p>Build learning management systems tailored to your organization's requirements with user-friendly dashboards and scalable architecture.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="expertise-card position-relative overflow-hidden rounded-4 shadow-lg p-4 text-center bg-white h-100">
                    <div class="icon-circle bg-gradient2 mx-auto mb-3">
                        <i class="fas fa-gamepad fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Gamified Learning</h5>
                    <p>Create interactive, gamified learning modules that increase engagement, retention, and motivation among learners.</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="expertise-card position-relative overflow-hidden rounded-4 shadow-lg p-4 text-center bg-white h-100">
                    <div class="icon-circle bg-gradient3 mx-auto mb-3">
                        <i class="fas fa-brain fa-2x text-white"></i>
                    </div>
                    <h5 class="fw-bold mb-2">AI & Analytics</h5>
                    <p>Leverage AI-powered personalized learning paths, smart recommendations, and analytics to track learner performance and improve outcomes.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Platforms Section -->
<section class="platforms bg-white">
    <div class="container">
        <h2 class="text-center title mb-5">Platforms & Technologies We Work With</h2>
        <div class="row row-cols-md-auto row-cols-lg-7 row-cols-auto g-4 justify-content-center">

            <!-- Platform Item -->
            <div class="col">
                <div class="platform-item text-center p-4 rounded-4 shadow-sm">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-desktop fa-2x"></i>
                    </div>
                    <p class="fw-semibold">Web</p>
                </div>
            </div>

            <div class="col">
                <div class="platform-item text-center p-4 rounded-4 shadow-sm">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-tablet-alt fa-2x"></i>
                    </div>
                    <p class="fw-semibold">Tablet</p>
                </div>
            </div>

            <div class="col">
                <div class="platform-item text-center p-4 rounded-4 shadow-sm">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-mobile-alt fa-2x"></i>
                    </div>
                    <p class="fw-semibold">Mobile</p>
                </div>
            </div>

            <div class="col">
                <div class="platform-item text-center p-4 rounded-4 shadow-sm">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-cloud fa-2x"></i>
                    </div>
                    <p class="fw-semibold">Cloud</p>
                </div>
            </div>

            <div class="col">
                <div class="platform-item text-center p-4 rounded-4 shadow-sm">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-robot fa-2x"></i>
                    </div>
                    <p class="fw-semibold">AI / ML</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- cta -->
<section class="call clean-cta">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h5 class="text_default d-block mx-auto mb-3">Transform Learning</h5>
                <h2 class="title">Let’s Build Next-Generation E-Learning Experiences!</h2>
                <p class="cta-text">
                    From LMS platforms to interactive learning modules, Suretek Infosoft helps organizations deliver engaging and scalable learning solutions. 
                    Let’s discuss how we can transform your digital learning journey.
                </p>
                <a href="<?= $baseurl ?>contact-us.php" class="butn mx-auto" title="Schedule a Free Consultation">Schedule a Free Consultation</a>
            </div>
        </div>
    </div>
</section>
<!-- cta -->





<?php
include("components/footer.php")
?>
<!-- footer -->