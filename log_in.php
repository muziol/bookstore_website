<form action="checkLogin.php" method="post" class="log_in">
    <label for="Email">
        <input type="email" name="email" class="login_email" placeholder="E-mail">
    </label>
        
    <label for="Password">
        <input type="password" name="password" class="login_password" placeholder="Password">
    </label>

    <label for="submit">
        <input type="submit" value="Log in">
    </label>

    <label for="errors">
        <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);}?>
    </label>

    <label for="not_account_exist">
        <span>Don't have an account yet? Don't hesitate, <a href="auth.php?header=sign_in.php" >register now!</a></span>
    </label>
</form>

