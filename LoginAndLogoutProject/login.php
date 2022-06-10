<?php
session_start();

// refactor the code :
// user must provide USERNAME and PASSWORD - done
// we check USERNAME == 'admin' and PASSWORD == 'secret' - done
// if match -> login succsefull - done 
// save login infromation into session array - done
// else -> show login form - done
// extra* -> show wrong user/pass msg - done

        if(isset($_POST['Submit'])){
            
            $logins = array('admin' => 'secret');
            
        
            $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
            $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
            
                       
            if (isset($logins[$Username]) && $logins[$Username] == $Password){
                    $_SESSION['UserData']['Username']=$logins[$Username];
                    header("location:index.php");
                    exit;
            } else {
                    
                    $msg="<span style='color:red'>Wrong Username or Password</span>";
            }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
  <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
</form>
</body>
</html>