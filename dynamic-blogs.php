<?php


/** @var mysqli $conn */
include("./includes/config.php");

$query = "SELECT b.*, c.title as category_name 
          FROM blog b
          LEFT JOIN categories c ON b.category_id = c.id
          WHERE b.status=1
          ORDER BY b.id DESC";

$result = mysqli_query($conn, $query);

$recentQuery = mysqli_query($conn, "
    SELECT title, slug, image, created_at 
    FROM blog 
    ORDER BY created_at DESC 
    LIMIT 5
");
if (!$recentQuery) die("Query Failed: " . mysqli_error($conn));

$catQuery = mysqli_query($conn, "
    SELECT id, title
    FROM categories 
    ORDER BY title ASC
");
if (!$catQuery) die("Category SQL Error: " . mysqli_error($conn));
?>

<!-- header -->
<?php
$title = "Our Blog – Software & IT Insights | Suretek Infosoft";

$description = "Stay updated with Suretek Infosoft blogs on software development, mobile apps, and digital transformation. Gain insights from industry experts.";

$keywords = "software development insights, IT industry trends, technology blogs, web development tips, latest tech updates";

$url = "https://www.suretekinfosoft.com/blogs.php";



// og image

$ogImage = "https://www.suretekinfosoft.com/assets/images/og-image.webp";

include("components/header.php")

?>
<link rel="preload" href="<?= $baseurl ?>assets/fontawesome/css/font.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<!-- header -->
<!-- services -->
<section class="team" style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0)), url(<?= $baseurl ?>assets/images/blogs_bg.webp);background-position:bottom right; ">
   <div class="container position-relative z-10">
      <div class="row">
         <div class="col-lg-7">
            <h1 class="title mt-5 mb-2">Insights, Ideas & Inspiration – All in One Place</h1>
            <p class="fs-5 mt-3 mb-4">Stay updated with the latest trends, expert tips, and thought-provoking articles from our team. Whether you're here to learn, explore, or grow - there's something for everyone.</p>
            <a href="<?= $baseurl ?>contact-us.php" title="Request a Consultation" class="py-3 px-4 btn btn-dark rounded fs-5">Request a Consultation <i class="fa-regular fa-arrow-up-right ms-2"></i>
            </a>
            <ul class="bread mt-md-5 mt-4">
               <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>
               <li class="mx-2"><span>/</span></li>
               <li class="active">Blogs</li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- Blogs -->
<section class="studies">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-12 mb-5 mb-md-0">
            <div class="row g-4" id="blogCardsContainer">
               <!-- Blog card section -->
               <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                  <?php
                  $intro = json_decode($row['introdetail'], true);
                  $desc = $intro[0]['content'] ?? '';
                  $desc = substr(strip_tags($desc), 0, 120);
                  ?>

                  <div class="col-md-6 blog-card"
                     data-category="<?= htmlspecialchars($row['category_name'] ?? '') ?>"
                     data-title="<?= htmlspecialchars($row['title']) ?>">

                     <a href="<?= $baseurl ?>blog/<?= htmlspecialchars($row['slug']) ?>"
                        class="study_card"
                        title="<?= htmlspecialchars($row['title']) ?>">

                        <div class="cov">
                           <img src="<?= $baseurl ?>uploads/blog/<?= htmlspecialchars($row['image']) ?>"
                              alt="<?= htmlspecialchars($row['title']) ?>"
                              title="<?= htmlspecialchars($row['title']) ?>">

                           <div class="arrow"><i class="fa fa-angle-right"></i></div>
                        </div>

                        <div class="text">
                           <p class="text_default mb-1 fw-medium">
                              <?= htmlspecialchars($row['category_name'] ?? '') ?>
                           </p>

                           <h4 class="title_card">
                              <?= htmlspecialchars($row['title']) ?>
                           </h4>

                           <p class="para">
                              <?= htmlspecialchars($desc) ?>...
                           </p>
                        </div>

                     </a>
                  </div>

               <?php endwhile; ?>
            </div>
            <div class="row mt-4">
               <div class="col-md-12">
                  <nav aria-label="Pagination">
                     <ul class="pagination" id="paginationContainer"></ul>
                  </nav>
               </div>
            </div>
         </div>
         <div class="col-md-12 ps-xl-5 col-lg-4 mt-5 mt-lg-0">
            <aside class="sidebar row row-cols-md-2 row-cols-lg-1">
               <!-- Search -->
               <div class="col">
                  <div class="widget search_widget mb-4">
                     <form action="javascript:void(0);" method="get" class="search_form">
                        <input type="text" id="searchInput" placeholder="Search blogs...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                     </form>
                  </div>
                  <!-- Recent Case Studies / Posts -->
                  <div class="widget recent_widget">
                     <h5 class="widget_title">Recent Insights</h5>
                     <ul class="recent_list">

                        <?php while ($recent = mysqli_fetch_assoc($recentQuery)) : ?>

                           <li>
                              <a href="<?= $baseurl ?>blog/<?= htmlspecialchars($recent['slug']) ?>" class="d-flex">

                                 <div class="thumb">
                                    <img src="<?= $baseurl ?>uploads/blog/<?= htmlspecialchars($recent['image'] ?? 'default.jpg') ?>"
                                       alt="<?= htmlspecialchars($recent['title']) ?>">
                                 </div>

                                 <div class="info">
                                    <p class="title">
                                       <?= htmlspecialchars($recent['title']) ?>
                                    </p>

                                    <span class="date">
                                       <?= date("M Y", strtotime($recent['created_at'])) ?>
                                    </span>
                                 </div>

                              </a>
                           </li>

                        <?php endwhile; ?>

                     </ul>
                  </div>
               </div>
               <div class="col">
                  <!-- Categories -->
                  <div class="widget categories_widget mb-4">
                     <h5 class="widget_title">Categories</h5>
                     <ul class="categories_list">

                        <?php while ($cat = mysqli_fetch_assoc($catQuery)) : ?>

                           <li>
                              <a href="?category=<?= (int)$cat['id'] ?>"
                                 class="category-link"
                                 data-category="<?= htmlspecialchars($cat['title']) ?>"
                                 title="<?= htmlspecialchars($cat['title']) ?>">

                                 <?= htmlspecialchars($cat['title']) ?>

                              </a>
                           </li>

                        <?php endwhile; ?>

                     </ul>
                  </div>
               </div>
            </aside>
         </div>
      </div>
   </div>
</section>
<script src="<?= $baseurl ?>assets/js/blog-new.js"></script>
<?php
include("components/footer.php")

?>
<!-- footer -->