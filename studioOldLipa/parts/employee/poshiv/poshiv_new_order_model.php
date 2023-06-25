<?php
    include('../../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 
    $query = "SELECT * FROM `poshiv` LEFT JOIN `model` ON `poshiv`.`model_name` = `model`.`model_name`";
		$result = mysqli_query($link, $query);
		echo"<div class='usluga-block-viborka'>";
			while ($row = $result->fetch_assoc()) {
				echo
				"
					<div class='model_cart' data-model='$row[model_name]' data-price='$row[poshiv_price]' data-srok='$row[poshiv_srok]' data-img='img/model/$row[model_image]'>
						<img class='model_cart_image' src='img/model/$row[model_image]'>
						<p class='model_cart_name'> $row[model_name] </p>
					</div>	
				";
			}
		echo"</div>";
		echo"
		<script>
			$('.model_cart').on('click',function(){
				$('.modal-back').show();
				$('#poshiv_img').attr('src', $(this).attr('data-img') );
				$('#mbp-model').text( $(this).attr('data-model') );
				$('#mbp-price').text( $(this).attr('data-price') );
				$('#mbp-srok').text( $(this).attr('data-srok') );
			});
		</script>
		";	
	mysqli_close($link);
?>