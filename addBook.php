<?php
session_start();

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
    if($_POST['publishdata']  == null) { $_POST['publishData'] = "Not specified"; }
    if(!isset($_POST['pagenumber'])) { $_POST['pagenumber'] = "Not specified"; }
    if(!isset($_POST['language'])) { $_POST['language'] = "Not specified"; }
    if(!isset($_POST['translator'])) { $_POST['translator'] = "Not specified"; }
    if(!isset($_POST['condition'])) { $_POST['condition'] = "Not specified"; }
    if(!isset($_POST['owner'])) { $_POST['owner'] = "Not specified"; }

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
	
	$ch = curl_init('http://10.100.6.126:5000/add');                                                                      
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


    header("Location: dashboard.php");



}
    //Relocation
   

    if ($check === false) {
        $_SESSION['auth'] = 'dashboard.php';
        header("Location: auth.php");
    }





?>