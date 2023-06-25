<?php
    include('../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    if ($_POST["side"] == '1' ) { 
        $x1 = $_POST["remont_order"];
        $x2 = $_POST["selected_employee"];
        $query = "UPDATE zakaz_remont SET employee_login  = '$x2' , order_state = 'Активный' WHERE(order_id = '$x1')";	
        $result = mysqli_query($link, $query);
        echo "
        <script>
            $('content').load('parts/employee/remont/remont_employee_order_page.php', {'zakaz_id' : '$x1' } );
        </script>
        ";
    }else{
        $x1 = $_POST["remont_order"];
        $x2 = $_POST["selected_employee"];
        $query = "UPDATE zakaz_poshiv SET employee_login  = '$x2' , order_state = 'Активный' WHERE(order_id = '$x1')";	
        $result = mysqli_query($link, $query);
        echo "
        <script>
            $('content').load('parts/employee/poshiv/poshiv_employee_order_page.php', {'zakaz_id' : '$x1' } );
        </script>
        ";
    }
mysqli_close($link);
?>

