<?php
session_start();  
session_destroy();
?>

<div class="part__page__autho">
	<div class="page__autho-block">
		<div class="page__autho__info-row">
			<label id="autho_vhod" class="info_row pointed">Вход</label>
			<label id="autho_reg"  class="info_row">Регистрация</label>
		</div>
		<form id="form_autho" method="post">
			<div class="page__autho-load">
				<!-- Место для вставки -->
			</div>
			<div class="autho__underform">
				<input type="submit" id="vhod-button" value="Отправить" class="autho-button">
			</div>
		</form>
	</div>
	<div class="here">
	</div>
</div>



<style>
.autho-button{
	margin-top: 20px;
	border: double;
	z-index: 999999;
	cursor: pointer;
	
	text-decoration: none;
	list-style: none;
	background-color: #f2deb8;
	height: inherit;
	display: flex;
	align-items: center;
	padding-left: 20px;
	padding-right: 20px;
	user-select: none;
	border-radius: 20px;
	padding: 15px;
}
.part__page__autho{
	display: flex;
	margin: 0, auto;
	justify-content: center;
	align-items: center;
	height: 100%;
	min-height: 700px;
}
.page__autho-block{
	max-width: 300px;
	widows: 100%;
	background-color: bisque;
	border-radius: 20px;
	padding: 30px;
	font-size: 20px;
}
.authorizayion-from {
    width: 300px;
    height: 300px;
    display: flex;
    justify-content: center;
}
.autho__underform{
	display: flex;
	justify-content: center;
}
.pointed{
	color: black !important;
	font-size: 28px !important;
}
.info_row{
	font-family: "Gilroy-Bold";
    font-size: 24px;
    line-height: 24px;
    margin-right: 25px;
    margin-left: 25px;
    cursor: pointer;
    user-select: none;
    color: #BACAD5;

	background-color: #f2c4a9;
	border-radius: 30px;
	padding: 15px;
}
.page__autho__info-row{
	display: flex;
	display: flex;
	justify-content: center;
}

.info_row:hover{
	color: #BACAD5;
}

</style>

<script>
$(document).ready(function(){
	$('.page__autho-load').load('parts/authorization/vhod.php');
});

var button = $(".autho-button");
var vhod = $("#autho_vhod");
var reg = $("#autho_reg");
vhod.on('click', function(){
		if(reg.hasClass("pointed")){
			vhod.toggleClass("pointed");
        	reg.toggleClass("pointed");
        	$('.page__autho-load').load('parts/authorization/vhod.php');
        	button.attr('id','vhod-button');
		}
        
    });
reg.on('click', function(){
		if(vhod.hasClass("pointed")){
			vhod.toggleClass("pointed");
			reg.toggleClass("pointed");
			$('.page__autho-load').load('parts/authorization/register.php');
			button.attr('id','reg-button');
		};
});

$('#form_autho').submit(function () {
    var setdata= $("#form_autho").serialize(); // Сеарилизуем объект
    $.post( "parts/authorization/autho_server.php", setdata,function( data ) 
    { 
    $('.here').html( data );
    });
    event.preventDefault();
}); 

</script>

<!-- СТИЛИ ФОРМЫ -->
<style >
.authorizayion-from li{
	text-decoration: none;
	list-style: none;
	widows: 100px;
	padding: 5px;
	text-align: center;
}
.authorizayion-from ul{
	width: 200px;
}
.authorizayion-from{
	width: 300px;
	margin-top: 10px;
	padding-bottom: 10px;
}
.authorizayion-from_password-input{
	font-family: 'Roboto', sans-serif;
	font-weight: 400;
	position: relative;
	width: 150px;
	height: 43px;
	background: #FFFFFF;
	border: 2px solid transparent;
	transition: all 0.2s;
	border-radius: 4px;
	outline: none;
	padding: 0 16px;
	font-size: 16px;
	color: #221607;
}
.authorizayion-from ul{
	display: flex;
	flex-direction: column;
	align-items: center;
}
</style>