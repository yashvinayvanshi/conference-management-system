<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author Profile</title>
 <link rel="stylesheet" href="../css/admin-logout.css">
</head>
<body>

<!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Admin Page</h1>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/admin-menu.php'); ?>

<!-- Content section -->
<div class="main-content">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
  <div class="wrapper">
    <div class="admin-logout-form">
          <h3 class='text-center'>Are you sure to logout ?</h3>
          <h3 class='text-center'>All progress will be lost if unsaved</h3>
              <form action="" method="POST" class="text-center">
               <br>
              <input type="submit" name="yes" value="yes" id="btn-primary">
              <input type="submit" name="no" value='no' id="btn_primary">
          </form>
    </div>
  </div>
           <br>
          <br>
          <br>
          <br>
          <br>
          <br>
</div>
<!--Temporary links-->
<h6><a href="index.php">Go to Index</a></h6>
<!--Content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>

<?php
 if(isset($_POST['yes']))
 {
  header("location: index.php");
 }
 if(isset($_POST['no']))
 {
  header("location: admin-dashboard.php");
 }

?>