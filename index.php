<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="./css/main.css">
  </head>
  <body>
  <div id="particles-js"></div>
  <?php 
  session_start(); 
  if ( isset($_SESSION['error'])) unset($_SESSION['error']); 
  ?>
  <div class="main">
    <span class="msg_welcome">Welcome on TradeRex</span>   
    <picture>
        <!--source srcset='large.webp' media='(min-width: 992px)' type='image/webp'>
        <source srcset='large.jpg' media='(min-width: 992px)' type='image/jpeg'-->
        <img src="./img/logo_large.png" alt="Logo">
    </picture>
    <label for="login">
      <span class="msg_login">Log in to show all offers</span> 
      <input type="button" value="Log in" class="login">
    </label>
  </div>
  


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/particles.js"></script>
    <script type="text/javascript" src="js/main.js" ></script>
  </body>
</html>