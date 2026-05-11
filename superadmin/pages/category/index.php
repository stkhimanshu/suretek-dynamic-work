<?php

$pageTitle = 'Categories';

include("../../auth-check.php");
include '../../components/layout-start.php';

?>

<section>
    <?php include("../../category-list.php"); ?>
</section>

<script>
    var CATEGORY_API_BASE = "http://admin.suretek.local/api/v1/categories";
    var CATEGORY_TYPE = "blog";

    // Helpers
    function escHtml(str) {
        return str
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;");
    }

    // Toast
    let toastTimer = null;

    function showToast(title, sub, type) {
        sub = sub || "";
        type = type || "success";

        var toast = document.getElementById("toast");
        var iconEl = document.getElementById("toast-icon");
        var progEl = document.getElementById("toast-progress");

        document.getElementById("toast-title").textContent = title;
        document.getElementById("toast-sub").textContent = sub;

        iconEl.innerHTML = type === "success" ?
            '<i class="ti ti-check" aria-hidden="true"></i>' :
            '<i class="ti ti-alert-circle" aria-hidden="true"></i>';

        progEl.style.animation = "none";
        void progEl.offsetWidth;
        progEl.style.animation = "";

        toast.className = "toast " + type + " show";

        if (toastTimer) clearTimeout(toastTimer);
        toastTimer = setTimeout(function() {
            toast.className = "toast " + type;
        }, 2800);
    }

    // Render
    function renderCategories(categories) {
        var container = document.getElementById("categoryContainer");
        var countEl = document.getElementById("cat-count");

        countEl.textContent = categories.length === 0 ?
            "No categories yet" :
            categories.length + " categor" + (categories.length === 1 ? "y" : "ies");

        if (categories.length === 0) {
            container.innerHTML =
                '<div class="text-center py-12 text-gray-400 text-sm">' +
                '<i class="ti ti-inbox text-4xl block mb-2" aria-hidden="true"></i>' +
                'No categories yet. Add one above.' +
                '</div>';
            return;
        }

        container.innerHTML = categories.map(function(cat) {
            return '<div class="cat-card flex items-center gap-3 border border-gray-100 rounded-xl px-4 py-3 bg-white">' +
                '<i class="ti ti-tag text-gray-300 text-lg flex-shrink-0" aria-hidden="true"></i>' +
                '<input type="text" value="' + escHtml(cat.title) + '" id="cat-' + cat.id + '" aria-label="Category name" class="cat-input flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-sm bg-gray-50 text-gray-800 transition-shadow" />' +
                '<div class="flex gap-2 flex-shrink-0">' +
                '<button onclick="openEditModal(' + cat.id + ', \'' + escHtml(cat.title) + '\')" aria-label="Update category" class="btn-update flex items-center gap-1.5 bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition-opacity">' +
                '<i class="ti ti-device-floppy text-sm" aria-hidden="true"></i>' +
                '<span class="hidden sm:inline">Update</span>' +
                '</button>' +
                '<button onclick="deleteCategory(' + cat.id + ')" aria-label="Delete category" class="btn-delete flex items-center gap-1 border border-gray-200 text-gray-400 px-3 py-1.5 rounded-lg text-xs font-medium transition-colors">' +
                '<i class="ti ti-trash text-sm" aria-hidden="true"></i>' +
                '</button>' +
                '</div>' +
                '</div>';
        }).join("");
    }

    // Load
    function loadCategories() {
        fetch(CATEGORY_API_BASE + '?type=' + encodeURIComponent(CATEGORY_TYPE), {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {
                renderCategories(data.data || []);
            })
            .catch(function() {
                showToast("Failed to load", "Could not fetch categories.", "error");
            });
    }

    function submitUpdateCategory() {

        var id = document.getElementById("editCatId").value;
        var title = document.getElementById("editCatTitle").value.trim();

        if (!title) {

            showToast(
                "Name required",
                "Category name can't be empty.",
                "error"
            );

            return;
        }

        fetch(CATEGORY_API_BASE + '/' + encodeURIComponent(id), {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    title: title,
                    type: CATEGORY_TYPE
                })
            })
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {

                if (data.success === true) {

                    showToast(
                        "Category updated!",
                        '"' + title + '" has been updated.',
                        "success"
                    );

                    closeEditModal();

                    loadCategories();

                } else {

                    showToast(
                        "Update failed",
                        data.message || "Something went wrong.",
                        "error"
                    );
                }
            })
            .catch(function() {

                showToast(
                    "Update failed",
                    "Something went wrong.",
                    "error"
                );
            });
    }

    function deleteCategory(id) {

        if (!confirm("Delete this category?")) return;

        fetch(CATEGORY_API_BASE + '/' + encodeURIComponent(id), {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {

                // SUCCESS
                if (data.success === true) {

                    showToast(
                        "Category deleted",
                        "The category has been removed.",
                        "success"
                    );

                    loadCategories();
                }

                // ERROR
                else {

                    showToast(
                        "Delete failed",
                        data.message || "Unable to delete category.",
                        "error"
                    );
                }

            })
            .catch(function() {

                showToast(
                    "Delete failed",
                    "Something went wrong. Try again.",
                    "error"
                );
            });
    }

    function openAddModal() {
        document.getElementById("newCatTitle").value = "";
        document.getElementById("addModal").classList.add("open");
        setTimeout(function() {
            document.getElementById("newCatTitle").focus();
        }, 60);
    }

    function closeAddModal() {
        document.getElementById("addModal").classList.remove("open");
    }

    function openEditModal(id, title) {

        document.getElementById("editCatId").value = id;
        document.getElementById("editCatTitle").value = title;

        document.getElementById("editModal").classList.add("open");

        setTimeout(function() {
            document.getElementById("editCatTitle").focus();
        }, 50);
    }

    function closeEditModal() {
        document.getElementById("editModal").classList.remove("open");
    }

    function addCategory() {
        var title = document.getElementById("newCatTitle").value.trim();
        if (!title) {
            document.getElementById("newCatTitle").focus();
            return;
        }

        fetch(CATEGORY_API_BASE + '?category_api_proxy=1', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    title: title,
                    type: CATEGORY_TYPE
                })
            })
            .then(function(res) {
                return res.json();
            })
            .then(function(data) {
                if (data.success === true) {
                    showToast("Category added!", '"' + title + '" is now available.', "success");
                    closeAddModal();
                    loadCategories();
                    return;
                }

                showToast(
                    "Failed to add",
                    data.message || "Something went wrong. Try again.",
                    "error"
                );
            })
            .catch(function() {
                showToast("Failed to add", "Something went wrong. Try again.", "error");
            });
    }

    // Keyboard shortcuts
    document.getElementById("newCatTitle").addEventListener("keydown", function(e) {
        if (e.key === "Enter") addCategory();
        if (e.key === "Escape") closeAddModal();
    });

    document.getElementById("addModal").addEventListener("click", function(e) {
        if (e.target === document.getElementById("addModal")) closeAddModal();
    });

    // Init
    loadCategories();
</script>

<?php include '../../components/layout-end.php'; ?>