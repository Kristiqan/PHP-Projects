<?php
   
  $InvalidLogin = false;

   require 'db.php';  
   session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
   
   $username=$_POST['Username'];
   $password=$_POST['Password'];
   


    $sql_u = "SELECT * FROM registration WHERE Username='$username'";
  	$sql_e = "SELECT * FROM registration WHERE Password='$password'";
  	$res_u = mysqli_query($con, $sql_u);
  	$res_e = mysqli_query($con, $sql_e);

  	if (mysqli_num_rows($res_u) == 1 && mysqli_num_rows($res_e) == 1) {
      
      $_SESSION["Username"] = $username;
     
      header("Location: ContactsPage.php");
  	}else{
  	  $InvalidLogin = true;
  	}
    
  	
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Css/styles.css">
    <title>Login Form</title>
</head>
<body>
<form action="LoginForm.php" method="POST" class="vh-100" style="background-image: url('../img/LogBackground.jpg');">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Please Login</h3>

            <div class="form-outline mb-4">
              <label class="form-label" for="typeEmailX-2">Username</label>
              <input type="text"  class="form-control form-control-lg"  name="Username"/>
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="typePasswordX-2">Password</label>
              <input type="password"  class="form-control form-control-lg" name="Password" />
            </div>
            <button class="btn btn-secondary btn-lg btn-block" type="submit">Login</button>
            <?php
            if($InvalidLogin)
              {
               echo '<div class="alert alert-danger mt-5" role="alert">
               Invalid Login!
               </div>';
              }
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>