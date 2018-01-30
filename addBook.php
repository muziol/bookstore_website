<?php
session_start();

if(!isset($_COOKIE['token'])) {header('Location: log_in.php');}




//////////////////////////////
// Validation of  user input
//////////////////////////////
$check = true;
$tmp = "Errors: <ul>";
if ( $_POST['title'] === ""){
	$tmp .= "<li>Title is empty</li>"; 
	$check = false;
}
if (  $_POST['author'] === ""){
	$tmp .= "<li>Author is empty</li>"; 
	$check = false;
}
if ( $_POST['genre'] === "" ){
	$tmp .= "<li>Genre is empty</li>"; 
	$check = false;
}
$tmp .= "</ul>";
$_SESSION['error'] = $tmp;




/////////////////
//  Posting
/////////////////
if($check == true){
    unset($_SESSION['error']);

    //Must have values
    $title =  $_POST['title'];
    $author =  $_POST['author'];
    $genre =  $_POST['genre'];

    //Values which might be not specified
    if($_POST['publisher'] == null) { $_POST['publisher'] = "Not specified"; } //Setting unspecified values to Not specified
    if($_POST['publishdata'] == null) { $_POST['publishData'] = "Not specified"; }
    if($_POST['pagenumber'] == null) { $_POST['pagenumber'] = "0"; }
    if($_POST['language'] == null) { $_POST['language'] = "Not specified"; }
    if($_POST['translator'] == null) { $_POST['translator'] = "Not specified"; }
    if($_POST['condition'] == null) { $_POST['condition'] = "Not specified"; }
    if($_POST['owner'] == null) { $_POST['owner'] = "Not specified"; }

    //Assigment
    $publisher =  $_POST['publisher'];
    $publishData =  $_POST['publishdata'];
    $pageNumber =  $_POST['pagenumber'];
    $language =  $_POST['language'];
    $translator =  $_POST['translator'];
    $condition =  $_POST['condition'];
    $owner =  $_POST['owner'];


    //Preparing book to send
    
    $book = array( "Title" =>  $title,
                   "Author" =>  $author,
                   "Publisher" => $publisher, 
                   "PublishDate" => $publishData, 
                   "PageNumber" => $pageNumber,
                   "Language" => $language,
                   "Translator" => $translator,
                   "Condition" => $condition, 
                   "Genre" => $genre,
                   "Owner" => " " ); 

    $book_json = json_encode($book);
    echo $book_json;

    //Posting to API
    $data = array( "Title" =>  $title, "Author" =>  $author, "Publisher" => $publisher, "PublishDate" => $publishData,"PageNumber" => $pageNumber,"Language" => $language, "Translator" => $translator, "Condition" => $condition,"Genre" => $genre);                                                                  
	$data_string = json_encode($data);                                                                           
	
	$ch = curl_init($_SESSION['apiIP'].'/add');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string),
            "Authorization: Bearer ".$_COOKIE['token'])                                                                
	);                                                                                                                   
	
	
    $result = curl_exec($ch);
    $response_code = curl_getinfo($ch)['http_code'];
    
    if($response_code == 201){
        $_SESSION['success'] = "Success! Your book is now visible for others.";
    } else {
        $_SESSION['error'] = "Ups, something went wrong. Try again later.";
    }

    header("Location: addOffer.php");



}
   




?>