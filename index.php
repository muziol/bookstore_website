<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="./css/main.css">
  </head>
  <body>
  <div id="particles-js"></div>
  <?php 
  session_start(); 
  if ( isset($_SESSION['error'])) unset($_SESSION['error']); 
  ?>
  <div class="main">
    <span class="msg_welcome">Welcome on TradeRex</span>   
    <picture>
        <!--source srcset='large.webp' media='(min-width: 992px)' type='image/webp'>
        <source srcset='large.jpg' media='(min-width: 992px)' type='image/jpeg'-->
        <img src="./img/logo_large.png" alt="Logo">
    </picture>
    <label for="login">
      <span class="msg_login">Log in to show all offers</span> 
      <input type="button" value="Log in" class="login">
    </label>
  </div>
  
  <?php $_SESSION['auth'] = 'log_in.php';?>



	 <div id="allBooksList">
    
		<?php 
		//****************************************************************************************
										//BOOKS LISTING
		//****************************************************************************************	
		$curl = curl_init(); //LOADING CURL 

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://192.168.43.124:5000/book", //HERE API LINK
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",						  //REQUEST TYPE
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		  ),
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
			echo '<p> Price:'.$response[$i]['price'].' zl</p>';			
			echo '</div>';
		}
		echo '</div>';

<<<<<<< HEAD
		curl_close($curl);
		?>
	</div>
  
    <!-- jQuery -->
=======
		curl_close($curl);*/
		?>
	</div>
        
      
    <nav>
      Books
      

    </nav>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
>>>>>>> e845f33d904387c7cccf912416cb90b2e7669508
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/particles.js"></script>
    <script type="text/javascript" src="js/main.js" ></script>
  </body>
</html>