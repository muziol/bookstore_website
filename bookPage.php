<?php
session_start();

//If logged
if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}




if($_GET['bookid']!=null){

    $bookTitle = $_GET['bookid'];
    $ch = curl_init($_SESSION['apiIP'].'/book/'.$bookid);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                      
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
     
    $response_code = curl_getinfo($ch)['http_code'];
    $result = curl_exec($ch);
    if($response_code == 0){
        $response = json_decode($result, true);
        echo $response['title'];
        echo $response['author'];
       // echo $response['publisher'];
       // echo $response['publishdate'];
       // echo $response['pagenumber'];
        echo $response['language'];
        echo $response['translator'];
        echo $response['condition'];
        echo $response['genre'];

    } else {
        echo "Cant find this book in db";
    }


}











?>