<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" >
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/INDVSNZeffect.css" type="text/css">
    </head>
    <body style="background: url(Images/BACK.jpg);background-size: cover ">
<?php
if(filter_input(INPUT_GET,'CAPTAIN') == filter_input(INPUT_GET,'VICECAPTAIN'))
{
    //echo '<font color="red">SAME CAPTAIN AND VICECAPTAIN NOT ALLOWED</font>';
    header("location:http://".$_SERVER['HTTP_HOST']."/Fantasy/cap_vice_select.php?msg=SAME CAPTAIN AND VICECAPTAIN NOT ALLOWED");
}
 else {
    echo '';
         try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            $phone= filter_input(INPUT_COOKIE, 'New');
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
             $SQL ="UPDATE p1_team SET Captain=?, Vice_Captain=? WHERE PhoneNo=?";
             $query=$dbhandler->prepare($SQL);
             $query->execute(array(filter_input(INPUT_GET,'CAPTAIN'),filter_input(INPUT_GET,'VICECAPTAIN'),$phone));
             
            $query2=$dbhandler->prepare("select * from p1_team where PhoneNo=?");
			$query2->execute(array($phone));
			$count = $query2->rowcount();
                        if($count>0)
                        {
                            while($r=$query2->fetch(PDO::FETCH_ASSOC)){
                                echo '<center><div class="well"><font color="black"><h1><b>Your Dream Team</b></h1></font>';
                                echo '<div style="padding-right: 30px;"><span class="glyphicon glyphicon-user"></span><a href="Profile.php" class="btn btn-info">Profile</a></div></div></center></hr/>';
                               // echo'<input class="MyButton1" type="button"  style="margin-top:5px; margin-left:300px;" value=Captain:'.$r["Captain"].'>';
                                //echo'<input class="MyButton1" type="button"  style="margin-top:5px; margin-left:300px;" value=ViceCaptain:'.$r["Vice_Captain"].'><br>';
                                 $x= array('WK','Bat1','Bat2','Bat3','Bat4','Bow1','Bow2','Bow3','Bow4','All1','All2');
                                echo'<center><font color="orange"><h3><b>WICKET-KEEPER</b></h3></font></center><br>';
                              for($i=0;$i<1;$i++)
                                {          
                                  if($r[$x[$i]]==$r["Captain"])
                                    echo'<center><input class="MyButton1" type="button" style="margin-top:-15px" value='.$r[$x[$i]].'(C)></center>';
                                  else if($r[$x[$i]]==$r["Vice_Captain"])
                                    echo'<center><input class="MyButton1" type="button" style="margin-top:-15px" value='.$r[$x[$i]].'(VC)></center>';
                                  else
                                      echo'<center><input class="MyButton1" type="button" style="margin-top:-15px" value='.$r[$x[$i]].'></center>';
                                }
                                echo'<hr><center><font color="orange"><h3><b>BATSMAN</b></h3></font></center><br>';
                             for($i=1;$i<5;$i++)
                                { 
                                  if($r[$x[$i]]==$r["Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'(C)>';
                                  else if($r[$x[$i]]==$r["Vice_Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'(VC)>';
                                  else 
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'>';
                                }
                                echo'<hr><center><font color="orange"><h3><b>ALL-ROUNDER</b></h3></font></center><br>';
                                
                             for($i=9;$i<11;$i++)
                                {          
                                  if($r[$x[$i]]==$r["Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:325px;" value='.$r[$x[$i]].'(C)>';
                                  else if($r[$x[$i]]==$r["Vice_Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:325px;" value='.$r[$x[$i]].'(VC)>';
                                  else 
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:325px;" value='.$r[$x[$i]].'>';

//                                  echo'<input class="MyButton1" type="button" style="margin-top:45px; margin-left:300px;" value='.$r[$x[$i]].'>';
                                }
                                echo'<hr><center><font color="orange"><h3><b>BOWLER</b></h3></font></center><br>';
                             for($i=5;$i<9;$i++)
                                {          
                                  if($r[$x[$i]]==$r["Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'(C)>';
                                  else if($r[$x[$i]]==$r["Vice_Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'(VC)>';
                                  else 
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'>';

//                                  echo'<input class="MyButton1" type="button" style="margin-top:45px; margin-left:120px;" value='.$r[$x[$i]].'>';
                                }   
                                echo '<hr>';
                            }    
                        }
                        }?>
    </body>
</html>
 