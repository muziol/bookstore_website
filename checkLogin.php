<?php
session_start();
$_SESSION['apiIP'] = "http://localhost:5000";
//validation
$check = true;

//CURL
if ($check === true){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$data = array( "Email" =>  $email, "Password" =>  $password);                                                                    
	$data_string = json_encode($data);                                                                             
		
	$ch = curl_init($_SESSION['apiIP'].'/login');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
				); 
	
				$result = curl_exec($ch);
}
$response_code = curl_getinfo($ch)['http_code'];

if($response_code == 200){
	$result = json_decode($result, true);
	setcookie("token", $result['token'], strtotime('2019-08-16'));
	unset($_SESSION['error']);
	header("Location: dashboard.php");
 

} else {

	$_SESSION['error'] = "Invalid credentials";
	header("Location: log_in.php");
	
}

                                                                                                                 
?>