<div class="remont_neworder_page">
<h1>Пошив одежды</h1>
<h2>Новый заказ</h2>
<div class="remont_new_order2-btns">
    <button id="remont_new_order1-btn-nazad" class="deafault_ui-btn">Назад</button>
</div>
<!-- Модель -->
<div class="usluga-block-posiv"></div>

<!-- Оформление -->
<div class="modal-back">
    <div class="modal-block_poshiv">
        <h2 class="modal_block_poshiv-h2">Вы выбрали</h2>
        <div class="modal-block_poshiv-block">
            <img id="poshiv_img" src="">
            <div class="modal-block_poshiv-text">
                <ul>
                    <li>Модель:      <br><span id="mbp-model"></span></li>
                    <li>Цена:        <br><span>от</span><span id="mbp-price"></span> руб</li>
                    <li>Срок пошива: <br><span id="mbp-srok"></span></li>
                </ul>
            </div>
        </div>
        <div class="modal-block_poshiv-block-merki">
            <h2>Как снимать мерки</h2>
            <div class="modal-block_poshiv-block-merki-content"></div>
        </div>
        <div class="modal-block_poshiv-block-buttons">
            <button id="mbpbb-zakaz" class="mbpbb-select">Заказ</button>
            <button id="mbpbb-merki">Как снимать мерки</button>
        </div>
    </div>

    <div class="modal-block_poshiv-description">
        <h2 class="modal_block_poshiv-h2">Оформить заказ</h2>
        <div class="modal-block_poshiv-description-block">
        <!-- Форма -->
        <form id="poshiv_new_order_form" method="post">
            <!-- Информация о клиенте -->
                <div class="modal-block_poshiv-description-title">
                    <p>Информация о клиенте</p>
                </div>
                <div class="modal-block_poshiv-description-content_another">
                    <ul>
                        <li class="remont_new_order-li_input">Телефон клиента <input id="poshiv_new_tel" pattern="[0-9\s\-\(\)]{11,11}" type="tel" maxlength="11" placeholder="Телефон" required></li>
                        <li class="remont_new_order-li_input">ФИО <input id="poshiv_new_fio" type="text"  maxlength="100" placeholder="ФИО" size="35px" required></li>   
                    </ul>
                </div>
                <!-- Мерки -->
                <div class="modal-block_poshiv-description-title">
                    <p>Мерки (см)</p>
                </div>
                <div class="modal-block_poshiv-description-content">
            
                <ul>
                    <li>1.Рост<input type="number" min='1' placeholder="Рост" required  ></li>
                    <li>2.Обхват груди<input type="number" min='1' placeholder="Обхват груди" required></li>
                    <li>3.Обхват талии<input type="number" min='1' placeholder="Обхват талии" required></li>
                    <li>4.Обхват бёдер<input type="number" min='1' placeholder="Обхват бёдер" required></li>
                    <li>5.Высота груди<input type="number" min='1' placeholder="Высота груди" required></li>
                    <li>6.Длина от талии до плеча <input type="number" min='1' placeholder="Длина от талии до плеча " required></li>
                    <li>7.Длина от основания шеи до талии <input type="number" min='1' placeholder="Длина от основания шеи до талии " required></li>
                    <li>8.Длина плеча<input  type="number" min='1' placeholder="Длина плеча" required></li>
                    <li>9.Длина рукава<input type="number" min='1' placeholder="Длина рукава" required></li>
                    <li>10.Обхват верхней части руки<input   type="number" min='1' placeholder="Обхват верхней части руки" required></li>
                    <li>11.Обхват локтевой части руки <input type="number" min='1' placeholder="Обхват локтевой части руки " required></li>
                    <li>12.Обхват запястья <input type="number" min='1' placeholder="Обхват запястья " required></li>
                    <li>13.Длина руки по внутренней её стороне – от подмышечных впадин до запястья<input type="text" placeholder="Длина руки по внутренней её стороне – от подмышечных впадин до запястья. " required></li>
                    <li>14.Длина брюк по боковому шву<input  type="number" min='1' placeholder="Длина брюк по боковому шву" required></li>
                    <li>15.Длина брюк по шаговому шву <input type="number" min='1' placeholder="Длина брюк по шаговому шву" required></li>
                    <li>16.Глубина сидения<input    type="number" min='1' placeholder="Глубина сидения" required></li>
                    <li>17.Длина среднего шва<input type="number" min='1' placeholder="Длина среднего шва" required></li>
                    
                    <input id="poshiv1" type="hidden" name="poshiv1">
                    <input id="poshiv2" type="hidden" name="poshiv2">
                    <input id="poshiv3" type="hidden" name="poshiv3">
                    <input id="poshiv4" type="hidden" name="poshiv4">
                    <input id="poshiv5" type="hidden" name="poshiv5">
                    <input id="poshiv6" type="hidden" name="poshiv6">

                    </form>
                </ul>
                <div  class="modal-block_poshiv-description-under">
                    <p>Пожелания к заказу</p>
                    <textarea id="poshiv-text4" cols="30" rows="10" name="poshiv" ></textarea>
                    <div class="modal-block_poshiv-description-title">
                        <p>Расчет цены</p>
                    </div>
                    <div class="modal-block_poshiv-description-content_another">
                        <ul>
                            <li class="remont_new_order-li_input">Цена <input id="poshiv_new_price"  type="number" min="0" placeholder="Цена заказа" required></li>  
                        </ul>
                    </div>
            </div> 
        </div>
        <div class="modal-block_poshiv-block-btn">
            <button id="modal-block-oformit" type="submit" class="modal-block_poshiv-btn" form="poshiv_new_order_form">Оформить</button>
            <button id="modal-block-otmena" class="modal-block_poshiv-btn" >Отмена</button>
        </div>
        <div class="here"></div>
    </div>

</div>


</div>

<script>
    $( document ).ready(function(){
    //Загрузка Моделей
        $(".usluga-block-posiv").load("parts/employee/poshiv/poshiv_new_order_model.php");
    //Выход из мод. окна
        $('#modal-block-otmena').on('click',function(){
            $('.modal-back').hide();
        });
    //Загрузка вкладки Мерки
        $('.modal-block_poshiv-block-merki-content').load("parts/other/merki_guide.php")
    });
    //Мерки - Заказ "виджет"
    $( document ).ready(function(){
        $('.modal-block_poshiv-block-merki').hide();
    });
    $('#mbpbb-merki').on('click',function(){
        $('#mbpbb-merki').addClass('mbpbb-select');
        $('#mbpbb-zakaz').removeClass('mbpbb-select');
        $('.modal-block_poshiv').show();
        $('.modal-block_poshiv-block-merki').show();
    });
    $('#mbpbb-zakaz').on('click',function(){
        $('#mbpbb-zakaz').addClass('mbpbb-select');
        $('#mbpbb-merki').removeClass('mbpbb-select');
        $('.modal-block_poshiv').show();
        $('.modal-block_poshiv-block-merki').hide();
    });
    //ФОРМА
    $('#poshiv_new_order_form').on('submit', function () {
        var liss = $('.modal-block_poshiv-description-content li');
        var login = $('#poshiv_new_fio').val() + ' ' + '+' + $('#poshiv_new_tel').val(); 
        var price = $('#poshiv_new_price').val();
        var merki = '';
        $( liss ).each(function( index ) {
            merki = merki + $( this ).text() + ':' +  $(this).find('[type="number"]').val() + '|' ;
        });
    //Инпуты-------------------------------------------------------------
    $('#poshiv1').val( login );
    $('#poshiv2').val( $('#mbp-model').text() );
    $('#poshiv3').val( merki );
    $('#poshiv4').val( $('#poshiv-text4').text() );
    var today = new Date;
    $('#poshiv5').val( today.toLocaleString("sv-SE") );
    $('#poshiv6').val( price );
    //-------------------------------------------------------------------

    //Отправка Формы
    var setdata= $("#poshiv_new_order_form").serialize(); // Сеарилизуем объект
    $.post( "parts/employee/poshiv/poshiv_new_order_create.php", setdata,function( data ) 
    { 
        $('.here').html( data );
    });
    event.preventDefault();
    }); 
    //Кнопка назад
    $('#remont_new_order1-btn-nazad').on('click', function(){
        $('content').load('parts/employee/employee_menu.php');
    });
</script>