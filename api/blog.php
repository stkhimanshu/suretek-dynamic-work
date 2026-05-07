<?php

/** @var mysqli $conn */
header('Content-Type: application/json');


include("../includes/config.php");
include("../includes/blog-service.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
    exit;
}

$action = $_POST['action'] ?? '';

switch ($action) {
    /*
    |--------------------------------------------------------------------------
    | ADD BLOG
    |--------------------------------------------------------------------------
    */
    case 'add_blog':

        // Default status = Inactive/Draft
        $status = isset($_POST['status']) ? (int)$_POST['status'] : 0;
        // Handle highlight words here (cleaning only)
        $highlightRaw = $_POST['highlight_words'] ?? '';
        $highlightArr = array_filter(array_map('trim', explode(',', $highlightRaw)));

        $_POST['highlight_words_json'] = json_encode($highlightArr);

        $result = addBlog($conn, $_POST, $_FILES);

        echo json_encode([
            "status" => $result ? "success" : "error",
            "message" => $result ? "Blog added successfully" : "Failed to add blog"
        ]);
        break;
    /*
    |--------------------------------------------------------------------------
    | Change BLOG Status
    |--------------------------------------------------------------------------
    */
    case 'change_status':

        $blogId = (int)($_POST['blog_id'] ?? 0);
        $status = (int)($_POST['status'] ?? 0);

        // Allowed statuses
        $allowedStatuses = [0, 1, 2];

        if (
            $blogId <= 0 ||
            !in_array($status, $allowedStatuses)
        ) {

            echo json_encode([
                "status" => "error",
                "message" => "Invalid request"
            ]);

            exit;
        }

        $updated = changeBlogStatus($conn, $blogId, $status);

        if ($updated) {

            echo json_encode([
                "status" => "success",
                "message" => "Blog status updated successfully"
            ]);
        } else {

            echo json_encode([
                "status" => "error",
                "message" => "Failed to update blog status"
            ]);
        }

        break;
    /*
    |--------------------------------------------------------------------------
    | UPDATE BLOG
    |--------------------------------------------------------------------------
    */
    case 'update_blog':

        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {

            echo json_encode([
                "status" => "error",
                "message" => "Invalid blog ID"
            ]);

            exit;
        }

        // Highlight words
        $highlightRaw = $_POST['highlight_words'] ?? '';

        $highlightArr = array_filter(
            array_map('trim', explode(',', $highlightRaw))
        );

        $_POST['highlight_words_json'] = json_encode($highlightArr);

        // CALL UPDATE FUNCTION
        $result = updateBlog($conn, $id, $_POST, $_FILES);

        echo json_encode([
            "status" => $result ? "success" : "error",
            "message" => $result
                ? "Blog updated successfully"
                : "Failed to update blog"
        ]);

        break;
    /*
    |--------------------------------------------------------------------------
    | Delete BLOG
    |--------------------------------------------------------------------------
    */
    case 'delete_blog':

        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {

            echo json_encode([
                "status" => "error",
                "message" => "Invalid blog ID"
            ]);

            exit;
        }

        $result = deleteBlog($conn, $id);

        echo json_encode([
            "status" => $result ? "success" : "error",
            "message" => $result
                ? "Blog deleted successfully"
                : "Failed to delete blog"
        ]);

        break;
    /*
    |--------------------------------------------------------------------------
    | ADD CATEGORY
    |--------------------------------------------------------------------------
    */
    case 'add_category':

        $response = addCategory($conn, $_POST['title'] ?? '');
        echo json_encode($response);
        break;
    /*
    |--------------------------------------------------------------------------
    | GET ALL CATEGORIES
    |--------------------------------------------------------------------------
    */
    case 'get_categories':

        $result = mysqli_query(
            $conn,
            "SELECT * FROM blog_category ORDER BY id DESC"
        );

        $categories = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        echo json_encode([
            "status" => "success",
            "data" => $categories
        ]);
        break;

    /*
    |--------------------------------------------------------------------------
    | UPDATE CATEGORY
    |--------------------------------------------------------------------------
    */
    case 'update_category':

        $id = (int) ($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');

        if ($id <= 0 || $title === '') {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid category data"
            ]);
            exit;
        }

        $title = mysqli_real_escape_string($conn, $title);

        $update = mysqli_query(
            $conn,
            "UPDATE blog_category SET title='$title' WHERE id=$id"
        );

        echo json_encode([
            "status" => $update ? "success" : "error",
            "message" => $update
                ? "Category updated successfully"
                : "Failed to update category"
        ]);
        break;

    /*
    |--------------------------------------------------------------------------
    | DELETE CATEGORY
    |--------------------------------------------------------------------------
    */
    case 'delete_category':

        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid category ID"
            ]);
            exit;
        }

        // Optional safety check
        // Prevent deleting category used in blogs


        $check = mysqli_query(
            $conn,
            "SELECT id FROM blog WHERE category_id = $id"
        );

        if (mysqli_num_rows($check) > 0) {
            echo json_encode([
                "status" => "error",
                "message" => "Category is used in blogs"
            ]);
            exit;
        }

        $delete = mysqli_query(
            $conn,
            "DELETE FROM blog_category WHERE id=$id"
        );

        echo json_encode([
            "status" => $delete ? "success" : "error",
            "message" => $delete
                ? "Category deleted successfully"
                : "Failed to delete category"
        ]);
        break;

    /*
    |--------------------------------------------------------------------------
    | DEFAULT
    |--------------------------------------------------------------------------
    */
    default:
        echo json_encode([
            "status" => "error",
            "message" => "Invalid action"
        ]);
}
