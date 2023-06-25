<div class="order_page">
	<div class= "order_content">
        <div class="content__work">
            <div class="content__work-block order_page_cwb_dop">
                    <div class="content__work-block__text">
                    <div class="order_page_otmena_info" style="position: absolute;
                        right: 20px;
                        text-align: end;
                        margin-top: 45px;
                        font-size: 15px;">
                        
                    </div>			

                <?php
                    include('../server/connect.php');
                    $x1 = $_POST["zakaz_id"];
                    $x2 = explode(' ', $_POST["service"])[0];

                    if (empty($_POST["sklad"]))
                    {
                        $x3 = 0;
                    }else{$x3 = $_POST["sklad"];}

                    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
                    // var_dump($x1,$x2);
                    
                    echo "<h2>Страница заказа номер $x1</h2>"; 
                    
                    if ( $x2 == 'Пошив'){
                        $query = "SELECT * FROM zakaz_poshiv WHERE(order_id = '$x1')";	
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
                                    <li>Пожелания клиента: $row[poshiv_wishes]</li>
                                    <li>Цена заказа: 		    $row[order_price] Руб.</li>
                                    <li>Дата оформления заказа: $row[order_start_date]</li>
                                </ul>
                                <div style='margin-left: 30px;'>
                                    <ul style='text-align: end; margin-top: 15px;'>
                                        <li id='employe_ident'>$row[employee_login]</li>
                                    </ul>
                                </div>
                                <div style='display: flex; margin-top:10px'>
                                    <button id='order_page_exit-btn' class='order_page_menu_btn'>Выйти</button>
                                    <button id='remont_employee_viploy1' class='order_page_menu_btn'>Выполнить заказ</button>
                                    <button id='remont_employee_merki' class='order_page_menu_btn'>Мерки</button>
                                </div>
                            ";
                            echo "  
                                <div class='modal-back'>
                                    <div class='employee_user_select'> 
                                        <div class='employee_user_select-content'>
                                        <h3>Мерки</h3>
                                        <p>$merka1 См</p>
                                        <p>$merka2 См</p>
                                        <p>$merka3 См</p>
                                        <p>$merka4 См</p>
                                        <p>$merka5 См</p>
                                        <p>$merka6 См</p>
                                        <p>$merka7 См</p>
                                        <p>$merka8 См</p>
                                        <p>$merka9 См</p>
                                        <p>$merka10 См</p>
                                        <p>$merka11 См</p>
                                        <p>$merka12 См</p>
                                        <p>$merka13 См</p>
                                        <p>$merka14 См</p>
                                        <p>$merka15 См</p>
                                        <p>$merka16 См</p>
                                        <p>$merka17 См</p>
                                        </div>
                                        <div class='employee_user_select-btns'>
                                            <button id='employee_user_select_2-btns-exit' class='order_page_menu_btn' >Выйти</button>
                                        </div>
                                    </div>
                                </div>
                            ";
                        };
                    }else{
                        $query = "SELECT * FROM zakaz_remont WHERE(order_id = '$x1')";	
                        $result = mysqli_query($link, $query);
                        while ($row = $result->fetch_assoc() ){
                            echo
                            "
                                <ul>
                                    <li id='li_zakaz_id' value='$x1'>Клиент:$row[client_login]<br>$row[other_client_info]</li>
                                    <li id='remont_employee_order_state'>Статус заказа:$row[order_state]</li>
                                    <li>Модель: 				$row[order_model]</li>
                                    <li>Услуга: 			    $row[order_service]</li>
                                    <li>Вид доставки изделия:   $row[order_dostavka]</li>
                                    <li>Цена заказа: 		    $row[order_price] Руб.</li>
                                    <li>Дата оформления заказа: $row[order_start_date]</li>
                                </ul>
            
                                <div style='margin-left: 30px;'>
                                    <ul style='text-align: end; margin-top: 15px;'>
                                        <li id='employe_ident'>$row[employee_login]</li>
                                        ";
                                        if($x3 == 1){
                                            echo"
                                            <li>Номер изделия:$row[product_id]</li>
                                            ";
                                        }
                                    echo"
                                    </ul>
                                </div>
                                
                            ";
                            if($x3 == 1){
                                echo
                                "
                                    <div style='display: flex; margin-top:10px'>
                                        <button id='storage_exit-btn' class='order_page_menu_btn'>Выйти</button>
                                        <button id='remont_employee_end2' class='order_page_menu_btn'>Завершить заказ</button>
                                    </div>
                                ";
                            }else{
                                echo
                                "
                                    <div style='display: flex; margin-top:10px'>
                                        <button id='order_page_exit-btn' class='order_page_menu_btn'>Выйти</button>
                                        <button id='remont_employee_viploy2' class='order_page_menu_btn'>Выполнить заказ</button>
                                    </div>
                                ";
                            }
                        };
                    }
                    mysqli_close($link);
                    
                ?>

            </div>
        </div>
    </div>
</div>



<script>
// Опознание сотрудника
$(document).ready(function(){
    var employee_login = $("#employe_ident").text();
    // console.log(employee_login);
    $("#employe_ident").load("parts/other/employee_login_ident.php", { 'employee' : employee_login  } );
    //Выход из склада
    $('#storage_exit-btn').click(function(){
        $('content').load('parts/employee/sklad/storage.php', { 'employee' : employee_login  } );
    });
});
//Завершение заказа
var today = new Date;
$('#remont_employee_end1').click(function(){
    $('content').load('parts/employee/sklad/storage_end_update.php', { 'side' : '1' , 'zakaz_id' : '<?php echo $x1 ?>', 'date' :  today.toLocaleString("sv-SE")    } );
});
$('#remont_employee_end2').click(function(){
    $('content').load('parts/employee/sklad/storage_end_update.php', { 'side' : '2' , 'zakaz_id' : '<?php echo $x1 ?>', 'date' :  today.toLocaleString("sv-SE")  } );
});

</script>

<script>
    $('#remont_employee_merki').click(function(){
        $('.modal-back').css('display','flex');
    });
    $('#employee_user_select_2-btns-exit').click(function(){
        $('.modal-back').hide();
    });
</script>


<script>
$('#order_page_exit-btn').click(function(){
    $('content').load('parts/employee/employee_my_orders.php');
});
// Выполнить заказ
$('#remont_employee_viploy1').click(function(){
    $('content').load("parts/employee/employee_sklad_create.php", {'side' : '1' , 'zakaz_id' : '<?php echo $x1 ?>' } );;
});
$('#remont_employee_viploy2').click(function(){
    $('content').load("parts/employee/employee_sklad_create.php", {'side' : '2' , 'zakaz_id' : '<?php echo $x1 ?>' } );;
});
</script>

<style>
    .employee_user_select-content p {
        padding: 3px;
    }
    .employee_user_select-content{
        width: 450px;
        height: 625px;
        overflow-y: auto;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        
        background-color: #faebd7e5;
        border: 2px solid #665f23;
        border-radius: 20px;
    }
    .employee_user_select-btns{
        display: flex;
        justify-content: center;
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

	#order_page_exit-btn{
		background-color: #f2b8b8 !important;
	}
    /* .order_page_cwb_dop {
        height: 520px;
    } */
</style>