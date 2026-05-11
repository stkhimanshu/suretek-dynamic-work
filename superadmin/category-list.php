<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <style>
        .cat-input:focus {
            outline: none;
            border-color: #a22426;
            box-shadow: 0 0 0 3px rgba(162, 36, 38, 0.12);
        }

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-input:focus {
            outline: none;
            border-color: #a22426;
            box-shadow: 0 0 0 3px rgba(162, 36, 38, 0.12);
        }

        /* Toast */
        .toast {
            position: fixed;
            top: 24px;
            right: 24px;
            min-width: 260px;
            max-width: 340px;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 500;
            color: #fff;
            opacity: 0;
            pointer-events: none;
            transform: translateY(-16px);
            transition: opacity 0.28s ease, transform 0.28s ease;
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.18);
            overflow: hidden;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .toast.success {
            background: #15803d;
        }

        .toast.error {
            background: #a22426;
        }

        .toast-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 15px;
        }

        .toast-body {
            flex: 1;
        }

        .toast-title {
            font-weight: 600;
            font-size: 13px;
            line-height: 1.3;
        }

        .toast-sub {
            font-size: 11.5px;
            opacity: 0.82;
            margin-top: 2px;
        }

        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            border-radius: 0 0 12px 12px;
            background: rgba(255, 255, 255, 0.35);
            transform-origin: left;
        }

        .toast.show .toast-progress {
            animation: toastShrink 2.8s linear forwards;
        }

        @keyframes toastShrink {
            from {
                transform: scaleX(1);
            }

            to {
                transform: scaleX(0);
            }
        }

        /* Cards & Buttons */
        .cat-card {
            transition: border-color 0.15s;
        }

        .cat-card:hover {
            border-color: #d1d5db;
        }

        .btn-update:hover {
            opacity: 0.85;
        }

        .btn-delete:hover {
            background: #fef2f2;
            border-color: #fca5a5;
            color: #dc2626;
        }

        .btn-add:hover {
            opacity: 0.88;
        }
    </style>
</head>

<body class="bg-[#f5f4f0] min-h-screen">

    <div class="mx-auto bg-white p-6 rounded-2xl shadow-sm border border-gray-100">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Categories</h2>
                <p class="text-sm text-gray-400 mt-0.5" id="cat-count">Loading...</p>
            </div>
            <button onclick="openAddModal()"
                class="btn-add bg-[#a22426] text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition-opacity w-fit">
                <i class="ti ti-plus text-base" aria-hidden="true"></i> Add Category
            </button>
        </div>

        <!-- Category List -->
        <div id="categoryContainer" class="space-y-2.5"></div>

    </div>

    <!-- Add Category Modal -->
    <div class="modal-overlay" id="addModal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <div class="bg-white rounded-2xl p-6 w-full max-w-sm mx-4 border border-gray-100 shadow-xl">
            <h3 id="modal-title" class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="ti ti-tag text-[#a22426]" aria-hidden="true"></i> New Category
            </h3>
            <input
                type="text"
                id="newCatTitle"
                placeholder="Category name..."
                class="modal-input w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-gray-50 text-gray-800 transition-shadow" />
            <div class="flex justify-end gap-2 mt-4">
                <button onclick="closeAddModal()"
                    class="px-4 py-2 text-sm text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button onclick="addCategory()"
                    class="px-4 py-2 text-sm text-white bg-[#a22426] rounded-lg flex items-center gap-1.5 hover:opacity-90 transition-opacity">
                    <i class="ti ti-check text-sm" aria-hidden="true"></i> Save
                </button>
            </div>
        </div>
    </div>

    <!-- Update Category Modal -->
    <div class="modal-overlay" id="editModal" role="dialog" aria-modal="true">

        <div class="bg-white rounded-2xl p-6 w-full max-w-sm mx-4 border border-gray-100 shadow-xl">

            <h3 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="ti ti-edit text-blue-600"></i>
                Update Category
            </h3>

            <input
                type="hidden"
                id="editCatId">

            <input
                type="text"
                id="editCatTitle"
                placeholder="Category name..."
                class="modal-input w-full border border-gray-200 rounded-lg px-3 py-2 text-sm bg-gray-50 text-gray-800 transition-shadow" />

            <div class="flex justify-end gap-2 mt-4">

                <button
                    onclick="closeEditModal()"
                    class="px-4 py-2 text-sm text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </button>

                <button
                    onclick="submitUpdateCategory()"
                    class="px-4 py-2 text-sm text-white bg-blue-600 rounded-lg flex items-center gap-1.5 hover:opacity-90 transition-opacity">

                    <i class="ti ti-check text-sm"></i>
                    Update
                </button>

            </div>

        </div>

    </div>

    <!-- Toast Notification (upper right) -->
    <div class="toast" id="toast" role="status" aria-live="polite">
        <div class="toast-icon" id="toast-icon"></div>
        <div class="toast-body">
            <div class="toast-title" id="toast-title"></div>
            <div class="toast-sub" id="toast-sub"></div>
        </div>
        <div class="toast-progress" id="toast-progress"></div>
    </div>

</body>

</html>