<!--author : YASH VINAYVANSHI -->
 <?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author Profile</title>
 <link rel="stylesheet" href="../css/author-logout.css">
</head>
<body>

<!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Author Logout</h1>
    <h3><?php echo $_SESSION['authortitle']." ".$_SESSION['authorname'];?></h3>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/author-menu.php'); ?>

<!-- Content section -->
<div class="main-content">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
  <div class="wrapper">
    <div class="author-logout-form">
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
<!--<h6><a href="index.php">Go to Index</a></h6>-->

<!--Content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>

<?php
 if(isset($_POST['yes']))
 {
  header("location: index.php");
  //delete all variables related to this session as author logs out
  session_unset();
  //PHP Documentation says destroy_session is not used in usual code
 }
 if(isset($_POST['no']))
 {
  header("location: author-profile.php");
 }

?>