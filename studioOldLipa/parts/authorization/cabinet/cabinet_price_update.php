<?php
    include('../../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    if ( $_POST["side"] == 1) {
        $x1 = $_POST["order_id"];
        $query = "UPDATE zakaz_poshiv SET pay_state = 'Оплачен' WHERE(order_id = '$x1')";	
        $result = mysqli_query($link, $query);
        echo 'Статус оплаты: Оплачен';
    }else if ( $_POST["side"] == 2) {
        $x1 = $_POST["order_id"];
        $query = "UPDATE zakaz_remont SET pay_state = 'Оплачен' WHERE(order_id = '$x1')";	
        $result = mysqli_query($link, $query);
        echo 'Статус оплаты: Оплачен';
    }

    
mysqli_close($link);
?>