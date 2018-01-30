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
    <link rel="stylesheet" href="css/bookPage.css">
    <script src="js/dashboard.js"></script>
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

    $bookId = $_GET['bookid'];
    $url =  $_SESSION['apiIP'].'/book'.'/id/'.$bookId;

    $ch = curl_init($url);                                                              
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);                                                                  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'   )
           
    );

    $result = curl_exec($ch);
    $response_code = curl_getinfo($ch)['http_code'];
    if($response_code == 200){
        
        /************************************/
        $response = json_decode($result, true);
    ?>
    <main>
        <div class="container">
            <img src="img/sampleBig.png">
            <div class="description">
                <b>Title: </b><?php echo $response['title'] ?></p>
                <b>Author: </b><p> <?php echo $response['author'] ?> </p>
                <!-- <b>Publisher: </b><p> <?php echo $response['publisher'] ?> -->
                <!-- <b>Publish Date: </b><p> <?php echo $response['publishdate'] ?>
                <b>Page Number: </b><p> <?php echo $response['pagenumber'] ?> -->
                <b>Language: </b><p> <?php echo $response['language'] ?></p>
                <b>Translator: </b><p> <?php echo $response['translator'] ?></p>
                <b>Condition: </b><p> <?php echo $response['condition'] ?></p>
                <b>Genre: </b><p> <?php echo $response['genre'] ?></p>
            
        <?php
        //DALEJ LOGIN UZYTKOWNIKA I TELEFON
        $url =  $_SESSION['apiIP'].'/user/'.$response['owner'];
        $curlUser = curl_init($url);
        curl_setopt($curlUser, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                   
        curl_setopt($curlUser, CURLOPT_RETURNTRANSFER, true);    
        curl_setopt($curlUser, CURLOPT_TIMEOUT, 10);                                                                  
        curl_setopt($curlUser, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json'   )
               
        );
    
        $result = curl_exec($curlUser);
        $response_code = curl_getinfo($curlUser)['http_code'];
        $response = json_decode($result, true);
        if($response_code == 200){
            ?>
            <div  onclick="goToUser('<?php echo $response['id'] ?>')">
            <b>User: </b><p> <?php echo $response['email'] ?> </p>
            </div>
            <b>Phone: </b><p> <?php echo $response['userPhone'] ?> </p>
            </div><?php
        } else {
             echo "There is no user assigned to this book."; 
            ?>
                </div>
            </div>
        </div>
    </main>
        <?php
        }

    } else {
        echo "Cant find this book in db";
    }


}











?>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
<script type="text/javascript" src="js/dashboard.js" ></script>
</body>