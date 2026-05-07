<!-- Related Posts / Latest Blogs -->

<?php
/** @var mysqli $conn */
include("../includes/config.php");
$latestQuery = mysqli_query($conn, "
    SELECT slug, title, image, introdetail
    FROM blog 
    WHERE status = 1 
    ORDER BY created_at DESC 
    LIMIT 3
");
if (!$latestQuery) {
    die("Query Error: " . mysqli_error($conn));
}
$latestBlogs = [];
while ($row = mysqli_fetch_assoc($latestQuery)) {
    $latestBlogs[] = $row;
}
?>

<section class="related-posts" style="background: #f9f9f9;">
    <div class="container">
        <div class="border_text">Latest Blogs</div>
        <h2 class="title mb-4 text-center">You Might Also Like</h2>
        <div class="row g-4">

            <?php if (!empty($latestBlogs)): ?>
                <?php foreach ($latestBlogs as $blog): ?>

                    <?php
                    $intro = json_decode($blog['introdetail'] ?? '[]', true);
                    $description = $intro[0]['content'] ?? '';
                    ?>

                    <div class="col-md-4 d-flex">
                        <div class="card border-0 flex-fill d-flex flex-column">

                            <!-- Image -->
                            <img
                                src="<?= $baseurl ?>uploads/blog/<?= htmlspecialchars($blog['image']) ?>"
                                class="card-img-top"
                                alt="<?= htmlspecialchars($blog['title']) ?>"
                                title="<?= htmlspecialchars($blog['title']) ?>">

                            <div class="card-body d-flex flex-column">

                                <!-- Title -->
                                <h5 class="card-title">
                                    <?= htmlspecialchars($blog['title']) ?>
                                </h5>

                                <!-- Description -->
                                <p class="card-text flex-grow-1">
                                    <?= htmlspecialchars(substr(strip_tags($description), 0, 120)) ?>...
                                </p>

                                <!-- Read More -->
                                <a href="<?= $baseurl ?>blogs/<?= htmlspecialchars($blog['slug']) ?>.php"
                                    class="btn btn-primary btn-sm mt-auto"
                                    title="Read More">
                                    Read More
                                </a>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

            <!-- Back button (keep same) -->
            <div class="col-md-8 mx-auto mt-5 text-center">
                <a href="<?= $baseurl ?>blogs.php" class="butn mx-auto">
                    <i class="fa fa-long-arrow-left me-2"></i> Back to Blog
                </a>
            </div>

        </div>
    </div>
</section>