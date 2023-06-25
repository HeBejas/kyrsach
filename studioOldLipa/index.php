<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="javascript/jquery/jquery.js"></script>
    <title>Старая Липа</title>
</head>
<body>
    
<header>
    <?php include('parts/header.php');   ?>
</header>
<content>
    
    <?php include('parts/content.php'); ?>
    
</content>
<footer>
    <?php include('parts/footer.php'); ?>
</footer>
</body>
<script src="javascript/jquery/jquery-min.js"></script>
<script src="javascript/slick.min.js" require></script>

    <?php if (empty($_SESSION['User_login']))
    {
        $_SESSION['User_login']= "";
    }else{
        echo"
        <script>
            $('.authorized').show();
            $('.unauthorized').hide();
        </script>
    ";
    }
?>
</html>

   