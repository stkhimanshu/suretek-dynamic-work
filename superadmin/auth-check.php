<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

session_start();

/*
|--------------------------------------------------------------------------
| Session Timeout
|--------------------------------------------------------------------------
*/

// $timeout = 60 * 60; // 1 hour
$timeout = 60 * 60 * 24; // 1 day

if (isset($_SESSION['last_activity'])) {

    if ((time() - $_SESSION['last_activity']) > $timeout) {

        session_unset();

        session_destroy();

        header("Location: login.php?expired=1");

        exit;
    }
}

/*
|--------------------------------------------------------------------------
| Update Last Activity
|--------------------------------------------------------------------------
*/

$_SESSION['last_activity'] = time();

/*
|--------------------------------------------------------------------------
| Auth Check
|--------------------------------------------------------------------------
*/

if (
    !isset($_SESSION['admin_id']) ||
    $_SESSION['admin_role'] !== 'superadmin'
) {

    header("Location: login.php");

    exit;
}
