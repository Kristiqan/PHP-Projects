<?php
$SuccessfulReg=false;
$UserExists=false;
$PasswordExists=false;

require 'db.php'; 

if($_SERVER['REQUEST_METHOD']=='POST')
{
  
   
   $username=$_POST['Username'];
   $password=$_POST['Password'];

    
    $sql_u = "SELECT * FROM registration WHERE Username='$username'";
  	$sql_e = "SELECT * FROM registration WHERE Password='$password'";
  	$res_u = mysqli_query($con, $sql_u);
  	$res_e = mysqli_query($con, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $UserExists=1;	
  	}else if(mysqli_num_rows($res_e) > 0){
      $PasswordExists=1;
  	}else{
           $query = "INSERT INTO registration(Username, Password) 
      	    	  VALUES ('$username', '$password')";
           $results = mysqli_query($con, $query);
           if($results)
           {
                $SuccessfulReg=true;
           }
          
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
    <title>Registration Form</title>
</head>
<body>
<section class="text-center">
  <div class="p-5 bg-image" style="
        background-image: url('../img/RegBanner.jpg');
        height: 300px;
        "></div>
  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Register Now</h2>
          <form action="RegistrationForm.php" method="POST">
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Username</label>
              <input type="text"  class="form-control" name="Username" />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Password</label>
              <input type="password"  class="form-control" name="Password" />
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4"> Register</button>
            <?php
            if($UserExists)
           {
            echo '<div class="alert alert-danger" role="alert">
            User Already Exists!
            </div>';
           }
           
           if($SuccessfulReg)
           {
             echo '<div class="alert alert-success" role="alert">
             Registration Successful! You can login from <a href="LoginForm.php">here</a>
             </div>';
           }
          
           if($PasswordExists)
           {
             echo '<div class="alert alert-danger" role="alert">
             Email Already Exists!
             </div>';
           }
           ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>