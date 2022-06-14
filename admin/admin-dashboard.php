<!--working fine-->

<!-- Author : YASH VINAYVANSHI-->
<!-- 1. 5619 -->
<!-- reviewers are added by PCchair which is the admin -->
<!-- Authors have to register by themselves -->
<?php
  include('../config/constants.php'); 
  $sql1="SELECT * FROM Conference;";
  $res1=mysqli_query($conn, $sql1);
  while($row1=mysqli_fetch_assoc($res1))
  {
    $confname=$row1['confname'];
    $confdate=$row1['date'];
    $confplace=$row1['place'];
    $conftopic=$row1['topic'];
  }
  $sql2="SELECT * FROM Author;";
  $res2=mysqli_query($conn, $sql2);
  $authorcount=mysqli_num_rows($res2);

  $sql3="SELECT * FROM Reviewer;";
  $res3=mysqli_query($conn, $sql3);
  $reviwercount=mysqli_num_rows($res3);

  $sql4="SELECT * FROM Paper;";
  $res4=mysqli_query($conn, $sql4);
  $papercount=mysqli_num_rows($res4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author Profile</title>
 <link rel="stylesheet" href="../css/admin-dashboard.css">
</head>
<body>

<!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Admin Dashboard</h1>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/admin-menu.php'); ?>

<!-- Content section -->
<div class="main-content">
  <div class="wrapper">
    <div class="Details">

      <h1>Welcome Admin!</h1>
      <br>
      <br>
      <h2>Conference Details</h2>
      <h3>Conference name : <?php echo $confname; ?></h3>
      <h3>Conference date : <?php echo $confdate; ?></h3>
      <h3>Conference place : <?php echo $confplace; ?></h3>
      <h3>Conference Topic : <?php echo $conftopic; ?></h3>
      <br>
      <br>
      <h2>Participation status</h2>
      <h3>No. Of authors : <?php echo $authorcount; ?></h3>
      <h3>No. Of reviewers : <?php echo $reviwercount; ?></h3>
      <h3>No. of papers submited : <?php echo $papercount; ?></h3>
      <br>
      <br>
      <h2>Progress details</h2>
      <h3>No. of papers reviewed :</h3>
      <h3>No. of papers approved :</h3>
      <br>
      <br>
      <br>
    </div>
  </div>
</div>
<!--Temporary links-->
<!--<h6><a href="index.php">Go to Index</a></h6>-->
<!--Content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>
