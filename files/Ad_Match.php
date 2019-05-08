<!DOCTYPE html> 
<html>
    <head>
        <title>ADD_MATCH</title>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" >
          <script type="text/javascript" src="/bootstrap/js/jquery-3.3.1.min.js"></script>
          <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
<?php
        session_start();
         $c=filter_input(INPUT_GET,'count');
    //$ind = array('Dhoni','Rohit','Dhawan','Kohli','Kedar','Karthik','Jadeja','Hardik','Kuldeep','Bhuvneshwar','Bumrah');
    //$nz  = array('Sheffard','Ronchi','Williamson','Munro','Guptil','Nisham','deGradeholm','Southee','Bolt','Sodhi','Santener');
                try{
                        $dbhandler = new PDO('mysql:host=localhost;dbname=project','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                    die();
                }
               
                $Match_Name = filter_input(INPUT_COOKIE, 'For_param');
                //echo $Match_Name;
                setcookie("match_name",$Match_Name);
               $query=$dbhandler->prepare('SELECT * from match_info WHERE match_name=?');
               $query->execute(array($Match_Name)); 
               while($r=$query->fetch()){
                   $first_team=array($r['Bat1'],$r['Bat2'],$r['Bat3'],$r['Bat4'],$r['WK1'],$r['Bow1'],$r['Bow2'],$r['Bow3'],$r['Bow4'],$r['All1'],$r['All2']);
                   $second_team=array($r['Bat6'],$r['Bat7'],$r['Bat8'],$r['Bat9'],$r['WK2'],$r['Bow5'],$r['Bow6'],$r['Bow7'],$r['Bow8'],$r['All3'],$r['All4']);   
                        }
   
    
    if($c==null)
    {
        echo '<center><h2 class="alert alert-info">FOR BALL : 1</h2></center>';
        $_SESSION['Count_Session']=1;
        //setcookie("match_name",$Match_Name);
        setCookie("cc",1);
    }
    else if($c!=999) 
    {
            echo '<center><h2 class="alert alert-info">FOR BALL: '.$c.' </h2></center>';
            //echo'<h1>'. $c.'</h1>';
            setCookie("cc",$c);
            $_SESSION['Count_Session']=$c;
    }
    else{
        $_SESSION['Count_Session']=$c;
        echo '<h2 class="alert alert-info">Match is over</h2>';
        echo '<a href="Admin_Portal.php?uname=root%40name&pass=root%40password&sub=Go" class="btn btn-info">Admin Profile</a>';
    }
    //setCookie("cc",$c);
    echo '<form action="DevOps.php">';
    echo '<table border="3" class="table table-hover" align="center">';
    echo'<th class="bg-primary" colspan="2" ><div style="font-size: x-large;text-align:center">'.$Match_Name.'</div></th>';
    for($i=0;$i<11;$i++)
    {
    echo'<tr><td><input type="radio" name='.$Match_Name.' value='.$first_team[$i].'>';
    echo '<b>'.$first_team[$i].'</b>';
     echo '</td><td><input type="radio" name='.$Match_Name.' value='.$second_team[$i].'>';
    echo '<b>'.$second_team[$i].'</b></td></tr>';
    }
    echo '</table>';
    ?>
<center>
        <select name="Operation">
       <h4><option value="0">No_Run</option>
        <option value="1">Single_Run</option>
        <option value="2">Double_Run</option>
        <option value="3">Tripple_Run</option>
        <option value="15">Wicket</option>
        <option value="4">Four</option>
        <option value="10">Six</option>
        <option value="5">Catch</option>
        <option value="6">RunOut</option>
        <option value="20">Fifty</option>
        <option value="30">Hundred</option></h4>
    </select>
    <div class="alert alert-success"><input type="submit" value="Set" name="sub" class="btn btn-primary"/></div>
</form>
</center>
</div>
</body>
</html>