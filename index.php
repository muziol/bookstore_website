<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <script type="text/javascript" src="" ></script>
  </head>
  <body>
    <nav>
      <figure>
        <!-- <img src="./img/logo_large.png" alt="Logo"> -->
      </figure>
      <a href="" class="nav_search">Wyszukiwanie</a>
      <a href="login.php" class="nav_login">Logowanie</a> 
    </nav>

    <div id="carouselNewBooks" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselNewBooks" data-slide-to="0" class="active"></li>
        <li data-target="#carouselNewBooks" data-slide-to="1"></li>
        <li data-target="#carouselNewBooks" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
           <h1>Witamy w KsiengaReks</h1>
        </div>
        <div class="carousel-item">
          <p>W pustyni i w paszczy 2299. </p>
		  <p>Zemsta Salazara</p>
        </div>
        <div class="carousel-item">
          <p>Nowość. Pan Tadeusz 3D</p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselNewBooks" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselNewBooks" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
	
	
	<div id="allBooksList">
		<?php /*
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

		curl_close($curl);*/
		?>
	</div>
        
      
    <nav>
      Books
      

    </nav>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>