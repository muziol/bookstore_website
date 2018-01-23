<?php
session_start();

if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/dashboard.css">-->
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
      <li class="nav-item active">
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
        
        echo '<h2>Books</h2></br>';
        echo '<div class="container">';
    
        for($i = 0; $i < count($response);$i++){				  //title do zmiany na id jak bedzie w API
            echo '<div class="item" id='.$i.' onclick="goToBook(\''.$response[$i]['title'].'\')">';
            echo '<div class="cover"></div>';
            echo '<h3>'.$response[$i]['title'].'</h3>';
            echo '<p>'.$response[$i]['author'].'</p>';
            //echo '<p>'.$response[$i]['genre'].'</p>';	
            //echo '<p>'.$response[$i]['email'].'</p>';	
            echo '</div>';
        }
        echo '</div>';
    
        curl_close($curl);
        ?>
    
        </div>  
        </form>
        <form action="logout.php">
            <button>Log out</button>
        </form>
    </div>
    <script type="text/javascript" src="js/dashboard.js" ></script>
</body>
</html>
