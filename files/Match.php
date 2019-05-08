<!DOCTYPE html>
<html>
    <head>
          <title>Team Selection</title>
          <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" id="bootstrap-css">
          <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
         <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
          <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
          <link rel="stylesheet" href="css/INDVSNZeffect.css" type="text/css">
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          
          <script src="effect.js"></script>
    </head>
    <body style="background: url(Images/BACK.jpg);background-size: cover">
        <div class="container-fluid"> 
            <div class="well"><h2><span class="label label-info"> Welcome to Team Selection,Use your full skills to Win Contest!!!</span> <br/><br/>
                    <span class="label label-info glyphicon glyphicon-thumbs-up"> MATCH : <?php  echo filter_input(INPUT_GET, "param");?>
                         </span> </h2></div>
<?php
if(isset($_COOKIE['New']))
{
 try{
            $dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
            //echo "Connection is established...<br/>";
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            $phone= filter_input(INPUT_COOKIE, 'New');
            }
            catch(PDOException $e){
                echo $e->getMessage();
                die();
            }
}
else{
    echo 'TIME WENT';
    include 'index.php';
}
if(!isset($_COOKIE[$phone .'Name'])){
?>
        <?php
                            
             $Match_Name= filter_input(INPUT_GET,"param");           
            setcookie('PASS_COOKIE',$Match_Name);
            $query1=$dbhandler->prepare('select * from match_info where match_name=?');
            $query1->execute(array(filter_input(INPUT_GET,"param")));
			$count = $query1->rowcount();
                        if($count>0)
                        {
                            while($r=$query1->fetch(PDO::FETCH_ASSOC)){
                                $wk=array($r['WK1'],$r['WK2']);
                              $bat=array($r['Bat1'],$r['Bat2'],$r['Bat3'],$r['Bat4'],$r['Bat6'],$r['Bat7'],$r['Bat8'],$r['Bat9']);
                             $bow=array($r['Bow1'],$r['Bow2'],$r['Bow3'],$r['Bow4'],$r['Bow5'],$r['Bow6'],$r['Bow7'],$r['Bow8']);
                              $all=array($r['All1'],$r['All2'],$r['All3'],$r['All4']);
                              echo '<form action="">';
                              echo '<center><div class="well"><h1>Select Your Dream Team</h1></div></font></center>';
                              echo '<hr/>';
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
                              
                               echo '<table class="roundedCorners" style="margin-top:35px; margin-left:15px;">';
                               echo'<th><font color="black"><h4><b>Select Wicket-keeper</b></h4></font></th>';
                                for($i=0;$i<2;$i++)
                                {
                                 echo'<tr><td><input type="radio" name="WK" value='.$wk[$i].' id='.$wk[$i].' class="form-radio">';
                                 echo '<label for='.$wk[$i].'><font color="black"> '.$wk[$i].'</font></label>';
                                 echo '</td></tr>';
                                 
                                }
                                 echo '</table>';
                               //  echo '<br/>';
                                 
                               echo '<table class="roundedCorners" style="margin-top:-200px; margin-left:300px;">';
                               echo'<th><font color="black"><h4><b>Select Four Batsman</b></h4></font></th>';
                                for($i=0;$i<8;$i++)
                                {
                                 echo'<tr><td><input type="checkbox" id='.$bat[$i].' name="BAT[]" value='.$bat[$i].'>';
                                 echo '<label for='.$bat[$i].'><font color="black"> '.$bat[$i].'</font></label>';
                                 echo '</td></tr>';
                                }
                                 echo '</table>';
                                 //echo '<br/>';
   
                                 
                                 
                                 
                                echo '<table class="roundedCorners" style="margin-top:-560px; margin-left:650px;">';
                               echo'<th><font color="black"><h4><b>Select Four Bowler</b></h4></font></th>';
                                for($i=0;$i<8;$i++)
                                {
                                 echo'<tr><td><input type="checkbox" id='.$bow[$i].' name="BOWL[]" value='.$bow[$i].'>';
                                 echo '<label for='.$bow[$i].'><font color="black"> '.$bow[$i].'</font></label>';
                                 echo '</td></tr>';

                                 
                                }
                                 echo '</table>';
                                 //echo '<br/>';
   
                                echo '<table class="roundedCorners" style="margin-top:-570px; margin-left:950px;">';
                               echo'<th><font color="black"><b><h4>Select Two All-Rounder</b></h4></font></th>';
                                for($i=0;$i<4;$i++)
                                {
                                 echo'<tr><td><input type="checkbox" id='.$all[$i].' name="ALL[]" value='.$all[$i].'>';
                                 echo '<label for='.$all[$i].'><font color="black"> '.$all[$i].'</font></label>';
                                 echo '</td></tr>';
                                 
                                }
                                 echo '</table>';
                ?>  
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <!--<center><input type="submit" value="Go->" name="SEL" /></center>-->
                <center><input type="submit" class="MyButton" value="Confirm" name="SEL"/></center>

</form>
                       <?php         
                            } 
                        }
        ?>
        
    
<?php
//set
    if(isset($_GET['SEL']))
    {
        
        if (isset($_GET['BAT']) && isset($_GET['BOWL']) && isset($_GET['ALL']) )
        {
            
            $phone= filter_input(INPUT_COOKIE, 'New');
            $BA = $_GET['BAT'];
            $BOW = $_GET['BOWL'];
            $ALR =$_GET['ALL'];
            $WK = filter_input(INPUT_GET, 'WK');
           // echo 'WK OF DREAM TEAM :' .$WK. '<br/>';
            if(count($BA) > 4){
                echo '<div class="alert alert-warning"><font color="red">BATSMAN ARRAY EXCEED!!</font></div>';
                echo '<a href="Profile.php" class="btn btn-danger">Go to Selection</a>';
            }   
            else if(count($BOW)> 4){
                echo '<div class="alert alert-warning"><font color="red">BOWLER ARRAY EXCEED!!</font></div>';
                echo '<a href="Profile.php" class="btn btn-danger">Go to Selection</a>';
            }
           
            else if(count($BA) + count($BOW) + count($ALR) +1 == 11){
                ?><!--<table border="5" align="left"><tr><td colspan="2">--> <?php
                $val= $phone .'val';
                $Cook_Name=$phone .'Name';
               setcookie($Cook_Name,$val,time() + 30000);
                try{
                 $Match_Name = filter_input(INPUT_COOKIE, 'PASS_COOKIE'); 
                 //echo $Match_Name;
                $sql="insert into p1_team (PhoneNo,match_name,WK,Bat1,Bat2,Bat3,Bat4,Bow1,Bow2,Bow3,Bow4,All1,All2,Points,Captain,Vice_captain) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $query=$dbhandler->prepare($sql);
                $query->execute(array($phone,$Match_Name,$WK,$BA[0],$BA[1],$BA[2],$BA[3],$BOW[0],$BOW[1],$BOW[2],$BOW[3],$ALR[0],$ALR[1],30,'',''));
                echo '<br/><br/>';
                //echo " Insertion of Table is created successfully";
                header("location:http://".$_SERVER['HTTP_HOST']."/Fantasy/cap_vice_select.php");
               // echo '<input type="submit" name="play" value="Play"/>';
                }
                catch(Exception $e){echo $e->getMessage();}
             
        }
        else{
            echo '<br/><font color="black"> SELECT only 11 Players</font>';
        }
          
    }
    }
}else{
    echo '<font color="MediumSeaGreen"><h3>You have Already Select Team!!!</h3></font>';
                $Match_Name = filter_input(INPUT_COOKIE, 'PASS_COOKIE');
                $query2=$dbhandler->prepare("select * from p1_team where PhoneNo=? ");
                $query2->execute(array($phone));
			$count = $query2->rowcount();
                        if($count>0)
                        {
                            while($r=$query2->fetch(PDO::FETCH_ASSOC)){
                                echo'<center><font color="black"><h1><b>Your Dream Team</b></h1></font></center><hr>';
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
                                echo'<hr><center><font color="black"><h3><b>BATSMAN</b></h3></font></center><br>';
                             for($i=1;$i<5;$i++)
                                { 
                                  if($r[$x[$i]]==$r["Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'(C)>';
                                  else if($r[$x[$i]]==$r["Vice_Captain"])
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'(VC)>';
                                  else 
                                    echo'<input class="MyButton1" type="button" style="margin-top:-15px; margin-left:130px;" value='.$r[$x[$i]].'>';
                                }
                                echo'<hr><center><font color="black"><h3><b>ALL-ROUNDER</b></h3></font></center><br>';
                                
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
                                echo'<hr><center><font color="black"><h3><b>BOWLER</b></h3></font></center><br>';
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
                            }    
                        }
    
}
    ?>
                </body>
</html>  