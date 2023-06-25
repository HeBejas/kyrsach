<?php session_start() ?>
<?php
include('../../server/connect.php');
$link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if($link === false){ die("Ошибка подключения. " . mysqli_connect_error());}

	$x1= trim( $_POST["remont_new_model"], ' ');
	$x2=$_POST["remont_new_usluga"];
	// $x3=$_POST["remont_new_opis_usluga"];
	$x3=$_POST["remont_new_price"];
    $x4=$_POST["remont_new_startdate"];
	$x5=$_POST["remont_new_others"];
	

	// echo $x1, $x2, $x3, $x4, $x5, $x6;
	$sql_vstav = "INSERT INTO zakaz_remont (
	order_state, 
	order_model, 
	order_service, 
	order_dostavka, 
	order_price,
	order_start_date,
	pay_state,
    other_client_info
	) 
	VALUES('Не оформлен','$x1','$x2','Очно','$x3','$x4','Оплачен','$x5')";
	mysqli_query($link, $sql_vstav);
	//ЗАПИСЫВАЕТ И ПО ЛОГИКЕ ДОЛЖЕН ПЕРЕКИДЫВАТЬ В НЕ ОФОРМЛЕННЫЕ ЗАКАЗЫ ГДЕ СОТРУДНИК НАЗНАЧЕТ ЕМУ МАСТЕРА

	$sql_vstav = "SELECT * FROM zakaz_remont WHERE(order_start_date = '$x4' )";
	$result = mysqli_query($link, $sql_vstav);
	while ($row = $result->fetch_assoc()) {
		echo
		"
				Номер заказа: $row[order_id]
		";
		$_SESSION['User_last_order_id'] = $row['order_id']; 
		echo"
			<script>
				$('content').load('parts/authorization/cabinet/order_page.php');
				$('content').load('parts/employee/remont/remont_employee_order_page.php', {'zakaz_id' : '$row[order_id]' } );
			</script>
		";
	}
	


mysqli_close($link);
?>


