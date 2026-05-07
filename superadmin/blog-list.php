<?php

/** @var mysqli $conn */
include("../includes/config.php");
include("auth-check.php");

$page = max(1, (int)($_GET['page'] ?? 1));

$search = trim($_GET['search'] ?? '');

$category = (int)($_GET['category'] ?? 0);

$limit = 10;

$offset = ($page - 1) * $limit;

/*
|--------------------------------------------------------------------------
| Dynamic WHERE
|--------------------------------------------------------------------------
*/

$where = "WHERE b.status = 1";

if ($search !== '') {

    $searchEscaped = mysqli_real_escape_string($conn, $search);

    $where .= "
        AND (
            b.title LIKE '%$searchEscaped%'
            OR b.description LIKE '%$searchEscaped%'
        )
    ";
}

if ($category > 0) {

    $where .= " AND b.category_id = $category";
}

/*
|--------------------------------------------------------------------------
| Count Total Rows
|--------------------------------------------------------------------------
*/

$countQuery = "
    SELECT COUNT(*) as total
    FROM blog b
    LEFT JOIN blog_category c
    ON b.category_id = c.id

    $where
";

$countResult = mysqli_query($conn, $countQuery);

$totalRows = mysqli_fetch_assoc($countResult)['total'];

$totalPages = ceil($totalRows / $limit);

/*
|--------------------------------------------------------------------------
| Main Query
|--------------------------------------------------------------------------
*/

$query = "
    SELECT b.*, c.title AS category_name

    FROM blog b

    LEFT JOIN blog_category c
    ON b.category_id = c.id

    $where

    ORDER BY b.id DESC

    LIMIT $limit OFFSET $offset
";

$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs List</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
</head>

<body class="bg-[#f5f4f0] min-h-screen p-4 sm:p-6 lg:p-8">

    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-sm p-4 sm:p-6">

        <!-- Header -->
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">Blog List</h1>
                <p class="text-sm text-gray-500 mt-0.5">Manage all blogs</p>
            </div>
           <div>
             <a href="blog-add.php"
                class="inline-flex items-center justify-center gap-1.5 bg-[#a22426] hover:bg-[#8a1e20] text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-colors w-full sm:w-auto">
                <span class="text-base leading-none">+</span> Add Blog
            </a>
                <a href="logout.php"
                class="inline-flex items-center justify-center gap-1.5 bg-[#000] hover:bg-[#8a1e20] text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-colors w-full sm:w-auto">
                <span class="text-base leading-none"><i class="ti ti-logout text-base"></i></span>Log Out
            </a>
           </div>
        </div>

        <!-- Desktop Table -->
        <form method="GET"
            class="flex flex-col md:flex-row gap-3 mb-6">

            <!-- Search -->
            <input
                type="text"
                name="search"
                value="<?= htmlspecialchars($search) ?>"
                placeholder="Search blogs..."
                class="w-full md:w-72 border border-gray-200 rounded-lg px-4 py-2 text-sm">

            <!-- Category -->
            <select
                name="category"
                class="w-full md:w-56 border border-gray-200 rounded-lg px-4 py-2 text-sm">

                <option value="">All Categories</option>

                <?php

                $catQuery = mysqli_query(
                    $conn,
                    "SELECT * FROM blog_category ORDER BY title ASC"
                );

                while ($cat = mysqli_fetch_assoc($catQuery)):

                ?>

                    <option
                        value="<?= $cat['id'] ?>"
                        <?= $category == $cat['id'] ? 'selected' : '' ?>>

                        <?= htmlspecialchars($cat['title']) ?>

                    </option>

                <?php endwhile; ?>

            </select>

            <div class="flex gap-2">

                <!-- Search Button -->
                <button
                    type="submit"
                    class="bg-[#a22426] hover:bg-[#8a1e20] text-white px-5 py-2 rounded-lg text-sm transition-colors">

                    Search
                </button>

                <!-- Clear Filter -->
                <a
                    href="blog-list.php"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-lg text-sm transition-colors">

                    Clear Filter
                </a>

            </div>

        </form>
        <div class="hidden md:block overflow-x-auto rounded-xl border border-gray-200">

            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        <th class="px-4 py-3 w-24">Image</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3 w-36">Category</th>
                        <th class="px-4 py-3 w-32">Date</th>
                        <th class="px-4 py-3 w-32 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3">
                                <img
                                    src="../uploads/blog/<?= htmlspecialchars($row['image']) ?>"
                                    alt="<?= htmlspecialchars($row['title']) ?>"
                                    class="w-20 h-14 object-cover rounded-lg bg-gray-100">
                            </td>
                            <td class="px-4 py-3">
                                <span class="font-medium text-gray-900 line-clamp-2">
                                    <?= htmlspecialchars($row['title']) ?>
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block bg-gray-100 text-gray-600 text-xs font-medium px-2.5 py-1 rounded-full text-center">
                                    <?= htmlspecialchars($row['category_name']) ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                                <?= date("d M Y", strtotime($row['created_at'])) ?>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2 justify-center">
                                    <a href="blog-edit.php?id=<?= $row['id'] ?>" title="Edit Blog"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">
                                        <i class="ti ti-pencil text-sm" aria-hidden="true"></i>
                                    </a>
                                    <button
                                        onclick="deleteBlog(<?= $row['id'] ?>)" title="Delete Blog"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">
                                        <i class="ti ti-trash text-sm" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php if ($totalPages > 1): ?>

            <div class="flex flex-wrap justify-center gap-2 mt-8">

                <!-- Previous -->
                <?php if ($page > 1): ?>

                    <a
                        href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&category=<?= $category ?>"
                        class="px-4 py-2 rounded-lg bg-gray-100 text-sm hover:bg-gray-200">

                        Prev
                    </a>

                <?php endif; ?>

                <!-- Pages -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                    <a
                        href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&category=<?= $category ?>"
                        class="px-4 py-2 rounded-lg text-sm
            <?= $page == $i
                        ? 'bg-[#a22426] text-white'
                        : 'bg-gray-100 hover:bg-gray-200 text-gray-700' ?>">

                        <?= $i ?>

                    </a>

                <?php endfor; ?>

                <!-- Next -->
                <?php if ($page < $totalPages): ?>

                    <a
                        href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&category=<?= $category ?>"
                        class="px-4 py-2 rounded-lg bg-gray-100 text-sm hover:bg-gray-200">

                        Next
                    </a>

                <?php endif; ?>

            </div>

        <?php endif; ?>

        <!-- Mobile Card List -->
        <?php
        // Reset result pointer for mobile view
        mysqli_data_seek($result, 0);
        ?>
        <div class="md:hidden space-y-3">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="border border-gray-200 rounded-xl p-3 hover:shadow-sm transition-shadow bg-white">
                    <div class="flex gap-3">
                        <img
                            src="../uploads/blog/<?= htmlspecialchars($row['image']) ?>"
                            alt="<?= htmlspecialchars($row['title']) ?>"
                            class="w-20 h-16 object-cover rounded-lg flex-shrink-0 bg-gray-100">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 text-sm leading-snug line-clamp-2 mb-1.5">
                                <?= htmlspecialchars($row['title']) ?>
                            </p>
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="inline-block bg-gray-100 text-gray-600 text-xs font-medium px-2 py-0.5 rounded-full">
                                    <?= htmlspecialchars($row['category_name']) ?>
                                </span>
                                <span class="text-xs text-gray-400">
                                    <?= date("d M Y", strtotime($row['created_at'])) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-3 pt-3 border-t border-gray-100">
                        <a href="blog-edit.php?id=<?= $row['id'] ?>"
                            class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-xs font-medium transition-colors">
                            Edit
                        </a>
                        <button
                            onclick="deleteBlog(<?= $row['id'] ?>)"
                            class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg text-xs font-medium transition-colors">
                            Delete
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Empty State (optional, shown when no blogs exist) -->
        <?php if (mysqli_num_rows($result) === 0): ?>
            <div class="text-center py-16 text-gray-400">
                <p class="text-4xl mb-3">📄</p>
                <p class="font-medium text-gray-600">No blogs found</p>
                <p class="text-sm mt-1">Get started by adding your first blog post.</p>
                <a href="blog-add.php"
                    class="inline-block mt-4 bg-[#a22426] text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-[#8a1e20] transition-colors">
                    + Add Blog
                </a>
            </div>
        <?php endif; ?>

    </div>

    <script>
        function deleteBlog(id) {

            if (!confirm("Delete this blog?")) return;

            const fd = new FormData();
            fd.append("action", "delete_blog");
            fd.append("id", id);

            fetch('../api/blog.php', {
                    method: 'POST',
                    body: fd
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.status === 'success') {
                        location.reload();
                    }
                });
        }
    </script>

</body>

</html>