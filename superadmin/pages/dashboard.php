<?php

$pageTitle = 'Dashboard';

include("../auth-check.php");
include '../components/layout-start.php';

?>

<section
    class="relative overflow-hidden rounded-xl
bg-gradient-to-r from-primary to-tertiary-container
p-10 text-white shadow-lg">

    <div class="relative z-10 flex justify-between items-end">

        <div class="space-y-2">

            <h1 class="text-4xl font-bold">
                Welcome back, Admin!
            </h1>

            <p class="text-blue-100">
                Here's what's been happening with the Suretek ecosystem.
            </p>

        </div>

    </div>

</section>

<section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <div class="bg-white p-5 rounded-xl border border-outline-variant shadow-sm">

        <p class="text-slate-500 uppercase text-xs">
            Total Blogs
        </p>

        <h2 class="text-4xl font-bold mt-3">
            124
        </h2>

    </div>

    <div class="bg-white p-5 rounded-xl border border-outline-variant shadow-sm">

        <p class="text-slate-500 uppercase text-xs">
            Total Case Studies
        </p>

        <h2 class="text-4xl font-bold mt-3">
            42
        </h2>

    </div>

    <div class="bg-white p-5 rounded-xl border border-outline-variant shadow-sm">

        <p class="text-slate-500 uppercase text-xs">
            Pending Approvals
        </p>

        <h2 class="text-4xl font-bold mt-3">
            8
        </h2>

    </div>

</section>

<?php include '../components/layout-end.php'; ?>