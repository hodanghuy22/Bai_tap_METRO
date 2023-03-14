<?php
    require('../lib/db.php');
    require('../lib/station.php');
    $lstRoute = Staion::getStationByRoute($_GET['id']);
    echo json_encode($lstRoute);
?>