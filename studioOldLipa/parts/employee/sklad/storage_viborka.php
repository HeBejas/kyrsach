<?php
    session_start();

    include('../../server/connect.php');
    $x1 = $_SESSION['User_login'];
    $query = "SELECT * FROM storage WHERE storage_status = 'Склад'";
    
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
    $result = mysqli_query($link, $query);
    echo"
    <table class='remont_ne_oform-table'>
        <thead>
            <tr>
                <th>Номер изделия</th>
                <th>Услуга</th>
                <th>Номер заказа</th>

            </tr>
        </thead>
        <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo"
                <tr class='ne_oform_content_tr' data-service='$row[order_service]' data-zakaz_id='$row[order_id]'>    
                    <td>$row[product_id]</td>
                    <td>$row[order_service]</td>
                    <td>$row[order_id]</td>
                </tr>
            ";
        }
        echo"
        </tbody>
    </table>";

?>

<script>
    $('.ne_oform_content_tr').on('click', function(){
        $("content").load("parts/employee/employee_order_page_my.php", {'zakaz_id' : $(this).data('zakaz_id'), 'service' : $(this).data('service'), 'sklad': '1'  } );
    });
</script>
