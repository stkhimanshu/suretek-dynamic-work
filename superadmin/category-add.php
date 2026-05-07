<?php

/** @var mysqli $conn */
include("../includes/config.php");
include("../includes/blog-service.php");
include("auth-check.php");

$message = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-[#f5f4f0] text-[#424649]">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <h1 class="display text-lg font-semibold">Admin Panel</h1>
            <span class="text-sm text-[#424649]/60">Add Category</span>
        </div>
    </nav>

    <!-- PAGE -->
    <div class="max-w-xl mx-auto mt-10 px-4">

        <!-- Heading -->
        <div class="mb-6">
            <h2 class="display text-2xl font-semibold">Create New Category</h2>
            <p class="text-sm text-[#424649]/60">Add categories to organize your blog posts</p>
        </div>

        <!-- Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">

            <!-- Message -->
            <div id="msgBox" class="hidden mb-4 text-sm px-4 py-2 rounded-lg"></div>

            <!-- Form -->
            <form method="POST" class="space-y-5" id="categoryForm">

                <div>
                    <label class="block text-xs font-medium uppercase mb-1 text-[#424649]/70">
                        Category Name <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="title" placeholder="e.g. Technology"
                        class="w-full rounded-lg px-4 py-3 text-sm border border-[#e0dcdc]
                    focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10">
                </div>

                <button type="submit" name="submit"
                    class="w-full bg-[#a22426] hover:bg-[#881e20] text-white py-3 rounded-lg text-sm font-medium transition-all">
                    Add Category
                </button>

            </form>
        </div>

    </div>

</body>

</html>

<script>
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log("working")

        const form = this;
        const formData = new FormData(form);

        // optional but safe
        formData.append("action", "add_category");
        fetch('../api/blog.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                const msgBox = document.getElementById("msgBox");
                // alert(data.message);
                msgBox.innerText = data.message;
                msgBox.classList.remove("hidden");

                if (data.status === 'success') {
                    msgBox.className = "mb-4 text-sm px-4 py-2 rounded-lg bg-green-50 text-green-600";
                    form.reset();
                } else {
                    msgBox.className = "mb-4 text-sm px-4 py-2 rounded-lg bg-red-50 text-red-600";
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert("Something went wrong");
            });
    })
</script>