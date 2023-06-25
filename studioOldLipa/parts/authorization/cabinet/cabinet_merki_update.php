<?php
    include('../../server/connect.php');
    $x1 = $_POST["merki1"];
    $x2=  $_POST["merki2"];
    $query = "UPDATE zakaz_poshiv SET poshiv_merki = '$x2' WHERE(order_id = '$x1')";	
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
    $result = mysqli_query($link, $query);
    echo 'Успех';

?>