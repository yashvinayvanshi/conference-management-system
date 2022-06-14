<!-- working fine -->
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
    <h1>Author Delete account</h1>
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
  <div class="wrapper1">
    <div class="author-logout-form">
          <h3 class='text-center'>Are you sure to Delete Your Account and exit participation in conference ?</h3>
          <h3 class='text-center'>All your content will be deleted.</h3>
              <form action="" method="POST" class="text-center">
               <br>
              <input type="submit" name="no" value='no' id="btn_primary">
              <input type="submit" name="yes" value="yes" id="btn-primary">
              <br>
              <h4>Enter 4 + 7 : </h4>
              <input type="text" name="confirm" id="confirm">
          </form>
    </div>
  </div>
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
 include('../config/constants.php'); 
 $email=$_SESSION['authoremail'];
 $authorid=$_SESSION['authorid'];
 if(isset($_POST['yes']))
 {
   //echo "1";
   $confirm=$_POST['confirm'];
   if($confirm==11)
   {
     //echo "2";
     //data from four tables Person, Author, Paper, Authoredby  need to be deleted
     $sql0="DELETE FROM Person WHERE email='$email';";
     $res0=mysqli_query($conn, $sql0);
     $sql1="DELETE FROM Author WHERE authorid=$authorid;";
     $res1=mysqli_query($conn, $sql1);
     //there is slight mistake in Paper table where Authorid should not be in paper but in AuthorBy table. The below query will have to be rewritten.
     $sql2="DELETE FROM Paper WHERE authorid=$authorid;";
     $res2=mysqli_query($conn, $sql2);
     $sql3="DELETE FROM AuthoredBy WHERE authorid=$authorid;";
     $res3=mysqli_query($conn, $sql3);
     if($res0==TRUE&&$res1==TRUE&&$res2==TRUE&&$res3==TRUE)
     {
       $message1="Account Deleted Successfully";
       session_unset();
       alert1($message1);
       //delete all variables related to this session as author logs out
       //PHP Documentation says destroy_session is not used in usual code
     }
     else
     {
       $message2="Account not deleted succesfully. Please try again later";
       alert($message2);
     }
   }
   else
   {
    alert("Enter Valid sum");
   }
 }
 if(isset($_POST['no']))
 {
  echo "2";
  //header("location: author-profile.php");
 }
?>
<?php 
function alert($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='author-delete-account.php'</script>";
}
?>
<?php 
function alert1($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='index.php'</script>";
}
?>