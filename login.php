<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" href="css/login.css">
    
</head>
<body>
    <form action="checkLogin.php" method="get" class="log_in show">
        <label for="Email">
            <input type="email" name="email" class="login_email" placeholder="e-mail">
        </label>
        
        <label for="Password">
            <input type="password" name="password" class="login_password" placeholder="hasło">
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
        <label for="Name">
            <input type="text" name="name" class="sign_name" placeholder="imię">
        </label>

        <label for="Surname">
            <input type="text" name="surrname" class="sign_surname" placeholder="nazwisko">
        </label>

        <label for="Email">
            <input type="email" name="email" class="sign_email" placeholder="e-mail">
        </label>

        <label for="Password">
            <input type="password" name="password" class="sign_password" placeholder="hasło">
        </label>

        <label for="Repeat_password">
            <input type="password" name="repeat_password" class="sign_repeat_password" placeholder="powtórz hasło">
        </label>

        <label for="phone">
            <input type="tel" name="phone" class="sing_phone" placeholder="numer telefonu">
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