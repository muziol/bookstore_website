<?php
session_start();

if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}


$url =  $_SESSION['apiIP'].'/user/delete';
   
$ch = curl_init($url);        
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");    
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    "Authorization: Bearer ".$_COOKIE['token'])
);
$result = curl_exec($ch);
header("Location: logout.php");


?>