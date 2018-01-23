<?php
session_start();

if(!isset($_SESSION['isLogged'])){
    header("Location: login.php");
}

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">

        <form action="addBook.php" method="post" class="">
            <label for="">
                <input type="text" name="title" class="" placeholder="Title">*
            </label>
                
            <label for="">
                <input type="text" name="author" class="" placeholder="Author">*
            </label>
    
            <label for="">
                <input type="text" name="publisher" class="" placeholder="Publisher">
            </label>
    
            <label for="">
                <input type="text" name="publishdata" class="" placeholder="Publish Data">
            </label>
    
            <label for="">
                <input type="text" name="pagenumber" class="" placeholder="Page Number">
            </label>
    
            <label for="">
                <input type="text" name="language" class="" placeholder="Language">
            </label>
    
            <label for="">
                <input type="text" name="translator" class="" placeholder="Translator">
            </label>
    
            <label for="">
                <input type="text" name="condition" class="" placeholder="Condition">
            </label>
    
            <label for="">
                <input type="text" name="genre" class="" placeholder="Genre">*
            </label>
    
            <label for="">
                <input type="text" name="owner" class="" placeholder="owner">
            </label>
    
            <label for="submit">
                <input type="submit" value="Publish">
            </label>
    
            <label for="errors">
                <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);}?>
            </label>
    
    
    
    
    
        <div id="allBooksList">
        <?php 
        //****************************************************************************************
                                        //BOOKS LISTING
        //****************************************************************************************	
        $curl = curl_init(); //LOADING CURL 
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://10.100.6.126:5000/book", 
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
    
        for($i = 0; $i < count($response);$i++){				  //SHOWING BOOKS
            echo '<div class="item">';
            echo '<div class="cover"></div>';
            echo '<h3>'.$response[$i]['title'].'</h3>';
            echo '<p>'.$response[$i]['author'].'</p>';
            //echo '<p> Price:'.$response[$i]['price'].' zl</p>';			
            echo '</div>';
        }
        echo '</div>';
    
        curl_close($curl);
        ?>
    
        </div>  
        </form>
        
    </div>
    <button onclick="window.location.href='index.php'">Log out</button>
</body>
