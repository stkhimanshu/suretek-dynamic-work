<?php

/** @var mysqli $conn */
include("../includes/config.php");



$slug = $_GET['slug'] ?? '';

$stmt = mysqli_prepare($conn, "SELECT b.*, c.title as category_name 
          FROM blog b
          LEFT JOIN blog_category c ON b.category_id = c.id
          WHERE b.slug = ?");
mysqli_stmt_bind_param($stmt, 's', $slug);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    die("Blog not found");
}

$sections = json_decode($data['sections'] ?? '[]', true) ?: [];
// echo "<pre>";
// echo $data['sections'];
// die;
$intro = json_decode($data['introdetail'], true);
$highlightWords = json_decode($data['highlight_words'], true) ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['title']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            scroll-behavior: smooth;
        }

        .display {
            font-family: 'Playfair Display', serif;
        }

        /* Active TOC link — requires JS-toggled class */
        .toc-link.active {
            color: #a22426;
            font-weight: 600;
            border-left-color: #a22426;
            background-color: #fdf3f3;
        }

        /* Prose styles for CKEditor-generated HTML */
        .blog-prose h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 2rem 0 0.75rem;
            color: #424649;
        }

        .blog-prose h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            font-weight: 600;
            margin: 1.5rem 0 0.5rem;
            color: #424649;
        }

        .blog-prose p {
            font-size: 0.95rem;
            line-height: 1.85;
            color: #555;
            margin-bottom: 1rem;
        }

        .blog-prose ul,
        .blog-prose ol {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
            color: #555;
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .blog-prose ul {
            list-style-type: disc;
        }

        .blog-prose ol {
            list-style-type: decimal;
        }

        .blog-prose blockquote {
            border-left: 3px solid #a22426;
            padding: 0.75rem 1rem;
            background: #fdf3f3;
            border-radius: 0 8px 8px 0;
            margin: 1.25rem 0;
            font-style: italic;
            color: #424649;
        }

        .blog-prose a {
            color: #a22426;
            text-decoration: underline;
        }

        .blog-prose strong {
            color: #424649;
            font-weight: 600;
        }

        .blog-prose img {
            border-radius: 10px;
            max-width: 100%;
            margin: 1rem 0;
        }
    </style>
</head>

<body class="bg-[#f8f6f3] text-[#424649]">

    <!-- ══ NAVBAR ══ -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <div class="flex items-center gap-2.5 max-w-[130px]">
                <img src="https://www.suretekinfosoft.com/assets/images/logo1.png" class="w-[130px]" alt="Logo">
            </div>
            <div class="flex items-center gap-1.5 text-sm text-[#424649]/60">
                <a href="index.php" class="hover:text-[#a22426] transition-colors no-underline">Blog</a>
                <span>/</span>
                <span class="text-[#a22426] font-medium line-clamp-1 max-w-[200px] sm:max-w-xs">
                    <?= htmlspecialchars($data['title']) ?>
                </span>
            </div>
        </div>
    </nav>

    <!-- ══ HERO BANNER ══ -->
    <div class="bg-[#424649] relative overflow-hidden">
        <div class="absolute -top-16 -right-16 w-72 h-72 rounded-full bg-[#a22426]/15 pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-10 w-56 h-56 rounded-full bg-[#a22426]/10 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 relative z-10">

            <!-- Category badge -->
            <?php if (!empty($data['category_name'])): ?>
                <span class="inline-block text-[10px] font-semibold tracking-widest uppercase text-[#a22426] bg-[#fdf3f3] px-2.5 py-1 rounded mb-4">
                    <?= htmlspecialchars($data['category_name']) ?>
                </span>
            <?php endif; ?>

            <!-- Title -->
            <h1 class="display text-white font-bold text-2xl sm:text-3xl lg:text-4xl leading-tight max-w-3xl">
                <?= htmlspecialchars($data['title']) ?>
            </h1>

            <div class="w-12 h-0.5 bg-[#a22426] my-4"></div>


            <!-- Meta row -->

            <div class="flex flex-wrap items-center gap-4 text-sm text-white/55">
                <?php if (!empty($data['created_at'])): ?>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?= date("F j, Y", strtotime($data['created_at'])) ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($data['category_name'])): ?>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-5 5a2 2 0 01-2.828 0l-7-7A2 2 0 013 10V5a2 2 0 012-2z" />
                        </svg>
                        <?= htmlspecialchars($data['category_name']) ?>
                    </span>
                <?php endif; ?>
                <!-- Subtitle -->
                <?php if (!empty($intro[0]['subtitle'])): ?>
                    <p class="text_subtitle">
                        <?= htmlspecialchars($intro[0]['subtitle']) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ══ BODY ══ -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        <div class="flex flex-col lg:flex-row gap-10 items-start">

            <!-- ── MAIN ARTICLE ── -->
            <article class="w-full lg:flex-1 min-w-0">

                <!-- Featured image -->
                <?php if (!empty($data['image'])): ?>
                    <div class="rounded-2xl overflow-hidden mb-8 shadow-md">
                        <img src="../uploads/blog/<?= htmlspecialchars($data['image']) ?>"
                            alt="<?= htmlspecialchars($data['title']) ?>"
                            class="w-full h-64 sm:h-80 lg:h-96 object-cover">
                    </div>
                <?php endif; ?>

                <!-- Main description -->
                <?php if (!empty($intro)): ?>
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">
                        <div id="blog-content" class="blog-prose">

                            <?php foreach ($intro as $item): ?>

                                <!-- Subheading -->
                                <?php if (!empty($item['subheading'])): ?>
                                    <h2><?= htmlspecialchars($item['subheading']) ?></h2>
                                <?php endif; ?>



                                <!-- Content (CKEditor / HTML allowed) -->
                                <?php if (!empty($item['content'])): ?>
                                    <p>
                                        <?= $item['content'] ?>
                                    </p>
                                <?php endif; ?>

                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php endif; ?>>

                    <!-- Sections -->
                    <?php if (!empty($sections)): ?>
                        <?php foreach ($sections as $i => $sec): ?>
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8 mb-6">
                                <h2 id="section-<?= $i ?>"
                                    class="display text-2xl font-bold text-[#424649] mb-4 pb-3 border-b-2 border-[#a22426] inline-block">
                                    <?= htmlspecialchars($sec['title']) ?>
                                </h2>
                                <div class="blog-prose mt-4">
                                    <?= $sec['content'] ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Back link -->
                    <a href="index.php"
                        class="inline-flex items-center gap-2 text-sm font-medium text-[#a22426] hover:text-[#7d1b1d] transition-colors no-underline mt-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to all posts
                    </a>
            </article>

            <!-- ── SIDEBAR: TOC ── -->
            <?php if (!empty($sections)): ?>
                <aside class="w-full lg:w-64 xl:w-72 lg:sticky lg:top-20 flex-shrink-0">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                        <!-- TOC header -->
                        <div class="bg-[#424649] px-5 py-4 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#a22426] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h10" />
                            </svg>
                            <h4 class="text-xs font-semibold text-white tracking-widest uppercase">Table of Contents</h4>
                        </div>

                        <!-- TOC links -->
                        <ul class="py-3">
                            <?php foreach ($sections as $i => $sec):
                                $label = !empty($sec['toc']) ? $sec['toc'] : $sec['title'];
                            ?>
                                <li>
                                    <a href="#section-<?= $i ?>"
                                        class="toc-link flex items-center gap-2 px-5 py-2.5 text-sm text-[#6b6f72] border-l-2 border-transparent hover:text-[#a22426] hover:border-[#a22426] hover:bg-[#fdf3f3] transition-all no-underline">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current flex-shrink-0 opacity-50"></span>
                                        <?= htmlspecialchars($label) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Share card -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mt-5">
                        <h4 class="text-xs font-semibold text-[#424649] tracking-widest uppercase mb-3">Share This Post</h4>
                        <div class="flex gap-2">
                            <a href="https://twitter.com/intent/tweet?text=<?= urlencode($data['title']) ?>&url=<?= urlencode($_SERVER['REQUEST_URI']) ?>"
                                target="_blank"
                                class="flex-1 flex items-center justify-center gap-1.5 text-xs font-medium text-white bg-[#424649] hover:bg-[#2d3033] rounded-lg py-2.5 no-underline transition-colors">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.261 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                                Twitter
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href).then(()=>this.textContent='Copied!')"
                                class="flex-1 flex items-center justify-center gap-1.5 text-xs font-medium text-[#424649] bg-gray-100 hover:bg-gray-200 rounded-lg py-2.5 transition-colors cursor-pointer border-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3" />
                                </svg>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </aside>
            <?php endif; ?>

        </div>
    </div>

    <script>
        const sections = document.querySelectorAll('#blog-content h2, [id^="section-"]');
        const tocLinks = document.querySelectorAll('.toc-link');

        if (tocLinks.length && sections.length) {
            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    if (window.scrollY >= section.offsetTop - 160) {
                        current = section.getAttribute('id');
                    }
                });
                tocLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.add('active');
                    }
                });
            });
        }
    </script>
</body>

</html>