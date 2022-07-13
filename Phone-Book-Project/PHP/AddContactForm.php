<?php
$ContactAddedSuccessfully=false;
require 'db.php';  
if($_SERVER['REQUEST_METHOD']=='POST')
{

  $name=$_POST['Name'];
  $address=$_POST['Address'];
  $phonenumber=$_POST['PhoneNumber'];
  $email=$_POST['Email'];


  $query = "INSERT INTO contact_info(Name, Address, PhoneNumber, Email) 
       	    	  VALUES ('$name', '$address', '$phonenumber', '$email')";
        $results = mysqli_query($con, $query);
        if($results)
        {
          $ContactAddedSuccessfully=true;
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
    <title>Add A New Contact</title>
</head>
<body>
<?php
if($ContactAddedSuccessfully)
{
  echo '<div class="alert alert-success" role="alert">
  Contact Added Successfully! You Can See The Contact <a href="ContactsPage.php">here</a></div>';
}

?>
<form action="AddContactForm.php" method="POST" class="container mt-5">
<div class="mb-4">
 <label class="form-label">Full Name</label>
 <input type="text"  class="form-control" name="Name"/>
</div>
<div class="mb-4">
 <label class="form-label">Address</label>
 <input type="text"  class="form-control"  name="Address"/>
</div>
<div class="mb-4">
 <label class="form-label">Phone Number</label>
 <input type="text"  class="form-control"  name="PhoneNumber"/>
</div>
<div class="mb-4">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="Email">
</div>
<div class="text-center mt-5">
<button type="submit" class="btn btn-outline-primary" >Add A NEW Contact</button>
</div>
</form>
</body>
</html>