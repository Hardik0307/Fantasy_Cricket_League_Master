<?php

$player = filter_input(INPUT_GET, filter_input(INPUT_COOKIE,"match_name"));
$point  = filter_input(INPUT_GET, "Operation");
$c= filter_input(INPUT_COOKIE,"cc");
//echo $player.','.$point;
try{
	$dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}
catch(PDOException $e){
	echo $e->getMessage();
        die();
}
    //if($c<=5){
            $query=$dbhandler->query('select * from p1_team');
		while($r=$query->fetch())
                {            
                        $x= array('WK','Bat1','Bat2','Bat3','Bat4','Bow1','Bow2','Bow3','Bow4','All1','All2');
              /*for($i=0;$i<11;$i++)
              {
                    echo $r[$x[$i]];
              }*/
              
              if($r["Captain"]== $player)
              {
                    $phone=$r["PhoneNo"];
                    $SQL ="UPDATE p1_team SET Points=? where PhoneNo=?";
                    $query1=$dbhandler->prepare($SQL);
                    $query1->execute(array($r['Points']+$point*3,$phone));
              }
              else if($r["Vice_Captain"]== $player)
              {
                    $phone=$r["PhoneNo"];
                    $SQL ="UPDATE p1_team SET Points=? where PhoneNo=?";
                    $query1=$dbhandler->prepare($SQL);
                    $query1->execute(array($r['Points']+$point*2,$phone));
              }
              else
              {
                  //echo 'else';
                   for($i=0;$i<11;$i++)
                   {
                        echo $r[$x[$i]]. '<br/>';
                        if($r[$x[$i]] == $player)
                        {
                             $phone=$r["PhoneNo"];
                             $SQL ="UPDATE p1_team SET Points=? where PhoneNo=?";
                             $query1=$dbhandler->prepare($SQL);
                             $query1->execute(array($r['Points']+$point*1,$phone));
              
                        }
                   }
               }
              
    }//}
    /*if($c==5 && $point != 15)
    {
       header("location:http://localhost/Fantasy/Admin/Ad_NZVSIND.php");   
    }*/
    if($c<6 && $point!=5)
    {
        $c=$c+1;
    }
    else if($point==5)
    {
        $c=$c;
    }
    else
    {
        $c=999;
         header("location:http://localhost/Fantasy/Admin/Ad_Match.php?count=".$c); 
    }
    /*if($point != 5){
            $c = $c +1;
            }
   
           
            else if($c==6 && $point == 5)
            {
                 $query=$dbhandler->query('select * from p1_team');
		while($r=$query->fetch())
                {  
                    $x= array('WK','Bat1','Bat2','Bat3','Bat4','Bow1','Bow2','Bow3','Bow4','All1','All2');
                   for($i=0;$i<11;$i++)
                   {
                        echo $r[$x[$i]]. '<br/>';
                        if($r[$x[$i]] == $player)
                        {
                             $phone=$r["PhoneNo"];
                             $SQL ="UPDATE p1_team SET Points=? where PhoneNo=?";
                             $query1=$dbhandler->prepare($SQL);
                             $query1->execute(array($r['Points']+$point*1,$phone));
              
                        }
                }}
            }*/
           header("location:http://localhost/Fantasy/Admin/Ad_Match.php?count=".$c);       