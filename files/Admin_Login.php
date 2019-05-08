<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Panel</title>
            <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" type="text/css" >
          <script type="text/javascript" src="/bootstrap/js/jquery-3.3.1.min.js"></script>
          <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body bgcolor="">
        <div align="center" style="font-size: larger" class="well">Admin Login Panel</div><hr/>
        <div align="center">
            <form action="Admin_Portal.php?value=yes">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>Admin username:</td>
                        <td><input type="text" name="uname" maxlength="10" minlength="5" required/></td>
                    </tr>
                    <tr>
                        <td>Admin Password:</td>
                        <td><input type="password" name="pass" maxlength="15"  minlength="6"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><center><input class="btn btn-toolbar" type="submit" value="Go" name="sub"/></center></td>
                    </tr>
                </table>
             </form>
        </div>
        
    </body>
</html>

