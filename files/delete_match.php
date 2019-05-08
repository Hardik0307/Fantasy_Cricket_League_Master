<?php

try{
	$dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e)
{
	echo $e->getMessage();
	die();
}
$match = filter_input(INPUT_GET,'param');
$query = $dbhandler->prepare("delete from match_info where match_name=?");
$query->execute(array($match));
header("location:http://".$_SERVER['HTTP_HOST']."/Fantasy/Admin/Admin_Portal.php?uname=root%40name&pass=root%40password&sub=Go"); 

