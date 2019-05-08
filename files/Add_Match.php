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
    <body align="center">
        <div class="container">
            <div class="well">
                <h2>Admin,ADD Players</h2>
            </div>
        <?php 
            if(filter_input(INPUT_GET, "Sub1") == "Finalize")
            {
                $Team1 = filter_input(INPUT_GET, 'Team1');
                $Team2 = filter_input(INPUT_GET, 'Team2');
                $Match_Name = $Team1.'Vs'.$Team2;
                //echo $Match_Name;
                //echo '<center>';
                echo   '<form action="Add_Match_Confirm.php">';
                echo '<div style="float:left"><table border="3" class="table"><th>'.$Team1.' Players</th>';
                for($i=1;$i<=4;$i++) 
                {
                    echo '<tr><td>Bat '.$i.'::<input type="text" name="Bat'.$i.'"required></td></tr>';
                }
                echo '<tr><td>WK 1::<input type="text" name="WK1" required></td></tr>';
                for($i=1;$i<=4;$i++)
                {
                        echo '<tr><td>Bow '.$i.'::<input type="text" name="Bow'.$i.'"required></td></tr>';
                }
                for($i=1;$i<=2;$i++)
                {
                        echo '<tr><td>All '.$i.'::<input type="text" name="All'.$i.'"required></td></tr>';
                }
                    echo '</table></div>';
                    
                    echo '<div style="float:left;padding-left:100px">';
                    
                echo'<table border="3" class="table table-hover"><th>'.$Team2.' Players</th>';
                for($i=6;$i<=9;$i++)    
                {
                    echo '<tr><td>Bat '.$i.'::<input type="text" name="Bat'.$i.'"required></td></tr>';
                    }
                   echo '<tr><td>WK 2::<input type="text" name="WK2" required></td></tr>';
                 for($i=5;$i<=8;$i++){
                        echo '<tr><td>Bow '.$i.'::<input type="text" name="Bow'.$i.'"required></td></tr>';
                    }
                   for($i=3;$i<=4;$i++){
                        echo '<tr><td>All '.$i.'::<input type="text" name="All'.$i.'"required></td></tr>';
                    }
                    echo'</table>';
                    
                    echo '</div></center>';
                    echo '<div style="padding-top:540px;padding-left:250px">';
                    echo ' <input class="btn btn-success" type="submit" name="Sub2" Value="Go"/></div>';
                    echo '</form><br/>';
                    setcookie('MatchName',$Match_Name);
        }
 else {
        ?>
            <center><div class="well">NAME CONVENTION AS PER TEAM::</div></center><hr/>
            <table align="center" border="3" class="table table-hover">
            <tr>
                <td>India -- IND</td><td>NewZealand -- NZ</td><td>Austraila -- AUS</td>
                <td>SouthAfrica -- RSA</td><td>England -- ENG</td>
            </tr>
            <tr>
                <td>SriLanka -- SL</td><td>Bangladesh -- BAN</td><td>Windies -- WI</td>
                <td>Netherlands --NL</td><td>Ireland -- IR</td>
            </tr>
        </table><hr/>
        <form action="">
            <table border="3" align="center" class="table table-hover">
                <tr>
                    <td>Enter Team 1:</td>
                    <td><input type="text" name="Team1" required></td>
                </tr>
                <tr>
                    <td>Enter Team 2:</td>
                    <td><input type="text" name="Team2" required></td>
                </tr>
                <tr>
                    <td colspan="2"><center>
                    <input class="btn btn-success" type="submit" name="Sub1" value="Finalize"/></center></td>
                </tr>
            </table>
        </form>
 <?php } ?> 
        </div>
    </body>
</html>