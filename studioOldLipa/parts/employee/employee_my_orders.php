<div class="remont_ne_oform_usluga-block">
    <h2>Мои заказы</h2>

    <div class="viborka_order_nav-btns">
        <button id="table_command_pannel-btn-nazad" class="deafault_ui-btn">Назад</button>
    </div>

    <!-- <div class="table_command_pannel">
        <form if="my_orders_viborka" action="post">
            <div>
                <input type="radio" id="serviceChoise1"
                name="contact" checked >
                <label for="serviceChoise1">Все</label>
                <input type="radio" id="serviceChoise2"
                name="contact">
                <label for="serviceChoise2">Ремонт</label>
                <input type="radio" id="serviceChoise3"
                name="contact">
                <label for="serviceChoise3">Пошив</label>
            </div>
        </form>
    </div> -->
    <div class="my_orders_content">
        <!-- Вставка сюда -->
    </div>
</div>

<script>
    $(document).ready(function(){
	    $('.my_orders_content').load('parts/employee/employee_my_orders_viborka.php');
    });

    $('#table_command_pannel-btn-nazad').on('click', function(){
        $('content').load('parts/employee/employee_menu.php');
    });
</script>


