<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <form action="checkLogin.php" method="get" class="log_in show">
        <label for="Email">
            <input type="email" name="email" class="login_email" placeholder="email">
        </label>
        
        <label for="Password">
            <input type="password" name="password" class="login_password" placeholder="password">
        </label>

        <label for="submit">
            <input type="submit" value="Zaloguj">
        </label>

        <label for="errors"></label>

        <label for="not_account_exist">
            <span>Nie masz jeszcze konta? Nie zwklekaj</span>
            <input type="button" value="Zarejestruj się" class="sign_up_submit">
        </label>
    </form>
    
    <form action="sign_up.php" method="post" class="sign_up hide">
        <label for="Email">
            <input type="email" name="email" class="sign_email" placeholder="email">
        </label>

        <label for="Password">
            <input type="password" name="password" class="sign_password" placeholder="password">
        </label>

        <label for="Replay_password">
            <input type="password" name="replay_password" class="sign_replay_password" placeholder="replay password">
        </label>

        <label for="submit">
            <input type="submit" value="Załóż konto!">
        </label>

        <label for="errors"></label>

        <label for="account_exist">
            <span>Masz już konto? </span>
            <input type="button" value="Zaloguj się" class="log_in_submit">
        </label>
    </form>

    <script src="js/login.js"></script>
</body>
</html>