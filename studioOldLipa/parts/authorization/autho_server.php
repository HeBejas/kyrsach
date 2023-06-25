<?php session_start() ?>
<?php
include('../server/connect.php');
$link = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if($link === false){ die("Ошибка подключения. " . mysqli_connect_error());}

if (isset($_POST["reg1"])) { 
	$x1=$_POST["reg1"];
	$x2=$_POST["reg2"];
	$x3=$_POST["reg3"];
	$x4=$_POST["reg4"];
	$x5=$_POST["reg5"];
	$x6=$_POST["reg6"];

	$sql = "SELECT * FROM user WHERE user_login ='{$x1}'";
	if($result = mysqli_query($link, $sql))
	{
		if(mysqli_num_rows($result) > 0){
    		echo '<span class="text_red marg240">Такой Логин Уже Занят</span>';
    	}
		else{echo "Вы успешно зарегестрировались!";
			$sql_vstav= "INSERT INTO user (user_login, user_role, user_password, user_name, user_secondname, user_patronymic, user_phone) VALUES('$x1','Пользователь','$x2','$x3','$x4','$x5','$x6')";
			mysqli_query($link, $sql_vstav);
		} 
	}
}
else if (isset($_POST["vxod1"])){
	$x1=$_POST["vxod1"];
	$x2=$_POST["vxod2"];

	$sql_vstav = "SELECT * FROM user WHERE user_login='{$x1}' AND user_password = '{$x2}' ";
	mysqli_query($link, $sql_vstav);
	
	if($result = $link ->query($sql_vstav)){
		if(mysqli_num_rows($result) == false){
    		echo 'Такого аккаунта нет, проверьте <span class="sns">Логин</span> или <span class="sns">Пароль</span>';
    	}
		else{
				echo "Вы вошли в свой аккаунт!<br>"; 
			foreach($result as $row){
					$_SESSION['User_login'] = $row["user_login"];
					$_SESSION['User_role']  = $row["user_role"];
					$_SESSION['User_fio']	= $row["user_name"]; 	    $_SESSION['User_fio']	.= ' ';
					$_SESSION['User_fio']	.= $row["user_secondname"]; $_SESSION['User_fio']	.= ' ';
					$_SESSION['User_fio']	.= $row["user_patronymic"];
					$_SESSION['User_phone']	= $row["user_phone"];
				}
// РОЛИ ----------------------------------------------------------------------------- 
			echo"
				<script>
					$('.authorized').show();
					$('.unauthorized').hide();
				</script>
			";
			if($_SESSION['User_role']=='Пользователь'){
				echo"
				<script>
					$('content').load('parts/authorization/cabinet/cabinet.php');
					$('#header__zakazi-btn').hide();
				</script>
				";
			}else if($_SESSION['User_role']=='Сотрудник'){
				echo"
				<script>
					$('#header__cabinet-btn').hide();
					$('#header__zakazi-btn').show();
				</script>
				";
			}else if($_SESSION['User_role']=='Администратор'){

			}
		}
	}
	
	
	
	else{
		echo "...";
	}

}
mysqli_close($link);
?>
