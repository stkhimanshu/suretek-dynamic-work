<!-- header -->
<?php
$title = "Independence Day 2024 Celebration at Suretek – Honoring Freedom & Unity";
$description = "Celebrate Independence Day 2024 with Suretek! Join us for inspiring speeches, cultural performances, and team activities that honor freedom, unity, and national pride.";
$keywords = "Independence Day 2024, Suretek Independence Day, Team Celebration, Patriotic Event, Employee Activities, Corporate Independence Day, Freedom Celebration";
$url = "https://www.suretekinfosoft.com/event/independence-day-2024.php";

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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/2024/independence-day/12.jpg); background-position: center;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
    <h1 class="title mt-5 mb-2">Independence Day 2024</h1>
    <p class="fs-5 mt-3 mb-4">
        Suretek celebrates Independence Day 2024 with pride and patriotism, bringing our team together to honor the spirit of freedom. The event is filled with inspiring speeches, cultural performances, and team activities that foster unity, gratitude, and national pride, reflecting our commitment to celebrate achievements and values that define our nation.
    </p>
    <ul class="bread mt-md-5 mt-4">
        <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
        <li class="mx-2"><span>/</span></li>
        <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
        <li class="mx-2"><span>/</span></li>
        <li class="active">Independence Day 2024</li>
    </ul>
</div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/2024/independence-day/";
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
                $alt = "Independence Day 2024" . $filename; // unique alt text
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