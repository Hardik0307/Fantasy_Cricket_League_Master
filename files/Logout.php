<?php
if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", " ", time() - 3600);
}
setcookie('New','',time() - 0 );
$_SESSION[]=array();
echo 'Logout Successfully';
session_destroy();
header("location:http://".$_SERVER['HTTP_HOST']."/Fantasy/index.php");
?> 
