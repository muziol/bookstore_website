<?php
session_start();


//Validation
$check = true;
$tmp = "Errors: <ul>";
if ( $_POST['name'] === "" ){
	$tmp .= "<li>First name is empty</li>"; 
	$check = false;
}
if ( $_POST['surrname'] === "" ){
	$tmp .= "<li>Last name is empty</li>"; 
	$check = false;
}  
$domain = substr($_POST['email'], strpos($_POST['email'], '@') + 1);
if  (checkdnsrr($domain) === FALSE) {
	$tmp .= '<li>Domain of e-mail is invalid! </li>';
	$check = false;
}
if ( $_POST['email'] === ""   ){
	$tmp .= '<li>E-mail is empty or invalid'; 
	$check = false;
}
if ( $_POST['password'] === "" || $_POST['repeat_password'] === ""){
	$tmp .= '<li>Password is empty</li>'; 
	$check = false;
}
if ($_POST['password'] != $_POST['repeat_password'] ){
	$tmp .= '<li>Passwords are not the same</li>';
	$check = false;
} 
if ( $_POST['phone'] === ""   ){
	$tmp .= '<li>Phone number is empty'; 
	$check = false;
}
if ( $_POST['city'] === ""   ){
	$tmp .= '<li>City is empty'; 
	$check = false;
}
$tmp .= "</ul>";
$_SESSION['error'] = $tmp;

if	($check === true) {
	//detele errors
	unset($_SESSION['error']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rpassword = $_POST['repeat_password'];
	$name = $_POST['name'];
	$surname = $_POST['surrname'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	//CURL
	$curl = curl_init(); //LOADING CURL ([a-Z]) x.group(1)
	$data = array( "Email" =>  $email, "Password" =>  $password, "UserName" => $name, "UserSurname" => $surname, "UserPhone" => $phone, "UserCity" => $city, "Role" => "user");                                                                    
	$data_string = json_encode($data);                                                                                   
	
	$ch = curl_init('http://192.168.43.124:5000/register');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   
	
	
	$result = curl_exec($ch);
}
if ($check === false) {
	$_SESSION['auth'] = 'sign_in.php';
	header("Location: auth.php");
}

?>