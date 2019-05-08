<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" >
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>
    </head>
    <body style="background-image: url(Images/a.png);background-size:  cover;">
        <?php include 'header.php';?>
        <div id="banner_image">
            <div class="container">
                <center><br>
                    <div class="circle"></div><br>
                <div id="banner_content">
                    <div style="text-align: center"> <a href="help.html" class="btn btn-success">How to Play</a></div><br/>
                    <a href="Login.php" class ="btn btn-success btn-lg active" target="_blank">Play</a><br><h2>
                        <div style="font-size:30px"><img src ="flags/ind.png" width="20%" height="20%"/>V/s.<img src="flags/aus.png" width="20%" height="20%"/>
        <br/> Match starts in:<?php include 'COUNTDOWN.php';?> </div>
                        <div style="font-size:30px"><img src ="flags/ban.png" width="20%" height="20%"/>V/s.<img src="flags/eng.png" width="20%" height="20%"/>
        <br/><?php include 'COUNTDOWN.php';?> </div>
                    </h2>
                </div>      
            </div>
        </div> <?php include 'footer.php'; ?>
    </body>
</html>
