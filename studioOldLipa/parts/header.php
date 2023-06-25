<?php session_start() ?>
<img class="head_img" src="img/head_logo.png">
<div class="header__block">
	<div class="header__block-sign">
		<!-- <img src="img/head_sigh.png"> -->
		<img src="https://x-lines.ru/letters/i/cyrillicfancy/0306/f1e8a2/40/1/4no7dysosdeabwfo4g81bwr54nhpbx6osy.png">
	</div>	
	<nav class="header__block-btn">
		<ul class="ul_row-btn">
			<li id="header__main-btn"     class="li-header">Главная</li>	
			<!-- li_header-active -->
			<li id="header__remont-btn"   class="li-header">Ремонт</li>
			<li id="header__poshiv-btn"   class="li-header">Пошив</li>
			<!-- <li>Магазин</li> -->
			<li id="header__contacts-btn" class="li-header">Контакты</li>
		</ul>
	</nav>
	<div class="unauthorized">
		<div class="header__block__compannel">
			<a id="header__autho-btn"   class="li-header command-btn">Авторизация</a>
		</div>
	</div>
	<!-- Авторизация -->
	<div class="authorized">
		<div class="header__block__compannel">
			<!-- Пользователь -->
			<a id="header__cabinet-btn" class="li-header command-btn">Личный кабинет</a>
			<!-- Сотрудник -->
			<a id="header__zakazi-btn" class="li-header command-btn">Заказы</a>
			<!-- Общее -->
			<a id="header__exit-btn"    class="command-btn">Выход</a>
		</div>
	</div>
</div>

<!-- ВИЗУАЛИЗАЦИЯ ХЕДЕРА -->
<!-- <script>
	var header_li = $('li.li_header-active').nextAll();
	var header_main_li = $('li.li_header-active');
	$(".li-header").click(function(){
		header_main_li.removeClass('li_header-active');
		header_main_li = $(this);
		$(this).addClass('li_header-active');
	});
</script> -->




<script>
	$(document).ready(function(){
		<?php if (empty($_SESSION['User_role']))
			{
				$_SESSION['User_role']= "";
			}
        ?>

		var role = '<?php echo $_SESSION['User_role']?>';
		console.log( role ); 
		if(role == 'Пользователь'){
			$('#header__cabinet-btn').show();
			$('#header__zakazi-btn').hide();
				//Для пользователей и Админа Пошив Ремонт
			$("#header__remont-btn").click(function(){
				$("content").load("parts/remont.php")
			});
			$("#header__poshiv-btn").click(function(){
				$("content").load("parts/poshiv.php")
			});
		}
		else if(role == 'Сотрудник'){
			$('#header__cabinet-btn').hide();
			$('#header__zakazi-btn').show();
			$("#header__zakazi-btn").click(function(){
				// $("header__zakazi-btn").load("parts/employee_menu.php")
			});
				//Для сотрудников Пошив Ремонт
			$("#header__remont-btn").click(function(){
				$('content').load('parts/employee/remont/remont_new_order.php');
			});
			$("#header__poshiv-btn").click(function(){
				$('content').load('parts/employee/poshiv/poshiv_new_order.php');
			});
			
		}
		else if(role == ''){
			console.log('loh');
		}
	});
</script>



<!-- <img class="header-leaves" src="img/headerleaves.png"> -->
<script>
	$("#header__contacts-btn").click(function(){
		$("content").load("parts/contacts.php")
	});
	$("#header__main-btn").click(function(){
		$("content").load("parts/content.php")
	});


	$("#header__autho-btn").click(function(){
		$("content").load("parts/authorization/autho.php")
	});
	//Авторизация 
	$("#header__exit-btn").click(function(){
		$('.authorized').hide();
		$('.unauthorized').show();
		$("content").load("parts/authorization/autho.php");
	});
	$("#header__cabinet-btn").click(function(){
		$('content').load('parts/authorization/cabinet/cabinet.php');
	});
	$("#header__zakazi-btn").click(function(){
		$('content').load('parts/employee/employee_menu.php');
	});
</script>

<style>
.li_header-active{
	transform: scale(1.05);
	background-color: #e6d0a7 !important;
	transition: 0.6s;
}
/* .header-leaves{
	position: absolute;
	z-index: -10;
} */
.header__block-btn{
	height: 100%;
	display: flex;
	align-items: center;
	width: 590px;
}

.ul_row-btn{
	display: flex;
	height: 90px;
	justify-content: space-between;
}
.ul_row-btn li{
	text-decoration: none;
	list-style: none;
	background-color: #f2deb8;
	height: inherit;
	display: flex;
    align-items: center;
	padding-left: 20px;
    padding-right: 20px;
    user-select: none;
    cursor: pointer;
    border-radius: 20px;
    margin-left: 10px;
    margin-right: 10px;
}
.ul_row-btn li:hover{
	transition: 0.2s;
	transform: scale(1.05);
	background-color: #f0d4a1;
}
.header__block__compannel{
	display: flex;
	flex-direction: column;
    height: 90px;
    margin-right: 30px;
	align-items: center;
}
.command-btn{
	text-decoration: none;
    list-style: none;
    background-color: #f2deb8;
    height: inherit;
    display: flex;
    align-items: center;
/*    padding-left: 30px;
    padding-right: 30px;*/
    user-select: none;
    cursor: pointer;
    width: 175px;
    justify-content: center;
    border-radius: 20px;
	text-align: center;
}
.command-btn:hover {
    transition: 0.2s;
	transform: scale(1.05);
	background-color: #f0d4a1 !important;
}
#header__autho-btn{
	text-decoration: none;
    list-style: none;
    background-color: #f2deb8;
    height: inherit;
    display: flex;
    align-items: center;
/*    padding-left: 30px;
    padding-right: 30px;*/
    user-select: none;
    cursor: pointer;
    width: 175px;
    justify-content: center;
    border-radius: 20px;
}
/* Авторизация */
#header__exit-btn{
	width: 120px !important;
	background-color: rgba(111, 61, 61, 0.1) !important;
	height: 50px;
}
#header__exit-btn:hover{
	background-color: rgba(111, 61, 61, 0) !important;
	color: red;
	transition: 0.5s;
	border: solid 1px red !important;
}
.authorized{
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
	display: none;
}
.unauthorized{
	display: flex;
}
</style>
