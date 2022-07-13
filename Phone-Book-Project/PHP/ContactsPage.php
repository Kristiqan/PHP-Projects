<?php
  include("Auth-Session.php");
 
  require 'db.php'; 
  $limit = 3;  
 $sql = "SELECT * FROM contact_info ORDER BY id DESC";
 $result = mysqli_query($con, $sql);
 $total_records = mysqli_num_rows($result);
 $total_pages = ceil($total_records / $limit);
 if (!isset ($_GET['page']) ) {  

     $page_number = 1;  

 } else {  

     $page_number = $_GET['page'];  

 }    
 $start = ($page_number - 1) * $limit;
 $getQuery = "SELECT *FROM contact_info LIMIT " . $start . ',' . $limit;  
 $result = mysqli_query($con, $getQuery);
  
 
 $sql = "SELECT * FROM contact_info ORDER BY id DESC LIMIT $start, $limit";
 $result = mysqli_query($con, $sql);





 

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
    <title>ContactsPage</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-end"  style="background-color:#556F7C;">
<ul class="nav">
  <li class="nav-item">
  <a class="navbar-brand  btn btn-light"><?php echo $_SESSION['Username']; ?></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link btn btn-outline-dark" aria-current="page" href="Logout.php">Logout</a>
  </li>
</ul>
</nav>
<?php 
 while($row = mysqli_fetch_assoc($result)) {
	
?>
<section class="container mt-5">
<div class="card">
  <div class="card-header">
    Contact Information
  </div>
  <div class="card-body" style="background-color:#556F7C; color:white;">
        <h4 class="card-title ">Name: <b><?php echo $row["Name"]; ?></b></h4>
        <h6 class="card-text">Address: <?php echo $row["Address"]; ?></h6>
        <p class="card-text fst-italic"> Phone Number: <?php echo $row["PhoneNumber"]; ?></p>
        <h6 class="card-text"> Email Address: <u><?php echo $row["Email"]; ?></u></h6>
        <a href="EditContactForm.php?id=<?php echo $row["id"] ?>" class="btn btn-success">Edit</a>
        <a href="DeleteContact.php?id=<?php echo $row["id"] ?>" class="btn btn btn-danger ">Delete</a>
      </div>
    </div>
</div>
</section>

<?php
	}
	?>
    <section class="container mt-5">
    <div class="nav-links">
		<a class="page-pagination"> <a href = "ContactsPage.php?page=page_number=1 > </a></a>
		<a class="page-pagination"> <a href = "ContactsPage.php?page=<?php if($page_number!=1){echo $page_number-1;}else{echo $page_number;} ?>">Prev </a></a>
		<a class="page-pagination"> <a href = "ContactsPage.php?page=<?php if($page_number!=$total_pages){echo $page_number+1;}else{echo $page_number;} ?>" >Next </a></a>
		<a class="page-pagination"> <a href = "ContactsPage.php?page=<?php echo $total_pages; ?>">Last </a></a>
		</div>
    </section>
<div class="container  d-flex justify-content-center">
<a href="AddContactForm.php" class="btn btn-outline-primary">Add A NEW Contact</a>
</div>
</body>
</html>