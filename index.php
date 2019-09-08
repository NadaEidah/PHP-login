<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Index Exerciec</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php
    include "header.php";
    
    ?>

    <div id="indexS"style="text-align: center; margin-left:30%; margin-top:150px; height:300px; width:600px; background-color:#544956;">
    <?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        echo '<h1> Welcome '.$_SESSION["username"].'</h1>';
        echo '<br /><br /><a href="logout.php" type="submit" class="btn btn-primary" >Logout</a>';
    }
    ?>
    </div>
  
    <?php
    include "footer.php";
    ?>


</body>
</html>
