<?php
    include('../../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name);

    $login=$_POST["poshiv1"];
	$model=$_POST["poshiv2"];
	$merki=$_POST["poshiv3"];
	$wishes=$_POST["poshiv4"];
	$date=$_POST["poshiv5"];
    $price=$_POST["poshiv6"];

	$sql_vstav = "INSERT INTO zakaz_poshiv (
	other_client_info, 
	order_state, 
	order_model, 
	poshiv_merki, 
	order_price, 
	poshiv_wishes,
	order_start_date,
	pay_state,
    order_service
	) VALUES('$login','Не оформлен','$model','$merki','$price','$wishes','$date', 'Оплачен', 'Пошив')"; 
    mysqli_query($link, $sql_vstav);
    
	$sql_vstav = "SELECT * FROM zakaz_poshiv WHERE(order_start_date = '$date' )";
	$result = mysqli_query($link, $sql_vstav);
	while ($row = $result->fetch_assoc()) {
		echo
		"
				Номер заказа: $row[order_id]
		";
		$_SESSION['User_last_order_id'] = $row['order_id']; 
		echo"
			<script>
				$('content').load('parts/employee/poshiv/poshiv_employee_order_page.php', {'zakaz_id' : '$row[order_id]' } );
			</script>
		";
	}


    mysqli_close($link);
?>