<!-- header -->
<?php
$title = "Lohri Celebration 2020 at Suretek – Festival of Harvest & Unity";
$description = "Celebrate Lohri 2020 with Suretek! A vibrant festival filled with bonfires, folk dances, music, and festive treats, fostering joy, cultural connection, and team togetherness.";
$keywords = "Lohri 2020, Suretek Lohri Celebration, Harvest Festival, Punjabi Festival, Employee Celebration, Team Bonding, Cultural Event";
$url = "https://www.suretekinfosoft.com/event/lohri-2020.php";

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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/2020/lohri/3.jpg); background-position: center;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
    <h1 class="title mt-5 mb-2">Lohri Celebration 2020</h1>
    <p class="fs-5 mt-3 mb-4">
        Suretek’s Lohri 2020 celebration brought the team together to honor the vibrant Punjabi festival of harvest. The event was filled with traditional music, folk dances, bonfire rituals, and festive treats, creating joyous moments of camaraderie and cultural connection. It was a memorable occasion that celebrated unity, gratitude, and the spirit of togetherness.
    </p>
    <ul class="bread mt-md-5 mt-4">
        <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
        <li class="mx-2"><span>/</span></li>
        <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
        <li class="mx-2"><span>/</span></li>
        <li class="active">Lohri 2020</li>
    </ul>
</div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/2020/lohri/";
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
                $alt = "Lohri Celebration 2020" . $filename; // unique alt text
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