<?php
session_start();

if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
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
      <li class="nav-item">
        <a class="nav-link" href="allOffers.php">All offers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addOffer.php">Add offer</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="myProfile.php">My profile</a>
      </li>
     
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="logout.php">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
    </form>
      
  </div>
</nav>

<div class="container">
<div class="row justify-content-md-center">
<?php 
//Wyswietl dane o uzytkowniku
echo '<div class="mt-3">';
echo '<h2>'.$_SESSION['emailLogged'].'</h2>';

  
    $url =  $_SESSION['apiIP'].'/userbooks/'.$_SESSION['emailLogged'];

    $ch = curl_init($url);                                                              
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);                                                                  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'   )
           
    );



    $result = curl_exec($ch);
    $response_code = curl_getinfo($ch)['http_code'];
    $response = json_decode($result, true);

    if($response_code == 200){
      echo "<h4>Your books:</h4>";
      for($i = 0; $i < count($response);$i++){
       
        echo "<div >";
        echo $response[$i]['title'].' <button onclick="deleteBook(\''.$response[$i]['id'].'\')" type="button" class="btn btn-danger btn-sm">Delete</button>';
        echo "</div>";
      }
    } else {
      echo "Blad serwera";
    }

    





echo '</div>';

?>

<div class="row justify-content-md-center">
                <div class=" mt-3">
                    <?php if ( isset($_SESSION['error']) ){echo '<p class="text-danger">'.$_SESSION['error'].'</p>'; unset($_SESSION['error']);}?>
                    <?php if ( isset($_SESSION['success']) ){echo '<p class="text-success">'.$_SESSION['success'].'</p>'; unset($_SESSION['success']);}?>
                </div>
  </div>
</div>
</div>


</body>


</html>

