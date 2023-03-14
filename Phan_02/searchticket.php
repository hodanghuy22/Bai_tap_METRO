<?php
    require('lib/db.php');
    require('lib/route.php');
    require('lib/ticket.php');
    $lstRoute = Route::getAllRoute();
    $path = 'components/searchticket_content.php';
    $jsPath='components/search-js.php';
    require('layout.php');
?>