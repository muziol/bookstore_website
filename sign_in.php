<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    
</head>
<div class="container">
<form action="sign_up.php" method="post" class="sign_up">

    <div class="field">
        <input type="text" name="name" class="sign_name" placeholder="First name">
        <label>First name</label>

    </div>

    <div class="field">
        <input type="text" name="surrname" class="sign_surname" placeholder="Last name">
        <label >Last name</label>

    </div>

    <div class="field">
        <input type="email" name="email" class="sign_email" placeholder="example@domain.com">
        <label>Email</label>

    </div>

    <div class="field">
        <input type="password" name="password" class="sign_password" placeholder="Your secrect password">
        <label>Password</label>
    </div>

    <div class="field">
        <input type="password" name="repeat_password" class="sign_repeat_password" placeholder="reapeat the same password here">
        <label>Reapeat password</label>
    </div>

    <div class="field">
        <input type="tel" name="phone" class="sing_phone" placeholder="We need to find you">
        <label>Phone number</label>
    </div>

    <div class="field">
        <input type="text" name="city" class="city" placeholder="We need know where send your staff">
        <label>City</label>
    </div>

    <div class="group">
        <label for="submit">
            <input type="submit" value="Create account!">
        </label>
    
        <label for="errors">
            <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);} ?>
        </label>
    
        <label for="account_exist">
            <span>Have ur account? <a href="log_in.php" >Log in now!</a> </span>
        </label>
    </div>
</form>
</div>
