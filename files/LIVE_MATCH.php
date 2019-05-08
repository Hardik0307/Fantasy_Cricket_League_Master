<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" >
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/INDVSNZ_MATCH.css" type="text/css">
    </head>
    <body style="background-image: url(Images/BACK.jpg);background-size:  cover;">
        <div class="container">
<?php

if(isset($_COOKIE['New']))
{
 try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
}
else{
    //echo 'TIME WENT';
    include 'index.php';
}
$x=array();
session_start();
$c=$_SESSION['Count_Session'];
if($c != 999){
header("Refresh:3");
}
echo '<br>';
echo '<center><input class="MyButton" type="button" value="Leader Board"/></center>';
echo '<br><br>';
if($c!=999){
echo '<center><input class="MyButton1" type="button" value="For Ball:'.$c.'"/></center>';}
$t = filter_input(INPUT_GET,"param");
//echo $t;
    $query1=$dbhandler->query('select * from p1_team');
    //$query1->execute(array($t));
		while($r=$query1->fetch()){
			//echo specific attributes
                       // $x=array_push($r['Points']);
                        //array_push($x, $r['PhoneNO'].'------>'.$r['Points']);
                    $x[$r['PhoneNo']]=$r['Points'];
                   
                } 
                       
                        arsort($x);
                        echo '<style>
                                table.roundedCorners { 
                                      border: 3px solid  grey;
                                      border-radius: 25px; 
                                      border-spacing: 0;
                                }
                                table.roundedCorners td, 
                                table.roundedCorners th { 
                                      border-bottom: 3px solid grey;
                                      padding: 10px; 
                                }
                                table.roundedCorners tr:last-child > td {
                                     border-bottom: none;
                                }
                            </style>';
                        echo '<br>';
                        echo '<center><table class="roundedCorners">';
                        echo '<th><font color="black"><h2><b>Phone-Number</b></h2></font></th>';
                        echo '<th><font color="black"><h2><b>Points</b></h2></font></th>';
                        foreach ($x as $key=>$value)
                        {
                            echo '<tr><td><font color="black"><h2><b>'.$key.'</b></h2></font></td><td><font color="black"><h2><b>'.$value.'</b></h2></font></td></tr>';
                           // echo '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>' ;
                           // echo '<br/>';
                        }
                        if ($c == 999)
                        {
                          $i=0;
                            echo '<center><font color="black"><h1><b>Match Finished</b></h1></font><br/>';
                            $query2=$dbhandler->prepare("select PhoneNo from p1_team where Points=?");
                            //$firstKey = array_key_first($x);
                            //$y=$x[$firstkey];
                            foreach ($x as $key => $val) 
                            {
                                echo '<center><input class="MyButton2" type="button" value="WINNER IS : '.$key.'  with '.$val.' Points"/></center>';
                                //echo $key.'---->'.$val;
                                break;
                            }
                            echo '<br>';
                            foreach ($x as $key => $val) 
                            {
                                //$query2=$dbhandler->prepare("select Points from RegUser where PhoneNo=?");
                                //$query2->execute(array($phone));
                                //$count = $query2->rowcount();
                                //if($count>0)
                               // {
                                
                               // }
                                  //  while($r=$query2->fetch(PDO::FETCH_ASSOC)){
                                   // echo $key.'---'.$i;
                                    if ($i == 0) {
                                        $SQL = "update reguser set Points=Points+50 where PhoneNo=?";
                                    }
                                    else if ($i == 1)
                                    {
                                        $SQL = "update reguser set Points=Points+30 where PhoneNo=?";
                                    } 
                                    else if ($i == 2) 
                                    {
                                        $SQL = "update reguser set Points=Points+20 where PhoneNo=?";
                                    } 
                                    else {
                                         break;
                                    }
                                    $query=$dbhandler->prepare($SQL);
                                    $query->execute(array($key));
                                    $i++;
                                
                            }
                            /* $u = filter_input(INPUT_COOKIE, 'PASS_COOKIE');
                              echo '<b>'.$u.'</b>';
                            */
                            
                            echo '<center><h2><a href="Profile.php?param=stop"><font color="black"><u>Go to Dashboard</u></font></a></h2></center><br>';
                            
                            header("Refresh;1500");
  
                        }
                 ?>
        </div>
    </body>
</html>
                          