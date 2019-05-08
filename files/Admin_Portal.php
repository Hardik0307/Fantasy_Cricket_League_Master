<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" >
        <script type="text/javascript" src="/bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="/bootstrap/newcss.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
        p {
        text-align: center;
        font-size: larger ;
        /*margin-top: 0px; */
        }
        </style>
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
        $admin = filter_input(INPUT_GET, "uname");
        $password = filter_input(INPUT_GET, "pass");
        if($admin == "root@name" && $password == "root@password")
        {
             echo '<div class="jumbotron"><center style = "font-size: larger"><h2>Welcome ADMIN</h2></div>';
             echo '<a href="Add_Match.php" class="btn btn-info">Create MATCH</a><hr/>';
             $query2=$dbhandler->query("select match_name from match_info");
             echo '<div class="alert alert-success" style = "font-size: larger">Manage Matches</div><br/>';
             while($result=$query2->fetch())
             {
                 $x= $result['match_name'];
                 //echo $x;
                 echo '<a class="btn btn-info" href="Ad_Match.php?param='.$x.'">'.$result['match_name'].' MATCH</a><br/><br/>'; 
                 setcookie('For_param',$x);
             }
             echo '<div class="alert alert-success">DELETE Matches</div>';
             $query3=$dbhandler->query("select match_name from match_info");
             while($result=$query3->fetch())
             {
                 $x= $result['match_name'];
             
                 echo '<a class="btn btn-info" href="delete_match.php?param='.$x.'">'.$result['match_name'].' MATCH</a><br/><br/>'; 
             }
             
        }
        else if(filter_input(INPUT_GET, "value") == 'yes')
        {
                echo '<font color="red"><center>Wrong Credintials</center></font><br/>'; 
                include 'Admin_Login.php';
        }
     ?>
         <hr/>
     </div>
</body>
</html>
