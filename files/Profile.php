<!DOCTYPE html> 
<html lang="en">
    <head>
        <title>User Profile</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" >
          <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
          <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body style="background: url(Images/BACK.jpg); background-size:  cover">
<?php
include 'header.php';
//echo '<a href="Logout.php">Logout</a>';
try{        
	$dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}

$phone= filter_input(INPUT_COOKIE,'New');
$_SESSION['New']="$phone";
$query=$dbhandler->prepare("select Name,Points from RegUser where PhoneNo=?");
			$query->execute(array($phone));
			$count = $query->rowcount();?>
        <br><br><br>
                    <div class="container">
                            <div class="jumbotron">
                         <?php
                        if($count>0)
                        {
                            while($r=$query->fetch(PDO::FETCH_ASSOC)){
                                echo '<h2>WELCOME '.$r["Name"].',<br/>';
                                echo '<br/>Current Points  ::' .$r["Points"]. '</h2>';
                                ?>
                            </div>
                      <div class="well"><h3 style="padding-left: 70px">Go to Match Selection to Play</div>
                             <?php   // include 'Test.php';
                            }
                        }
$query1=$dbhandler->query("select match_name from match_info ");

$query1->execute();
			$count = $query1->rowcount();
                        if($count>0)
                        {
                            while($r=$query1->fetch(PDO::FETCH_ASSOC)){
                                echo '<a class="btn btn-warning btn-md" href="Match.php?param='.$r['match_name'].'">'
                                        .$r['match_name'].' </a><h4><a class="label label-info  glyphicon glyphicon-arrow-right" href="LIVE_MATCH.php?param='.$r['match_name'].'">    Go to Match-board</a></h4><br/><br/>';
                            }
                        }

//$pass=filter_input(INPUT_GET,"Password");
//echo $phone;
                        
//echo $pass;
?>
              </div>
          </h3>                      
    </body>
</html>
