<form action="sign_up.php" method="post" class="sign_up">
    <label for="Name">
        <input type="text" name="name" class="sign_name" placeholder="First name">
    </label>

    <label for="Surname">
        <input type="text" name="surrname" class="sign_surname" placeholder="Last name">
    </label>

    <label for="Email">
        <input type="email" name="email" class="sign_email" placeholder="E-mail">
    </label>

    <label for="Password">
        <input type="password" name="password" class="sign_password" placeholder="Password">
    </label>

    <label for="Repeat_password">
        <input type="password" name="repeat_password" class="sign_repeat_password" placeholder="Repeat password">
    </label>

    <label for="phone">
        <input type="tel" name="phone" class="sing_phone" placeholder="Phone number">
    </label>

    <label for="city">
        <input type="text" name="city" class="city" placeholder="City">
    </label>

    <label for="submit">
        <input type="submit" value="Create account!">
    </label>

    <label for="errors">
        <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);} ?>
    </label>

    <label for="account_exist">
        <span>Have ur account? <a href="auth.php?header=log_in.php" >Log in now!</a> </span>
    </label>
</form>

