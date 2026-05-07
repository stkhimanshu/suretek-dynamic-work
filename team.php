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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/republic-day/1.jpg); background-position:top center;">
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
<section class="servicess d-none">
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
<section class="team_details bg-light my-5 d-none">
  <div class="container">
    <div class="row">

      <!-- <div class="col-md-8 mx-auto text-center mb-5">
        <h2 class="title mb-2">Meet the leaders shaping our vision.</h2>
        <p class="text-secondary fs-6 mb-4">
          Leadership is the cornerstone of progress, guiding organizations toward their goals with clarity and purpose.
          At Suretek Infosoft, this philosophy drives everything we do.
        </p>
      </div> -->


      <!-- <div class="col-md-12 mx-auto">
        <div class="row row-cols-md-4 row-cols-1 justify-content-center text-center gap-3">
          <div class="col">
            <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Ritesh Suri - Suretek Infosoft" title="Ritesh Suri - Suretek Infosoft"></div>
            <div class="text-center">
              <h4>Ritesh Suri</h4>
              <p>Founder & Director</p>
            </div>
          </div>
          <div class="col">
            <div class="img"><img src="<?= $baseurl ?>assets/images/teams/sanjay Mishra.jfif" alt="sanjay Mishra - Suretek Infosoft" title="sanjay Mishra - Suretek Infosoft"></div>
            <div class="text-center">
              <h4>sanjay Mishra</h4>
              <p>Vice President</p>
            </div>
          </div>
          <div class="col">
            <div class="img"><img src="<?= $baseurl ?>assets/images/user.png" alt="Sanjay Verma - Suretek Infosoft" title="Sanjay Verma - Suretek Infosoft"></div>
            <div class="text-center">
              <h4>Client</h4>
              <p>Partner</p>
            </div>
          </div>
        </div>
      </div> -->


      <!-- <div class="col-md-12 mt-5">
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
            </div> -->
      <!-- <div class="col-md-12">
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
            </div> -->


      <!-- <div class="col-md-12 mt-5">
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
            </div> -->
      <!-- <div class="col-md-12">
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
            </div> -->

    </div>
  </div>
</section>

<section class="team-section pb-3 team_details" id="team">
  <div class="col-md-8 mx-auto text-center mb-5">
    <h2 class="title">One team. One mindset. One Suretek.</h2>
    <p class="text-secondary fs-6 mb-4">
      Leadership is the cornerstone of progress, guiding organizations toward their goals with clarity and purpose.
      At Suretek Infosoft, this philosophy drives everything we do.
    </p>
    <p class="text-secondary mb-4">Our people are at the heart of everything we do. Our talented team is the driving force behind us. We're proud to foster a collaborative and fun environment where everyone's voice is valued, and work-life balance is a priority.</p>
    <!-- <p class="text-secondary fs-6 mb-4">
          Leadership is the cornerstone of progress, guiding organizations toward their goals with clarity and purpose.
          At Suretek Infosoft, this philosophy drives everything we do.
        </p> -->
  </div>
  <div class="team-grid mb-5 pt-5 mt-5">

    <!-- ROW 1 -->
    <!-- <div class="team-card">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/1.png" alt="Supriya Suri - Suretek Infosoft" title="Supriya Suri - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Supriya Suri</span>
        <span class="role">Founder</span>
      </div>
    </div> -->
    <div class="team-card">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/ritesh-suri.png" alt="Ritesh Suri - Suretek Infosoft" title="Ritesh Suri - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ritesh Suri</span>
        <span class="role">Co-Founder & CEO</span>
      </div>
    </div>
    <div class="team-card">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/sanjay-mishra.png" alt="Sanjay Mishra - Suretek Infosoft" title="Sanjay Mishra - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Sanjay Mishra</span>
        <span class="role">Vice President</span>
      </div>
    </div>
    <!-- <div class="team-card">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/1.png" alt="Ritesh Suri - Suretek Infosoft" title="Ritesh Suri - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ritesh Suri</span>
        <span class="role">Founder & CEO</span>
      </div>
    </div> -->
    <div class="team-card">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/subodh-kumar.png" alt="Subodh Singh - Suretek Infosoft" title="Subodh Singh - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Subodh Singh</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/shantam-dixit.png" alt="Shantam Dixit - Suretek Infosoft" title="Shantam Dixit - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Shantam Dixit</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/himani_uniyal1.png" alt="Himani Uniyal - Suretek Infosoft" title="Himani Uniyal - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Himani Uniyal</span>
        <!-- <span class="role">Front-end Dev</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/amit-kumar.png" alt="Amit Yadav - Suretek Infosoft" title="Amit Yadav - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Amit Yadav</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/renuka-rani.png" alt="Renuka Rani - Suretek Infosoft" title="Renuka Rani - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Renuka Rani</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/sapnaroy.png" alt="Sapna Roy - Suretek Infosoft" title="Sapna Roy - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Sapna Roy</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>
    
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/rahul-kumar.png" alt="Rahul Kumar - Suretek Infosoft" title="Rahul Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Rahul Kumar</span>
        <!-- <span class="role">Frontend</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/monika-rathore.png" alt="Monika Rathore - Suretek Infosoft" title="Monika Rathore - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Monika Rathore</span>
        <!-- <span class="role">Frontend</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Mukund_Kumar.png" alt="Mukund Kumar - Suretek Infosoft" title="Mukund Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Mukund Kumar</span>
        <!-- <span class="role">Frontend</span> -->
      </div>
    </div>
    
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Ashmita.png" alt="Asmita Kumari - Suretek Infosoft" title="Asmita Kumari - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Asmita Kumari</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Digvijay_Singh.png" alt="Digvijay Singh - Suretek Infosoft" title="Digvijay Singh - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Digvijay Singh</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Ashutosh.png" alt="Asutosh Sharma - Suretek Infosoft" title="Asutosh Sharma - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Asutosh Sharma</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/aman-kasyap.png" alt="Aman Kasyap - Suretek Infosoft" title="Aman Kasyap - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Aman Kasyap</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/ranjana-chaudhary.png" alt="Ranjana Chaudhary - Suretek Infosoft" title="Ranjana Chaudhary - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ranjana Chaudhary</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>
     <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/ranjana-chauhan.png" alt="Ranjana Chauhan - Suretek Infosoft" title="Ranjana Chauhan - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ranjana Chauhan</span>
        <!-- <span class="role">HR</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/tarun-gupta.png" alt="Tarun Gupta - Suretek Infosoft" title="Tarun Gupta - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Tarun Gupta</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/gulshan-kumar.png" alt="Gulshan Kumar - Suretek Infosoft" title="Gulshan Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Gulshan Kumar</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/harsh-panwar.png" alt="Harsh Panwar - Suretek Infosoft" title="Harsh Panwar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Harsh Panwar</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/mukul-verma.png" alt="Mukul Verma - Suretek Infosoft" title="Mukul Verma - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Mukul Verma</span>
        <!-- <span class="role">HR</span> -->
      </div>
    </div>
   
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/parveen-kumar.png" alt="Parveen Kumar - Suretek Infosoft" title="Parveen Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Parveen Kumar</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>
    
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/pawan-kumar.png" alt="Pawan Kumar - Suretek Infosoft" title="Pawan Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Pawan Kumar</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/ujjwal-bhatt.png" alt="Ujjwal Bhatt - Suretek Infosoft" title="Ujjwal Bhatt - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ujjwal Bhatt</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/vaibhav-raj-shrivastava.png" alt="Vaibhav Raj Shrivastva"  - Suretek Infosofttitle="Vaibhav Raj Shrivastva - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Vaibhav Raj Shrivastva</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>


    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/rohit-bhatt.png" alt="Rohit Bhatt - Suretek Infosoft" title="Rohit Bhatt - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Rohit Bhatt</span>
        <!-- <span class="role">Director</span> -->
      </div>
    </div>

    <!-- ROW 2 -->
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/sanjiv-pal.png" alt="Sanjiv Pal - Suretek Infosoft" title="Sanjiv Pal - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Sanjiv Pal</span>
        <!-- <span class="role">Designer</span> -->
      </div>
    </div>

    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/abdul-qadir-khan.png" alt="Abdul Qadir Khan"  - Suretek Infosofttitle="Abdul Qadir Khan - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Abdul Qadir Khan</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>



    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/vivek-pandey.png" alt="Vivek Pandey - Suretek Infosoft" title="Vivek Pandey - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Vivek Pandey</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>

    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/amisha-sharma.png" alt="Amisha Sharma - Suretek Infosoft" title="Amisha Sharma - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Amisha Sharma</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>

    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/mansi-upadhyay.png" alt="Mansi Upadhyah - Suretek Infosoft" title="Mansi Upadhyah - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Mansi Upadhyah</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/shreya-sarkar.png" alt="Shreya Sarkar - Suretek Infosoft" title="Shreya Sarkar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Shreya Sarkar</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/nupur-tyagi.png" alt="Nupur Tyagi - Suretek Infosoft" title="Nupur Tyagi - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Nupur Tyagi</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/vanshika-dhiman.png" alt="Vanshika Dhiman - Suretek Infosoft" title="Vanshika Dhiman - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Vanshika Dhiman</span>
        <!-- <span class="role">Backend</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/sanyam-dixit.png" alt="Sanyam Dikshit - Suretek Infosoft" title="Sanyam Dikshit - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Sanyam Dikshit</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/sumit-kumar.png" alt="Sumit Kumar - Suretek Infosoft" title="Sumit Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Sumit Kumar</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Urvashi.png" alt="Urvashi Chaurasia - Suretek Infosoft" title="Urvashi Chaurasia - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Urvashi Chaurasia</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Vedprakash.png" alt="Vedprakash Singh - Suretek Infosoft" title="Vedprakash Singh - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Vedprakash Singh</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/vinay-prasad.png" alt="Vinay Prasad - Suretek Infosoft" title="Vinay Prasad - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Vinay Prasad</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/ravindra-regar.png" alt="Ravindra Regar - Suretek Infosoft" title="Ravindra Regar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ravindra Regar</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Rajnish.png" alt="Rajnish Kumar - Suretek Infosoft" title="Rajnish Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Rajnish Kumar</span>
        <!-- <span class="role">Marketing</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Himanshu_Raj_Bhat.png" alt="Himanshu Raj Bhat"  - Suretek Infosofttitle="Himanshu Raj Bhat - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Himanshu Raj Bhat</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>




    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/Vipul.png" alt="Vipul Mittal - Suretek Infosoft" title="Vipul Mittal - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Vipul Mittal</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/nitin.png" alt="Nitin pal - Suretek Infosoft" title="Nitin pal - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Nitin pal</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>

    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/prince-prajapati.png" alt="Prince Prajapati - Suretek Infosoft" title="Prince Prajapati - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Prince Prajapati</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/badal-singh.png" alt="Badal Singh - Suretek Infosoft" title="Badal Singh - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Badal Singh</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/abhishek-kumar.png" alt="Abhishek Kumar - Suretek Infosoft" title="Abhishek Kumar - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Abhishek Kumar</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/mohd-azeem.png" alt="Mohd Azeem - Suretek Infosoft" title="Mohd Azeem - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Mohd Azeem</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
    <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/padmaksha-pranav.png" alt="Padmaksha Pranav - Suretek Infosoft" title="Padmaksha Pranav - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Padmaksha Pranav</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
   <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/ruchi_bhist.png" alt="Ruchi Bisht - Suretek Infosoft" title="Ruchi Bisht - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Ruchi Bisht</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
   <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/aakash.png" alt="Aakash - Suretek Infosoft" title="Aakash - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Aakash</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>
   <div class="team-card ">
      <img src="https://www.suretekinfosoft.com/assets/images/team-img/satakshi-chaturvedi.png" alt="Satakshi Chaturvedi - Suretek Infosoft" title="Satakshi Chaturvedi - Suretek Infosoft" />
      <div class="team-badge">
        <span class="name">Satakshi Chaturvedi</span>
        <!-- <span class="role">QA</span> -->
      </div>
    </div>




  </div>
</section>

<style>
  .team-section {
    padding: 50px 60px 160px;
    position: relative;
  }

  /* .team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
  } */
    .team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
    max-width: 1920px;
    margin: 0 auto;
}


  /* CARD */
  .team-card {
    border-radius: 30px;
    position: relative;
    z-index: 0;
  }
.team-card:before {
    content: "";
    pointer-events: none;
    position: absolute;
    border-radius: inherit;
    background: #070035;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    transition: background .15s ease-in-out;
    opacity: .1;
  }
  /* IMAGE */
  .team-card img {
    background: linear-gradient(180deg, #f0f2ff 0%, #ffffff 100%);
      width: 100%;
    height: 430px;
    object-fit: cover;
    object-position: top;
    image-rendering: -webkit-optimize-contrast;
    border-radius: 30px;
  }

  /* BADGE */
  /* .team-badge {
    display: flex;
    justify-content: center;
    padding: 0px;
  }

  .team-badge .name {
    position: absolute;
    bottom: 16px;
  left: 50%;
    transform: translateX(-50%); 
    background: #070035;
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 16px;
    font-weight: 500;
    color: #fff;
    backdrop-filter: blur(6px);
  }
   */
/* Name + Role Pill */
.team-badge {
z-index: 1;
    display: flex;
    align-items: center;
    margin: .6666666667em;
    padding: .1666666667em;
    border-radius: 100vw;
    background-color: #fff;
    justify-self: center;
    align-self: flex-end;
    font-weight: 500;
    font-size: clamp(.75rem, .7936507937vw, .9975rem);
    position: absolute;
}

.team-badge .name {
      padding: .5333333333em 1.2666666667em;
    border-radius: 100vw;
    color: #fff;
    background: #070035;
}

.team-badge .role {
 padding: .2666666667em .5333333333em .2666666667em .2666666667em;
    color: #070035;
}

  /* TABLET */
  @media (max-width: 1024px) {
    .team-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  /* MOBILE */
  @media (max-width: 600px) {
    .team-section {
      padding: 100px 10px 160px;
      position: relative;
    }

    .team-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .team-card img {
      height: 320px;
    }

    .team-badge .name {
      width: 80%;
      font-size: 14px;
      text-align: center;
    }
  }
</style>


<script>
  document.addEventListener("DOMContentLoaded", () => {

    /* ❌ Disable on mobile */
    if (window.matchMedia("(max-width: 600px)").matches) {
      return;
    }

    const cards = document.querySelectorAll(".team-card");

    let lastScrollY = window.scrollY;
    let targetOffset = 0;
    let currentOffset = 0;

    const SPEED = 0.12;   // parallax strength
    const FRICTION = 0.05; // smoothness
    const MAX_OFFSET = 50;

    function animate() {
      currentOffset += (targetOffset - currentOffset) * FRICTION;

      cards.forEach((card, index) => {
        const direction = index % 2 === 0 ? 1 : -1;
        card.style.transform = `translateY(${currentOffset * direction}px)`;
      });

      requestAnimationFrame(animate);
    }

    window.addEventListener("scroll", () => {
      const delta = window.scrollY - lastScrollY;
      lastScrollY = window.scrollY;

      targetOffset += delta * SPEED;
      targetOffset = Math.max(-MAX_OFFSET, Math.min(targetOffset, MAX_OFFSET));
    });

    animate();
  });
</script>






<div class="m-5">&nbsp;</div>
<?php
include("components/footer.php")
?>
<!-- footer -->