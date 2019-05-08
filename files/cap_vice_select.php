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
        <link rel="stylesheet" href="css/cap_vice_select_effect.css" type="text/css">
    </head>
    <body style="background: url(Images/BACK.jpg); background-size: cover">
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
         echo '<center><h1><b>Select Captain and Vice Captain</b></h1></center><hr/>'; 
         echo '<center><h3><font color="red">'. filter_input(INPUT_GET, 'msg').'</h3></font></center>';
        $phone = filter_input(INPUT_COOKIE, 'New');
        $query=$dbhandler->prepare('select WK,Bat1,Bat2,Bat3,Bat4,Bow1,Bow2,Bow3,Bow4,All1,All2,Points from p1_team where PhoneNo=?');
        $query->execute(array($phone));
        $count = $query->rowcount();
                        
        if($count > 0)
        {?>
            <form action="display_team.php">
                <style>
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
                </style>
                      <center><table class="roundedCorners">
                          <th><font color="orange"><h2><b>Name</b></h2></font></th>
                          <th><font color="orange"><h2><b>Captain</b></h2></font></th>
                          <th><font color="orange"><h2><b>Vice Captain</b></h2></font></th><?php
            while($r=$query->fetch(PDO::FETCH_ASSOC))
            {
               
              $x= array('WK','Bat1','Bat2','Bat3','Bat4','Bow1','Bow2','Bow3','Bow4','All1','All2');
              
              for($i=0;$i<11;$i++)
              {       
                  echo '<h3><tr><td><font color="black" ><b>'.$r[$x[$i]]. '</b></font></td>';
                  echo '<td><input type="radio" name="CAPTAIN" value='.$r[$x[$i]].' id='.$r[$x[$i]].' class="form-radio">';
                  echo '<label for='.$r[$x[$i]].'></label></td>';
                  echo '<td><input type="radio" name="VICECAPTAIN" value='.$r[$x[$i]].' id='.$r[$x[$i]].' class="form-radio">';
                  echo '<label for='.$r[$x[$i]].'></label></td></tr></H3>';
               }                    
            }?>
              </table><br/><input class="MyButton" type="submit" value="Done" name="sub_team" onclick="alert('Are you sure,once click on ok you cannot modify?')"/>
                      </center></form>
             <?php //echo '</table><br/><input type="submit" value="Fix it" name="sub_team"/></center></form>';
        }
        else{echo 'NOT FOUND RECORD PHONE NUMBER ERROR';}
}