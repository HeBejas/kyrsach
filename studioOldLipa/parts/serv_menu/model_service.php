<?php 

	$model_name = ltrim($_POST['model_name']);
	include('../server/connect.php');

	$link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
	$query = "SELECT * FROM catservice WHERE `catservices_model` = '$model_name' ";
	$result = mysqli_query($link, $query); 

	echo "<div style='display: flex; flex-direction:column; align-items:center;'>";
		echo "<h2 class='services_catalog_logo'>Услуги</h2>";
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
						<p class='model_cart_name'> $row[catservices_price] </p>
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
					<p class='model_cart_name'> $row[catservices_price] </p>
				</div>
			</div>
		";

		}


		
	}


		//Вариант с выводом ВСЕГО
		// $query = "SELECT * FROM catservice ORDER BY `catservices_model` DESC";
		// $result = mysqli_query($link, $query);
		// echo"<h2 class='services_catalog_logo'>Услуги</h2>";
		// echo"<div class='usluga-block-viborka'>";
		// $mcm_save = "";
		// $mct_save = "";
		// echo "<div>";

		// 	while ($row = $result->fetch_assoc()) {
		// 		// if($mcm_save != $row[catservices_model]){echo "</div>";}
		// 		// if (mcm_save != "" && mcm_save != $row[catservices_model]){echo "</div>";}
		// 		if($mcm_save != $row[catservices_model]){
		// 			$mcm_save = $row[catservices_model];
		// 			echo "</div>";
		// 			echo "<div class='model_cart_item'>";
		// 			echo "<p class='model_cart_main'> $row[catservices_model] </p>";
		// 		}if($mct_save != $row[catservices_type] ){
		// 			$mct_save = $row[catservices_type];
		// 			echo "<p class='model_cart_type'> $row[catservices_type]  </p>";
		// 		}

		// echo
		// "
		// 	<div class='model_cart_position'>
		// 		<div class='model_cart_position_items'>
		// 			<p class='model_cart_name'> $row[catservices_description] </p>
		// 			<p class='model_cart_name'> $row[catservices_price] </p>
		// 		</div>
		// 	</div>
		// ";
		// 	};

	
	

		// echo"<div class='usluga-block-viborka'>";
		// 	while ($row = $result->fetch_assoc()) {
		// 		echo
		// 		"
		// 			<div class='model_cart'>
		// 				<p class='model_cart_name'> $row[catservices_model] </p>
		// 				<p class='model_cart_name'> $row[catservices_type] </p>
		// 				<p class='model_cart_name'> $row[catservices_description] </p>
		// 				<p class='model_cart_name'> $row[catservices_price] </p>
		// 			</div>	
		// 		";
		// 	}
		// echo"</div>";
			


	mysqli_close($link);
?>

<script>
	$( document ).ready(function(){
		var itemName = $(".model_cart_position_items"); 

		if (SelectService != ""){
			// console.log(SelectService);
			// console.log( SelectService.attr( 'attr' ) );
			// console.log(document.getElementsByClassName('model_cart_position_items')[SelectService.attr( 'attr' )]);
			document.getElementsByClassName('model_cart_position_items')[SelectService.attr( 'attr' )].classList.add('model_cart_position_select');
		};

		itemName.on('click', function(){
			if(SelectService != ""){
				SelectService.removeClass('model_cart_position_select');
				// console.log( $(this).find('.model_cart_name')[0].textContent );
				// console.log( $(this).attr( 'name' ) );
				OpisUslugiState.text( $(this).find('.model_cart_name')[0].textContent);
				PriceState.text( $(this).find('.model_cart_name')[1].textContent);
				VidUslugiState.text( $(this).attr( 'name' ) );

				$(this).addClass('model_cart_position_select');
				SelectService = $(this);
			}else{
				OpisUslugiState.text( $(this).find('.model_cart_name')[0].textContent);
				PriceState.text( $(this).find('.model_cart_name')[1].textContent);
				VidUslugiState.text( $(this).attr( 'name' ) );
				$(this).addClass('model_cart_position_select');
				SelectService = $(this);
			}

	    });   	
    })
</script>
<!-- 	if($model_name == "Отсутствует"){
		$query = "SELECT * FROM catservice";
		$result = mysqli_query($link, $query);
		echo"<h2 class='services_catalog_logo'>Услуги</h2>";
		echo"<div class='usluga-block-viborka'>";
			while ($row = $result->fetch_assoc()) {
				echo
				"
					<div class='model_cart'>
						<p class='model_cart_main'> $row[catservices_model] </p>
						<p class='model_cart_name'> $row[catservices_type] </p>
						<p class='model_cart_name'> $row[catservices_description] </p>
						<p class='model_cart_name'> $row[catservices_price] </p>
					</div>	
				";
			}
		echo"</div>";
	}else{

	} -->