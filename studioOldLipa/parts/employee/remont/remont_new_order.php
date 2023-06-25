<div class="remont_neworder_page">
<h1>Ремонт одежды</h1>
<h2>Новый заказ</h2>

<!-- Модель -->
<div id="remont_new_order1" class="usluga-block">
    <div class="remont_new_order2-btns">
        <button id="remont_new_order1-btn-nazad" class="deafault_ui-btn">Назад</button>
    </div>
    <?php 
        include('../../server/connect.php');
        $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
        $query = "SELECT * FROM model  ORDER BY `model_name` DESC";
        $result = mysqli_query($link, $query);
        // var_dump($result);
        // for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)


        // var_dump($data);
        echo"<h2 class='services_catalog_logo'>Вид одежды</h2>";
        echo"<div class='usluga-block-viborka'>";
            while ($row = $result->fetch_assoc()) {
                echo
                "
                    <div class='model_cart'>
                        <img class='model_cart_image' src='img/model/$row[model_image]'>
                        <p class='model_cart_name'> $row[model_name] </p>
                    </div>	
                ";
            }
        echo"</div>";
        mysqli_close($link);
    ?>
</div>
<!-- Услуга -->
<div id="remont_new_order2" class="usluga-block">
    <div class="remont_new_order2-btns">
        <button id="remont_new_order2-nazad-btn" class="deafault_ui-btn">Назад</button>
        <div style="display: flex;">
            <div class="alert">Выберите услугу</div>
            <button id="remont_new_order2-podtverdit-btn" class="deafault_ui-btn">Подтвердить</button>
        </div>
    </div>
    <div id="remont_new_order2-content">
    </div>
</div>

<div id="remont_new_order3" class="usluga-block">
    <div class="remont_new_order2-btns">
        <button id="remont_new_order3-nazad-btn" class="deafault_ui-btn">Назад</button>
    </div>
    <div id="remont_new_order3-content">
        <form method="post" id="remont_new_order">
            <ul>
                <h3>Заказ</h3>
                <li class="remont_new_order-li_title">Вид одежды</li>
                <li id="remont_model" class="remont_new_order-li_info"></li>
                <li class="remont_new_order-li_title">Услуга</li>
                <li id="remont_usluga" style="background-color: #ffe30291; font-size: 18px;"></li>
                <li id="remont_opisUsluga" class="remont_new_order-li_info"></li>
                <li class="remont_new_order-li_title">Цена</li>
                <li id="remont_price" class="remont_new_order-li_info"></li>
                <h3>Информация о клиенте</h3>
                <li class="remont_new_order-li_input">Телефон клиента <input id="remont_new_tel" pattern="[0-9\s\-\(\)]{11,11}" type="tel" maxlength="11" placeholder="Телефон" required></li>
                <li class="remont_new_order-li_input">ФИО <input id="remont_new_fio" type="text"  maxlength="100" placeholder="ФИО" size="35px" required></li>

                <input type="hidden" name='remont_new_model' value="loh">
                <input type="hidden" name='remont_new_usluga'>
                <!-- <input type="hidden" name='remont_new_opis_usluga'> -->
                <input type="hidden" name='remont_new_price'>
                <input type="hidden" name='remont_new_others'>
                <input type="hidden" name="remont_new_startdate" >      
            </ul>
        </form>
        <button id="remont_new_order3-oformit-btn" class="deafault_ui-btn" form="remont_new_order">Оформить</button>
    </div>
    <div class="here"></div>
</div>

<script>
    //ОТПРАВКА ФОРМЫ
    $('#remont_new_order').submit(function () {
        $('input[name="remont_new_model"]').val( model );
        $('input[name="remont_new_usluga"]').val( usluga + ' ' + opiscUsluga);
        // $('input[name="remont_new_opis_usluga"]').val( opiscUsluga );
        $('input[name="remont_new_price"]').val( price );
        var remont_new_others =   $('#remont_new_fio').val() + ' ' + '+' + $('#remont_new_tel').val();
        $('input[name="remont_new_others"]').val( remont_new_others );
        var today = new Date;
        $('input[name="remont_new_startdate"]').val( today.toLocaleString("sv-SE") );

        var setdata= $("#remont_new_order").serialize(); // Сеарилизуем объект
        $.post( "parts/employee/remont/remont_new_order_server.php", setdata,function( data ) 
        { 
            $('.here').html( data );
        });
        event.preventDefault();
    }); 
</script>

<script>
//Модель
var model = '';
var usluga = '';
var opiscUsluga = '';
var price = '';
$(document).ready(function(){
    $('#remont_new_order2').hide();
});
$('.model_cart').on('click', function(){
    // console.log (   $(this).find('.model_cart_name').text()   );
    model = $(this).find('.model_cart_name').text();
    $("#remont_new_order2-content").load("parts/employee/remont/remont_service.php", {'model_name' : model } );
    // setTimeout(function(){
	// 	  	$('#remont_new_order2-content').trigger('click');
	// 	}, 1000);
    $('#remont_new_order1').hide();
    $('#remont_new_order2').show();
    // .css('display','flex');
});
//Услуги
$('#remont_new_order2-nazad-btn').on('click', function(){
    $('#remont_new_order1').show();
    $('#remont_new_order2').hide();
    $('.alert').hide();
    usluga = '';
});
$('#remont_new_order1-btn-nazad').on('click', function(){
    $('content').load('parts/employee/employee_menu.php');
});

$('#remont_new_order2-podtverdit-btn').on('click', function(){
    if( usluga != ''){
        $('.alert').hide();
        $('#remont_usluga').text( usluga );
        $('#remont_opisUsluga').text( opiscUsluga );
        $('#remont_model').text( model );
        $('#remont_price').text( price );

        $('#remont_new_order2').hide();
        $('#remont_new_order3').show();
    }else{
        // console.log('услугу выбери');
        $('.alert').show();
    }
    


    // if(){
    //     $('#remont_new_order2').hide();
    //     $('#remont_new_order3').show();
    // }else{

    // } 
});
$('#remont_new_order3-nazad-btn').on('click', function(){
    $('#remont_new_order3').hide();
    $('#remont_new_order2').show();
});



</script>


</div>
