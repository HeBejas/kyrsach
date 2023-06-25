<div>
    <ul>   
        <li id="poshiv_new_order">Новый заказ</li>
        <li id="poshiv_ne_oform">Не Оформленные</li>
    </ul>
</div>
<script>
$('#poshiv_new_order').on('click', function(){
    $('content').load('parts/employee/poshiv/poshiv_new_order.php');
});
$('#poshiv_ne_oform').on('click', function(){
    $('content').load('parts/employee/poshiv/poshiv_ne_oform.php');
});
</script>