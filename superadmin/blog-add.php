<style>
    .cke_notifications_area {
        display: none;
    }
</style>
<?php
/** @var mysqli $conn */
include("../../../includes/config.php");
include("../../../includes/blog-service.php");

if (isset($_POST['add_category'])) {
    $catTitle = trim($_POST['cat_title'] ?? '');
    if ($catTitle !== '') {
        mysqli_query($conn, "INSERT INTO blog_category (title, status) VALUES ('" . mysqli_real_escape_string($conn, $catTitle) . "', 1)");
        $catSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .display {
            font-family: 'Playfair Display', serif;
        }

        #uploadZone.dragover {
            border-color: #a22426;
            background-color: #fdf5f5;
        }

        .cke_chrome {
            border: 1.5px solid #e0dcdc !important;
            border-radius: 8px !important;
            overflow: hidden;
        }

        .cke_top {
            background: #fafafa !important;
            border-bottom: 1px solid #e0dcdc !important;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f5f4f0] text-[#424649]">

    <!-- ══ PAGE BODY ══ -->
    <div class="">
        <div class="mb-8">
            <h1 class="display text-3xl font-semibold text-[#424649]">Create New Blog Post</h1>
            <p class="mt-1 text-sm text-[#424649]/55">Fill in the details below to publish your article</p>
        </div>

        <form method="POST" enctype="multipart/form-data" id="blogForm">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- ── MAIN COLUMN ── -->
                <div class="flex-1 space-y-6">

                    <!-- Card: Featured Image -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-base font-medium text-[#424649] mb-5 flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-[#a22426] text-white text-[11px] font-medium flex items-center justify-center flex-shrink-0">✦</span>
                            Featured Image
                        </h2>
                        <div id="uploadZone" class="relative rounded-xl border-2 border-dashed border-[#d1c9c9] bg-[#fdfcfc] hover:border-[#a22426] hover:bg-[#fdf5f5] transition-all duration-200 cursor-pointer p-10 text-center mb-3">
                            <input type="file" name="image" accept="image/*" id="imageInput" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div id="upload-placeholder">
                                <div class="mx-auto mb-3 w-12 h-12 rounded-full bg-red-50 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-[#a22426]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-[#424649]">Drop your image here or <span class="text-[#a22426]">browse</span></p>
                                <p class="text-xs text-[#424649]/45 mt-1">PNG, JPG, WEBP up to 1MB</p>
                                <span id="image-error" class="text-xs text-red-500 mt-2 block hidden"></span>
                            </div>
                            <div id="image-preview" class="hidden space-y-3">
                                <img id="preview-img" src="" alt="Preview" class="mx-auto max-h-48 rounded-lg object-cover shadow">
                                <p id="preview-name" class="text-xs text-[#424649]/60"></p>
                                <button type="button" onclick="clearImage()" class="relative z-20 text-xs text-[#a22426] hover:underline cursor-pointer">Remove image</button>
                            </div>
                        </div>
                        <!-- Image Alt Text -->
                        <div class="mb-2">
                            <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide w-full">Image Alt Text</label>
                            <input type="text" name="image_alt" placeholder="e.g. Hero banner showing product"
                                class="w-full rounded-lg px-4 py-3 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors">
                        </div>
                    </div>


                    <!-- Card: Post Content -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <!-- Meta Section -->
                        <div class="mb-6">

                            <div class="flex items-center gap-2 mb-5">
                                <span class="w-5 h-5 rounded-full bg-[#a22426] text-white text-[11px] font-medium flex items-center justify-center flex-shrink-0">1</span>
                                <h2 class="text-base font-medium text-[#424649]">Meta Information</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <!-- Meta Title -->
                                <div>
                                    <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Meta Title</label>
                                    <input type="text" name="meta_title" placeholder="This is a meta title for SEO purposes"
                                        class="w-full rounded-lg px-3.5 py-2.5 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors">
                                </div>

                                <!-- Meta Description -->
                                <div>
                                    <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Meta Description</label>
                                    <input name="meta_description" placeholder="e.g. This is a meta description for SEO purposes" rows="2"
                                        class="w-full rounded-lg px-3.5 py-2.5 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors resize-y"></input>
                                </div>

                            </div>
                        </div>
                        <div class="flex items-center gap-2 mb-5">
                            <span class="w-5 h-5 rounded-full bg-[#a22426] text-white text-[11px] font-medium flex items-center justify-center flex-shrink-0">2</span>
                            <h2 class="text-base font-medium text-[#424649]">Post Content</h2>
                        </div>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Blog Title <span class="text-[#a22426]">*</span></label>
                                <input type="text" name="title" placeholder="Enter an engaging blog title..." required
                                    class="w-full rounded-lg px-4 py-3 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors">
                            </div>
                            <div class="border border-gray-100 rounded-xl p-4 bg-[#fafafa] space-y-4">
                                <p class="text-xs font-semibold text-[#a22426] uppercase tracking-widest">Intro Section</p>

                                <div class="flex flex-col gap-3">
                                    <div class="flex-1">
                                        <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Section Sub Title</label>
                                        <input type="text" name="intro_subheading[]" placeholder="e.g. Introduction"
                                            class="w-full rounded-lg px-3.5 py-2.5 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors">
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Secondary Sub Title</label>
                                        <input type="text" name="intro_subtitle[]" placeholder="e.g. Sub Title"
                                            class="w-full rounded-lg px-3.5 py-2.5 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors">
                                    </div>
                                    <div class="w-full">
                                        <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Description</label>
                                        <input type="text" name="intro_content[]" placeholder="Section Description"
                                            class="w-full rounded-lg px-3.5 py-2.5 text-sm text-[#424649] placeholder-gray-400 border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-[#424649]/70 uppercase mb-1.5">
                                            Highlight Words
                                        </label>
                                        <textarea name="highlight_words"
                                            placeholder="e.g. Marketing"
                                            class="w-full rounded-lg px-4 py-3 text-sm border border-[#e0dcdc]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ══ Card: Sections ══ -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-[#a22426] text-white text-[11px] font-medium flex items-center justify-center flex-shrink-0">3</span>
                                <h2 class="text-base font-medium text-[#424649]">Sections</h2>
                            </div>
                            <button type="button" onclick="addSection()"
                                class="inline-flex items-center gap-1.5 bg-[#a22426] hover:bg-[#881e20] active:scale-95 text-white text-xs font-semibold px-3.5 py-2 rounded-lg transition-all duration-150 shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Section
                            </button>
                        </div>
                        <div id="sections-empty" class="text-center py-8 border-2 border-dashed border-gray-200 rounded-xl">
                            <p class="text-sm text-[#424649]/45">No sections yet. Click <span class="text-[#a22426] font-medium">Add Section</span> to get started.</p>
                        </div>
                        <div id="sections-container" class="space-y-5"></div>
                    </div>

                    <!-- ══ Card: FAQs ══ -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex items-center gap-2">
                                <span class="w-5 h-5 rounded-full bg-[#a22426] text-white text-[11px] font-medium flex items-center justify-center flex-shrink-0">4</span>
                                <h2 class="text-base font-medium text-[#424649]">FAQs</h2>
                            </div>
                            <button type="button" onclick="addFaq()"
                                class="inline-flex items-center gap-1.5 bg-[#a22426] hover:bg-[#881e20] active:scale-95 text-white text-xs font-semibold px-3.5 py-2 rounded-lg transition-all duration-150 shadow-sm">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                                </svg>
                                Add FAQ
                            </button>
                        </div>
                        <div id="faq-empty" class="text-center py-8 border-2 border-dashed border-gray-200 rounded-xl">
                            <p class="text-sm text-[#424649]/45">No FAQs yet. Click <span class="text-[#a22426] font-medium">Add FAQ</span> to get started.</p>
                        </div>
                        <div id="faq-container" class="space-y-5"></div>
                    </div>

                </div>

                <!-- ── SIDEBAR ── -->
                <div class="w-full lg:w-72 space-y-5 lg:sticky lg:top-20 self-start">

                    <!-- Publish Settings -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center gap-2 mb-5">
                            <span class="w-5 h-5 rounded-full bg-[#a22426] text-white text-[11px] font-medium flex items-center justify-center flex-shrink-0">5</span>
                            <h2 class="text-base font-medium text-[#424649]">Publish Settings</h2>
                        </div>
                        <div class="mb-5">
                            <label class="block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5">Category <span class="text-[#a22426]">*</span></label>
                            <div class="relative">
                                <select name="category_id" required
                                    class="w-full appearance-none rounded-lg px-4 py-3 pr-10 text-sm text-[#424649] border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426] focus:ring-2 focus:ring-[#a22426]/10 transition-colors cursor-pointer">
                                    <option value="">Select a category</option>
                                    <?php
                                    $cats = getCategories($conn);
                                    foreach ($cats as $cat) {
                                        echo "<option value='" . htmlspecialchars($cat['id']) . "'>" . htmlspecialchars($cat['title']) . "</option>";
                                    }
                                    ?>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                    <svg class="w-4 h-4 text-[#424649]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg bg-[#fdf5f5] border border-red-100 p-3 mb-5">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#a22426] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-xs text-[#a22426] font-medium">Ready to publish</span>
                            </div>
                            <p class="text-xs text-[#424649]/55 mt-1.5 pl-6">Post will be published immediately after saving.</p>
                        </div>
                        <input type="hidden" name="status" value="0">
                        <button type="submit" name="submit"
                            class="w-full bg-[#a22426] hover:bg-[#881e20] active:scale-[0.98] text-white rounded-lg py-3 text-sm font-medium tracking-wide flex items-center justify-center gap-2 transition-all duration-200 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Publish Post
                        </button>
                        <a href="../superadmin/category-add.php"
                            class="w-full bg-[#424649] hover:bg-[#2d3033] text-white rounded-lg py-3 text-sm font-medium tracking-wide flex items-center justify-center gap-2 transition-all duration-200 no-underline">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Category
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <script>
        // ─────────────────────────────────────────────
        // Shared helpers
        // ─────────────────────────────────────────────
        const inputCls = `w-full rounded-lg px-3.5 py-2.5 text-sm text-[#424649] placeholder-gray-400
  border-[1.5px] border-[#e0dcdc] bg-white focus:outline-none focus:border-[#a22426]
  focus:ring-2 focus:ring-[#a22426]/10 transition-colors`;

        const labelCls = `block text-xs font-medium text-[#424649]/70 uppercase tracking-wide mb-1.5`;

        const removeBtnCls = `inline-flex items-center gap-1 text-xs font-semibold text-red-500
  hover:text-white hover:bg-red-500 border border-red-200 hover:border-red-500
  px-2 py-1 rounded-lg transition-all duration-150 active:scale-95`;

        const addSubBtnCls = `inline-flex items-center gap-1 text-xs font-semibold text-[#424649]
  hover:text-white hover:bg-[#424649] border border-gray-300 hover:border-[#424649]
  px-2 py-1 rounded-lg transition-all duration-150 active:scale-95`;

        function plusIcon(sz = '3') {
            return `<svg class="w-${sz} h-${sz}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
    </svg>`;
        }

        function minusIcon(sz = '3') {
            return `<svg class="w-${sz} h-${sz}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
              d="M6 7h12M9 7V5h6v2m-7 0v12m4-12v12m4-12v12M5 7h14l-1 14H6L5 7z"/>
    </svg>`;
        }

        // ─────────────────────────────────────────────
        // IMAGE UPLOAD
        // ─────────────────────────────────────────────
        const imageInput = document.getElementById('imageInput');
        const uploadZone = document.getElementById('uploadZone');
        const uploadPlaceholder = document.getElementById('upload-placeholder');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');
        const previewName = document.getElementById('preview-name');

        const MAX_SIZE = 1 * 1024 * 1024; // 1MB
        const errorBox = document.getElementById('image-error');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;

            errorBox.classList.add('hidden');
            errorBox.textContent = '';

            // Size validation
            if (file.size > MAX_SIZE) {
                errorBox.textContent = "Image size should not exceed 1MB";
                errorBox.classList.remove('hidden');

                clearImage(); // reset UI
                return;
            }

            //  Preview
            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewName.textContent = file.name;
                uploadPlaceholder.classList.add('hidden');
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
        uploadZone.addEventListener('dragover', e => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });
        uploadZone.addEventListener('dragleave', () => uploadZone.classList.remove('dragover'));
        uploadZone.addEventListener('drop', e => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                const dt = new DataTransfer();
                dt.items.add(file);
                imageInput.files = dt.files;
                imageInput.dispatchEvent(new Event('change'));
            }
        });

        function clearImage() {
            imageInput.value = '';
            previewImg.src = '';
            uploadPlaceholder.classList.remove('hidden');
            imagePreview.classList.add('hidden');
        }

        // ═════════════════════════════════════════════
        // SECTIONS  (each section has its own sub-fields)
        // ═════════════════════════════════════════════
        let sectionUID = 0;
        let sections = [];

        function renderSectionNumbers() {
            sections.forEach((uid, i) => {
                const badge = document.querySelector(`#section-block-${uid} .section-num`);
                const label = document.querySelector(`#section-block-${uid} .section-label`);
                if (badge) badge.textContent = i + 1;
                if (label) label.textContent = i + 1;
            });
        }

        // Sub-field counter per section  { sectionUID → nextSubId }
        const sectionSubCounters = {};

        function addSection() {
            sectionUID++;
            const uid = sectionUID;
            const visNum = sections.length + 1;
            sections.push(uid);
            sectionSubCounters[uid] = 0;

            document.getElementById('sections-empty').classList.add('hidden');

            const editorId = `editor-${uid}`;

            const html = `
    <div id="section-block-${uid}" class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">

        <!-- Section header -->
        <div class="flex items-center justify-between px-4 py-3 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center gap-2">
                <span class="section-num w-6 h-6 rounded-full bg-[#424649] text-white text-[11px] font-semibold flex items-center justify-center">${visNum}</span>
                <span class="text-sm font-medium text-[#424649]">Section <span class="section-label">${visNum}</span></span>
            </div>
            <div class="flex items-center gap-2">
                <!-- Add sub-field inside this section -->
                <button type="button" onclick="addSection()"
                        class="${addSubBtnCls}" title="Add field to this section">
                    ${plusIcon()}
                </button>
                <!-- Remove entire section -->
                <button type="button" onclick="removeSection(${uid})"
                        class="${removeBtnCls}" title="Remove section">
                    ${minusIcon()}
                </button>
            </div>
        </div>

        <!-- Fixed fields: Title + TOC -->
        <div class="p-4 sm:p-5 space-y-4">
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1">
                    <label class="${labelCls}">Section Title <span class="text-[#a22426]">*</span></label>
                    <input type="text" name="section_title[]" placeholder="e.g. Key Benefits"
                           class="${inputCls}">
                </div>
                <div class="sm:w-44">
                    <label class="${labelCls}">TOC Label</label>
                    <input type="text" name="section_toc[]" placeholder="Short label"
                           class="${inputCls}">
                </div>
            </div>

            <!-- CKEditor body -->
            <div>
                <label class="${labelCls}">Section Body</label>
                <textarea name="section_content[]" id="${editorId}" class="w-full"></textarea>
            </div>

            <!-- Sub-fields container -->
            <div id="section-subfields-${uid}" class="space-y-3 mt-1"></div>
        </div>
    </div>`;

            document.getElementById('sections-container').insertAdjacentHTML('beforeend', html);

            CKEDITOR.replace(editorId, {

                height: 200,
            });
        }

        //     function addSectionSubField(sectionUid) {
        //         sectionSubCounters[sectionUid]++;
        //         const subId = sectionSubCounters[sectionUid];
        //         const domId = `sec-sub-${sectionUid}-${subId}`;
        //         const container = document.getElementById(`section-subfields-${sectionUid}`);

        //         const html = `
        // <div id="${domId}" class="flex flex-col sm:flex-row gap-2 items-start bg-gray-50 border border-gray-200 rounded-lg p-3">
        //     <div class="flex-1 flex flex-col sm:flex-row gap-2 w-full">
        //         <div class="flex-1">
        //             <label class="${labelCls}">Sub Title</label>
        //             <input type="text" name="section_sub_title[${sectionUid}][]" placeholder="Sub-section title"
        //                    class="${inputCls}">
        //         </div>
        //         <div class="flex-1">
        //             <label class="${labelCls}">Sub Description</label>
        //             <input type="text" name="section_sub_desc[${sectionUid}][]" placeholder="Brief description"
        //                    class="${inputCls}">
        //         </div>
        //     </div>
        //     <button type="button" onclick="document.getElementById('${domId}').remove()"
        //             class="${removeBtnCls} mt-5 flex-shrink-0" title="Remove this field">
        //         ${minusIcon()}
        //     </button>
        // </div>`;

        //         container.insertAdjacentHTML('beforeend', html);
        //     }

        function removeSection(uid) {
            const editorId = `editor-${uid}`;
            if (CKEDITOR.instances[editorId]) CKEDITOR.instances[editorId].destroy(true);
            document.getElementById(`section-block-${uid}`).remove();

            sections = sections.filter(id => id !== uid);
            delete sectionSubCounters[uid];
            renderSectionNumbers();

            if (sections.length === 0) document.getElementById('sections-empty').classList.remove('hidden');
        }


        // ═════════════════════════════════════════════
        // FAQs  (each FAQ has its own sub-fields)
        // ═════════════════════════════════════════════
        let faqUID = 0;
        let faqs = [];
        const faqSubCounters = {};

        function renderFaqNumbers() {
            faqs.forEach((uid, i) => {
                const badge = document.querySelector(`#faq-block-${uid} .faq-num`);
                const label = document.querySelector(`#faq-block-${uid} .faq-label`);
                if (badge) badge.textContent = i + 1;
                if (label) label.textContent = i + 1;
            });
        }

        function addFaq() {
            faqUID++;
            const uid = faqUID;
            const visNum = faqs.length + 1;
            faqs.push(uid);
            faqSubCounters[uid] = 0;

            document.getElementById('faq-empty').classList.add('hidden');

            const editorId = `faq-editor-${uid}`;

            const html = `
    <div id="faq-block-${uid}" class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">

        <!-- FAQ header -->
        <div class="flex items-center justify-between px-4 py-3 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center gap-2">
                <span class="faq-num w-6 h-6 rounded-full bg-[#424649] text-white text-[11px] font-semibold flex items-center justify-center">${visNum}</span>
                <span class="text-sm font-medium text-[#424649]">FAQ <span class="faq-label">${visNum}</span></span>
            </div>
            <div class="flex items-center gap-2">
                <!-- Add sub-field inside this FAQ -->
                <button type="button" onclick="addFaq()"
                        class="${addSubBtnCls}" title="Add extra field to this FAQ">
                    ${plusIcon()}
                </button>
                <!-- Remove entire FAQ -->
                <button type="button" onclick="removeFaq(${uid})"
                        class="${removeBtnCls}" title="Remove FAQ">
                    ${minusIcon()}
                </button>
            </div>
        </div>

        <!-- Fixed fields: Question + Answer -->
        <div class="p-4 sm:p-5 space-y-4">
            <div>
                <label class="${labelCls}">Question <span class="text-[#a22426]">*</span></label>
                <input type="text" name="faq_question[]" placeholder="e.g. What is the refund policy?"
                       class="${inputCls}">
            </div>
            <div>
                <label class="${labelCls}">Answer</label>
                <textarea name="faq_answer[]" id="${editorId}" class="w-full"></textarea>
            </div>

            <!-- Sub-fields container -->
            <div id="faq-subfields-${uid}" class="space-y-3 mt-1"></div>
        </div>
    </div>`;

            document.getElementById('faq-container').insertAdjacentHTML('beforeend', html);

            CKEDITOR.replace(editorId, {
                height: 160
            });
        }

        //     function addFaqSubField(faqUid) {
        //         faqSubCounters[faqUid]++;
        //         const subId = faqSubCounters[faqUid];
        //         const domId = `faq-sub-${faqUid}-${subId}`;
        //         const container = document.getElementById(`faq-subfields-${faqUid}`);

        //         const html = `
        // <div id="${domId}" class="flex flex-col sm:flex-row gap-2 items-start bg-gray-50 border border-gray-200 rounded-lg p-3">
        //     <div class="flex-1 flex flex-col sm:flex-row gap-2 w-full">
        //         <div class="flex-1">
        //             <label class="${labelCls}">Note / Label</label>
        //             <input type="text" name="faq_sub_label[${faqUid}][]" placeholder="e.g. Related link, note…"
        //                    class="${inputCls}">
        //         </div>
        //         <div class="flex-1">
        //             <label class="${labelCls}">Value</label>
        //             <input type="text" name="faq_sub_value[${faqUid}][]" placeholder="Content or URL"
        //                    class="${inputCls}">
        //         </div>
        //     </div>
        //     <button type="button" onclick="document.getElementById('${domId}').remove()"
        //             class="${removeBtnCls} mt-5 flex-shrink-0" title="Remove this field">
        //         ${minusIcon()}
        //     </button>
        // </div>`;

        //         container.insertAdjacentHTML('beforeend', html);
        //     }

        function removeFaq(uid) {
            const editorId = `faq-editor-${uid}`;
            if (CKEDITOR.instances[editorId]) CKEDITOR.instances[editorId].destroy(true);
            document.getElementById(`faq-block-${uid}`).remove();

            faqs = faqs.filter(id => id !== uid);
            delete faqSubCounters[uid];
            renderFaqNumbers();

            if (faqs.length === 0) document.getElementById('faq-empty').classList.remove('hidden');
        }


        // ─────────────────────────────────────────────
        // FORM SUBMIT
        // ─────────────────────────────────────────────
        document.getElementById('blogForm').addEventListener('submit', function(e) {
            e.preventDefault();
            for (const inst in CKEDITOR.instances) CKEDITOR.instances[inst].updateElement();

            const formData = new FormData(this);
            formData.append('action', 'add_blog');

            fetch('../api/blog.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.status === 'success') {
                        resetFullForm();
                    };
                })
                .catch(err => {
                    console.error('Error:', err);
                    alert(err.message);
                });
        });

        function resetFullForm() {
            const form = document.getElementById('blogForm');

            // 1. Reset basic form
            form.reset();

            // 2. Reset CKEditor
            for (const instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].setData('');
            }

            // 3. Reset Image Upload UI
            clearImage();

            // 4. Remove all sections
            sections.forEach(uid => {
                const editorId = `editor-${uid}`;
                if (CKEDITOR.instances[editorId]) {
                    CKEDITOR.instances[editorId].destroy(true);
                }
                document.getElementById(`section-block-${uid}`)?.remove();
            });
            sections = [];
            document.getElementById('sections-empty').classList.remove('hidden');

            // 5. Remove all FAQs
            faqs.forEach(uid => {
                const editorId = `faq-editor-${uid}`;
                if (CKEDITOR.instances[editorId]) {
                    CKEDITOR.instances[editorId].destroy(true);
                }
                document.getElementById(`faq-block-${uid}`)?.remove();
            });
            faqs = [];
            document.getElementById('faq-empty').classList.remove('hidden');

            // 6. Reset counters
            sectionUID = 0;
            faqUID = 0;

            // Optional UX improvement
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });


        }
    </script>
</body>

</html>