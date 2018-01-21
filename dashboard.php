<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>
    <form action="addBook.php" method="post" class="">
        <label for="Email">
            <input type="email" name="email" class="" placeholder="Title">
        </label>
            
        <label for="">
            <input type="text" name="" class="" placeholder="Author">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="Publisher">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="PublishData">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="Language">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="Translator">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="Condition">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="Genre">
        </label>

        <label for="">
            <input type="text" name="" class="" placeholder="owner">
        </label>

        <label for="submit">
            <input type="submit" value="Publish">
        </label>

        <label for="errors">
            <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);}?>
        </label>
    </form>
    <button onclick="window.location.href='index.php'">Log out</button>
</body>
