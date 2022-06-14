<!-- Author : YASH VINAYVANSHI-->

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Reviewer login</title>
 <link rel="stylesheet" href="../css/reviewerlogin.css">
</head>
<body>
 <!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Reviewer Login</h1>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/menu.php'); ?>

<!--Content Section-->
<div class="main-content">
   <div class="wrapper">

    <!--reviewer login form-->
    <div class="reviewer-login-form">
      <h2 class="text-center">Reviewer login</h2>
      <br>
      <form action="" method="POST" class="text-center">
            Email<br>
            <input type="text" name="email id" placeholder="Enter Email">
            <br><br>
            Password <br>
            <input type="password" name="password" placeholder="Enter Password">
            <br><br>
            <input type="submit" name="submit" value="login" id="btn-primary">
      </form>
    </div>
    <!--Reviewer login form ends-->


    <br><br>
    <!--Notification corner-->
    <div class="Notification">
    <h2> Notifications & Instructions & Rules</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat accusamus doloremque repudiandae ipsum ab asperiores totam fuga, alias, voluptatem mollitia id accusantium eum qui esse, optio rem quod quam atque?</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam enim, voluptas consectetur, incidunt commodi laborum nam iste fugiat qui, obcaecati debitis harum dolores soluta? Reprehenderit laborum distinctio sapiente similique quibusdam.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores obcaecati odit earum ullam dolor dolore inventore molestias veritatis temporibus ad necessitatibus, explicabo et assumenda placeat ea, iusto, aspernatur aperiam rerum?</p>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium qui totam repudiandae dolorum dignissimos amet, quisquam quasi voluptates esse fuga.</p>
    </div>
    <!--notifocation section ends-->
  </div>
 </div>
<!--Content Section ends -->

<!--Footer section called-->
<?php include('partials/footer.php'); ?>
 
</body>
</html>

<?php 

//connect and select database 
include('../config/constants.php'); 

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
  //process for login
  //1. Get the data from login form
  $email = $_POST['email'];
  $password = $_POST['password'];

  //2.SQL to check whether the user with username and password exists or not
  $sql="SELECT * FROM Person WHERE email='$email' AND password='$password'";

  //3.execute the query 
  $res=mysqli_query($conn, $sql);

  //4.Count rows to check whether user exists or not
  $count = mysqli_num_rows($res);

  //there is atleast one user
  if($count==1)
  {
    //user Available : Login success
  }
  else
  {
    //user not available
  }
}





?>
