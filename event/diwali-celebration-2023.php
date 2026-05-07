<!-- header -->
<?php
$title = "Diwali Celebration 2023 at Suretek – Festival of Lights & Team Joy";
$description = "Relive Suretek’s Diwali Celebration 2023! A vibrant festival filled with lights, sweets, cultural performances, and team bonding, celebrating joy, positivity, and togetherness.";
$keywords = "Diwali 2023, Suretek Diwali Celebration, Festival of Lights, Corporate Diwali Event, Employee Celebration, Team Bonding, Diwali at Workplace";
$url = "https://www.suretekinfosoft.com/event/diwali-celebration-2023.php";

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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/2023/diwali/3.JPG); background-position: bottom;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Diwali Celebration 2023</h1>
                <p class="fs-5 mt-3 mb-4">
                    Suretek’s Diwali Celebration 2023 lit up the workplace with joy, colors, and festive spirit. Filled with vibrant decorations, cultural performances, sweets, and laughter, the event brought employees together to share happiness, strengthen bonds, and celebrate the triumph of light over darkness. It was a memorable occasion reflecting unity, positivity, and the true essence of Diwali.
                </p>
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Diwali Celebration 2023</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/2023/diwali/";
            $images = glob($imageDir . "*.{JPG,jpg,jpeg,png,gif,webp,jfif}", GLOB_BRACE);

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
                $alt = "Diwali Celebration 2023" . $filename; // unique alt text
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