<?php
    require('../lib/db.php');
    require('../lib/Ticket.php');
    $lstRoute = Ticket::getTicket($_GET['phone']);
    echo json_encode($lstRoute);
?>