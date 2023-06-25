<?php session_start() ?>
<div class="part_usluga">
    <div class="usluga-block">
        <div class="usluga-block_description">
            <h1>Ремонт одежды</h1>
            Оторванную пуговицу можно пришить и самостоятельно, но если вам требуется более масштабный ремонт одежды, то рады предложить вам свою помощь! Мы самым бережным и аккуратным образом выполним для вас реставрацию любимой шубки и ушьем рукава на памятной рубашке. Обратившись в наше ателье по ремонту в Ижевске, вы сможете вернуть вещам былой вид, причем сделают это предельно профессионально! Работает только на фабричном оборудовании и выполняем работы по ремонту одежды любой сложности.
        </div>
        <ul class="ub-ul">
            <li>
                <p class="ub-ul-p1">Вид одежды</p>
                <p class="ub-ul-p2"><button id="service_model-btn" class="ub-ul-button">Выбрать</button><p>
                <p id="vid_odezhdi_state">Отсутствует</p>
            </li>
            <li>
                <p class="ub-ul-p1">Вид услуги</p>
                <p class="ub-ul-p2"><button id="service_service-btn" class="ub-ul-button">Выбрать</button><p>
                <p id="service-alert" class='alert'>Сначало выберите модель!<p>
                <p id="vid_uslugi_state">Отсутствует</p>
            </li>
            <li>
                <p class="ub-ul-p1">Описание услуги</p>
                <p id="opis_uslugi_state">Отсутствует</p>
            </li>
            <li>
                <p class="ub-ul-p1">Вид доставки</p>
                <div class="ub-ul-radiodost">
                    <input type="radio" id="contactChoice1"
                     name="dosttype" value="Очно" checked>
                    <label for="contactChoice1">Очно</label>
                    <br>
                    <input type="radio" id="contactChoice2"
                     name="dosttype" value="Курьером">
                    <label for="contactChoice2" value="2">Курьером(+200руб) </label>
                </div>
            </li>

            <li>
                <!-- <p class="ub-ul-p1">Ваши персональные данные</p>
                <p>ФИО</p>
                <p>Телефон</p> -->
                <p class="ub-ul-p1">Цена</p>
                <p id="price_state">Отсутствует</p>  
            </li>
            <li>
                <button id="remont-oformit">Оформить</button>
                <div id="remont-alert" class="alert">Для того чтобы оформить заказ вам нужно заполнить форму услуги, быть авторизированным на сайте!</div>
                <div class="modal-back">   
                    <div class="modal-block">
                        <h2>Подтвердите ваш заказ</h2>
                        <form id="form_order_post" method="post">
                            <ul> 
                                <div class="modal-block-order">  
                                    <li class="modal-block-li_order" ><span class="modal-block-span_order">Вид Одежды:   </span> <label id="r1"></label></li>
                                    <input type="hidden" name="remont1" id="input_r1">
                                    <li class="modal-block-li_order" ><span class="modal-block-span_order">Услуга:       </span> <label id="r2"></label></li>
                                    <input type="hidden" name="remont2" id="input_r2">
                                    <li class="modal-block-li_order" ><span class="modal-block-span_order">Вид Доставки: </span> <label id="r3"></label></li>
                                    <input type="hidden" name="remont3" id="input_r3">
                                    <li class="modal-block-li_order"> <span class="modal-block-span_order">Цена:         </span> <label id="r4"></label></li>
                                    <input type="hidden" name="remont4" id="input_r4">
                                    <input type="hidden" name="remont5" id="input_r5">
                                    <input type="hidden" name="remontstartdate" id="id_remontstartdate">                                
                                </div> 
                                <li>Заказ оформляется на пользователя:<label id="r6"><?php echo $_SESSION['User_login'] ?></label></li>
                                <li style="margin-top: 30px;">Информация о доставке:</li>
                                <li><p id="r_dost"></p></li>
                                <li style="margin-top: 30px;">Информация об оплате: <p>Оплатить заказ вы можете в личном кабинете, или же при доставке изделия в ателье. Выполненные заказы без оплаты не выдаем!!!</p></li>
                                <br>
                            </ul>   
                            <button type="submit" id="modal-block-podtverdit">Подтвердить</button>
                        </form>
                        <button id="modal-block-otmena">Отмена</button>
                        <div class="here"></div>
                    </div>
                </div>
                <!-- Форма -->
                <script>
                    $('#form_order_post').submit(function () {
                        var setdata= $("#form_order_post").serialize(); // Сеарилизуем объект
                        $.post( "parts/serv_from/order_form_post.php", setdata,function( data ) 
                        { 
                            $('.here').html( data );
                        });
                        event.preventDefault();
                    }); 
                </script>

                <script>
                   
                    $('#remont-oformit').on('click',function(){
                        <?php if (empty($_SESSION['User_login']))
                        {
                            $_SESSION['User_login']= "";
                        }
                        ?>
                        var login = '<?php echo $_SESSION['User_login'] ?>' ;
                        console.log(login);

                        if(VidOdezhdiState.text() == "Отсутствует" || VidUslugiState.text() == "Отсутствует" ||  login == "" ){
                            $('#remont-alert').show();
                        }else{
                        var usluga = $('#vid_uslugi_state').text()  + $('#opis_uslugi_state').text();
                           $('#r1').text( $('#vid_odezhdi_state').text() );
                           $('#r2').text( usluga );
                           $('#r3').text(  $('input[name="dosttype"]:checked').val() );
                           if( $('input[name="dosttype"]:checked').val() == "Очно"){
                                $('#r_dost').text( 'При очной доставке вам нужно будет доставить ваше изделия по адресу ул.Баранова, 45 в течении одной недели.' );
                           }else{
                                $('#r_dost').text( 'При доставке курьером вам нужно выбрать удобное для вас время, в которое может подойти курьер чтобы забрать изделие.' );
                           }
                           $('#r4').text( $('#price_state').text() );
                           $('#r5').text( $('#price_state').text() );

                           $('#input_r1').val( $('#r1').text() );
                           $('#input_r2').val( $('#r2').text() );
                           $('#input_r3').val( $('#r3').text() );
                           $('#input_r4').val( $('#r4').text() );
                           $('#input_r5').val( $('#r6').text() );

                           var today = new Date;
                           $('#id_remontstartdate').val( today.toLocaleString("sv-SE") );

                           $('#remont-alert').hide();
                           $('.modal-back').show(); 
                        }
                            
                    }); 
                    $('#modal-block-otmena').on('click',function(){
                        $('.modal-back').hide();
                    });
                </script>
            </li>

        </ul>

    </div>

    <div id="services_catalog" class="usluga-block">
        <div class='usluga-block-viborka'>
<!--             Сюда загружаются данные 
            Изначально модель одежды  -->
        </div>

    </div>
</div>
<script>
    $( document ).ready(function(){
        $("#services_catalog").load("parts/serv_menu/model.php", {'side' : '1' } );
    });

    var SelectItem = "";
    var SelectService = "";
    var SeriveAlert  = $('#service-alert');

    var VidOdezhdiState = $("#vid_odezhdi_state"); 
    var VidUslugiState  = $("#vid_uslugi_state");
    var OpisUslugiState = $("#opis_uslugi_state");
    var PriceState      = $("#price_state");


    $('#service_model-btn').on('click',function(){
        $("#services_catalog").load("parts/serv_menu/model.php", {'side' : '1' } );
    });

    $('#service_service-btn').on('click',function(){
        // console.log(VidOdezhdiState.text());
        if(VidOdezhdiState.text() == "Отсутствует")
        {
            SeriveAlert.show();
        }
        else
        {
            $.post("parts/serv_menu/model_service.php",
            {
                model_name: $("#vid_odezhdi_state").text()
            },
            function(result)
            {
                $("#services_catalog").html(result);  
            });
        }
    });

            // console.log($("#vid_odezhdi_state").text());
    
</script>
