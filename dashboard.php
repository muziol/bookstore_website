<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">

        <form action="addBook.php" method="post" class="">

            <div class="field">
                <input type="text" name="title" class="" placeholder="The name of book">
                <label>Title *</label>
            </div>

            <div class="field">
                <input type="text" name="author" class="" placeholder="The person who wrote this book">
                <label>Author *</label>
            </div>

            <div class="field">
                <input type="text" name="publisher" class="" placeholder="Organization whos publish">
                <label>Publisher</label>
            </div>

            <div class="field">
                <input type="text" name="publishdata" class="" placeholder="When the book was published">
                <label>Publish date</label>
            </div>

            <div class="field">
                <input type="text" name="pagenumber" class="" placeholder="How much pages we need to read">
                <label>Number of pages</label>
            </div>

            <div class="field">
                <input type="text" name="language" class="" placeholder="Which language we need know to read it">
                <label>Language</label>
            </div>
            
            <div class="field">
                <input type="text" name="translator" class="" placeholder="Orginal laguage of book">
                <label>Translator</label>
            </div>

            <div class="field">
                <input type="text" name="condition" class="" placeholder="Tell how much this book is able to read">
                <label>Condition</label>
            </div>

            <div class="field">
                <input type="text" name="genre" class="" placeholder="Genre of your book">
                <label>Genre *</label>
            </div>

            <div class="group">
                <label for="submit">
                    <input type="submit" value="Publish">
                </label>
        
                <label for="errors">
                    <?php if ( isset($_SESSION['error']) ){echo $_SESSION['error']; unset($_SESSION['error']);}?>
                </label>
            </div>
    
    
    
    
    
    
        <div id="allBooksList">
        <?php 
        //****************************************************************************************
                                        //BOOKS LISTING
        //****************************************************************************************	
        $curl = curl_init(); //LOADING CURL 
    
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://localhost:5000/book", 
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",						  //REQUEST TYPE
          CURLOPT_HTTPHEADER => array(
            //"Authorization: Bearer ".$_COOKIE['token']
          )
        ));
    
        $response = curl_exec($curl);							  //HERE IS RESPONSE IN JSON
        $err = curl_error($curl);
        $response = json_decode($response, true);				  //DECODING JSON TO ARRAY
        
        echo '<h2>Books</h2></br>';
        echo '<div class="container">';
    
        for($i = 0; $i < count($response);$i++){				  //SHOWING BOOKS
            echo '<div class="item">';
            echo '<div class="cover"></div>';
            echo '<h3>'.$response[$i]['title'].'</h3>';
            echo '<p>'.$response[$i]['author'].'</p>';
            //echo '<p> Price:'.$response[$i]['price'].' zl</p>';			
            echo '</div>';
        }
        echo '</div>';
    
        curl_close($curl);
        ?>
    
        </div>  
        </form>
        
    <button onclick="window.location.href='index.php'">Log out</button>
    </div>
</body>
