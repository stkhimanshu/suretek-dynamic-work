<?php

function getCategories($conn)
{
    $res = mysqli_query($conn, "SELECT * FROM categories WHERE status=1");
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
// ========================
// Image Upload
// ========================
function uploadImage($file)
{
    if (!isset($file) || $file['name'] == '') return '';

    $uploadDir = "../uploads/blog/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = time() . "_" . basename($file['name']);
    $targetFile = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $fileName;
    }

    return '';
}
// ========================
// Generate Slug Title
// ========================
function generateSlug($title)
{
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
}

// ========================
// Section Data Store in DB
// ========================

function buildSections($data)
{
    $sections = [];

    $titles   = $data['section_title'] ?? [];
    $contents = $data['section_content'] ?? [];
    $tocs     = $data['section_toc'] ?? [];
    $subs     = $data['section_subheading'] ?? [];

    $total = max(
        count($titles),
        count($contents),
        count($tocs),
        count($subs)
    );

    for ($i = 0; $i < $total; $i++) {

        $title   = trim($titles[$i] ?? '');
        $content = trim($contents[$i] ?? '');
        $toc     = trim($tocs[$i] ?? '');
        $sub     = trim($subs[$i] ?? '');

        // skip empty section
        if ($title === '' && $content === '') continue;

        $sections[] = [
            "title"      => $title,
            "toc"        => $toc,
            "subheading" => $sub,
            "content"    => $content
        ];
    }

    return json_encode($sections, JSON_UNESCAPED_UNICODE);
}

function buildMeta($data)
{
    $meta = [
        "meta_title" => trim($data['meta_title'] ?? ''),
        "meta_description" => trim($data['meta_description'] ?? ''),
        "image_alt" => trim($data['image_alt'] ?? '')
    ];

    return json_encode($meta, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}


// ========================
// Add Intro data in Database
// ========================

function buildIntro($data)
{
    $intros = [];

    $subheadings = $data['intro_subheading'] ?? [];
    $contents    = $data['intro_content'] ?? [];
    $subtitles   = $data['intro_subtitle'] ?? [];

    $total = max(count($subheadings), count($contents), count($subtitles));

    for ($i = 0; $i < $total; $i++) {

        $subheading = trim($subheadings[$i] ?? '');
        $content    = trim($contents[$i] ?? '');
        $subtitle   = trim($subtitles[$i] ?? '');

        // Skip empty rows (same as FAQ logic)
        if ($subheading === '' && $content === '' && $subtitle === '') {
            continue;
        }

        $intros[] = [
            "subheading" => $subheading,
            "content"    => $content,
            "subtitle"   => $subtitle
        ];
    }

    return json_encode($intros, JSON_UNESCAPED_UNICODE);
}


// ========================
// Add FAQ's in Database
// ========================
function buildFaq($data)
{
    $faqs = [];

    $questions = $data['faq_question'] ?? [];
    $answers   = $data['faq_answer'] ?? [];

    $total = max(count($questions), count($answers));


    for ($i = 0; $i < $total; $i++) {

        $q = trim($questions[$i] ?? '');
        $a = trim($answers[$i] ?? '');

        if ($q === '' && $a === '') continue;

        $faqs[] = [
            "question" => $q,
            "answer"   => $a
        ];
    }

    return json_encode($faqs, JSON_UNESCAPED_UNICODE);
}
// ========================
// Change Blog Status Service
// ========================
function changeBlogStatus($conn, $blogId, $status)
{
    $blogId = (int)$blogId;
    $status = (int)$status;

    $query = "
        UPDATE blog
        SET status = '$status'
        WHERE id = '$blogId'
    ";

    return mysqli_query($conn, $query);
}
// ========================
// Add Blog Query
// ========================
function addBlog($conn, $data, $files)
{
    $title = mysqli_real_escape_string($conn, $data['title']);
    $category_id = (int)$data['category_id'];
    // $description = mysqli_real_escape_string($conn, $data['description'] ?? '');

    $status = isset($data['status']) ? (int)$data['status'] : 0;
    $slug = generateSlug($title);
    $imageName = uploadImage($files['image'] ?? null);
    $meta_json = mysqli_real_escape_string($conn, buildMeta($data));
    $intro_json = mysqli_real_escape_string($conn, buildIntro($data));
    $sections_json = mysqli_real_escape_string($conn, buildSections($data));
    $faq_json = mysqli_real_escape_string($conn, buildFaq($data));
    $highlight_json = mysqli_real_escape_string($conn, $data['highlight_words_json'] ?? '[]');

    $query = "INSERT INTO blog 
        (title, category_id, slug, seo_meta, sections, introdetail, image, faq, highlight_words, status)
        VALUES 
        ('$title', '$category_id', '$slug', '$meta_json', '$sections_json', '$intro_json', '$imageName', '$faq_json', '$highlight_json', '$status')";

    return mysqli_query($conn, $query);
}

// ========================
// UPDATE BLOG QUERY        
// ========================
function updateBlog($conn, $id, $data, $files)
{
    $id = (int)$id;

    $title = mysqli_real_escape_string($conn, $data['title']);
    $category_id = (int)$data['category_id'];
    $description = mysqli_real_escape_string($conn, $data['description'] ?? '');

    $slug = generateSlug($title);

    // Existing image
    $oldQuery = mysqli_query($conn, "SELECT image FROM blog WHERE id = $id");
    $oldBlog = mysqli_fetch_assoc($oldQuery);

    $imageName = $oldBlog['image'] ?? '';

    // Upload new image if exists
    if (!empty($files['image']['name'])) {

        $newImage = uploadImage($files['image']);

        if ($newImage) {
            $imageName = $newImage;
        }
    }

    $meta_json = mysqli_real_escape_string($conn, buildMeta($data));

    $intro_json = mysqli_real_escape_string($conn, buildIntro($data));

    $sections_json = mysqli_real_escape_string($conn, buildSections($data));

    $faq_json = mysqli_real_escape_string($conn, buildFaq($data));

    $highlight_json = mysqli_real_escape_string(
        $conn,
        $data['highlight_words_json'] ?? '[]'
    );

    $query = "
        UPDATE blog SET

            title = '$title',
            category_id = '$category_id',
            slug = '$slug',
            description = '$description',
            seo_meta = '$meta_json',
            sections = '$sections_json',
            introdetail = '$intro_json',
            image = '$imageName',
            faq = '$faq_json',
            highlight_words = '$highlight_json',
            status = 1

        WHERE id = $id
    ";

    return mysqli_query($conn, $query);
}
// ========================
// Delete Blog
// ========================
function deleteBlog($conn, $id)
{
    $id = (int)$id;

    // Get existing image
    $query = mysqli_query(
        $conn,
        "SELECT image FROM blog WHERE id = $id LIMIT 1"
    );

    $blog = mysqli_fetch_assoc($query);

    if (!$blog) {
        return false;
    }

    // Delete image from folder
    if (!empty($blog['image'])) {

        $imagePath = __DIR__ . '/../uploads/blog/' . $blog['image'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete blog from DB
    return mysqli_query(
        $conn,
        "DELETE FROM blog WHERE id = $id"
    );
}
// ========================
// Add Category in DB
// ========================
function addCategory($conn, $title)
{
    $title = mysqli_real_escape_string($conn, $title);

    if (empty($title)) {
        return ["status" => "error", "message" => "Category required"];
    }

    $check = mysqli_query($conn, "SELECT id FROM blog_category WHERE title='$title'");
    if (mysqli_num_rows($check) > 0) {
        return ["status" => "error", "message" => "Category exists"];
    }

    $query = "INSERT INTO blog_category (title, status) VALUES ('$title', 1)";

    if (mysqli_query($conn, $query)) {
        return ["status" => "success", "message" => "Category added"];
    }

    return ["status" => "error", "message" => mysqli_error($conn)];
}
