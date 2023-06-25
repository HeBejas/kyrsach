<?php
    include('../../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    $x1 = $_POST["zakaz_id"];
    $x2 = $_POST["side"];
    $x3 = $_POST["date"];

    if ( $x2 == 1){
        $cur_table = 'zakaz_poshiv';
        $service ='Пошив';
    }else if ($x2 == 2){
        $cur_table = 'zakaz_remont';
        $service ='Ремонт';
    };
    $query = "UPDATE $cur_table SET order_state = 'Завершен', order_end_date = '$x3' WHERE(order_id = '$x1')";
    mysqli_query($link, $query);
    $query = "UPDATE storage SET  storage_status = 'Забран' WHERE( order_service = '$service' AND order_id = '$x1')";
    mysqli_query($link, $query);

    mysqli_close($link);
?>

<script>
    $(document).ready(function(){
        $('content').load('parts/employee/ended/ended_order_page.php', {'zakaz_id' : '<?php echo $x1 ?>', 'service' : '<?php echo $service ?>' } );
    });
</script>