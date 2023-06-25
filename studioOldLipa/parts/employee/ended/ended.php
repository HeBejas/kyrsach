<div class="remont_ne_oform_usluga-block">
    <h2>Завершенные заказы</h2>
    <div class="viborka_order_nav-btns">
        <button id="table_command_pannel-btn-nazad" class="deafault_ui-btn">Назад</button>
    </div>
    <div class="my_orders_content">
        <!-- Вставка сюда -->
    </div>
</div>

<script>
    $(document).ready(function(){
	    $('.my_orders_content').load('parts/employee/ended/ended_viborka.php');
    });

    $('#table_command_pannel-btn-nazad').on('click', function(){
        $('content').load('parts/employee/employee_menu.php');
    });
</script>
