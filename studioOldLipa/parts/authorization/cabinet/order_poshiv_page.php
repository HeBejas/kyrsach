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
			$query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";	
			$link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
			$result = mysqli_query($link, $query);
			while ($row = $result->fetch_assoc() ){
				$array = explode("|", $row['poshiv_merki']);
				$merka1  = trim( stristr($array[0], ':', false), ':' ) ;
				$merka2  = trim( stristr($array[1], ':', false), ':' ) ;
				$merka3  = trim( stristr($array[2], ':', false), ':' ) ;
				$merka4  = trim( stristr($array[3], ':', false), ':' ) ;
				$merka5  = trim( stristr($array[4], ':', false), ':' ) ;
				$merka6  = trim( stristr($array[5], ':', false), ':' ) ;
				$merka7  = trim( stristr($array[6], ':', false), ':' ) ;
				$merka8  = trim( stristr($array[7], ':', false), ':' ) ;
				$merka9  = trim( stristr($array[8], ':', false), ':' ) ;
				$merka10 = trim( stristr($array[9], ':', false), ':' ) ;
				$merka11 = trim( stristr($array[10], ':', false), ':' ) ;
				$merka12 = trim( stristr($array[11], ':', false), ':' ) ;
				$merka13 = trim( stristr($array[12], ':', false), ':' ) ;
				$merka14 = trim( stristr($array[13], ':', false), ':' ) ;
				$merka15 = trim( stristr($array[14], ':', false), ':' ) ;
				$merka16 = trim( stristr($array[15], ':', false), ':' ) ;
				$merka17 = trim( stristr($array[16], ':', false), ':' ) ;
				echo
				"
				    <ul>
						<li id='li_zakaz_id' value='$row[order_id]' >Клиент: $row[client_login]</li>
						<li>Статус заказа:  		$row[order_state]</li>
						<li>Модель: 				$row[order_model]</li>
						<li>Услуга: 			    Пошив</li>
						<li id='oplata_poshiv_order_price'>Цена заказа:$row[order_price]</li>
						<li>Дата оформления заказа: $row[order_start_date]</li>
					</ul>

					<div style='margin-left: 30px;'>
					<ul style='text-align: end; margin-top: 15px;'>
						<li>Исполняющий сотрудник: 	  			$row[employee_id]</li>
						<li id='poshiv_order_pay_state' style='color:red;'>Статус оплаты:$row[pay_state]</li>
						<li>Дата оформления окончания: 			$row[order_end_date]</li>
					</ul>
					</div>

					<div class='modal-back'>
						<div class='order_poshiv_merki'>
							<h2>Мерки (см)</h2>
							<form id='poshiv_page_merki_update' method='post'>
								<div class='modal-block_poshiv-description-content'>
									<ul>
										<li>1.Рост<input type='number' min='1' placeholder='Рост' value='$merka1' required></li>
										<li>2.Обхват груди<input type='number' min='1' placeholder='Обхват груди' value='$merka2' required></li>
										<li>3.Обхват талии<input type='number' min='1'  placeholder='Обхват талии' value='$merka3' required></li>
										<li>4.Обхват бёдер<input type='number' min='1' placeholder='Обхват бёдер' value='$merka4' required></li>
										<li>5.Высота груди<input type='number' min='1' placeholder='Высота груди' value='$merka5' required></li>
										<li>6.Длина от талии до плеча <input type='number' min='1'  placeholder='Длина от талии до плеча' value='$merka6' required></li>
										<li>7.Длина от основания шеи до талии <input type='number' min='1'  placeholder='Длина от основания шеи до талии' value='$merka7' required></li>
										<li>8.Длина плеча<input type='number' min='1' placeholder='Длина плеча' value='$merka8' required></li>
										<li>9.Длина рукава<input type='number' min='1' placeholder='Длина рукава' value='$merka9' required></li>
										<li>10.Обхват верхней части руки<input type='number' min='1' placeholder='Обхват верхней части руки' value='$merka10' required></li>
										<li>11.Обхват локтевой части руки <input type='number' min='1' placeholder='Обхват локтевой части руки' value='$merka11' required></li>
										<li>12.Обхват запястья <input type='number' min='1' placeholder='Обхват запястья' value='$merka12' required></li>
										<li>13.Длина руки по внутренней её стороне – от подмышечных впадин до запястья<input type='number' min='1' placeholder='Длина руки по внутренней её стороне – от подмышечных впадин до запястья' value='$merka13' required></li>
										<li>14.Длина брюк по боковому шву<input type='number' min='1' placeholder='Длина брюк по боковому шву' value='$merka14' required></li>
										<li>15.Длина брюк по шаговому шву <input type='number' min='1' placeholder='Длина брюк по шаговому шву' value='$merka15' required'></li>
										<li>16.Глубина сидения<input type='number' min='1' placeholder='Глубина сидения' value='$merka16' required></li>
										<li>17.Длина среднего шва<input type='number' min='1' placeholder='Длина среднего шва' value='$merka17' required></li>

										<input id='merki1' type='hidden' name='merki1' value='$x1'>
										<input id='merki2' type='hidden' name='merki2'>
									</ul>
								</div>
							</form>
							<div class='merki_buttons-menu'>
								<button id='merki_update_btn' type='submit' class='merki_order_page_menu_btn' form='poshiv_page_merki_update'>Изменить</button>
								<div id='here_hide' class='merki_order_page_menu_btn'>123</div>
								<button id='merki_close_btn'  class='merki_order_page_menu_btn'>Выйти</button>
							</div>
						</div>

						<div class='modal-block_poshiv-block-merki'>
							<h2>Как снимать мерки</h2>
							<div class='modal-block_poshiv-block-merki-content'></div>
						</div>
					</div>
				";
			}
			mysqli_close($link);
		?>
		<div style="display: flex;">
			<button id="order_page_exit-btn"  class="order_page_menu_btn">Выйти</button>
			<button id="order_page_pay-btn"   class="order_page_menu_btn">Оплатить</button>
			<button id="order_page_merki-btn" class="order_page_menu_btn">Мерки</button>
		</div>
		
	</div>
</div>
</div>
</div>
</div>
</div>


<script>
$('#poshiv_page_merki_update').on('submit', function () {
	var liss = $('.modal-block_poshiv-description-content li');
    var merki = '';
    $( liss ).each(function( index ) {
        merki = merki + $( this ).text() + ':' +  $(this) .find('[type="number"]').val() + '|' ;
    });
	$('#merki2').val( merki );
    var setdata= $("#poshiv_page_merki_update").serialize(); // Сеарилизуем объект
    $.post( "parts/authorization/cabinet/cabinet_merki_update.php", setdata,function( data ) 
    { 
        $('#here_hide').html( data );
    });
	$('#merki_update_btn').hide();
	$('#here_hide').css('display', 'flex');
    event.preventDefault();
}); 
</script>
                
<script>
$( document ).ready(function(){
	$('.modal-block_poshiv-block-merki-content').load("parts/other/merki_guide.php")
});
$("#order_page_merki-btn").click(function(){
	$('.modal-back').css('display', 'flex');
});
$("#merki_close_btn").click(function(){
	$('.modal-back').hide();
	$('#merki_update_btn').css('display', 'flex');
	$('#here_hide').hide();
});
$("#merki_update_btn").click(function(){
	
});

$("#order_page_exit-btn").click(function(){
	$('content').load('parts/authorization/cabinet/cabinet.php');
	setTimeout(function(){
		$('#cabinet_zakaz_poshiv').trigger('click');
	}, 100);
});

//------------------------------------------------------------------------  ОПЛАТА    
// console.log( $('#poshiv_order_pay_state').text() );
// console.log( $('#poshiv_order_pay_state').text());	
// console.log( $('#poshiv_order_pay_state').text().replaceAll(' ', ''));

if( $('#poshiv_order_pay_state').text() == 'Статус оплаты:Не оплачен'){
	// console.log('Заказ не оплачен');
	// console.log( $('#oplata_poshiv_order_price').text());	
	if( $('#oplata_poshiv_order_price').text() == 'Цена заказа:Идет расчет'){

		$('#order_page_pay-btn').css( 'pointer-events','none');
		$('#order_page_pay-btn').css( 'background-color','#aca89f');
	}
	else{
		$('#order_page_pay-btn').click(function(){
			order = $('#li_zakaz_id').val();
			$("#poshiv_order_pay_state").load("parts/authorization/cabinet/cabinet_price_update.php", {'side' : '1' , 'order_id' : order } );
			$('#order_page_pay-btn').hide();
		});
		
	}
}
else{
	$('#order_page_pay-btn').hide();
	$('#poshiv_order_pay_state').css('color','green');
	// console.log($('#poshiv_order_pay_state').text());
	// console.log('Статус оплаты:Не оплачен');
	// console.log( $('#poshiv_order_pay_state').text() == 'Статус оплаты:Не оплачен' );
	// console.log('Заказ оплачен');
}
</script>


<!-- НЕПЕРЕНОСИМ -->
<style>
	#here_hide{
		background-color: yellowgreen !important;
		display: none;
		font-size: 15px;
		user-select: none;
		cursor: default;
		height: 15px;
	}
	.modal-block_poshiv-description-content{
		overflow-y: scroll;
		height: 500px;
	}
	.modal-block_poshiv-block-merki{
		position: unset;
		margin: 10px;
	}
</style>
<style>
	.order_poshiv_merki h2{
		text-align: center;
	}
	.merki_buttons-menu{
		display: flex;
		justify-content: center;
	}
	.merki_order_page_menu_btn{
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
		padding: 25px;
		/* margin-top: 150px; */
		margin-left: 20px;
		margin-right: 20px;
		height: 70px;
	}

	
	.order_poshiv_merki{
		width: 250px;
		height: 400px;
		background-color: #f2b8b8;
		border-radius: 20px;
		background-color: #ffe5d6f7;
		/* position: fixed; */
		width: 490px;
		height: 610px;
		/* top: 30%;
		left: 20%; */
		/* top: 250px;
		left: 700px; */
		z-index: 9999999;
		border-radius: 20px;
	}
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
		list-style: none;
	}
	.poshiv_page_merki_update-li li{
		list-style: none;
		text-decoration: none;
		list-style: none;
		height: 53px;
		display: flex;
		flex-direction: column;
		width: 360px;
		justify-content: center;
		align-items: center;
	}
	.poshiv_page_merki_update-li{
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
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
		margin-top: 25px;
	}
	#order_page_exit-btn{
		
		/* position: absolute; 
		margin-left: 730px;
		margin-top: -100px; */

		background-color: #f2b8b8 !important;
	}
</style>
