<?php
session_start();

//////////////////////////////
// Validation of  user input
//////////////////////////////
$check = true;
$tmp = "Errors: <ul>";
if (!isset($_POST['title'])){
	$tmp .= "<li>Title is empty</li>"; 
	$check = false;
}
if ( !isset($_POST['author'])){
	$tmp .= "<li>Author is empty</li>"; 
	$check = false;
}
if ( $_POST['genre'] === "" ){
	$tmp .= "<li>Author is empty</li>"; 
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
    if(!isset($_POST['publisher'])) { $_POST['publisher'] = "Not specified"; } //Setting unspecified values to Not specified
    if(!isset($_POST['publishdata'])) { $_POST['publishData'] = "Not specified"; }
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
                   "Publisher" => $publiser, 
                   "PublishDate" => $publishData, 
                   "PageNumber" => $pageNumber,
                   "Language" => $language,
                   "Translator" => $translator,
                   "Condition" => $condition, 
                   "Genre" => $genre, 
                   "Cover" => "empty" );

    $book_json = json_encode($data);
    
    //Posting to API
    $ch = curl_init('http://localhost:5000/book/add');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $book_json);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($book_json))                                                                       
	);                                                                                                   
    $result = curl_exec($ch); echo $result; //Code of result. Just for debugging
    $error = curl_error($ch); echo $error;
    curl_close($ch);






}
    //Relocation
    header("Location: dashboard.php");








?>