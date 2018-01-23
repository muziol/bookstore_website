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
        <li class="nav-item active">
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

<form action="addBook.php" method="post">
            <fieldset>
            <legend>U can add new offer here</legend>
            
            <div class="form-row">
            <div class="col-md-3 mb-4">
                <label for="titleInput">Title *</label>
                <input required="true" type="text" class="form-control" name="title" id="titleInput" placeholder="Enter title of book">
            </div>


            <div class="col-md-3 mb-4">
                <label for="authorInput">Author *</label>
                <input required="true" type="text"class="form-control" name="author" id="authorInput" placeholder="The person who wrote this book">
            </div>
            </div>
           
            <div class="form-row">
            <div class="col-md-3 mb-4">
                <label for="publishInput">Publisher</label>
                <input type="text" class="form-control" name="publisher" id="publishInput" placeholder="Organization whos publish book">
            </div>

            <div class="col-md-3 mb-4">
                <label for="dataInput">Publish date</label>
                <input type="text" class="form-control" name="publishdata" id="dataInput" placeholder="When the book was published">
            </div>
            </div>
            <div class="form-row">
            <div class="col-md-3 mb-4">
                <label for="numberInput">Number of pages</label>
                <input type="number" class="form-control" name="pagenumber" id="numberInput" placeholder="How many pages we need to read">
            </div>

            <div class="col-md-3 mb-4">
                <label for="languageInput">Language</label>
                <input type="text" class="form-control" name="language" id="languageInput" placeholder="Orginal laguage of book">
            </div>
            </div>
            <div class="form-row">
            <div class="col-md-3 mb-4">
                <label for="translatorInput">Translator</label>
                <input type="text" class="form-control" name="translator" id="translatorInput" placeholder="Person who translated">
            </div>

            <div class="col-md-3 mb-4">
                <label for="conditionInput">Condition</label>
                <input type="text" class="form-control" name="condition" id="conditionInput" placeholder="Tell how much this book is able to read">
            </div>
            </div>
        
            <div class="form-row">
            <div class="col-md-3 mb-4">
                <label for="genreInput">Genre*</label>
                <input required="true" type="text" class="form-control" name="genre" id="genreInput" placeholder="Type of your book">
            </div>
            </div>

            

                <button class="btn btn-primary" type="submit">Publish</button>
        
                <label for="errors">
                    <?php if( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);}?>
                </label>
            </div>
            </fieldset>
    
    </div>










</body>
</html>