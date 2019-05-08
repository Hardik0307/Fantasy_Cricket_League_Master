<div id="NEW" style="position: fixed"><br/><br/>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
            <div class="container">
                <div class="navbar navbar-left">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <div style="float: left"> <img src="Images/logo.jpg"  width="10%" height="10%"class="img-rounded" alt="Logo"> 
                    </div>   <?php
                    if(!isset($_COOKIE['New'])){
                        echo '<font color="white"><h3>Welcome Guest</h3></font>';
                    }
                    else{
                        echo '<font color="white"><h3>Welcome  ' .$_COOKIE['New']. '</H3></font>';
                    }
                    ?>
                    
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                      <?php 
                        if(!isset($_COOKIE['New']))
                        {  
                            echo '<li><a href="Login.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                            echo '<li><a href="Reg.php" target="_blank"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                        }
                        else
                        {
                            echo'<li><a href="Logout.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                            echo '<li><a href="Profile.php" "><span class="glyphicon glyphicon-user"></span>Profile</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
    </div>
</nav><br/></div><br/><br/>
