<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p {
  text-align: center;
  font-size: larger ;
/*margin-top: 0px; */
}
</style>
</head>
<body>

<p id="demo"></p>
<?php

try{
	$dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
	//echo "Connection is established...<br/>";
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
$query=$dbhandler->prepare("select min(date_of_expiry) from time_to_expire ");
                        $query->execute();
			$count = $query->rowcount();
                         if($count>0)
                        {
                             $res=$query->fetch();
                             //print_r($res);
                           // echo $res[0];
                        }
?>
<script>
<?php
echo "var countDownDate = new Date(\"$res[0]\").getTime();";
?>
// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
      clearInterval(x);
     //window.location="http://localhost/Fantasy/INDVSNZ_MATCH.php"
  }
  
}, 1000);
</script>

</body>
</html>
