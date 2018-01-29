<?php
session_start();

//If logged
if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Ksiegareks</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="allOffers.php">All offers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addOffer.php">Add offer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="myProfile.php">My profile</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="logout.php">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
    </form>
      
  </div>
  </nav>







<?php

if($_GET['bookid']!=null){

    $bookTitle = $_GET['bookid'];
    $url =  $_SESSION['apiIP'].'/book'.'/'.str_replace(" ", "%20", $bookTitle);

    $ch = curl_init($url);                                                              
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);                                                                  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'   )
           
    );

    $result = curl_exec($ch);
    $response_code = curl_getinfo($ch)['http_code'];
    echo $response_code;    
    if($response_code == 200){
        
        /************************************/
        //TRZEBA JESZCZE OSCYlOWAć GRAFICZNIE!
        /************************************/
        $response = json_decode($result, true);
        echo '<b>Title: </b><p>'.$response['title']."</p>";
        echo '<b>Author: </b><p>'.$response['author']."</p>";
       // echo '<b>Publisher: </b><p>'.$response['publisher'];
       // echo '<b>Publish Date: </b><p>'.$response['publishdate'];
       // echo '<b>Page Number: </b><p>'.$response['pagenumber'];
        echo '<b>Language: </b><p>'.$response['language']."</p>";
        echo '<b>Translator: </b><p>'.$response['translator']."</p>";
        echo '<b>Condition: </b><p>'.$response['condition']."</p>";
        echo '<b>Genre: </b><p>'.$response['genre']."</p>";

        //DALEJ LOGIN UZYTKOWNIKA I TELEFON

    } else {
        echo "Cant find this book in db";
    }


}











?>