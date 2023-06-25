<?php session_start() ?>
<?php
include('../server/connect.php');
$link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if($link === false){ die("Ошибка подключения. " . mysqli_connect_error());}
if (isset($_POST["remont1"])) { 
	$x1=$_POST["remont5"];
	$x2=$_POST["remont2"];
	$x3=$_POST["remont1"];
	$x4=$_POST["remont3"];
	$x5=$_POST["remont4"];

	$x6=$_POST["remontstartdate"];

	// echo $x1, $x2, $x3, $x4, $x5, $x6;
	$sql_vstav = "INSERT INTO zakaz_remont (
	client_login, 
	order_state, 
	order_model, 
	order_service, 
	order_dostavka, 
	order_price,
	order_start_date,
	pay_state
	) 
	VALUES('$x1','Доставка','$x3','$x2','$x4','$x5','$x6', 'Не оплачен')";
	mysqli_query($link, $sql_vstav);
	//ЗАПИСЬ В СЕССИЮ ЗАКАЗА ДЛЯ ВЫВОДА СТРАНИЦЫ ЗАКАЗА ПО АЙДИ 

	$sql_vstav = "SELECT * FROM zakaz_remont WHERE(client_login ='$x1' AND order_start_date = '$x6' )";
	$result = mysqli_query($link, $sql_vstav);
	while ($row = $result->fetch_assoc()) {
		echo
		"
				Номер заказа: $row[order_id]
		";
		$_SESSION['User_last_order_id'] = $row['order_id']; 
	}
	echo"
	<script>
		$('content').load('parts/authorization/cabinet/order_page.php');
	</script>
	";
	// echo $_SESSION['User_last_order_id'];
	
}else if (isset($_POST["poshiv1"])){
	$x1=$_POST["poshiv1"];
	$x2=$_POST["poshiv2"];
	$x3=$_POST["poshiv3"];
	$x4=$_POST["poshiv4"];
	$x5=$_POST["poshiv5"];
	// echo $x1, $x2, $x3, $x4, $x5;
	$sql_vstav = "INSERT INTO zakaz_poshiv (
	client_login, 
	order_state, 
	order_model, 
	poshiv_merki, 
	order_price, 
	poshiv_wishes,
	order_start_date,
	pay_state,
	order_service
	)
	VALUES('$x1','Не оформлен','$x2','$x3','Идет расчет','$x4','$x5', 'Не оплачен','Пошив')"; 
	mysqli_query($link, $sql_vstav);
	//ЗАПИСЬ В СЕССИЮ ЗАКАЗА ДЛЯ ВЫВОДА СТРАНИЦЫ ЗАКАЗА ПО АЙДИ 
	$sql_vstav = "SELECT * FROM zakaz_poshiv  WHERE(client_login ='$x1' AND order_start_date = '$x5' )";
	$result = mysqli_query($link, $sql_vstav);
	var_dump($result);
	while ($row = $result->fetch_assoc()) {
		echo
		"
				Номер заказа: $row[order_id]
		";
		$_SESSION['User_last_order_id'] = $row['order_id']; 
	}
	echo"
	<script>
		$('content').load('parts/authorization/cabinet/order_poshiv_page.php');
	</script>
	";
}
mysqli_close($link);
?>


