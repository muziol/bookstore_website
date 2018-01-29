<?php
setcookie('token', '', time() - 3600);
session_destroy();
header("Location: index.php");
?>