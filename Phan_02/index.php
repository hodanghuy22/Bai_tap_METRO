<?php
    require('lib/db.php');
    require('lib/route.php');
    $lstRoute = Route::getAllRoute();
    $path = 'components/index_content.php';
    $jsPath='components/index-js.php';
    require('layout.php');
?>