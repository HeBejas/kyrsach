<div class="remont_ne_oform_usluga-block">
    <h2>Пошив</h2>
    <h2>Не оформленные заказы</h2>

    <div class="table_command_pannel">
    <div class="remont_new_order2-btns">
        <button id="table_command_pannel-btn-nazad" class="deafault_ui-btn">Назад</button>
    </div>
    </div>

    <?php
        include('../../server/connect.php');
        $query = "SELECT * FROM zakaz_poshiv WHERE employee_login IS NULL ";
        $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
        $result = mysqli_query($link, $query);
        echo"<table class='remont_ne_oform-table'>
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Клиент</th>
                <th>Статус заказа</th>
                <th>Модель</th>
                <th>Услуга</th>
                <th>Цена</th>
                <th>Дата начала заказа</th>
                <th>Статус оплаты</th>
            </tr>
        </thead>
        <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo"
                <tr class='ne_oform_content_tr' attr='$row[order_id]'> 
                    <td>$row[order_id]          </td>
                    <td>$row[client_login]$row[other_client_info]</td>
                    <td>$row[order_state]       </td>
                    <td>$row[order_model]       </td>
                    <td>$row[order_service]     </td>
                    <td>$row[order_price]       </td>
                    <td>$row[order_start_date]  </td>
                    <td>$row[pay_state]         </td>
                </tr>
            ";
        }
        echo"
        </tbody>
        </table>";

    ?>
</div>

<script>
    $('.ne_oform_content_tr').on('click', function(){
        $("content").load("parts/employee/poshiv/poshiv_employee_order_page.php", {'zakaz_id' : $(this).attr( 'attr' ) } );
    });
    $('#table_command_pannel-btn-nazad').on('click', function(){
        $('content').load('parts/employee/employee_menu.php');
    });

</script>

<style>
    /* Тут */
    .remont_ne_oform_usluga-block{
        margin-top: 50px;
        width: 1209px;
        height: 900px;
        overflow: overlay;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .remont_ne_oform_usluga-block h2{
        text-align: center;
        margin-bottom: 20px;
    }
</style>

