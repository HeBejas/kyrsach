<?php
    session_start();

    include('../server/connect.php');
    $x1 = $_SESSION['User_login'];
    $query = " (SELECT order_id, client_login, order_model, order_price, order_start_date, other_client_info, order_service, order_state FROM `zakaz_remont` WHERE `zakaz_remont`.`employee_login` = '$x1' AND
    `zakaz_remont`.`order_state` = 'Активный') UNION 
    (SELECT order_id, client_login, order_model, order_price, order_start_date, other_client_info, order_service, order_state  FROM `zakaz_poshiv` WHERE `zakaz_poshiv`.`employee_login` = '$x1' AND 
    `zakaz_poshiv`.`order_state` = 'Активный') order by `order_id`";
    
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
    $result = mysqli_query($link, $query);
    echo"<table class='remont_ne_oform-table'>
    <thead>
        <tr>
            <th>Номер заказа</th>
            <th>Услуга</th>
            <th>Модель</th>
            <th>Клиент</th>
            
            <th>Цена</th>
            <th>Дата начала заказа</th>
        </tr>
    </thead>
    <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo"
            <tr class='ne_oform_content_tr' attr='$row[order_id]' data-service='$row[order_service]'> 
                <td>$row[order_id]          </td>
                <td>$row[order_service]     </td>
                <td>$row[order_model]       </td>
                <td>$row[client_login]$row[other_client_info]</td>
                <td>$row[order_price] Руб.       </td>
                <td>$row[order_start_date]  </td>
            </tr>
        ";
    }
    echo"
    </tbody>
    </table>";

?>

<script>
    $('.ne_oform_content_tr').on('click', function(){
        $("content").load("parts/employee/employee_order_page_my.php", {'zakaz_id' : $(this).attr( 'attr' ), 'service' : $(this).data('service')  } );
    });
</script>
