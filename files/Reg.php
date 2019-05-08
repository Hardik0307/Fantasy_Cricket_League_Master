<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" >
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/Effect.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration</title>
    </head>
     <?php include 'header.php'; 
     ?>
   <body>
        <div class="container-fluid">
            <div style="margin-top: 150px">
             <form action="">
                    <div class="login-box">
                        <h1><font color="black"><br>Registration</font></h1>
                    <div class="textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" placeholder="Username" name="Name" required>
                    </div>
                
                    <div class="textbox">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<input type="text" placeholder="Phone Number" name="PhoneNo" required>
                    </div>
                
                    <div class="textbox">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<input type="text" placeholder="Email" name="Email" required>
                    </div>
                
                    <div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="Password" required>
                    </div>
                
                    <div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Re Enter Password" name="Password1" required>
                    </div>
                
		
	<h3><input class="btn btn-primary" type="submit" name="Sub" value="Register" onclick="alert('Are you sure want to register?')"/>
        <input class="btn btn-primary" type="reset" name="reset" value="Reset all"/></h3>
        </form><br/>
        </div>

<?php
    $pass1=(string) filter_input(INPUT_GET,"Password");
    $pass2=(string) filter_input(INPUT_GET,"Password1");
    $Name=(string) filter_input(INPUT_GET,"Name");
    $Email=(string) filter_input(INPUT_GET,"Email");
    $PhoneNo= filter_input(INPUT_GET,"PhoneNo");
    if($pass1 == $pass2 && strlen($PhoneNo) == 10 && filter_var($Email, FILTER_VALIDATE_EMAIL))
    {
        try{
           $db = mysqli_connect('localhost', 'root', '', 'project');
            if (!$db) {
                 die("Connection failed: " . mysqli_connect_error());
            }
            else{
        //echo '<h3>Connected Established......</h3><br>';
            }
            $t= sha1($pass1);
            $query = "INSERT INTO RegUser(Name,Password,Email,PhoneNo,Points) VALUES"
            . "('$Name','$t','$Email',$PhoneNo,'50')";
            mysqli_query($db, $query);
            echo '<br/><br/><br/><br/><font color="green">Registration Successfull....</font><br/>';
            echo '<h2><a href="Login.php">Login to Play</a></h2>';
            header("location:http://".$_SERVER['HTTP_HOST']."/Fantasy/Login.php");
    }catch(Exception $e){echo $e;}
    }
 else if(isset($_GET["Sub"]))
     {  
       echo'<br/><br/><br/><center><font color="red"><h4>Wrong Credintials</h4></font></center>';
    }
    ?>
             <div style="padding-top: 530px;"> 
     <?php include 'footer.php'; ?></div>
            </div>
        </div>
     </body>
</html>