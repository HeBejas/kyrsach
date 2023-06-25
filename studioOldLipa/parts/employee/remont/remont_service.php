<?php 
	$model_name = ltrim($_POST['model_name']);
	include('../../server/connect.php');

	$link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
	$query = "SELECT * FROM catservice WHERE `catservices_model` = '$model_name' ";
	$result = mysqli_query($link, $query); 

	echo "<div style='display: flex; flex-direction:column; align-items:center;'>";
		echo "<h3 class='services_catalog_logo'>$model_name</h3>";
	echo "</div>";
	$service_save = "";
	$indexind = 0;
	while ($row = $result->fetch_assoc()){
		if($service_save != $row['catservices_type']){
			$service_save = $row['catservices_type'];
			echo "
				<p class='model_cart_type'> $row[catservices_type]  </p>
			";
			echo
			"
				<div class='model_cart_position'>	
					<div class='model_cart_position_items' name='$row[catservices_type]' attr=$indexind>
			";
			$indexind++;
			echo
			"
						<p class='model_cart_name'> $row[catservices_description] </p>
						<p class='model_cart_price'> $row[catservices_price] </p>
					</div>
				</div>
			";
		}else{
		echo
		"
			<div class='model_cart_position'>
				<div class='model_cart_position_items' name='$row[catservices_type]' attr=$indexind>";
			$indexind++;
			echo
			"
					<p class='model_cart_name'> $row[catservices_description] </p>
					<p class='model_cart_price'> $row[catservices_price] </p>
				</div>
			</div>
		";

		}		
	}
	mysqli_close($link);
?>
<script>
$( document ).ready(function(){

    var itemName = $(".model_cart_position_items"); 
    var SelectService = '';
    
    itemName.on('click', function(){
        if( SelectService != '' ){
            SelectService.removeClass('model_cart_position_select');

            usluga =  $(this).attr( 'name' );

            opiscUsluga = $(this).find('.model_cart_name')[0].textContent;
            price = $(this).find('.model_cart_price')[0].textContent;
            // console.log(usluga);
            // console.log(opiscUsluga);

            $(this).addClass('model_cart_position_select');
            SelectService = $(this);
        }else{
            $(this).addClass('model_cart_position_select');

            usluga =  $(this).attr( 'name' );
            opiscUsluga = $(this).find('.model_cart_name')[0].textContent;
            price = $(this).find('.model_cart_price')[0].textContent;

            SelectService = $(this);
        }

    });   	
})
</script>