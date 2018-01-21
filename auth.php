<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>

    <?php 
    session_start(); 

    if ( isset($_SESSION['logged']) || !isset($_SESSION['auth'])) header("Location: index.php");

    if ( isset($_GET['header']) ){
        if ( $_GET['header'] != 'log_in.php' &&  $_GET['header'] != 'sign_in.php'){
            header("Location: hacker.php");
        }
        else $_SESSION['auth'] = $_GET['header'];
    }

    include $_SESSION['auth'];
    ?>


</body>
