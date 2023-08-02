<html>
<?php
 include 'session.php' ?>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="table.css" media="screen" type="text/css" />
 </head>
 <body>
 <a href="logout.php">logout</a>
 <a href="cancel.php">cancel slots</a>
 <a href="dashboard.php">dashboard</a>
 <?php
 $con=mysqli_connect("localhost","root","","ground");
 if(!$con)
 {
 die('connection failed');
 }
 else{
 $query="select * from admin where accept='enable'";
 $result=mysqli_query($con,$query);
 if(mysqli_num_rows($result) > 0){
 header("location:book.php");
 }
else{
echo '<h1> SORRY WE ARE CURRENTLY NOT ACCEPTING BOOKINGS</h1>';
 } }
?>
 </body>
</html> 