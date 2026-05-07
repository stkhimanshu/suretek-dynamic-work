<!-- header -->
<?php
$title = "Rangon Ka Utsav Celebration at Suretek Infosoft | Colors, Fun & Team Spirit";
$description = "Experience the vibrant Rangon Ka Utsav celebration at Suretek Infosoft, filled with colors, joy, and team bonding activities that showcase our lively and engaging workplace culture.";
$keywords = "Rangon Ka Utsav Suretek, Holi celebration Suretek Infosoft, office color festival, team celebration Suretek, corporate Holi event, workplace culture events, colorful celebration office";
$url = "https://www.suretekinfosoft.com/event/holi-bash.php";

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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/holi-bash-2026/2.jpg);">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Rangon Ka Utsav</h1>
                <p class="fs-5 mt-3 mb-4">
            Suretek’s Rangon Ka Utsav, brings employees together to celebrate the festival of colors with joy and enthusiasm. Filled with music, laughter, and vibrant hues, the celebration creates moments of bonding, positivity, and shared happiness, reflecting the spirit of unity and festive cheer.</p>
                <!-- <a href="#team" title="Explore Our Team" class="py-3 px-4 btn btn-dark rounded fs-5">
                    Explore Our Team <i class="fa-regular fa-arrow-up-right ms-2"></i>
                </a> -->
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Rangon Ka Utsav</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/holi-bash-2026/";
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
                $alt = "Team Party 2026" . $filename; // unique alt text
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