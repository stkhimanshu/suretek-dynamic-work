<?php

require_once __DIR__ . '/../config/bootstrap.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        <?= $pageTitle ?? 'Suretek CMS' ?>
    </title>

    <?php include __DIR__ . '/../config/tailwind.php'; ?>

    <link
        rel="stylesheet"
        href="<?= ADMIN_PATH ?>/assets/css/app.css">

    <link
        rel="stylesheet"
        href="<?= ADMIN_PATH ?>/assets/css/sidebar.css">

</head>

<body class="font-sans text-on-surface">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <?php include __DIR__ . '/header.php'; ?>

    <main class="main-content lg:ml-[280px]">

        <div class="page-container">