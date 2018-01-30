<?php
session_start();

if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}

if($_GET['bookid']!=null){
    $bookId = $_GET['bookid'];
    $url =  $_SESSION['apiIP'].'/book'.'/id/'.$bookId;
    #"10.100.6.90:5000/book/delete/"
    $ch = curl_init($url);                                                              
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                                                                                   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);                                                                  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',
            "Authorization: Bearer ".$_COOKIE['token'])
           
    );

    $result = curl_exec($ch);   
    $response_code = curl_getinfo($ch)['http_code'];
    $_SESSION['success'] =  $response_code;
    if($response_code == 200){
        $_SESSION['success'] = "Book deleted";

    } else {
        $_SESSION['error'] = "Server error";

    }
    header("Location: myProfile.php");


}



?>