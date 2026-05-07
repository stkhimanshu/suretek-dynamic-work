<!-- header -->
<?php
$title = "Celebrating Success Together at Suretek Infosoft | Team Achievements & Culture";
$description = "Discover how Suretek Infosoft celebrates success through team achievements, milestones, and memorable moments. Experience our strong work culture, collaboration, and the spirit that drives us forward.";
$keywords = "Suretek Infosoft celebration, team success Suretek, company achievements, employee celebration, corporate culture Suretek, team bonding, workplace celebration, Suretek events";
$url = "https://www.suretekinfosoft.com/event/teams-lunch-2026.php";

// og image
$ogImage = "https://www.suretekinfosoft.com/assets/images/og-image.webp";
include("../components/header.php")
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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/teams-party/33.jpg); background-position:right center;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Celebrating Success Together</h1>
                <p class="fs-5 mt-3 mb-4">
            Celebration, appreciation, and great team spirit - the perfect combination for an unforgettable lunch! <br><br>
Our <strong>US client</strong> organized a special appreciation party to celebrate the team’s hard work and dedication. The event was a fantastic opportunity to unwind, connect, and reflect on the incredible journey and achievements accomplished together.<br><br>
A big thank you to our client for hosting an amazing appreciation party for the team! </p>
                <!-- <a href="#team" title="Explore Our Team" class="py-3 px-4 btn btn-dark rounded fs-5">
                    Explore Our Team <i class="fa-regular fa-arrow-up-right ms-2"></i>
                </a> -->
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Team Party</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/teams-party/";
            $images = glob($imageDir . "*.{jpg,jpeg,png,gif,webp,jfif}", GLOB_BRACE);

            // Filter images 1–50
            $filtered = array_filter($images, function ($img) {
                $filename = pathinfo($img, PATHINFO_FILENAME);
                return  $filename;
            });

            // Shuffle images (random order)
            $filtered = array_values($filtered); // reindex array
            shuffle($filtered);

            foreach ($filtered as $index => $image):
                $filename = pathinfo($image, PATHINFO_FILENAME);
                $alt = "Suretek Team Party 2026" . $filename; // unique alt text
            ?>
                <div class="gallery-item">
                    <a data-fancybox="gallery" href="<?= $image ?>">
                        <img src="<?= $image ?>" alt="<?= htmlspecialchars($alt) ?>" loading="lazy" class="img-fluid lazy">
                    </a>
                </div>
            <?php endforeach; ?>


        </div>

    </div>


</section>
</section>








<?php
include("../components/footer.php")
?>
<!-- footer -->