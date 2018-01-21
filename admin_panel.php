<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
  </head>
  <body>
  
  
  
  
  
  
  
  </body>
  
<?php 
		//****************************************************************************************
										//User listing
		//****************************************************************************************	
		$curl = curl_init(); //LOADING CURL 

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://10.100.6.104:5000/user", //HERE API LINK
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
		
		echo '<h2>USERS</h2></br>';
		for($i = 0; $i < count($response);$i++){
			echo '<h3>'.$response[$i]['email'].'</h3>';
			echo '<p> Username:'.$response[$i]['username'].'</p>';
			echo '<p> Rola:'.$response[$i]['role'].'</p>';
			
		}
		curl_close($curl);
		
		
		
		
		//****************************************************************************************
										//User delete
		//****************************************************************************************	
?>
		
		<form action="admin_panel.php" method="post">
		Mail: <input type="text" name="email">
		<input type="submit" value="DELETE">
		</form>
		
		
		
<?php
		if(isset($_POST['email'])){
			
			$curl = curl_init(); //LOADING CURL ([a-Z]) x.group(1)

			$data = array( "Email" =>  $_POST['email']);                                                                    
			$data_string = json_encode($data);                                                                                   

			$ch = curl_init('http://10.100.6.104:5000/user');                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);                                                                                                                   

			$result = curl_exec($ch);
			header("Refresh:0");
		}
		
?>
		
		
		
		
		
		
		
	

</html>
