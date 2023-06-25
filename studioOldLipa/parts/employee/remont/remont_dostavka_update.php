<?php
    include('../../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    $x1 = $_POST["order_id"];
    $query = "UPDATE zakaz_remont SET order_state = 'Не оформлен' WHERE(order_id = '$x1')";	
    $result = mysqli_query($link, $query);
    echo "Статус заказа:Не оформлен";
    echo "
    <script>
        $('content').load('parts/employee/remont/remont_employee_order_page.php', {'zakaz_id' : '$x1' } );
    </script>
    ";
mysqli_close($link);
?>

