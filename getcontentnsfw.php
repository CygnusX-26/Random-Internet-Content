<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Internet Content</title>
</head>

<main>
    <h1 class="main-center">
        Welcome to Random Internet Content.
    </h1>
    <p class="desc-center">
        The place where you can anonymously share anything to another <br>
            anonymous user.
    </p>
    <form class="getcontent-button" action="index.html">
        <button type="submit" class="content-button">Click me to go back.</button>
    </form>
    <p class="random-text">
        <?php
            $host = "localhost";
            $dbname = "content_db";
            $username = "root";
            $password = "";
            
            $conn = mysqli_connect($host, $username, $password, $dbname);
            $sql = "SELECT content, nsfw from content ORDER BY RAND()";

            $result = mysqli_query($conn, $sql);
            while ($obj = mysqli_fetch_object($result)) {
                echo($obj->content);
                break;
            }
        ?>
    </p>
    <form class="getcontent-button-sfw" action="getcontent.php">
        <button type="submit" class="content-button-sfw">Get new content (sfw)</button>
    </form>
    <form class="getcontent-button-nsfw" action="getcontentnsfw.php">
        <button type="submit" class="content-button-nsfw">Get new content might be nsfw</button>
    </form>
    
</main>
