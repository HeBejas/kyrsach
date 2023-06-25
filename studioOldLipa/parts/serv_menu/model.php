<?php 
	include('../server/connect.php');
	$link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

	if ( $_POST["side"] == 1) { 
		$query = "SELECT * FROM model  ORDER BY `model_name` DESC";
		$result = mysqli_query($link, $query);
		// var_dump($result);
		// for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row)
		

			// var_dump($data);
			echo"<h2 class='services_catalog_logo'>Вид одежды</h2>";
			echo"<div class='usluga-block-viborka'>";
				while ($row = $result->fetch_assoc()) {
					echo
					"
						<div class='model_cart'>
							<img class='model_cart_image' src='img/model/$row[model_image]'>
							<p class='model_cart_name'> $row[model_name] </p>
						</div>	
					";
				}
			echo"</div>";
			echo "
				<script>
		$( document ).ready(function(){
			var itemName = $('.model_cart'); 
			

			if (SelectItem != ''){
				// console.log(SelectItem.index());
				document.getElementsByClassName('model_cart')[SelectItem.index()].classList.add('model_cart_select');
			};

			itemName.on('click', function(){
				SeriveAlert.hide();
				SelectService 	= '';
				if (	VidUslugiState.text    != 'Отсутствует' &&
						OpisUslugiState.text  != 'Отсутствует'  &&
						PriceState.text  	  != 'Отсутствует'
					){
					VidUslugiState.text('Отсутствует');
					OpisUslugiState.text('Отсутствует');
					PriceState.text('Отсутствует');
				}
				SeriveAlert.addClass('hide');
				if (SelectItem != ''){
					document.getElementsByClassName('model_cart')[SelectItem.index()].classList.remove('model_cart_select');
				};
				if(SelectItem){
					SelectItem.removeClass('model_cart_select');
					SelectItem = $(this);

					VidOdezhdiState.text($(this).find('.model_cart_name').text() );
					$(this).addClass('model_cart_select');
				}
				else{
					SelectItem = $(this);
					VidOdezhdiState.text($(this).find('.model_cart_name').text() );
					$(this).addClass('model_cart_select');
				}

			});   	
		})
	</script>";
	}
	else if ($_POST["side"] == 2){
		$query = "SELECT * FROM `poshiv` LEFT JOIN `model` ON `poshiv`.`model_name` = `model`.`model_name`";
		$result = mysqli_query($link, $query);
		echo"<h2 class='services_catalog_logo2'>Пошив</h2>";
		echo "<div class='poshiv__content-description'>
		Если Вы желаете подчеркнуть свою индивидуальность, то пошив одежды в ателье поможет вам решить эту задачу. Мы гарантируем, что любой заказ наши мастера выполнят качественно и в предельно короткий срок!
		</div>";
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
				// console.log($(this).attr('data-srok') );
				// console.log($(this).attr('data-price') );
				$('.modal-back').show();
				$('#poshiv_img').attr('src', $(this).attr('data-img') );
				$('#mbp-model').text( $(this).attr('data-model') );
				$('#mbp-price').text( $(this).attr('data-price') );
				$('#mbp-srok').text( $(this).attr('data-srok') );
			});
		</script>
		";	


	}
	mysqli_close($link);
?>
<!-- <script>
	$( document ).ready(function(){
		var itemName = $(".model_cart"); 
		var VidOdezhdiState = $("#vid_odezhdi_state"); 
		var SelectItem = "";
		//
		if(selected_model != "nothing"){
			// console.log(selected_model);
			// console.log( $('.usluga-block-viborka').find('.model_cart')[3]);
			// $('.usluga-block-viborka').find('.model_cart')[3].;
			var lol = document.getElementsByClassName('model_cart')[selected_model];
			console.log(lol);
			document.getElementsByClassName('model_cart')[selected_model].classList.add('model_cart_select');
		}
		//
		itemName.on('click', function(){
			// if(selected_model){selected_model.classList.remove('model_cart_select');}

			if(SelectItem){
				SelectItem.removeClass('model_cart_select');
				SelectItem = $(this);
				// ЗАПОМИНАНИЕ
				selected_model = $(this).index();
				console.log(selected_model);
				//
				VidOdezhdiState.text($(this).find('.model_cart_name').text() );
				$(this).addClass('model_cart_select');
			}
			else{
				SelectItem = $(this);
				// ЗАПОМИНАНИЕ
				selected_model = $(this).index();
				console.log(selected_model);
				//
				VidOdezhdiState.text($(this).find('.model_cart_name').text() );
 				$(this).addClass('model_cart_select');
			}
	    });   	
    })

</script> -->


<style>
	.model_cart_select{
		background-color: rgba(255,250,205, 0.4);
		transform: scale(1);
		border-radius: 20px;
	}

	.model_cart{
	    width: 200px;
	    height: 300px;
	    display: flex;
	    flex-direction: column;
	    justify-content: center;
	    text-align: center;
	    align-items: center;
	    transition: 1s;
	    margin: 10px;
	}
	.model_cart_image{
	    height: 250px;
	    width: 170px;
		cursor: pointer;
	}
	.model_cart:hover{
	    background-color: rgba(255,250,205, 0.4);
	    transform: scale(1.1);
	    transition: 1s;
	    border-radius: 20px;
	}
	.usluga-block-viborka{
	    display: flex;
	    flex-wrap: wrap;
	    flex-direction: row;
	    justify-content: center;
	}
	.services_catalog_logo{
		display: flex;
		justify-content: center;
		font-size: 30px;
		margin-bottom: 50px;
	}
	.services_catalog_logo2{
		display: flex;
		justify-content: center;
		font-size: 30px;
		margin-bottom: 10px;
	}
	.poshiv__content-description{
		text-align: center;
		font-size: 20px;
		width: 1200px;
		margin-bottom: 10px;
	}

</style>