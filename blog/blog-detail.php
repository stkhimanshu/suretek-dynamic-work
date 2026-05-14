<!-- header -->

<?php

/** @var mysqli $conn */
include("../includes/config.php");



$slug = $_GET['slug'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT b.*, c.title as category_name 
          FROM blog b
          LEFT JOIN categories c ON b.category_id = c.id
          WHERE b.slug = ?");
mysqli_stmt_bind_param($stmt, 's', $slug);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
$faqs = json_decode($data['faq'] ?? '[]', true);

if (!$data) {
    die("Blog not found");
}

$sections = json_decode($data['sections'] ?? '[]', true) ?: [];
// echo "<pre>";
// print_r($sections);
// echo "</pre>";
// die;
$intro = json_decode($data['introdetail'], true);
$highlightWords = json_decode($data['highlight_words'], true) ?? [];

function highlightText($text, $words)
{
    if (empty($words)) return htmlspecialchars($text);

    foreach ($words as $word) {
        if (!empty($word)) {
            $wordEscaped = preg_quote($word, '/');

            $text = preg_replace(
                "/($wordEscaped)/i",
                '<span style="color:#a22426;">$1</span>',
                $text
            );
        }
    }

    return $text;
}
?>


<?php
// print_r($data);
$meta = json_decode($data['seo_meta'] ?? '{}', true);
$title = $meta['meta_title'] ?? $data['title'];
$description = $meta['meta_description'] ?? '';
$keywords = $title;
$url = "https://www.suretekinfosoft.com/blogs/it-consulting-services-smarter-business.php";
// og image
$ogImage = "https://www.suretekinfosoft.com/assets/images/blogs/it-consulting-services-smarter-business.webp";
// <!-- header -->
include("../components/header.php")
?>




<!-- services -->

<section class="team" style="background-image: linear-gradient(to right, rgba(255,255,255,0.8), rgba(255,255,255,0)), url(<?= $baseurl ?>assets/images/case_bg.webp)">

    <div class="container position-relative z-10">

        <div class="row">

            <div class="col-lg-7">

                <h1 class="title mt-5 mb-3">

                    <?= htmlspecialchars($data['title']) ?>

                </h1>

                <p class="fs-5 mt-3 mb-4">

                    <?= htmlspecialchars($intro[0]['subtitle'] ?? '') ?>

                </p>

                <a href="#case_study" title="Explore Our Insights - Suretek Infosoft" class="py-3 px-4 btn btn-dark rounded fs-5">

                    Read Full Blog <i class="fa-regular fa-arrow-down-right ms-2"></i>

                </a>

                <ul class="bread mt-md-5 mt-4">

                    <li><a href="<?= $baseurl ?>index.php" title="Home">Home</a></li>

                    <li class="mx-2"><span>/</span></li>

                    <li><a href="<?= $baseurl ?>dynamicblogs.php" title="Blogs">Blogs</a></li>

                    <li class="mx-2"><span>/</span></li>

                    <li class="active"> <?= htmlspecialchars($data['title']) ?></li>

                </ul>

            </div>

        </div>

    </div>

</section>





<!-- services -->



<!-- Services Intro -->

<section class="studies" id="case_study">

    <div class="container">

        <div class="row">

            <div class="col-lg-9 pe-md-5">

                <img class="banner_img" src="<?= $baseurl ?>uploads/blog/<?= htmlspecialchars($data['image']) ?>"
                    alt="<?= htmlspecialchars($meta['image_alt'] ?? $data['title']) ?> style=" object-position: top;">


                <div class="content">

                    <h2 class="title" id="intro"> <?= highlightText($data['title'], $highlightWords) ?></h2>



                    <div class="client_intro">
                        <?php if (!empty($intro[0]['subheading'])): ?>
                            <p><?= htmlspecialchars($intro[0]['subheading']) ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    $content = $intro[0]['content'] ?? '';
                    if ($content):
                    ?>
                        <p><?= $content ?></p>
                    <?php endif; ?>


                    <!-- <p>Today, mobile apps are at the center of everything, be it from banking, shopping, chatting or healthcare. But with this convenience comes risk. Hackers are smarter, faster, and more aggressive than ever. That’s why businesses can’t rely on old-school security methods anymore.</p>

                    <p>So what’s the game-changer? It is <strong>Artificial Intelligence (AI)</strong>, a <a href="top-tech-for-next-gen-mobile-app-development-2025.php" title="powerful technology - Suretek infosoft">powerful technology</a> that doesn't just defend but also predicts and prevents security threats. This blog will take you through the role of AI in mobile app security and why your business can’t afford to ignore it.</p> -->



                    <?php if (!empty($sections)): ?>
                        <?php foreach ($sections as $i => $sec): ?>

                            <h3 id="section-<?= $i ?>">
                                <?= htmlspecialchars($sec['title']) ?>
                            </h3>

                            <div>
                                <?= $sec['content'] ?>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>


                <div class="accordion" id="customAccordion">
                    <?php if (!empty($faqs)): ?>
                        <h3 id="faq" class="mb-4 mt-5">Frequently Asked Questions (FAQ)</h3>

                        <?php foreach ($faqs as $i => $faq):
                            $collapseId = "collapse" . $i;
                            $isFirst = $i === 0;
                        ?>

                            <div class="accordion-item">

                                <h2 class="accordion-header">
                                    <button
                                        class="accordion-button fw-semibold <?= $isFirst ? '' : 'collapsed' ?>"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?= $collapseId ?>"
                                        aria-expanded="<?= $isFirst ? 'true' : 'false' ?>">

                                        <?= ($i + 1) ?>. <?= htmlspecialchars($faq['question']) ?>
                                        <i class="fa-plus icon ms-auto fa"></i>

                                    </button>
                                </h2>

                                <div
                                    id="<?= $collapseId ?>"
                                    class="accordion-collapse collapse <?= $isFirst ? 'show' : '' ?>"
                                    data-bs-parent="#customAccordion">

                                    <div class="accordion-body">
                                        <?= $faq['answer'] ?>
                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

            </div>



            <div class="col-lg-3 d-none d-lg-block ms-auto">

                <div class="toc_card p-4">

                    <h5 class="fw-semibold">Table of Contents</h5>



                    <!-- <ul class="toc_list list-unstyled">

                        <li><a href="#intro" title="Introduction">Introduction</a></li>

                        <li><a href="#need" title="How Hackers Use AI">How Hackers Use AI</a></li>

                        <li><a href="#advantage" title="Mobile App Security">Mobile App Security</a></li>

                        <li><a href="#future" title="What the Future Holds for AI in Mobile App Security">What the Future Holds for AI in Mobile App Security</a></li>

                        <li><a href="#conclusion" title="Conclusion">Conclusion</a></li>

                    </ul> -->

                    <ul class="toc_list list-unstyled">
                        <li>
                            <a href="#intro">Introduction</a>
                        </li>
                        <?php foreach ($sections as $i => $sec): ?>
                            <li>
                                <a href="#section-<?= $i ?>">
                                    <?= htmlspecialchars($sec['toc'] ?? $sec['title']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <?php if (!empty($faqs)): ?>
                            <li>
                                <a href="#faq">FAQs</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>



            </div>



        </div>

    </div>

</section>













<!-- latest blogs -->

<?php

include('../components/latest_blog.php')

?>

<!-- latest blogs -->

















<?php

include("../components/footer.php")

?>

<!-- footer -->