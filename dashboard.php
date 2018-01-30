<?php
session_start();

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

<main>
  <img src="./img/logo_large.png" alt="Logo">
</main>


    <script type="text/javascript" src="js/dashboard.js" ></script>
</body>
</html>
