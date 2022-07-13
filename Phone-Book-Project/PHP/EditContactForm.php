<?php

  require 'db.php'; 
 
 if(count($_POST)>0) {
    $id = $_POST['id'];
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $phonenumber = $_POST['PhoneNumber'];
    $email = $_POST['Email'];
    $query = "UPDATE contact_info SET Name='$name', Address='$address', PhoneNumber='$phonenumber', Email='$email' WHERE id='$id'";
    $query_run = mysqli_query($con,$query);
    if($query_run) {
        header("Location:ContactsPage.php");
    }
 }
 
 

  $sql = "SELECT * FROM contact_info";
  $result=mysqli_query($con,"SELECT id, Name, Address, PhoneNumber , Email  FROM contact_info WHERE id=". $_GET['id'] ."");
  $row=mysqli_fetch_array($result);
 
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
    <title>Edit Contact</title>
</head>
<body>
<form action="" method="POST" class="container mt-5">
<div class="mb-4">
<input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?> />
 <label class="form-label">Full Name</label>
 <input type="text"  class="form-control" value="<?php echo isset($row['Name']) ? $row['Name'] : '';?>" name="Name"/>
</div>
<div class="mb-4">
 <label class="form-label">Address</label>
 <input type="text"  class="form-control" value="<?php echo isset($row['Address']) ? $row['Address'] : '';?>" name="Address"/>
</div>
<div class="mb-4">
 <label class="form-label">Phone Number</label>
 <input type="text"  class="form-control" value="<?php echo isset($row['PhoneNumber']) ? $row['PhoneNumber'] : '';?>"  name="PhoneNumber"/>
</div>
<div class="mb-4">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo isset($row['Email']) ? $row['Email'] : '';?>" name="Email">
</div>
<div class="text-center mt-5">
<button type="submit" class="btn btn-outline-primary" >Edit Contact</button>
</div>
</form>
</body>
</html>