<div class="employee_menu_page">




    <div class="employee_menu">
        <div class="employee_menu_info-row">
            <label id="employee_menu_remont"  class="info_row pointed">Ремонт</label>
            <label id="employee_menu_poshiv"  class="info_row">Пошив</label>
        </div>
        <div class="page_employee_menu">
            <div class="page_employee_menu-load">
                <!-- Место для вставки -->
            </div>

            <div class="page_employee_menu-public">
                <ul>
                    <!-- <li>Активные заказы</li> -->
                    <li id="my_orders">Мои заказы</li>
                    <li id="sklad">Склад</li>
                    <li id="ended">Завершенные</li>
                </ul>
            </div>
        </div>

    </div>

</div>
<script>
    $(document).ready(function(){
	    $('.page_employee_menu-load').load('parts/employee/remont/remont_menu.php');
    });
    var remont = $("#employee_menu_remont");
    var poshiv = $("#employee_menu_poshiv");

    remont.on('click', function(){
		if(poshiv.hasClass("pointed")){
			remont.toggleClass("pointed");
        	poshiv.toggleClass("pointed");
        	$('.page_employee_menu-load').load('parts/employee/remont/remont_menu.php');
		}
        
    });
    poshiv.on('click', function(){
        if(remont.hasClass("pointed")){
            remont.toggleClass("pointed");
            poshiv.toggleClass("pointed");
            $('.page_employee_menu-load').load('parts/employee/poshiv/poshiv_menu.php');
        };
    });
    // Меню
    $('#my_orders').on('click', function(){
        $('content').load('parts/employee/employee_my_orders.php');
    });
    //Склад
    $('#sklad').on('click', function(){
        $('content').load('parts/employee/sklad/storage.php');
    });
    //Завершенные 
    $('#ended').on('click', function(){
        $('content').load('parts/employee/ended/ended.php');
    });
</script>
<style>
.employee_menu{
    width: 400px;
    height: 500px;
    display: flex;
    flex-direction: column;
    text-align: center; 

    margin-top: 70px;
}
.employee_menu ul{
    list-style: none;
}
.employee_menu li{
    font-size: 22px;
    background-color: #f7ed91;
    border-radius: 25px;
    padding: 20px;
    margin: 20px;
    width: 300px;
    height: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    user-select: none;
}
.employee_menu li:hover{
    transition: 1s;
    transform: scale(1.03);
    color: white;
    background-color: #8c8967 !important;
}
.employee_menu_page{
    height: 600px;
}
.pointed{
    color: black !important;
    font-size: 28px !important;
    font-weight: 700 !important;;
}
.info_row{
    font-family: "Gilroy-Bold";
    font-size: 24px;
    line-height: 24px;
    margin-right: 25px;
    margin-left: 25px;
    cursor: pointer;
    user-select: none;
    color: #BACAD5;
}
.employee_menu_info-row{
    background: aliceblue;
    border-radius: 30px 30px 0px 0px;
    padding: 15px;
}
.page_employee_menu{
    height: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.page_employee_menu-load{
    /* margin-top: 30px; */
    background-color: #dbccb082;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 400px;
    height: 140px;
    justify-content: center;
    border-radius: 0px 0px 30px 30px;
}
.page_employee_menu-public{
    /* background-color: #f0edcf; */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background-color: #dbccb082;
    width: 400px;
    height: 250px;
    border-radius: 30px;
    margin-top: 20px;
}
.page_employee_menu-public li{
    background-color: #f0edcf !important;
}
</style>
