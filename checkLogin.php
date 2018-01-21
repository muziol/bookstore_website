<?php
session_start();

//validation
$check = true;
$tmp = "Errors: <ul>";
if ( $_POST['email'] === "" ){
	$tmp .= "<li>E-mail is empty</li>"; 
	$check = false;
}
if ( $_POST['password'] === "" ){
	$tmp .= "<li>Password is empty</li>"; 
	$check = false;
}  
$tmp .= "</ul>";
$_SESSION['error'] = $tmp;
//CURL
if ($check === true){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$curl = curl_init(); //LOADING CURL ([a-Z]) x.group(1)
	$data = array( "Email" =>  $email, "Password" =>  $password);                                                                    
			$data_string = json_encode($data);  
			echo 'console.log('.$data_string.')';                                                                                 
		
	$ch = curl_init('http://192.168.43.124:5000/login');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
				); 
	
				$result = curl_exec($ch);
}

$result = json_decode($result, true);
//echo($result['token']);
setcookie("token", $result['token'], $result['expiry']);
header("Location: dashboard.php");

if ($check === false) {
	$_SESSION['auth'] = 'log_in.php';
	header("Location: auth.php");
}
                                                                                                                 
?>