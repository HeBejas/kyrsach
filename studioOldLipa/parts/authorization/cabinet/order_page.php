<?php session_start() ?>

<div class="order_page">
	<div class= "order_content">
	<div class="content__work">
        <!-- <div class="content__work-block-mainramka order_page_cwbm_dop"></div> -->
	<div class="content__work-block order_page_cwb_dop">
            <div class="content__work-block__text">
	<div class="order_page_otmena_info" style="position: absolute;
		right: 20px;
		text-align: end;
		margin-top: 45px;
		font-size: 15px;">
		Если по каким-то причинами<br> Вам нужно отменить заказ,<br> То свяжитесь с оператором по номеру<br>8 (3412) 68-80-40
	</div>			

		<?php
			include('../../server/connect.php');
			if (isset($_POST["zakaz_id"])){
				$x1 = $_POST["zakaz_id"];
			}else{
				$x1 = $_SESSION['User_last_order_id'];
			}
			echo "<h2>Страница заказа номер $x1</h2>";
			$query = "SELECT * FROM zakaz_remont WHERE(order_id = '$x1')";	
			$link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
			$result = mysqli_query($link, $query);
			while ($row = $result->fetch_assoc() ){
				echo
				"
				    <ul>
						<li id='li_zakaz_id' value='$x1'>Клиент: 	  			$row[client_login]</li>
						<li>Статус заказа:  		$row[order_state]</li>
						<li>Модель: 				$row[order_model]</li>
						<li>Услуга: 			    $row[order_service]</li>
						<li>Вид доставки изделия:   $row[order_dostavka]</li>
						<li>Цена заказа: 		    $row[order_price]</li>
						<li>Дата оформления заказа: $row[order_start_date]</li>
					</ul>

					<div style='margin-left: 30px;'>
					<ul style='text-align: end; margin-top: 15px;'>
						<li id='employe_ident'>$row[employee_login]</li>
						<li id='poshiv_order_pay_state' style='color:red;'>Статус оплаты:$row[pay_state]</li>
						<li>Дата оформления окончания: 			$row[order_end_date]</li>
						<li>Изделие: 							$row[product_id]</li>
					</ul>
					</div>

				";
			};








			
			mysqli_close($link);
		?>
		<div style="display: flex;">
			<button id="order_page_exit-btn" class="order_page_menu_btn">Выйти</button>
			<button id="order_page_pay-btn" class="order_page_menu_btn">Оплатить</button>
		</div>
		
	</div>
</div>
</div>
</div>
</div>
</div>
<script>
// Опознание сотрудника
$(document).ready(function(){
	var employee_login = $("#employe_ident").text();
	// console.log( employee_login);
	// console.log( $("#employe_ident").text());
	$("#employe_ident").load("parts/other/employee_login_ident.php", { 'employee' : employee_login  } );

});
</script>
<script>
if( $('#poshiv_order_pay_state').text() == 'Статус оплаты:Не оплачен'){
	$('#order_page_pay-btn').click(function(){
		order = $('#li_zakaz_id').val();
		$("#poshiv_order_pay_state").load("parts/authorization/cabinet/cabinet_price_update.php", {'side' : '2' , 'order_id' : order } );
		$('#order_page_pay-btn').hide();
	});
}
else{
	$('#order_page_pay-btn').hide();
	$('#poshiv_order_pay_state').css('color','green');
}
</script>
                
<script>
	$("#order_page_exit-btn").click(function(){
		$('content').load('parts/authorization/cabinet/cabinet.php');
		setTimeout(function(){
		  	$('#cabinet_zakaz').trigger('click');
		}, 100);
	});
	
</script>

<style>
	.order_page{
		display: flex;
	    margin: 0, auto;
	    flex-direction: row;
	    justify-content: center;
	    align-items: center;
	    height: 100%;
	    min-height: 700px;
	}
	.order_content{
		width: 750px;
	    height: 550px;
	}
	.order_content li{
		list-style: none;
		text-decoration: none;
	}
	.order_page_cwb_dop{
		height: 400px;
		margin-top: 10px;
	}
	.order_page_cwbm_dop{
		border-image-outset: 0px 0px 10px 22px;
		width: 660px;
		
	}
	.order_page_menu_btn{
		border: double;
		z-index: 999999;
		cursor: pointer;
		
		text-decoration: none;
		list-style: none;
		background-color: #f2deb8;
		height: inherit;
		display: flex;
		align-items: center;
		padding-left: 20px;
		padding-right: 20px;
		user-select: none;
		border-radius: 20px;
		padding: 20px;
	}
	#order_page_exit-btn{
		
		/* position: absolute; 
		margin-left: 730px;
		margin-top: -100px; */

		background-color: #f2b8b8 !important;
	}
</style>
