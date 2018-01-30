<?php session_start();?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/login.css">
    
    
</head>
<div class="container">
  
    <form action="checkLogin.php" method="post" class="log_in">
    
    
    <div class="container ">
    <div class="form-group row justify-content-md-center">
        <h2>Ksiegareks</h2>
    </div>
        <div class="form-group row justify-content-md-center">
            <div class="col-md-4">
                <label for="emailInput" >Email</label>
                <input required="true" type="email" class="form-control" name="email" id="emailInput" placeholder="Your email">
            </div>
        </div>
        

        <div class="form-group row justify-content-md-center">
            <div class="col-md-4 mb-3">
                <label for="passwordInput" >Password</label>
                <input required="true" type="password" class="form-control" name="password" id="passwordInput" placeholder="Your secret password">
            </div>
            
        </div>
        
        <div class="form-group row justify-content-md-center">
            <button type="submit" class="col-md-4 btn btn-primary">Log in</button>
            
        </div>

        <div class="row justify-content-md-center">
            <small> Don't have an account yet? Don't hesitate, <a href="sign_in.php" >register now!</a></small>
        </div>
        
        </div>
        
        
        <div class="row justify-content-md-center ">
                <div class=" mt-3">
                    <?php if ( isset($_SESSION['error']) ){echo '<p class="text-danger">'.$_SESSION['error'].'</p>'; unset($_SESSION['error']);}?>
                </div>
        </div>
    
        </div>

    </form>

  
</div>


