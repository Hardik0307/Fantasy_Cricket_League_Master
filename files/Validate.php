<?php
try{
	$dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
	echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
$phone=filter_input(INPUT_GET,"phone");
$pass=filter_input(INPUT_GET,"Password");
$query=$dbhandler->prepare("select Name,Password from RegUser where PhoneNo=? ");
			$query->execute(array($phone));
			$count = $query->rowcount();
                        
			if($count > 0)
			{
			while($r=$query->fetch(PDO::FETCH_ASSOC)){
			
                            if($r["Password"]!=$pass)
                            {
                                echo'incorrect password';
                            }
                            else
                            {
                               session_start();
                              $_SESSION['New']="$phone";
                            }	
                        
                        }
			}
			else
			{
				echo 'You are not Registered.<br/><a href="Reg.php">CLICK HERE</a>';
			}
                        
                