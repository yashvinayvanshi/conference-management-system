<!-- Author : YASH VINAYVANSHI-->
<!-- 1. 5619 -->
<!-- reviewers are added by PCchair which is the admin -->
<!-- Authors have to register by themselves -->
<?php session_start();
//if not added at top session doesnt work
//not putting ; or { } renders php page blank
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author Profile</title>
 <link rel="stylesheet" href="../css/author-edit-profile.css">
</head>
<body>

<!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Author Edit Profile</h1>
    <h3><?php echo $_SESSION['authortitle']." ".$_SESSION['authorname'];?></h3>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/author-menu.php'); ?>

<!-- Content section -->
<div class="main-content">
  <div class="wrapper1">
     <div class="change-password-form">
         <br>
          <h3 class='text-center'>Change Password</h3>
          <br>
          <form action="" method="POST" class="text-center">
              Current password 
              <br>
              <input type="text" name="currentpassword" placeholder="Enter current password">
              <br><br>
              New password
              <br>
              <input type="text" name="newpassword" placeholder="Enter new Password">
              <br><br>
              Confirm Password
              <br>
              <input type="text" name="confirmpassword" placeholder="Enter confirmed Password">
              <br><br>
              <input type="submit" name="change" value="change" id="btn-primary">
          </form>
          <br>
     </div>
     <h1>OR</h1>
    <div class="edit-profile-form">
      <br>
      <h3 class="text-center">Change all details</h3>
      <br>
      <form action="" method="POST">
        <table class="table-30">
          <!--how to define mandatory fields -->
          <tr>
            <td>Title : </td>
            <td><input type="text" name="title" placeholder="Enter Title"></td>
          </tr>
          <tr>
            <td>Name : </td>
            <td><input type="text" name="name" placeholder="Enter Name"></td>
          </tr> 
          <!-- May be make a drop down menu here -->
          <!--
          <tr>
            <td>Qualifications : </td>
            <td><input type="text" name="qualification" placeholder=""></td>
          </tr>
          -->
          <!-- if jamia click button -->
          <!-- else type the institute name --> 
          <!--
          <tr>
            <td>Institute of affiliation : </td>
            <td><input type="text" name="Institute" placeholder="Enter Email"></td>
          </tr> 
          -->
          <!-- May be add a calender here -->
          <tr>
            <td>DOB : </td>
            <td><input type="text" name="DOB" placeholder="Enter DOB"></td>
          </tr> 
          <tr>
            <td>Address : </td>
            <td><input type="text" name="address" placeholder="Enter Address"></td>
          </tr> 
          <!--Have to take multiple phone numbers-->
          <!--
          <tr>
            <td>Phone numbers : </td>
            <td><input type="text" name="Phone" placeholder="Enter Phone No."></td>
          </tr>  
          -->
          <tr>
            <td>Email : </td>
            <td><input type="email" name="email" placeholder="Enter Email Id"></td>
          </tr>
          <tr>
            <td>Set Password : </td>
            <td><input type="password" name="password" placeholder="Enter Password"></td>
          </tr> 
          <tr>
            <td>Confirm password :  </td>
            <td><input type="password" name="confirmpassword" placeholder="Enter Password again"></td>
          </tr> 
          <!--
          <tr>
            <td>Upload image : </td>
            <td><input type="file" name="image" id="image"></td>
          <tr>
          -->
        </table>
        <br>

        <input type="submit" name="update" value="Update" class="btn-secondary"></input>
      </form>
    </div>
  </div>
  <h3 class="text-center">NOTE</h3>
  <h4 class="text-center">It is Recommended to keep a strong password : </h4>
  <h5 class="text-center">1. At least 8 characters in length</h5>
  <h5 class="text-center">2. AlphaNumeric U & L alphabets</h5>
  <h5 class="text-center">3. Must contain Special Symbols</h5>
  <h5 class="text-center">4. Not in some Natural Sequence</h5>
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
  //can always use echo to check is variables get the value
  $email=$_SESSION['authoremail'];
  if(isset($_POST['change']))
  {
    echo "1";
    echo $currentpassword=$_POST['currentpassword'];
    echo $newpassword=$_POST['newpassword'];
    echo $confirmpassword=$_POST['confirmpassword'];

    $sql0="SELECT password FROM Person WHERE email='$email';";
    $res0=mysqli_query($conn, $sql0);
    echo $count=mysqli_num_rows($res0);
    if($count > 0)
    {
      $row=mysqli_fetch_array($res0);
      echo $temp = $row['password'];
    }
    if($currentpassword==$temp)
    {
      if($confirmpassword==$newpassword)
      {
        //email of an author and reviewer cannot be same, as they are mutually exclusive
        //and there is check in register section that avoids duplication of same mail ids to begin with
        $sql1="UPDATE Person SET password='$newpassword' WHERE email='$email';";
        $res1=mysqli_query($conn, $sql1);
        if($res1==TRUE)
        { 
          $message1="password changed successfully";
          alert1($message1);
        }
        else
        {
          $message2="password not changed. try again later";
          alert($message2);
        }
      }
      else
      {
        $message3="new passwords does not match";
        alert($message3);
      }
    }
    else
    {
      $message4="current password incorrect";
      alert($message4);
    }
  }
  if(isset($_POST['update']))
  {
    $message5='this feature is not functional yet';
    alert($message5);
  }
?>
<?php 
function alert($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='author-edit-profile.php'</script>";
}
?>
<?php 
function alert1($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='author-login.php'</script>";
}
?>