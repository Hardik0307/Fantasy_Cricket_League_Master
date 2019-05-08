<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/Effect.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    
    <body style="background-color: white">
    <?php include 'header.php'; ?>
        <div class="container-fluid">
            <div style="margin-top: 100px">
                <form action="">
                    <div class="login-box">
                        <h1><font color="black"><br><center>Login</center></font></h1>
                    <div class="textbox">   
			<i class="glyphicon glyphicon-phone" aria-hidden="true"></i>
			<input type="text" placeholder="Phone Number" name="phone" required>
                    </div>
		
                    <div class="textbox">
			<i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="Password" required>
	            </div>
                        <br/>Enter Code <br/><img src="captcha.php"><br/>
                            <input type="text" name="vercode1" />  
                    <h3>
                        <input class="btn btn-primary" type="submit" name="Log" value="Login"/>
                        <input class="btn btn-primary" type="reset" value="Reset"/>
                        New User?? <a href="Reg.php"><font color="black"><div class="glyphicon glyphicon-hand-right">  Register Here</div></font></a></h3>
                    </div>	

        </form>
    <br/><br/><center>
<?php                        
try{
	$dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
                      
$phone=filter_input(INPUT_GET,"phone");
$pass=filter_input(INPUT_GET,"Password");
$t = sha1($pass);

$query=$dbhandler->prepare('select Name,Password from RegUser where PhoneNo=?');
                        
			$query->execute(array($phone));
			$count = $query->rowcount();
                        
			if($count > 0)
			{
                            session_start();
			while($r=$query->fetch(PDO::FETCH_ASSOC)){
                            
                            if($r["Password"]!= $t)
                            {
                                echo '<br/><br/><br/><br/><br/><br/><br/>';
                                echo '<br/><br/><br/><br/><br/><br/><font color="red"><h3> Incorrect password</h3></font>';
                            }
                  
                           else if ($_GET['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']=='')  {
     echo  '<strong>Incorrect verification code.</strong>';
}
                                                          
                            
                            else
                            {
                                if($_COOKIE['New'] == $phone)
                                {
                                    echo 'You are Alredy Logged in';
                                }
                                else
                                {
                                    session_start();
                                    $_SESSION['New']="$phone";
                                    setcookie('New',$phone, time() + 3000);
                                    //setcookie('Data',$Name,time() + 6);
                                    header("location:http://".$_SERVER['HTTP_HOST']."/Fantasy/Profile.php");
                                    //header("Location: upload.php?num=".$_POST['num']."")
                               }	
                            }
                        }
			}
                         
			else if(filter_input(INPUT_GET,"Log") == "Login")
			{
				echo '<br/><br/><br/><br/><br/><br/><br/>';
                                echo '<br/><br/><br/><br/><br/><br/><h3> You are not Registered</h3>';
			} 

                        ?></center><div style="padding-top: 570px;"> 
    <?php include 'footer.php'; 
    ?>
                        </div>
            </div>
        </div>
</body>
</html>