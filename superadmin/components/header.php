<?php

$adminName = $_SESSION['admin_name'] ?? 'Admin';

$adminRole = $_SESSION['admin_role'] ?? 'admin';

$initials = '';

$nameParts = explode(' ', trim($adminName));

foreach ($nameParts as $part) {

    $initials .= strtoupper(substr($part, 0, 1));
}

$formattedRole = ucwords(str_replace('_', ' ', $adminRole));

?>

<header
    class="fixed top-0 right-0
h-[70px]
w-full
lg:w-[calc(100%-280px)]
bg-surface
flex justify-between items-center
px-gutter
shadow-sm
border-b border-outline-variant
z-40">

    <!-- LEFT -->

    <div class="flex items-center gap-8">

        <div>

            <h3 class="text-base lg:text-xl font-semibold pl-10 text-on-surface">
                Suretek CMS
            </h3>

        </div>

        <!-- SEARCH -->

        <!-- <div class="relative w-72">

            <span
                class="material-symbols-outlined
            absolute left-3 top-1/2
            -translate-y-1/2
            text-sm text-slate-400">
                search
            </span>

            <input
                type="text"
                placeholder="Search resources..."
                class="w-full
            bg-surface-container-low
            border border-outline-variant
            rounded-xl
            pl-10 pr-4 py-2.5
            text-sm
            focus:outline-none
            focus:ring-2
            focus:ring-primary/20
            transition-all">

        </div> -->

    </div>

    <!-- RIGHT -->

    <div class="flex items-center gap-5">

        <!-- NOTIFICATION -->

        <!-- <button
            class="relative
        text-slate-500
        hover:text-primary
        transition-colors">

            <?= icon('notifications') ?>

            <span
                class="absolute
            top-0 right-0
            w-2 h-2
            bg-red-500
            rounded-full"></span>

        </button> -->

        <!-- CREATE BUTTON -->
        <!-- 
        <button
            class="bg-primary-container
        text-white
        px-5 py-2.5
        rounded-xl
        shadow-sm
        hover:opacity-90
        transition-all">
            Create New
        </button> -->

        <!-- USER -->

        <div
            class="flex items-center gap-3">

            <!-- INFO -->

            <div class="leading-tight text-right">

                <p class="text-xs lg:text-sm font-semibold text-on-surface">
                    <?= htmlspecialchars($adminName) ?>
                </p>

                <p class="text-[10px] lg:text-xs text-slate-500 uppercase tracking-wide">
                    <?= htmlspecialchars($formattedRole) ?>
                </p>

            </div>

            <!-- AVATAR -->

            <div
                class="w-10 lg:w-11 h-10 lg:h-11
            rounded-full
            bg-gradient-to-br
            from-primary
            to-tertiary
            flex items-center justify-center
            text-white
            text-sm
            font-semibold
            shadow-sm">
                <?= $initials ?>
            </div>

        </div>

    </div>

</header>