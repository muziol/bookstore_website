<div class="container">
  
    <form action="checkLogin.php" method="post" class="log_in">
    
        <div class="field">      
            <input class="input-group" type="email" name="email" class="login_email" placeholder="example@domain.com" required>
            <label>Email</label>
        </div>
        
        <div class="field">      
            <input class="input-group" type="password" name="password" class="login_password" placeholder="your secret password" required>
            <label>Password</label>
        </div>

        <div class="group">
            <label for="submit">
                <input type="submit" value="Log in" class="btn">
            </label>
            
            <label for="errors">
                <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);}?>
            </label>
    
            <label for="not_account_exist">
                <span>Don't have an account yet? Don't hesitate, <a href="auth.php?header=sign_in.php" >register now!</a></span>
            </label>
        </div>

    </form>

  
</div>


