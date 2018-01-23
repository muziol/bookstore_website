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
	$data = array( "Email" =>  $email, "Password" =>  $password);                                                                    
	$data_string = json_encode($data);                                                                             
		
	$ch = curl_init('http://10.100.6.126:5000/login');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
				); 
	
				$result = curl_exec($ch);
}
$respone_code = curl_getinfo($ch)['http_code'];

if($respone_code == 200){

	$result = json_decode($result, true);
	setcookie("token", $result['token'], strtotime('2019-08-16'));
	header("Location: dashboard.php");
	$_SESSION['isLogged'] = true;

} else {

	$_SESSION['error'] += "<li>Invalid credentials</li>";
	header("Location: login.php");
	$_SESSION['isLogged'] = false;
	
}


if ($check === false) {
	$_SESSION['auth'] = 'log_in.php';
	header("Location: auth.php");

}
                                                                                                                 
?>