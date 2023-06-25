<?php
    include('../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    $x1 = $_POST["employee"];
    $query = "SELECT * FROM user  WHERE user_login = '$x1' ";	
    $result = mysqli_query($link, $query);
    
    while ($row = $result->fetch_assoc() ){
        echo "
        Мастер: $row[user_name] $row[user_secondname] $row[user_patronymic]
        +$row[user_phone]
        ";
    }
mysqli_close($link);
?>

