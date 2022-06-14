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
 <link rel="stylesheet" href="../css/admin-author-list.css">
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
        <th>Author Id</th>
        <th>title </th>
        <th>name </th>
        <th>email id</th>
        <th>DOB </th>
        <th>Address</th>
        <th>Operation</th>
       </tr>
      </thead>
      <tbody>
       <tr>
               <?php
       include('../config/constants.php'); 
       $sql="SELECT * FROM Person";
       $res=mysqli_query($conn, $sql);
       $total=mysqli_num_rows($res);
       /*
       $row=mysqli_fetch_assoc($res);
       echo $row['title']." ".$row['name']." ".row['email'];
       */
      while($row=mysqli_fetch_assoc($res))
      {
      ?>
        <td><?php echo"#"?></td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['DOB'] ?></td>
        <td><?php echo $row['address']?></td>
        <td><input type="submit" value='remove' name="delete"></td>
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
  </div>
</div>
<!--Temporary links-->
<!--<h6><a href="index.php">Go to Index</a></h6>-->
<!--Content section ends -->

<!--Footer section called-->
<?php include('partials/author-footer.php'); ?>

</body>
</html>
<!--
       include('../config/constants.php'); 
       $sql="SELECT * FROM Person";
       $res=mysqli_query($conn, $sql);
       $total=mysqli_num_rows($res);
       /*
       $row=mysqli_fetch_assoc($res);
       echo $row['title']." ".$row['name']." ".row['email'];
       */
      while($row=mysqli_fetch_assoc($res))
      {
       printf("%s %s %s", $row["title"], $row["name"], $row["email"]);
       echo "<br/>";
      }
      ?>
-->