<div>
    <ul>   
        <li id="remont_new_order">Новый заказ</li>
        <li id="remont_ne_oform">Не Оформленные</li>
    </ul>
<!-- 
<li>Не доставленные</li>   
<li>Активные заказы</li> -->
</div>
<script>
$('#remont_new_order').on('click', function(){
    $('content').load('parts/employee/remont/remont_new_order.php');
});
$('#remont_ne_oform').on('click', function(){
    $('content').load('parts/employee/remont/remont_ne_oform.php');
});
</script>