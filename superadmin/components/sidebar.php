<?php
require_once __DIR__ . '/../config/navigation.php';
?>
<aside
    class="fixed left-0 top-0 h-full w-[280px]
bg-inverse-surface flex flex-col
py-6 px-4 z-50">

    <div class="mb-10 px-2 flex flex-col gap-2">

        <div class="max-w-[130px] bg-surface py-2 px-4 rounded">
            <img src="https://www.suretekinfosoft.com/assets/images/logo1.png" class="w-[130px]" alt="Logo">
        </div>

        <p class="text-surface-variant text-sm">
            Superadmin Panel
        </p>

    </div>

    <nav class="flex-1 space-y-1">

        <?php foreach ($navigation as $item): ?>

            <?php
            $activeClass = isActive($item['url'])
                ? 'sidebar-link-active'
                : '';
            ?>

            <a
                href="<?= $item['url'] ?>"
                class="sidebar-link
            flex items-center gap-3
            py-3 px-4 rounded-lg
            text-surface-variant
            <?= $activeClass ?>">

                <?= icon($item['icon']) ?>

                <span>
                    <?= $item['title'] ?>
                </span>

            </a>

        <?php endforeach; ?>

    </nav>

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