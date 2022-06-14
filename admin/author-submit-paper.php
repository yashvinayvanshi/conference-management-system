<!--working fine-->
<!-- Author : YASH VINAYVANSHI -->
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
 <title>Author Registeration</title>
 <link rel="stylesheet" href="../css/author-submit-paper.css">
</head>
<body>
 <!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Author Submit Paper</h1>
        <h3><?php echo $_SESSION['authortitle']." ".$_SESSION['authorname'];?></h3>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/author-menu.php'); ?>


<!--Content Section-->
<div class="main-content">
   <div class="wrapper">
    <div class="paper-submit-form">
      <!--author login form-->
      <h2>Provide Paper details</h2>
      <br>
      <form action="" method="POST">
        <table class="table-30">
          <!--how to define mandatory fields -->
          <tr>
            <td>Title</td>
            <td><textarea name="title" id="title" cols="150" rows="2"></textarea></td>
          </tr>
          <tr>
            <td>Journal ID</td>
            <td><input type="text" name="journalid" id="journalid" style="width:500px; height:20px;"></input></td>
          </tr>
          <tr>
            <td>Category</td>
            <td><select name="category" id="category" style="width:500px; height:15px; margin:5px 5px;">
              <option value="0">Algorithms & Data Structures</option>
              <option value="1">Theory of Computation</option>
              <option value="2">Digital Logic Design</option>
              <option value="3">Computer organisation & architecture</option>
              <option value="4">Operating System</option>
              <option value="5">Compiler Design</option>
              <option value="6">Computer Networks</option>
              <option value="7">Artificial Intelligence</option>
              <option value="8">Discrete Mathematics</option>
              <option value="9">Computer Graphics</option>
              <option value="10">Blockchain</option>
              <option value="11">Cryptography</option>
              <option value="12">Cyber Security</option>
              <option value="13">Software Engineering</option>
              <option value="14">Quantum Computing</option>
              <option value="15">Databasing & Data Warehousing</option>
              <option value="16">Machine learning</option>
              <option value="17">Digital Image processing</option>
              <option value="18">Big Data</option>
              <option value="19">Electronics</option>
              <option value="20">Others</option>
            </select></td>
          </tr> 
          <!--
          <tr>
            <td>Authorid : </td>
            <td><input type="text" name="DOB" placeholder="Enter DOB" size="30"></td>
          </tr> 
          <tr>
            <td>Author name: </td>
            <td><input type="text" name="address" placeholder="Enter Address" size="30"></td>
          </tr> 
          -->
          <tr>
            <td>Abstract</td>
            <td><textarea name="abstract" id="abstract" cols="150" rows="20"></textarea></td>
          </tr> 
          <tr>
            <td>Upload paper : </td>
            <td><input type="file" name="file" id="file"></td>
          <tr>
            <td colspan="2">
              <button type="submit" name="submit" value="login" class="btn-secondary" style= "width:auto; height:30px; background-color:#1D71F2; margin:10px auto; font-size:15px; padding:5px; color:white;">Submit Paper</button>
            </td>
          </tr>
        </table>
      </form>
    </div>
   </div>
</div>
<!--Author login form ends-->
    
<!-- content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>

<?php 
//connect and select database 
include('../config/constants.php'); 

//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
  echo $authorid=$_SESSION['authorid'];
  echo $title=$_POST['title'];
  echo $journalid=$_POST['journalid'];
  echo $category=$_POST['category'];
  echo $abstract=$_POST['abstract'];
  echo $content=$_POST['file'];

  if(!empty($title) && !empty($journalid))
  { 
    $sql="INSERT INTO Paper(journalid, abstract, category, title, authorid, content) VALUES ('$journalid', '$abstract', $category, '$title', $authorid, '$content');";
    $res = mysqli_query($conn, $sql);
    /*
    $stmt = mysqli_prepare($conn, "INSERT INTO Paper (journalid, abstract, category, title, authorid, content) VALUES(?, ?, ?, ?, ?, ?);");
    mysqli_stmt_bind_param($stmt, "ssisib", $journalid, $abstract, $category, $title, $authorid, $content);
    $res=mysqli_stmt_execute($stmt);
    */
    /* 
    SQl insert query does not execute when
    Possible causes

    The user does not have insert / update permission on the table
    One or more column(s) specified in the insert query is not present in the table
    One or more column(s) have incorrect data type
    You have syntax error in MySQL query
    You have connection issue
    */
    if($res==TRUE)
    {
      $sql1="SELECT paperid FROM Paper WHERE title='$title';";
      $res1=mysqli_query($conn, $sql1);
      while($row=mysqli_fetch_assoc($res1))
      {
       $paperid=$row['paperid'];
      } 

      $sql2="INSERT INTO AuthoredBy VALUES ($paperid, $authorid);";
      $res2=mysqli_query($conn, $sql2);

      $message="Paper Successfully submitted for reviewal";
      alert($message);
    }
    else
    {
      $message1="Paper not submitted for reviewal. Please try again later.";
      alert($message1);
    }
  }
  else
  {
    $message2="Enter Valid information";
    alert($message2);
  }
}
?>
<?php 
function alert($message)
{
  echo "<script type='text/javascript'>
  alert('$message');
  window.location.href='author-submit-paper.php'</script>";
}
?>