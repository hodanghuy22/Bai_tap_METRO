<?php
    require('../lib/db.php');
    require('../lib/station.php');
    $lstRoute = Staion::getStation($_GET['id']);
    echo json_encode($lstRoute);
?>