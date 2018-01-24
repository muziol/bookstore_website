<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/login.css">
    
</head>
<div class="container">
<form action="sign_up.php" method="post" class="sign_up">

    <div class="form-group row justify-content-md-center">
        <h2>Ksiegareks</h2>
    </div>

    <div class="form-group row justify-content-md-center">
            <div class="col-md-3">
                <label for="firstInput" >First name</label>
                <input required="true" type="text" class="form-control" name="name" id="firstInput">
            </div>
            <div class="col-md-3">
                <label for="lastInput" >Last name</label>
                <input required="true" type="text" class="form-control" name="surrname" id="lastInput">
            </div>
    </div>

    <div class="form-group row justify-content-md-center">
            <div class="col-md-6">
                <label for="emailInput" >Email</label>
                <input required="true" type="email" class="form-control" name="email" id="emailInput">
            </div>
    </div>

    <div class="form-group row justify-content-md-center">
            <div class="col-md-3">
                <label for="pass1Input" >Password</label>
                <input required="true" type="password" class="form-control" name="password" id="pass1Input">
            </div>
            <div class="col-md-3">
                <label for="pass2Input" >Reapeat password</label>
                <input required="true" type="password" class="form-control" name="repeat_password" id="pass2Input">
            </div>
    </div>


    <div class="form-group row justify-content-md-center">
            <div class="col-md-3">
                <label for="phoneInput" >Phone</label>
                <input required="true" type="text" class="form-control" name="phone" id="phoneInput">
            </div>
            <div class="col-md-3">
                <label for="cityInput" >City</label>
                <input required="true" type="text" class="form-control" name="city" id="cityInput">
            </div>
    </div>

        <div class="form-group row justify-content-md-center">
            <input type="submit" class="btn btn-primary"value="Create account!">
        </div>
    
        <label for="errors">
            <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);} ?>
        </label>
    
        <div class="form-group row justify-content-md-center">
        <small class="text-muted">Have ur account? <a href="log_in.php" >Log in now!</a> </small>
        </div>

    </div>
</form>
</div>
