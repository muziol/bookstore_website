<?php
    setcookie('token', '', time() - 36000);
    session_destroy();
    header("Location: index.php");
?>