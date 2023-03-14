<?php
    require('lib/db.php');
    require('lib/route.php');
    require('lib/ticket.php');
    if(isset($_POST['btn_datVe'])){
        $rs = Ticket::datVe($_POST['ddl_tuyen'],$_POST['ddl_galen'],$_POST['ddl_gaxuong'],$_POST['soluong'],$_POST['sdt'],$_POST['thanhtien_in']);
    }
    $lstRoute = Route::getAllRoute();
    $path = 'components/ticket_content.php';
    $jsPath='components/ticket-js.php';
    require('layout.php');
?>