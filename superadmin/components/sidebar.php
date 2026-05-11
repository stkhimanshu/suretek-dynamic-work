<?php
require_once __DIR__ . '/../config/navigation.php';
?>

<!-- Mobile Backdrop -->
<div
    id="sidebar-backdrop"
    class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden">
</div>

<!-- Sidebar -->
<aside
    id="sidebar"
    class="fixed left-0 top-0 h-full w-[280px]
    bg-inverse-surface flex flex-col
    py-6 px-4 z-50

    transition-transform duration-300

    -translate-x-full
    lg:translate-x-0">

    <!-- Header -->
    <div class="mb-10 px-2 flex items-start justify-between gap-4">

        <div class="flex flex-col gap-2">

            <div class="max-w-[130px] bg-surface py-2 px-4 rounded">
                <img
                    src="https://www.suretekinfosoft.com/assets/images/logo1.png"
                    class="w-[130px]"
                    alt="Logo">
            </div>

            <p class="text-surface-variant text-sm">
                Superadmin Panel
            </p>

        </div>

        <!-- Mobile Close Button -->
        <button
            id="sidebar-close"
            type="button"
            class="lg:hidden text-surface-variant">

            <span class="material-symbols-outlined">
                close
            </span>

        </button>

    </div>

    <!-- Navigation -->
    <nav class="flex-1 space-y-1 overflow-y-auto">

        <?php foreach ($navigation as $index => $item): ?>

            <?php
            $hasChildren = !empty($item['children']);

            $activeClass = isActive($item['url'])
                ? 'sidebar-link-active'
                : '';
            ?>

            <div class="sidebar-group">

                <!-- Parent Item -->
                <div
                    class="sidebar-link flex items-center justify-between gap-3 py-3 px-4 rounded-lg text-surface-variant <?= $activeClass ?>">

                    <a
                        href="<?= $item['url'] ?>"
                        class="flex items-center gap-3 flex-1 min-w-0">

                        <?= icon($item['icon']) ?>

                        <span class="truncate">
                            <?= $item['title'] ?>
                        </span>

                    </a>

                    <?php if ($hasChildren): ?>

                        <button
                            type="button"
                            class="submenu-toggle flex items-center justify-center"
                            data-target="submenu-<?= $index ?>">

                            <span class="material-symbols-outlined text-[20px]">
                                add
                            </span>

                        </button>

                    <?php endif; ?>

                </div>

                <!-- Submenu -->
                <?php if ($hasChildren): ?>

                    <div
                        id="submenu-<?= $index ?>"
                        class="hidden ml-6 mt-1 space-y-1">

                        <?php foreach ($item['children'] as $child): ?>

                            <?php
                            $childActiveClass = isActive($child['url'])
                                ? 'sidebar-link-active'
                                : '';
                            ?>

                            <a
                                href="<?= $child['url'] ?>"
                                class="sidebar-link flex items-center py-2 px-4 rounded-lg text-sm text-surface-variant <?= $childActiveClass ?>">

                                <span>
                                    <?= $child['title'] ?>
                                </span>

                            </a>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </nav>

    <!-- Footer -->
    <div class="mt-auto border-t border-outline-variant/20 pt-4">

        <a
            href="<?= ADMIN_PATH . '/logout.php' ?>"
            class="sidebar-link flex items-center gap-3 py-3 px-4 rounded-lg text-surface-variant">

            <?= icon('logout') ?>

            <span>
                Logout
            </span>

        </a>

    </div>

</aside>

<!-- Mobile Hamburger -->
<button
    id="sidebar-toggle"
    type="button"
    class="fixed top-3 left-4 z-41
    lg:hidden
    flex items-center justify-center
    w-11 h-11 rounded-lg
    bg-surface shadow-md">

    <span class="material-symbols-outlined">
        menu
    </span>

</button>

<!-- Sidebar Script -->
<script>
    /*
|--------------------------------------------------------------------------
| Sidebar Elements
|--------------------------------------------------------------------------
*/
    const sidebar = document.getElementById('sidebar');

    const sidebarToggle = document.getElementById('sidebar-toggle');

    const sidebarClose = document.getElementById('sidebar-close');

    const sidebarBackdrop = document.getElementById('sidebar-backdrop');

    /*
    |--------------------------------------------------------------------------
    | Open Sidebar
    |--------------------------------------------------------------------------
    */
    function openSidebar() {

        sidebar.classList.remove('-translate-x-full');

        sidebarBackdrop.classList.remove('hidden');

        document.body.classList.add('overflow-hidden');

    }

    /*
    |--------------------------------------------------------------------------
    | Close Sidebar
    |--------------------------------------------------------------------------
    */
    function closeSidebar() {

        sidebar.classList.add('-translate-x-full');

        sidebarBackdrop.classList.add('hidden');

        document.body.classList.remove('overflow-hidden');

    }

    /*
    |--------------------------------------------------------------------------
    | Toggle Sidebar
    |--------------------------------------------------------------------------
    */
    if (sidebarToggle) {

        sidebarToggle.addEventListener('click', function() {

            const isClosed = sidebar.classList.contains(
                '-translate-x-full'
            );

            if (isClosed) {
                openSidebar();
            } else {
                closeSidebar();
            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | Close Button
    |--------------------------------------------------------------------------
    */
    if (sidebarClose) {

        sidebarClose.addEventListener('click', function() {
            closeSidebar();
        });

    }

    /*
    |--------------------------------------------------------------------------
    | Backdrop Close
    |--------------------------------------------------------------------------
    */
    if (sidebarBackdrop) {

        sidebarBackdrop.addEventListener('click', function() {
            closeSidebar();
        });

    }

    /*
    |--------------------------------------------------------------------------
    | Responsive Resize
    |--------------------------------------------------------------------------
    */
    window.addEventListener('resize', function() {

        if (window.innerWidth >= 1024) {

            sidebar.classList.remove('-translate-x-full');

            sidebarBackdrop.classList.add('hidden');

            document.body.classList.remove('overflow-hidden');

        } else {

            sidebar.classList.add('-translate-x-full');

        }

    });

    /*
    |--------------------------------------------------------------------------
    | Submenu Local Storage
    |--------------------------------------------------------------------------
    */
    const STORAGE_KEY = 'sidebar_open_menus';

    function getOpenMenus() {

        try {
            return JSON.parse(
                localStorage.getItem(STORAGE_KEY)
            ) || [];
        } catch (e) {
            return [];
        }

    }

    function saveOpenMenus(menus) {

        localStorage.setItem(
            STORAGE_KEY,
            JSON.stringify(menus)
        );

    }

    /*
    |--------------------------------------------------------------------------
    | Restore Open Menus
    |--------------------------------------------------------------------------
    */
    const openMenus = getOpenMenus();

    openMenus.forEach(targetId => {

        const submenu = document.getElementById(targetId);

        if (!submenu) return;

        submenu.classList.remove('hidden');

        const button = document.querySelector(
            `[data-target="${targetId}"]`
        );

        if (!button) return;

        const icon = button.querySelector(
            '.material-symbols-outlined'
        );

        if (icon) {
            icon.textContent = 'remove';
        }

    });

    /*
    |--------------------------------------------------------------------------
    | Toggle Submenus
    |--------------------------------------------------------------------------
    */
    document.querySelectorAll('.submenu-toggle').forEach(button => {

        button.addEventListener('click', function(e) {

            e.preventDefault();

            e.stopPropagation();

            const targetId = this.dataset.target;

            const submenu = document.getElementById(targetId);

            if (!submenu) return;

            submenu.classList.toggle('hidden');

            const icon = this.querySelector(
                '.material-symbols-outlined'
            );

            const isHidden = submenu.classList.contains(
                'hidden'
            );

            if (icon) {

                icon.textContent = isHidden ?
                    'add' :
                    'remove';

            }

            /*
            |--------------------------------------------------------------------------
            | Persist Menu State
            |--------------------------------------------------------------------------
            */
            let menus = getOpenMenus();

            if (!isHidden) {

                if (!menus.includes(targetId)) {
                    menus.push(targetId);
                }

            } else {

                menus = menus.filter(
                    id => id !== targetId
                );

            }

            saveOpenMenus(menus);

        });

    });
</script>