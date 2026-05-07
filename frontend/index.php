<?php

/** @var mysqli $conn */
include("../includes/config.php");

$query = "SELECT b.*, c.title as category_name 
          FROM blog b
          LEFT JOIN blog_category c ON b.category_id = c.id
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
    FROM blog_category 
    ORDER BY title ASC
");
if (!$catQuery) die("Category SQL Error: " . mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog – Insights & Stories</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .display {
            font-family: 'Playfair Display', serif;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-img {
            transition: transform 0.4s ease;
        }

        .blog-card:hover .card-img {
            transform: scale(1.06);
        }

        .card-overlay {
            opacity: 0;
            transition: opacity 0.25s;
        }

        .blog-card:hover .card-overlay {
            opacity: 1;
        }

        .read-arrow {
            transition: transform 0.2s;
        }

        .blog-card:hover .read-arrow {
            transform: translateX(4px);
        }

        .cat-arrow {
            opacity: 0;
            transform: translateX(-4px);
            transition: all 0.2s;
        }

        .cat-link:hover .cat-arrow {
            opacity: 1;
            transform: translateX(0);
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
            <!-- Desktop links -->
            <ul class="hidden md:flex gap-6 list-none m-0 p-0">
                <li><a href="#" class="text-sm text-[#6b6f72] hover:text-[#a22426] no-underline transition-colors">Home</a></li>
                <li><a href="#" class="text-sm text-[#a22426] font-medium no-underline">Blog</a></li>
                <li><a href="#" class="text-sm text-[#6b6f72] hover:text-[#a22426] no-underline transition-colors">About</a></li>
                <li><a href="#" class="text-sm text-[#6b6f72] hover:text-[#a22426] no-underline transition-colors">Contact</a></li>
            </ul>

            <!-- Hamburger -->
            <button id="hamburger" class="md:hidden p-1 text-[#424649]" aria-label="Toggle menu">
                <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 px-6 pb-4">
            <a href="#" class="block py-2.5 text-sm text-[#6b6f72] border-b border-gray-100 no-underline">Home</a>
            <a href="#" class="block py-2.5 text-sm text-[#a22426] font-medium border-b border-gray-100 no-underline">Blog</a>
            <a href="#" class="block py-2.5 text-sm text-[#6b6f72] border-b border-gray-100 no-underline">About</a>
            <a href="#" class="block py-2.5 text-sm text-[#6b6f72] no-underline">Contact</a>
        </div>
    </nav>

    <!-- ══ HERO ══ -->
    <div class="bg-[#424649] relative overflow-hidden py-14 sm:py-16 px-4 text-center">
        <div class="absolute -top-14 -right-14 w-64 h-64 rounded-full bg-[#a22426]/15 pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-10 w-52 h-52 rounded-full bg-[#a22426]/10 pointer-events-none"></div>
        <h1 class="display text-white font-bold text-3xl sm:text-4xl lg:text-5xl relative z-10">Insights &amp; Stories</h1>
        <div class="w-12 h-0.5 bg-[#a22426] mx-auto my-4 relative z-10"></div>
        <p class="text-white/55 text-sm sm:text-base font-light max-w-sm mx-auto relative z-10">
            Thoughtful articles on technology, design, and ideas that shape our world.
        </p>
    </div>

    <!-- ══ BODY ══ -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            <!-- ── MAIN COLUMN ── -->
            <main class="w-full lg:flex-1 min-w-0">

                <!-- Heading row -->
                <div class="flex items-center gap-2.5 mb-7">
                    <span class="block w-1 h-5 bg-[#a22426] rounded-sm"></span>
                    <h2 class="display text-xl font-bold text-[#424649] m-0">Latest Posts</h2>
                    <span class="ml-auto text-xs text-[#6b6f72] bg-gray-200 px-3 py-0.5 rounded-full">All Articles</span>
                </div>

                <!-- Blog Grid -->
                <div id="blogCardsContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-5 lg:gap-6">

                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <?php
                        $intro = json_decode($row['introdetail'], true);
                        ?>

                        <a href="blog-detail.php?slug=<?= htmlspecialchars($row['slug'] ?? '#') ?>"
                            class="blog-card group bg-white rounded-2xl overflow-hidden border border-gray-100 no-underline flex flex-col hover:-translate-y-1 hover:shadow-xl transition-all duration-300"
                            data-category="<?= htmlspecialchars($row['category_name'] ?? '') ?>"
                            data-title="<?= htmlspecialchars($row['title']) ?>">

                            <!-- Thumbnail -->
                            <div class="relative overflow-hidden h-44 sm:h-48">
                                <img src="../uploads/blog/<?= htmlspecialchars($row['image']) ?>"
                                    alt="<?= htmlspecialchars($row['title']) ?>"
                                    class="card-img w-full h-full object-cover"
                                    loading="lazy">
                                <div class="card-overlay absolute inset-0 bg-[#424649]/45 flex items-center justify-center">
                                    <div class="w-11 h-11 bg-[#a22426] rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Text body -->
                            <div class="p-4 sm:p-5 flex flex-col flex-1">

                                <?php if (!empty($row['category_name'])): ?>
                                    <span class="text-[10px] font-semibold tracking-widest uppercase text-[#a22426] bg-[#fdf3f3] px-2 py-0.5 rounded self-start mb-2">
                                        <?= htmlspecialchars($row['category_name']) ?>
                                    </span>
                                <?php endif; ?>

                                <h3 class="display text-base font-semibold text-[#424649] leading-snug line-clamp-2 m-0 mb-2">
                                    <?= htmlspecialchars($row['title']) ?>
                                </h3>

                                <p class="text-sm text-[#6b6f72] leading-relaxed line-clamp-3 m-0 flex-1">

                                       <?= htmlspecialchars($intro[0]['content'] ?? '') ?>
                                </p>

                                <div class="mt-4 pt-3 border-t border-gray-100 flex items-center">
                                    <span class="text-sm font-medium text-[#a22426] flex items-center gap-1">
                                        Read more
                                        <svg class="read-arrow w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>

                    <?php endwhile; ?>
                </div>

                <!-- No results -->
                <div id="noResults" class="hidden text-center py-16 text-[#6b6f72]">
                    <svg class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm">No posts matched your search.</p>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center gap-1.5 mt-10">
                    <button disabled class="w-9 h-9 rounded-lg border border-gray-200 bg-white flex items-center justify-center text-[#424649] disabled:opacity-30 hover:border-[#a22426] hover:text-[#a22426] transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="w-9 h-9 rounded-lg bg-[#a22426] text-white text-sm font-medium border border-[#a22426]">1</button>
                    <button class="w-9 h-9 rounded-lg border border-gray-200 bg-white text-[#424649] text-sm hover:border-[#a22426] hover:text-[#a22426] transition-colors">2</button>
                    <button class="w-9 h-9 rounded-lg border border-gray-200 bg-white text-[#424649] text-sm hover:border-[#a22426] hover:text-[#a22426] transition-colors">3</button>
                    <button class="w-9 h-9 rounded-lg border border-gray-200 bg-white flex items-center justify-center text-[#424649] hover:border-[#a22426] hover:text-[#a22426] transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </main>

            <!-- ── SIDEBAR ── -->
            <aside class="w-full lg:w-80 flex flex-col gap-5 lg:sticky lg:top-20">

                <!-- Search -->
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h3 class="display text-base font-bold text-[#424649] pb-2.5 border-b-2 border-[#a22426] inline-block mb-4">Search</h3>
                    <div class="flex rounded-lg overflow-hidden border-[1.5px] border-gray-200 focus-within:border-[#a22426] transition-colors">
                        <input id="searchInput" type="text" placeholder="Search articles..."
                            class="flex-1 px-3.5 py-2.5 text-sm text-[#424649] outline-none bg-transparent placeholder-gray-400"
                            aria-label="Search blogs">
                        <button class="bg-[#a22426] hover:bg-[#7d1b1d] px-3.5 flex items-center justify-center transition-colors" aria-label="Search">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Recent Posts -->
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h3 class="display text-base font-bold text-[#424649] pb-2.5 border-b-2 border-[#a22426] inline-block mb-4">Recent Posts</h3>
                    <div class="flex flex-col divide-y divide-gray-100">
                        <?php while ($recent = mysqli_fetch_assoc($recentQuery)) : ?>
                            <a href="blog-detail.php?slug=<?= htmlspecialchars($recent['slug']) ?>"
                                class="flex gap-3 py-3 first:pt-0 last:pb-0 hover:opacity-75 transition-opacity no-underline">
                                <img src="../uploads/blog/<?= htmlspecialchars(!empty($recent['image']) ? $recent['image'] : 'default.jpg') ?>"
                                    alt="<?= htmlspecialchars($recent['title']) ?>"
                                    class="w-14 h-14 object-cover rounded-lg flex-shrink-0"
                                    loading="lazy">
                                <div class="flex flex-col justify-center min-w-0">
                                    <p class="text-sm font-medium text-[#424649] line-clamp-2 m-0 mb-0.5">
                                        <?= htmlspecialchars($recent['title']) ?>
                                    </p>
                                    <span class="text-xs text-[#6b6f72]">
                                        <?= date("M d, Y", strtotime($recent['created_at'])) ?>
                                    </span>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h3 class="display text-base font-bold text-[#424649] pb-2.5 border-b-2 border-[#a22426] inline-block mb-4">Categories</h3>
                    <ul class="list-none m-0 p-0 divide-y divide-gray-100">
                        <?php while ($cat = mysqli_fetch_assoc($catQuery)) : ?>
                            <li>
                                <a href="?category=<?= (int)$cat['id'] ?>"
                                    class="cat-link flex items-center justify-between py-2.5 text-sm text-[#6b6f72] hover:text-[#a22426] no-underline transition-colors">
                                    <span><?= htmlspecialchars($cat['title']) ?></span>
                                    <span class="cat-arrow text-xs font-medium">→</span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="bg-[#424649] rounded-2xl p-5">
                    <h3 class="display text-base font-bold text-white pb-2.5 border-b-2 border-[#a22426] inline-block mb-4">Stay Updated</h3>
                    <p class="text-sm text-white/55 font-light leading-relaxed mb-4">
                        Get the latest posts and insights delivered straight to your inbox. No spam, ever.
                    </p>
                    <a href="#" class="inline-block bg-[#a22426] hover:bg-[#7d1b1d] text-white text-sm font-medium px-5 py-2.5 rounded-lg no-underline transition-colors">
                        Subscribe →
                    </a>
                </div>

            </aside>
        </div>
    </div>

    <script>
        // Mobile nav
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        hamburger.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden', !isHidden);
            iconClose.classList.toggle('hidden', isHidden);
        });

        // Live search
        const searchInput = document.getElementById('searchInput');
        const noResults = document.getElementById('noResults');
        const allCards = document.querySelectorAll('#blogCardsContainer .blog-card');
        searchInput.addEventListener('input', function() {
            const q = this.value.toLowerCase().trim();
            let visible = 0;
            allCards.forEach(card => {
                const match = !q ||
                    card.dataset.title?.toLowerCase().includes(q) ||
                    card.dataset.category?.toLowerCase().includes(q);
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            noResults.classList.toggle('hidden', visible > 0);
        });
    </script>
</body>

</html>