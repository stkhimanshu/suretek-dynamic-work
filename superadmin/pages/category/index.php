<?php

$pageTitle = 'Categories';

include("../../auth-check.php");
include '../../components/layout-start.php';

?>

<section>
    <?php include("../../category-list.php"); ?>
</section>

<?php include '../../components/layout-end.php'; ?>