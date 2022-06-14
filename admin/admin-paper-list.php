<!--working fine-->
<!-- Author : YASH VINAYVANSHI-->
<!-- 1. 5619 -->
<!-- reviewers are added by PCchair which is the admin -->
<!-- Authors have to register by themselves -->

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Author's List</title>
 <link rel="stylesheet" href="../css/admin-paper-list.css">
</head>
<body>

<!--Head section-->
<div class="head text-center">
  <div class="wrapper">
    <h1>Author's list</h1>
  </div>
</div>
<!--Head section ends-->

<!--Menu section called-->
<?php include('partials/admin-menu.php'); ?>

<!-- Content section -->
<div class="main-content">
  <div class="wrapper">
    <div class="table-responsive">
     <br>
     <br>
     <br>
     <br>
     <table>
      <thead>
       <tr>
        <th>Paper ID</th>
        <th>Author ID</th>
        <th>Title</th>
        <th>Journal ID</th>
        <th>Category</th>
        <th>Abstract</th>
        <th>View Paper</th>
        <th>Review result</th>
       </tr>
      </thead>
      <tbody>
       <tr>
               <?php
       include('../config/constants.php'); 
       $sql="SELECT * FROM Paper;";
       $res=mysqli_query($conn, $sql);
       $total=mysqli_num_rows($res);
       /*
       $row=mysqli_fetch_assoc($res);
       echo $row['title']." ".$row['name']." ".row['email'];
       */
      while($row=mysqli_fetch_assoc($res))
      {
      ?>
        <td><?php echo $row['paperid']?></td>
        <td><?php 
               $temp=$row['paperid'];
               $sql1="SELECT A.authorid FROM AuthoredBy AS A INNER JOIN Paper AS P ON A.paperid=P.paperid WHERE P.paperid=$temp";
               $res1=mysqli_query($conn, $sql1);
               $row1=mysqli_fetch_assoc($res1);
               echo $row1['authorid'];
        ?></td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['journalid']?></td>
        <td><?php echo $row['category'] ?></td>
        <td><?php echo $row['abstract']?></td>
        <td><?php echo $row['content']?></td>
        <td><input type="submit" value='Pending' name="delete"></td>
       </tr>
       <?php
       }
       ?>
      </tbody>
     </table>
     <br>
     <br>
     <br>
    </div>
      <h2>Subject Categories</h2>
<h4>0 : Algorithms & Data Structures</h4>
<h4>1 : Theory of Computation</h4>
<h4>2 : Digital Logic design</h4>
<h4>3 : Computer organisation & architecture</h4>
<h4>4 : Operating System</h4>
<h4>5 : Compiler Design</h4>
<h4>6 : Computer Networks</h4>
<h4>7 : Artificial Intelligence</h4>
<h4>8 : Discrete Mathematics</h4>
<h4>9 : Computer Graphics</h4>
<h4>10 : Blockchain</h4>
<h4>11 : Cryptography</h4>
<h4>12 : Cyber Security</h4>
<h4>13 : Software Engineering</h4>
<h4>14 : Quantum Computing</h4>
<h4>15 : Databasing & Data Warehousing</h4>
<h4>16 : Machine Learning</h4>
<h4>17 : Digital Image processing</h4>
<h4>18 : Big data</h4>
<h4>19 : Electronics</h4>
<h4>20 : Others</h4>
  </div>
</div>


<!--Temporary links-->
<!--<h6><a href="index.php">Go to Index</a></h6>-->
<!--Content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>