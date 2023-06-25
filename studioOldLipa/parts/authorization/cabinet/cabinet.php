<?php session_start() ?>
<div class="user_cabinet">
    <div class="user_cabinet_main">
        <div class="user_cabinet-tab tab-active" id="tab_1">
            <div class="user_cabinet-tab-info">
                <p>Логин</p>
                <p><?php echo $_SESSION['User_login'] ?></p>
                <p style="margin-top: 40px;">Фио</p>
                <p><?php echo $_SESSION['User_fio'] ?></p>
                <p style="margin-top: 40px;">Телефон</p>
                <p><?php echo $_SESSION['User_phone'] ?></p>
            </div>
        </div>
        <div class="user_cabinet-tab" id="tab_2">
            <?php
                include('../../server/connect.php');
                $xr1 = $_SESSION['User_login'];
                $query = "SELECT * FROM zakaz_remont WHERE (client_login = '$xr1' )";
                $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
                $result = mysqli_query($link, $query);
                $orderindexind = 1;
                echo"<div class='cabinet_zakaz_viborka' style='margin-top: 60px;'>";
                while ($row = $result->fetch_assoc()) {
                    echo" 
                        <div class='rremont zakaz_cart' attr='$row[order_id]'>
                            <ul>
                                <li class = 'cabinet_zakaz_li_num'>$orderindexind. Заказ №$row[order_id]</li>
                    ";
                    $orderindexind ++;
                    echo "
                                <div class='cabinet_zakaz_li_content'>
                                    <li>$row[order_model] - $row[order_service]</li>
                                    <li style='color:red;'>$row[pay_state]</li>
                                    <li>$row[order_price] Руб</li>
                                </div>
                                <li class='cabinet_zakaz_li_state'>$row[order_state]</li>
                            </ul>
                        </div>
                    ";
                }

                echo"</div>";

            ?>
        </div>

        <div class="user_cabinet-tab" id="tab_3">
            <div class="user_cabinet-tab-info">
                <?php
                $xr1 = $_SESSION['User_login'];
                $query = "SELECT * FROM zakaz_poshiv WHERE (client_login = '$xr1' )";
                $result = mysqli_query($link, $query);
                $orderindexind = 1;
                echo"<div class='cabinet_zakaz_viborka'>";
                while ($row = $result->fetch_assoc()) {
                    echo" 
                        <div class='pposhiv zakaz_cart' attr='$row[order_id]'>
                            <ul>
                                <li class = 'cabinet_zakaz_li_num'>$orderindexind. Заказ №$row[order_id]</li>
                    ";
                    $orderindexind ++;
                    echo "
                                <div class='cabinet_zakaz_li_content'>
                                    <li>$row[order_model]</li>
                                    <li>Цена:</li>
                                    <li>$row[order_price]</li>
                                    <li style='color:red;'>$row[pay_state]</li>
                                </div>
                                <li class='cabinet_zakaz_li_state'>$row[order_state]</li>
                            </ul>
                        </div>
                    ";
                }

                echo"</div>";
                mysqli_close($link);
                ?>
            </div>
        </div>

        <div class="user_cabinet-tab" id="tab_4">
            <div class="user_cabinet-tab-info">
                <!-- <p>Логин</p>
                <input type="text" value="<?php echo $_SESSION['User_login'] ?>" size="20px" class="cabinet-input"> -->
                <p style="margin-top: 40px;">Фио</p>
                <input type="text" value="<?php echo $_SESSION['User_fio'] ?>" size="30px" class="cabinet-input">
                <p style="margin-top: 40px;">Телефон</p>
                <input type="text" value="<?php echo $_SESSION['User_phone'] ?>" size="20px" class="cabinet-input">
                <button class="cabinet_default_btn">Изменить</button>
            </div>
        </div>
        <div class="user_cabinet-tab" id="tab_5">
            <div class="user_cabinet-tab-info">
                <p>Старый пароль</p>
                <input type="text" value="" size="20px" class="cabinet-input">
                <p style="margin-top: 40px;">Новый пароль</p>
                <input type="text" value="" size="20px" class="cabinet-input">
                <p style="margin-top: 40px;">Повторите новый пароль</p>
                <input type="text" value="" size="20px" class="cabinet-input">
                <button class="cabinet_default_btn">Поменять пароль</button>
            </div>
        </div>
        <div class="user_cabinet-tab" id="tab_6">
            <div class="user_cabinet-tab-info">
                <p style="text-align: center;">Напишите нам и оставьте ваши контакты.<br> В ближайшее время мы с вами свяжемся и решим проблему.</p>
                <p style="margin-top:15px;">Email</p>
                <input type="text" value="" size="20px" class="cabinet-input">
                <p>Сообщение</p>
                <textarea name="" id="" cols="50" rows="5"></textarea>
                <button class="cabinet_default_btn">Отправить</button>
            </div>
        </div>

        

    </div>
    <div class="user_cabinet_menu">
        <div class="content_tab-nav">
            <ul id="mainnav">
                <li class="cabinet-li nav-active" href="tab_1">Профиль</li>
                <h4>Мои Заказы</h4>
                <li  id="cabinet_zakaz"        class="cabinet-li" href="tab_2">Ремонт</li>
                <li  id="cabinet_zakaz_poshiv" class="cabinet-li" href="tab_3">Пошив</li>
                <h4>Дополнительно</h4>
                <li class="cabinet-li" href="tab_4">Редактировать данные</li>
                <li class="cabinet-li" href="tab_5">Безопасность</li>
                <li class="cabinet-li" href="tab_6">Поддержка</li>
            </ul>
        </div>
    </div>
</div>
<style>
    .content_tab-nav h4 {
        align-items: center;
        display: flex;
        justify-content: center;
        font-size: 18px;
    }

</style>
<script>
$("#cabinet_menu_hide-btn").click(function(){
    $(".cabinet_menu_hide").show();
});

$(".rremont").click(function(){
    $("content").load("parts/authorization/cabinet/order_page.php", {'zakaz_id' : $(this).attr( 'attr' ) } );
    // console.log($(this).attr( 'attr' ) )
});
$(".pposhiv").click(function(){
    $("content").load("parts/authorization/cabinet/order_poshiv_page.php", {'zakaz_id' : $(this).attr( 'attr' ) } );
    // console.log($(this).attr( 'attr' ) )zakaz_cart_poshiv
});
</script>


<script>
var li = $('li.nav-active').nextAll();
var main_li = $('li.nav-active');
var tab = document.getElementById('tab_1');

$(".cabinet-li").click(function(){
      main_li.removeClass('nav-active');
      main_li = $(this);
      $(this).addClass('nav-active');

      tab.classList.remove('tab-active');
      tab = document.getElementById( main_li.attr('href') );
      tab.classList.add('tab-active');
    })
</script>

<style>
.zakaz_cart li{
    text-decoration: none;
    list-style: none;
    /* position: absolute; */
}
.cabinet-input{
    font-size: 25px;
    text-align: center;
}
.user_cabinet-tab-info{
    font-size: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 30px;
}
.content_tab-nav ul{
  display: flex;
  flex-direction: column;
  text-decoration: none;
}
.nav-active{
    border-bottom: none !important;
    background-color: #F8F8F8 !important;
    transition: 0.5s !important;
    font-size: 21px !important;
    transform: scale(1.02) !important;
    margin: 1px !important;
    padding: 5px !important;
}
.tab-active{
  display: block !important;
  
}
</style>

<style>
.user_cabinet_menu{
    background-color: rgba(200, 200, 100, 0.3);
    width: 135px;
    height: 490px;
}
.user_cabinet_menu ul {
    list-style: none;
    text-decoration: none;
}
.user_cabinet_menu li{
    background-color: rgba(218, 230, 188, 0.7);
    width: inherit;
    height: 60px;
    font-size: 20px;
    user-select: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: 0.5s;
}
.user_cabinet_menu li:hover{
    background-color: rgba(218, 230, 188, 1);
    transition: 0.5s;
    font-size: 21px;
    transform: scale(1.02);
    margin: 1px;
    padding: 5px;
}

.user_cabinet_main{
    width: 750px;
    height: 490px;
    background-color: rgba(200, 200, 100, 0.6);
}
.user_cabinet{
    display: flex;
    margin: 0, auto;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100%;
    min-height: 700px;
}
.user_cabinet-tab{
    display: flex;
    margin: 0, auto;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 100%;
    min-height: 700px;
    display: none;
    height: 100%;
    min-height: 305px;
    overflow: auto;
}
.cabinet_default_btn{
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
		padding: 15px;
        margin: 15px;
}
</style>