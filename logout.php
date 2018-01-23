<?php
if(isset($_SESSION['isLogged'])){
    unset($_SESSION['isLogged']);
}
header("Location: index.php");
?>