<!-- header -->
<?php
$title = "Holi Celebration 2024 at Suretek – Festival of Colors & Team Fun";
$description = "Join Suretek's Holi Celebration 2024! A joyous festival filled with vibrant colors, music, laughter, and team bonding that reflects unity, happiness, and festive spirit.";
$keywords = "Holi 2024, Suretek Holi Celebration, Festival of Colors, Employee Celebration, Team Bonding, Corporate Events, Fun at Work";
$url = "https://www.suretekinfosoft.com/event/holi-celebration-2024.php";

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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/2024/holi/5.jpeg); background-position: left bottom;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Holi Celebration 2024</h1>
                <p class="fs-5 mt-3 mb-4">
                    Suretek’s Holi Celebration 2024 brings our team together to rejoice in the festival of colors with energy and excitement. Bursting with music, laughter, and vibrant colors, the event fosters camaraderie, happiness, and shared festive spirit, reflecting our culture of unity, joy, and positivity.
                </p>
                <!-- <a href="#team" title="Explore Our Team" class="py-3 px-4 btn btn-dark rounded fs-5">
        Explore Our Team <i class="fa-regular fa-arrow-up-right ms-2"></i>
    </a> -->
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Holi Celebration 2024</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/2024/holi/";
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
                $alt = "Holi Celebration 2024" . $filename; // unique alt text
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