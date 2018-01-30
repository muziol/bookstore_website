<?php
session_start();

if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">
  Ksiegareks
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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



<div id="allBooksList">
        <?php 
        //****************************************************************************************
                                        //BOOKS LISTING
        //****************************************************************************************	
        $curl = curl_init(); //LOADING CURL 
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => $_SESSION['apiIP']."/book", 
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",						  //REQUEST TYPE
          CURLOPT_HTTPHEADER => array(
            //"Authorization: Bearer ".$_COOKIE['token']
          )
        ));
    
        $response = curl_exec($curl);							  //HERE IS RESPONSE IN JSON
        $err = curl_error($curl);
        $response = json_decode($response, true);				  //DECODING JSON TO ARRAY
        echo '<div class="container">';
        echo '<h2 class="mt-4">Books</h2></br>';
        echo '<div class="row">';
        for($i = 0; $i < count($response);$i++){				  //title do zmiany na id jak bedzie w API
            echo '<div class="card ml-1 mr-1 mb-3 "  style="width: 10rem;" id='.$i.' onclick="goToBook(\''.$response[$i]['id'].'\')">';
            echo '<div class="ml-2 mb-2 mt-2" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><b data-toggle="tooltip" data-placement="top" title="'.$response[$i]['title'].'">'.$response[$i]['title'].'</b></br>'.$response[$i]['author'].'</div>';
            echo '<img src="img/sample.png" widht="130px" height="220px">';
            echo '</div>';
            
        }
        echo '</div>';
        echo '</div>';
        
        curl_close($curl);
        ?>
    
        </div>  


    

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>

    </body>








    </html>