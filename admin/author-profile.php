<!--working fine -->

<!-- Author : YASH VINAYVANSHI-->
<!-- reviewers are added by PCchair which is the admin -->
<!-- Authors have to register by themselves -->
<?php
  session_start();
  include('../config/constants.php'); 
  //can always use echo to check is variables get the value
  $email=$_SESSION['authoremail'];
  $sql = "SELECT * FROM Person WHERE email='$email';";
  $res = mysqli_query($conn, $sql);
  $count=mysqli_num_rows($res);
  if($count > 0)
  {
    while($row=mysqli_fetch_assoc($res))
    {
      $title = $row['title'];
      $name = $row['name'];
      $address = $row['address'];
      $DOB = $row['DOB'];
    }
  }
  $_SESSION['authortitle']=$title;
  $_SESSION['authorname']=$name;

  $sql1="SELECT authorid FROM Author WHERE email='$email';";
  $res1=mysqli_query($conn, $sql1);
  $count1=mysqli_num_rows($res1);
  if($count1>0)
  {
    while($row1=mysqli_fetch_assoc($res1))
    {
      $authorid=$row1['authorid'];
    }
  }
  $_SESSION['authorid']=$authorid;
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author Profile</title>
 <link rel="stylesheet" href="../css/author-profile.css">
</head>
<body>

<!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Author Profile</h1>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/author-menu.php'); ?>

<!-- Content section -->
<div class="main-content">
  <div class="wrapper">
    <div class="Details">

      <h1>Welcome Author!</h1>
      <br>
      <br>
      <!--Display author photo as well if taken-->
      <h2>Your Name : <?php echo "$title"." "."$name";?></h2>
      <h2>Your Author Id : <?php echo "$authorid";?></h2>
      <h3>Your Email : <?php echo "$email";?></h3>
      <h3>Your Address : <?php echo "$address";?></h3>
      <h3>Your DOB : <?php echo "$DOB";?></h3>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
</div>
<!--Temporary links-->
<!-- <h6><a href="index.php">Go to Index</a></h6> -->

<!--Content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>

