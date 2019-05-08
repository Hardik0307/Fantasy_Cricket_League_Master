<!DOCTYPE html>
<html> 
    <head>
        <title>Confirmation</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
<?php

                try{
                        $dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                    die();
                }
                $Bat1=filter_input(INPUT_GET,"Bat1");
                $Bat2=filter_input(INPUT_GET,"Bat2");
                $Bat3=filter_input(INPUT_GET,"Bat3");
                $Bat4=filter_input(INPUT_GET,"Bat4");
                $WK1=filter_input(INPUT_GET,"WK1");
                $Bat6=filter_input(INPUT_GET,"Bat6");
                $Bat7=filter_input(INPUT_GET,"Bat7");
                $Bat8=filter_input(INPUT_GET,"Bat8");
                $Bat9=filter_input(INPUT_GET,"Bat9");
                $WK2=filter_input(INPUT_GET,"WK2");
                $Bow1=filter_input(INPUT_GET,"Bow1");
                $Bow2=filter_input(INPUT_GET,"Bow2");
                $Bow3=filter_input(INPUT_GET,"Bow3");
                $Bow4=filter_input(INPUT_GET,"Bow4");
                $Bow5=filter_input(INPUT_GET,"Bow5");
                $Bow6=filter_input(INPUT_GET,"Bow6");
                $Bow7=filter_input(INPUT_GET,"Bow7");
                $Bow8=filter_input(INPUT_GET,"Bow8");
                $All1=filter_input(INPUT_GET,"All1");
                $All2=filter_input(INPUT_GET,"All2");
                $All3=filter_input(INPUT_GET,"All3");
                $All4=filter_input(INPUT_GET,"All4");
                $MOD=filter_input(INPUT_GET,"Time_Match");
                $Match_Name = $_COOKIE['MatchName'];
               // echo $Match_Name;
                $query=$dbhandler->prepare('insert into match_info (`match_name`, `Bat1`, `Bat2`, `Bat3`, `Bat4`, `WK1`, `Bat6`, `Bat7`, `Bat8`, `Bat9`, `WK2`, `Bow1`, `Bow2`, `Bow3`, `Bow4`, `Bow5`, `Bow6`, `Bow7`, `Bow8`, `All1`, `All2`, `All3`, `All4`)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                $query->execute(array($Match_Name,$Bat1,$Bat2,$Bat3,$Bat4,$WK1,$Bat6,$Bat7,$Bat8,$Bat9,$WK2,$Bow1,$Bow2,
                        $Bow3,$Bow4,$Bow5,$Bow6,$Bow7,$Bow8,$All1,$All2,$All3,$All4));
                  echo '<h1 class="alert alert-success">SUCESSS</h1>';
                  echo '<a href="Admin_Portal.php?uname=root%40name&pass=root%40password&sub=Go" class="btn btn-info">Go to Dash</a>';
                  ?>
        </div>
    </body>
</html>