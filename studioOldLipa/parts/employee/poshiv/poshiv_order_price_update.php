<?php
    include('../../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    $x1 = $_POST["order_id"];
    $x2 = $_POST["price"];
    $query = "UPDATE zakaz_poshiv SET order_price = '$x2' WHERE(order_id = '$x1')";	
    $result = mysqli_query($link, $query);
    echo "
    <script>
        $('content').load('parts/employee/poshiv/poshiv_employee_order_page.php', {'zakaz_id' : '$x1' } );
    </script>
    ";
mysqli_close($link);
?>

