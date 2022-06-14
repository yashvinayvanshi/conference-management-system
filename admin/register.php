<!-- working fine -->

<!-- Author : YASH VINAYVANSHI -->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author Registeration</title>
 <link rel="stylesheet" href="../css/register.css">
</head>
<body>
 <!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Author Registration</h1>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/menu.php'); ?>


<!--Content Section-->
<div class="main-content">
  <br>
   <div class="wrapper1">
    <div class="author-registration-form">
      <!--author login form-->
      <h2 class="text-center">Provide your details</h2>
      <br>
      <form action="" method="POST">
        <table class="table-30">
          <!--how to define mandatory fields -->
          <tr>
            <td>Title : </td>
            <td><input type="text" name="title" placeholder="Enter Title" size="35"></td>
          </tr>
          <tr>
            <td>Name : </td>
            <td><input type="text" name="name" placeholder="Enter Name" size="35"></td>
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
            <td><input type="text" name="DOB" placeholder="Enter DOB" size="35"></td>
          </tr> 
          <tr>
            <td>Address : </td>
            <td><input type="text" name="address" placeholder="Enter Address" size="35"></td>
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
            <td><input type="email" name="email" placeholder="Enter Email Id" size="35"></td>
          </tr>
          <tr>
            <td>Set Password : </td>
            <td><input type="password" name="password" placeholder="Enter Password" size="35"></td>
          </tr> 
          <tr>
            <td>Confirm password :  </td>
            <td><input type="password" name="confirmpassword" placeholder="Enter Password again" size="35"></td>
          </tr> 
          <tr>
            <td>Upload Photo : </td>
            <td><input type="file" name="image" id="image" size="35"></td>
          <tr>
          <tr>
            <td>Upload Signature :</td>
            <td><input type="file" name="signature" id="image"></td>
          </tr>
          <tr>
            <td></td>
          </tr>
            <td colspan="2">
              <button type="submit" name="submit" value="login" class="btn-secondary" style="width:auto; height:25px; background-color:grey; color:white; font-size:12px; margin:10px auto; padding:5px;">Register!</button>
            </td>
          </tr>
        </table>
      </form>
    </div>
   </div>
    <!--Author login form ends-->
    <br>
</div>
<!-- content section ends -->

<!--Footer section called-->
<?php include('partials/footer.php'); ?>

</body>
</html>

<?php
  //connect and select database 
  include('../config/constants.php'); 
  if(isset($_POST['submit']))
  {
    echo "User submitted</br>";
    //1. get the data from form
    //echo variables to see if working fine
    echo $title   =$_POST['title'];
    echo $name    =$_POST['name'];
    //qualifications need drop down menu
    //institute of afficiation is to be added in table
    echo $DOB     =$_POST['DOB'];
    echo $address =$_POST['address'];
    //how to input composite attibutes
    echo $email   =$_POST['email'];
    //paddword encryption md5
    echo $password=($_POST['password']);
    echo $confirmpassword=($_POST['confirmpassword']);
    $flag=0;
    if($confirmpassword != $password)
    {
      $message="Passwords does not match";
      alert1($message);
      $flag=1;
    }

    //2. SQL query to save data in database
    //SQL query to save data into database
    //careful of the order in which table columns exist ? NO thats in filesytem
    if(!empty($email) && !empty($password))
    {
       //to check is email is already registered
       $sql0="SELECT * FROM Person WHERE email='$email'";
       //we took Person table not Author table beacuse even a Reviewer cannot register with same mail as author and reviewer are mutually exclusice part of person
       $res0= mysqli_query($conn, $sql0);
       echo $count=mysqli_num_rows($res0);
       //if email not registered already
       if($count==0)
       {
          $sql1="INSERT INTO Person (email, password, title, name, DOB, address) VALUES ('$email', '$password', '$title', '$name', '$DOB', '$address');";
          //data goes into two tables Persons and Author
          //author id has to be made on auto increment so no need to specify it
          $sql2="INSERT INTO Author (email) VALUES ('$email');";

          // Execute query and save data in database
          $res1 = mysqli_query($conn, $sql1);
          $res2 = mysqli_query($conn, $sql2);

          if($res1==TRUE)
          {
            echo "Query for Person Table executed succesfully</br>";
          }
          else
          {
            echo "Query for Person Table not executed successfully</br>";
          }

          if($res2==TRUE)
          {
            echo "Query for Author Table executed succesfully</br>";
          }
          else
          {
            echo "Query for Author Table not executed successfully</br>";
          }

          if($res1==TRUE && $res2==TRUE && $flag==0)
          {
            $message="Author Successfully registered";
            alert($message);
            header("location: author-login.php");
          }
          else
          {
            //failed to register author
            $message="failed to register. Try again later";
            alert1($message);
          }
        }
        else
        {
          $message="Email already registered, use another email";
          alert1($message);
        }
    } 
    else
    {
      $message="Enter valid information";
      alert1($message);
    }
  }
?>
<?php 
function alert($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='author-login.php'</script>";
}
?>
<?php 
function alert1($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='register.php'</script>";
}
?>

