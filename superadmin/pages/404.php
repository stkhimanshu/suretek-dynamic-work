<main
    class="flex items-center justify-center">

    <div
        class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-white rounded-3xl p-12 border border-outline-variant shadow-[0_10px_40px_rgba(0,0,0,0.04)]">

        <!-- LEFT -->

        <div
            class="flex flex-col
        items-center justify-center
        text-center">

            <!-- 404 VISUAL -->

            <div class="relative">

                <h1
                    class="text-[160px]
                leading-none
                font-black
                text-primary/10
                select-none">
                    404
                </h1>

                <div
                    class="absolute inset-0
                flex items-center justify-center">

                    <span
                        class="material-symbols-outlined
                    text-primary
                    text-[84px]"
                        style="
                    font-variation-settings:
                    'FILL' 0,
                    'wght' 200,
                    'GRAD' 0,
                    'opsz' 48">
                        explore_off
                    </span>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="space-y-4 max-w-md -mt-2">

                <h2
                    class="text-4xl
                font-bold
                text-on-surface">
                    Lost in the System?
                </h2>

                <p
                    class="text-slate-500
                text-lg
                leading-relaxed">
                    The page you are trying to access
                    may have been removed, renamed,
                    archived, or you may not have
                    sufficient permissions.
                </p>

            </div>

        </div>

        <!-- RIGHT -->

        <div
            class="border-l border-outline-variant
        pl-12
        space-y-10">

            <!-- WHAT HAPPENED -->

            <div class="space-y-5">

                <div>

                    <h3
                        class="text-2xl
                    font-semibold
                    text-on-surface">
                        What happened?
                    </h3>

                    <p class="text-slate-500 mt-1">
                        Here are some common reasons:
                    </p>

                </div>

                <div class="space-y-4">

                    <!-- ITEM -->

                    <div class="flex gap-4">

                        <div
                            class="w-11 h-11
                        rounded-xl
                        bg-blue-50
                        flex items-center justify-center
                        text-primary shrink-0">
                            <?= icon('error_outline') ?>
                        </div>

                        <div>

                            <h4 class="font-semibold">
                                Invalid URL
                            </h4>

                            <p class="text-slate-500 text-sm mt-1">
                                The requested URL may contain
                                a typo or malformed route.
                            </p>

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="flex gap-4">

                        <div
                            class="w-11 h-11
                        rounded-xl
                        bg-blue-50
                        flex items-center justify-center
                        text-primary shrink-0">
                            <?= icon('link_off') ?>
                        </div>

                        <div>

                            <h4 class="font-semibold">
                                Resource Removed
                            </h4>

                            <p class="text-slate-500 text-sm mt-1">
                                This module or page may have
                                been archived or deleted.
                            </p>

                        </div>

                    </div>

                    <!-- ITEM -->

                    <div class="flex gap-4">

                        <div
                            class="w-11 h-11
                        rounded-xl
                        bg-blue-50
                        flex items-center justify-center
                        text-primary shrink-0">
                            <?= icon('lock') ?>
                        </div>

                        <div>

                            <h4 class="font-semibold">
                                Permission Restricted
                            </h4>

                            <p class="text-slate-500 text-sm mt-1">
                                Your account may not have
                                access to this resource.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ACTIONS -->

            <div class="space-y-4">

                <!-- PRIMARY -->

                <a
                    href="<?= ADMIN_PATH ?>/pages/dashboard.php"
                    class="w-full
                bg-primary
                text-white
                rounded-2xl

                px-6 py-4

                flex items-center justify-center gap-3

                hover:opacity-90
                transition-all">

                    <?= icon('dashboard') ?>

                    <span class="font-medium">
                        Go back to Dashboard
                    </span>

                </a>

                <!-- SECONDARY -->

                <!-- <div class="grid grid-cols-2 gap-4">

                    <button
                        class="border border-outline-variant
                    rounded-2xl
                    py-3 px-4

                    flex items-center justify-center gap-2

                    hover:bg-slate-50
                    transition-all">

                        <?= icon('support_agent') ?>

                        <span>
                            Support
                        </span>

                    </button>

                    <button
                        class="border border-outline-variant
                    rounded-2xl
                    py-3 px-4

                    flex items-center justify-center gap-2

                    hover:bg-slate-50
                    transition-all">

                        <?= icon('search') ?>

                        <span>
                            Search
                        </span>

                    </button>

                </div> -->

            </div>

            <!-- QUICK LINKS -->

            <!-- <div class="pt-2">

                <p
                    class="text-xs
                uppercase
                tracking-[0.2em]
                text-slate-400
                mb-4">
                    Quick Navigation
                </p>

                <div class="flex flex-wrap gap-3">

                    <a
                        href="#"
                        class="px-4 py-2
                    rounded-full
                    bg-surface-container
                    text-primary
                    text-sm font-medium

                    hover:bg-primary
                    hover:text-white

                    transition-all">
                        Content CMS
                    </a>

                    <a
                        href="#"
                        class="px-4 py-2
                    rounded-full
                    bg-surface-container
                    text-primary
                    text-sm font-medium

                    hover:bg-primary
                    hover:text-white

                    transition-all">
                        User Access
                    </a>

                    <a
                        href="#"
                        class="px-4 py-2
                    rounded-full
                    bg-surface-container
                    text-primary
                    text-sm font-medium

                    hover:bg-primary
                    hover:text-white

                    transition-all">
                        System Logs
                    </a>

                </div>

            </div> -->

        </div>

    </div>

</main>