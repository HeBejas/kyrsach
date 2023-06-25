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
                <button id="remont_employee_sotrydnik" class="order_page_menu_btn">Назначить сотрудника</button>
            </div>			

		<?php
			include('../../server/connect.php');
			$x1 = $_POST["zakaz_id"];
			echo "<h2>Страница заказа номер $x1</h2>";
			$query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";	
			$link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
			$result = mysqli_query($link, $query);
			while ($row = $result->fetch_assoc() ){
                $array = explode("|", $row['poshiv_merki']);
                $merka1  = trim( $array[0], ':' ) ;
                $merka2  = trim( $array[1], ':' ) ;
                $merka3  = trim( $array[2], ':' ) ;
                $merka4  = trim( $array[3], ':' ) ;
                $merka5  = trim( $array[4], ':' ) ;
                $merka6  = trim( $array[5], ':' ) ;
                $merka7  = trim( $array[6], ':' ) ;
                $merka8  = trim( $array[7], ':' ) ;
                $merka9  = trim( $array[8], ':' ) ;
                $merka10 = trim( $array[9], ':' ) ;
                $merka11 = trim( $array[10], ':' ) ;
                $merka12 = trim( $array[11], ':' ) ;
                $merka13 = trim( $array[12], ':' ) ;
                $merka14 = trim( $array[13], ':' ) ;
                $merka15 = trim( $array[14], ':' ) ;
                $merka16 = trim( $array[15], ':' ) ;
                $merka17 = trim( $array[16], ':' ) ;
				echo
				"
				    <ul>
						<li id='li_zakaz_id' value='$x1'>Клиент:$row[client_login]<br>$row[other_client_info]</li>
                        <li id='remont_employee_order_state'>Статус заказа:$row[order_state]</li>
						<li>Модель: 				$row[order_model]</li>
						<li>Услуга: 			    $row[order_service]</li>
						<li id='order_price_poshiv'>Цена заказа:$row[order_price]</li>
						<li>Дата оформления заказа: $row[order_start_date]</li>
					</ul>
					<div style='margin-left: 30px;'>
                        <ul style='text-align: end; margin-top: 15px;'>
                            <li id='employe_ident'>$row[employee_login]</li>
                            <li id='poshiv_order_pay_state' style='color:green;'>Статус оплаты:$row[pay_state]</li>
                        </ul>
					</div>
				";
			};
			mysqli_close($link);
		?>
		<div style="display: flex;">
			<button id="order_page_exit-btn" class="order_page_menu_btn">Выйти</button>

            <button id="order_page_merki-btn" class="order_page_menu_btn">Мерки</button>
            <button id="order_page_price-btn" class="order_page_menu_btn">Расчитать цену</button>
            <button id="order_page_oplata-btn" class="order_page_menu_btn">Оплата</button>
		</div>
		
	</div>
    <div class="modal-back">
        <div class="employee_user_select"> 
            <div class="employee_user_select-content">
                <!-- Загрузка сотрудников -->
            </div>
            <div class="employee_user_select-btns">
                <button id="employee_user_select-btns-exit" class="order_page_menu_btn">Выйти</button>
                <button id="employee_user_select-btns-confirm" class="order_page_menu_btn dead">Подтвердить</button>
            </div>
        </div>
        
        <div class="order_price_naz">
            <h2>Расчет цены</h2>
            <form id="poshiv_order_price_naz" method="post">
                <p>Цена</p>
                <input form="poshiv_order_price_naz" name="price" type="number" min="0" placeholder="Цена" required>
                <input type="hidden" name="order_id" id="hiden_input_order_id">
            </form>

            <div class="employee_user_select-btns">
                <button id="oplata-btns-exit" class="order_page_menu_btn">Выйти</button>
                <button type="submit" class="order_page_menu_btn" form="poshiv_order_price_naz">Подтвердить</button>
                <div class="here"></div>
            </div>
        </div>

        <div class='poshiv_order_merki'>
                <div class='employee_user_select_merki'> 
                    <h3>Мерки</h3>
                    <p><?php echo $merka1 ?> См</p>
                    <p><?php echo $merka2 ?> См</p>
                    <p><?php echo $merka3 ?> См</p>
                    <p><?php echo $merka4 ?> См</p>
                    <p><?php echo $merka5 ?> См</p>
                    <p><?php echo $merka6 ?> См</p>
                    <p><?php echo $merka7 ?> См</p>
                    <p><?php echo $merka8 ?> См</p>
                    <p><?php echo $merka9 ?> См</p>
                    <p><?php echo $merka10 ?> См</p>
                    <p><?php echo $merka11 ?> См</p>
                    <p><?php echo $merka12 ?> См</p>
                    <p><?php echo $merka13 ?> См</p>
                    <p><?php echo $merka14 ?> См</p>
                    <p><?php echo $merka15 ?> См</p>
                    <p><?php echo $merka16 ?> См</p>
                    <p><?php echo $merka17 ?> См</p>
                    <div class='employee_user_select-btns'>
                        <button id='employee_user_select_2-btns-exit' class='order_page_menu_btn' >Выйти</button>
                    </div>
                </div>
            </div>


    </div>
    <script>
    // Скрипт модального окна
    var selected_employee = "";
    poshiv_order = $('#li_zakaz_id').val();

    $('#employee_user_select-btns-exit').click(function(){
        $('.modal-back').hide();
        $('.employee_user_select').hide();
        $('#employee_user_select-btns-confirm').addClass('dead');
    });
    $('#employee_user_select-btns-confirm').click(function(){
        $("#remont_employee_order_state").load("parts/employee/order_employee_update.php", { 'remont_order' : poshiv_order, 'selected_employee' : selected_employee, 'side' : '2'} );
    });
    </script>

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
// Доставка
$(document).ready(function(){
    //Типа проверка на оплату
    $('#order_page_price-btn').hide();
    $('#order_page_oplata-btn').hide();
    //Модальное
    $('.order_price_naz').hide();
    $('.employee_user_select').hide();
    // $('.poshiv_order_merki').hide();
    //----------------------
    remont_order = $('#li_zakaz_id').val();
    //Сотрудник
    $('#remont_employee_sotrydnik').click(function(){
        $('.modal-back').css('display', 'flex');
        $('.employee_user_select').show();
        $('.employee_user_select-content').load('parts/employee/employee_user_select.php');
    });
    //Активный
    if($('#remont_employee_order_state').text() == 'Статус заказа:Активный'){
        $('#remont_employee_sotrydnik').hide();
        $('#employe_ident').show();
    }else{
        $('#employe_ident').hide();
    }
    if($('#order_price_poshiv').text() == 'Цена заказа:Идет расчет'){
        $('#remont_employee_sotrydnik').css('background','grey');
        $('#remont_employee_sotrydnik').css( 'pointer-events','none');
        $('#order_page_price-btn').css('display','flex');
    }
    else if($('#poshiv_order_pay_state').text() == 'Статус оплаты:Не оплачен'){
        $('#remont_employee_sotrydnik').css('background','grey');
        $('#remont_employee_sotrydnik').css( 'pointer-events','none');
        $('#order_page_oplata-btn').css('display','flex');
        //Оплата
        $('#order_page_oplata-btn').click(function(){
            $("#poshiv_order_pay_state").load("parts/authorization/cabinet/cabinet_price_update.php", {'side' : '1' , 'order_id' : remont_order } );
            $('#order_page_oplata-btn').hide();
            $('#remont_employee_sotrydnik').css('background','#f2deb8');
            $('#remont_employee_sotrydnik').css( 'pointer-events','all');
        });
    }
    //Мерки
    $('#order_page_merki-btn').click(function(){
        console.log(123);
        $('.modal-back').css('display', 'flex');
        $('.poshiv_order_merki').show();
    });
    $('#employee_user_select_2-btns-exit').click(function(){
        $('.poshiv_order_merki').hide();
        $('.modal-back').hide();
    });
    //Расчет цены
    $('#order_page_price-btn').click(function(){
        $('.modal-back').css('display', 'flex');
        $('.order_price_naz').show();
        $('.poshiv_order_merki').show();
        $('.employee_user_select-content').load('parts/employee/employee_user_select.php');
        $('#employee_user_select_2-btns-exit').hide();
    });
    $('#oplata-btns-exit').click(function(){
        $('#employee_user_select_2-btns-exit').css('display', 'flex');
        $('.order_price_naz').hide();
        $('.poshiv_order_merki').hide();
        $('.modal-back').hide();
    });
    //Форма Update цены 
    $('#poshiv_order_price_naz').on('submit', function () {
        $('#hiden_input_order_id').val( remont_order );
        
        var setdata= $("#poshiv_order_price_naz").serialize(); // Сеарилизуем объект
        $.post( "parts/employee/poshiv/poshiv_order_price_update.php", setdata,function( data ) 
        { 
            $('.here').html( data );
        });
    event.preventDefault();
}); 

});
//Выход
$("#order_page_exit-btn").click(function(){
    $('content').load('parts/employee/poshiv/poshiv_ne_oform.php');
});
</script>
                


<style>
    /* Только тут */
    .employee_user_select_merki{
        height: 450px;
        width: 310px;
        background-color: #dbccb0d6;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .order_price_naz{
        width: 300px;
        background: bisque;
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        padding: 20px;
        border-radius: 20px;
    }
    #poshiv_order_price_naz{
        font-size: 20px;
        padding: 20px;
    }
    .remont-alert{
        height: 90px;
        width: 150px;
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
		background-color: #f2b8b8 !important;
	}
    .employee_user_select{
            height: 450px;
            width: 1150px;
            background-color: #dbccb082;
        }
        .employee_user_select-content{
            width: 1150px;
            height: 380px;
            overflow-y: auto;
        }
        .employee_user_select-btns{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .dead{
            pointer-events:none;
            background-color: grey !important;
        }
</style>
