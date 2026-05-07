<!-- header -->
<?php
$title = "Independence Day Celebration at Suretek Infosoft | Pride, Unity & Team Spirit";
$description = "Celebrate Independence Day at Suretek Infosoft, where our team comes together to honor India's freedom, unity, and patriotism through engaging activities and memorable moments.";
$keywords = "Independence Day celebration Suretek, 15 August office celebration, corporate event India, patriotic celebration workplace, team bonding Suretek Infosoft, company culture events, Suretek life events";
$url = "https://www.suretekinfosoft.com/event/independence-2025.php";

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
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/life-at-suretek/independent-day/1.jpg); background-position:right;">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title mt-5 mb-2">Independence Day Celebration</h1>
                <p class="fs-5 mt-3 mb-4">
                               Suretek’s Independence Day celebration honors the spirit of freedom, unity, and national pride. With tricolor décor, inspiring moments, and team participation, employees come together to celebrate India’s journey and values. It’s a meaningful reminder of responsibility, togetherness, and progress as one nation.  </p>
                <!-- <a href="#team" title="Explore Our Team" class="py-3 px-4 btn btn-dark rounded fs-5">
                    Explore Our Team <i class="fa-regular fa-arrow-up-right ms-2"></i>
                </a> -->
                <ul class="bread mt-md-5 mt-4">
                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class=""><a href="<?= $baseurl ?>life-at-suretek.php" title="Life at Suretek">Life at Suretek</a></li>
                    <li class="mx-2"><span>/</span></li>
                    <li class="active">Independence Celebration</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php
            $imageDir = "../assets/images/life-at-suretek/independent-day/";
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
                $alt = "Suretek Independence Day Celebration" . $filename; // unique alt text
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