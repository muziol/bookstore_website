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
if($_GET['userid']!=null){

    $userId = $_GET['userid'];
    $url =  $_SESSION['apiIP'].'/user/'.$userId;

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
        $response = json_decode($result, true);
        echo '<div>';
        echo '<b>Email: </b><p>'.$response['email'].'</p>';
        echo '<b>User name: </b><p>'.$response['username'].'</p>';
        echo '<b>User phone: </b><p>'.$response['userPhone'].'</p>';    
        echo '<b>City: </b><p>'.$response['city'].'</p>';    
        echo '<div>';

        
    $url =  $_SESSION['apiIP'].'/userbooks/'.$response['email'];

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
      echo "<p><b>Books:</b></p>";
      for($i = 0; $i < count($response);$i++){
        echo '<div onclick=goToBook(\''.$response[$i]['id'].'\')>';
        echo $response[$i]['title'];
        echo "</div>";
      }
    } else {
      echo "Blad serwera";
    }

    } else {
        echo "There is no user with this id.";
    }







}
?>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

</body>
