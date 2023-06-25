<?php
    include('../server/connect.php');
    $x1 = $_POST["zakaz_id"];
    $x2 = $_POST["side"];
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    // if ( $x2 == 1){
    //     // echo 'Пошив';
    //     // $query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";
    //     $query = "UPDATE zakaz_poshiv SET order_state = 'Склад' WHERE(order_id = '$x1')";	
    //     mysqli_query($link, $query);
        	
    //     $sql_vstav = "INSERT INTO storage (
    //     order_service,
    //     order_id
    //     ) 
    //     VALUES('Пошив','$x1')";
    //     mysqli_query($link, $sql_vstav);

    //     $sql_vstav = "SELECT product_id FROM `storage` WHERE(order_service = 'Ремонт' AND order_id = '$x1') ";
    //     $result = mysqli_query($link, $sql_vstav);
    //     while ($row = $result->fetch_assoc() ){
    //         echo"
    //             <div class='sklad_order_page'>
    //                 <div class='storage_cart'>
    //                     <h2>Заказ №$x1</h2> 
    //                     <h2 style='margin-bottom: 20px;'>Успешно перенесен на склад</h2>
    //                     <br>
    //                     <p>Код изделия:</p>
    //                     <h3>$row[product_id]</h3>
    //                     <button id='exit-btn' class='order_page_menu_btn order_page_menu_btn'>Выйти</button>
    //                 </div>
    //             </div>
    //         ";
    //     }
        

    // }else if ($x2 == 2){
    //     // echo 'Ремонт';
    //     // $query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";
    //     $query = "UPDATE zakaz_remont SET order_state = 'Склад' WHERE(order_id = '$x1')";	
    //     mysqli_query($link, $query);

    //     $sql_vstav = "INSERT INTO storage (
    //     order_service,
    //     order_id
    //     ) 
    //     VALUES('Ремонт','$x1')";
    //     mysqli_query($link, $sql_vstav);

    //     $sql_vstav = "SELECT product_id FROM `storage` WHERE(order_service = 'Ремонт' AND order_id = '$x1') ";
    //     $result = mysqli_query($link, $sql_vstav);
    //     while ($row = $result->fetch_assoc() ){
    //         echo"
    //             <div class='sklad_order_page'>
    //                 <div class='storage_cart'>
    //                     <h2>Заказ №$x1</h2> 
    //                     <h2 style='margin-bottom: 20px;'>Успешно перенесен на склад</h2>
    //                     <br>
    //                     <p>Код изделия:</p>
    //                     <h3>$row[product_id]</h3>
    //                     <button id='exit-btn' class='order_page_menu_btn order_page_menu_btn'>Выйти</button>
    //                 </div>
    //             </div>
    //         ";
    //     }
        
    // };

    if ( $x2 == 1){
        // echo 'Пошив';
        // $query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";
        $cur_table = 'zakaz_poshiv';

        $query = "UPDATE $cur_table SET order_state = 'Склад' WHERE(order_id = '$x1')";	
        mysqli_query($link, $query);
        	
        $sql_vstav = "INSERT INTO storage (
        order_service,
        order_id,
        storage_status 	
        ) 
        VALUES('Пошив','$x1','Склад')";
        mysqli_query($link, $sql_vstav);

        $sql_vstav = "SELECT product_id FROM `storage` WHERE(order_service = 'Пошив' AND order_id = '$x1') ";

    }else if ($x2 == 2){
        // echo 'Ремонт';
        // $query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";
        $cur_table = 'zakaz_remont';
        $query = "UPDATE $cur_table SET order_state = 'Склад' WHERE(order_id = '$x1')";	
        mysqli_query($link, $query);

        $sql_vstav = "INSERT INTO storage (
        order_service,
        order_id,
        storage_status 	
        ) 
        VALUES('Ремонт','$x1','Склад')";
        mysqli_query($link, $sql_vstav);  
        
        $sql_vstav = "SELECT product_id FROM `storage` WHERE(order_service = 'Ремонт' AND order_id = '$x1') ";
    };

   
    $result = mysqli_query($link, $sql_vstav);
    while ($row = $result->fetch_assoc() ){
        $order_izdelie = $row['product_id'];
        echo"
            <div class='sklad_order_page'>
                <div class='storage_cart'>
                    <h2>Заказ №$x1</h2> 
                    <h2 style='margin-bottom: 20px;'>Успешно перенесен на склад</h2>
                    <br>
                    <p>Код изделия:</p>
                    <h3>$row[product_id]</h3>
                    <button id='exit-btn' class='order_page_menu_btn order_page_menu_btn'>Выйти</button>
                </div>
            </div>
        ";
        $query = "UPDATE $cur_table SET product_id = $order_izdelie WHERE(order_id = '$x1')";	
        mysqli_query($link, $query);
    }
    

    mysqli_close($link);
?>

<script>
    $('#exit-btn').click(function(){
        $('content').load('parts/employee/employee_my_orders.php');
    });

    
</script>
<style>
.storage_cart{
    width: 260px;
    height: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
    background: #ffdaa8d6;
    border-radius: 30px;
}
.storage_cart h3{
    color: red;
    font-size: 40px;
    margin-bottom: 20px;

}
.sklad_order_page{
    height: 500px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
</style>