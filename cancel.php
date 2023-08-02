<html>
<?php include 'session.php' ?>
<head>
<link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="table.css" media="screen" type="text/css" />
</head>
<body>
<a href="logout.php">logout</a>
<div class="form">
<form action="cancel.php" method="post">
<h3>Enter booking id to cancel</h3> <input type="text" name="bookid" required
><br><br>
<h3>Enter Slot Date To Cancel</h3><input type="text" name="date" required><br><br>
<button>submit</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email=$_SESSION["email"];
$bid=$_POST["bookid"];
$date=$_POST["date"];
$con=mysqli_connect("localhost","root","","ground");
 if(!$con)
{
 die('connection failed');
}
$query = "select * from book where bid='$bid' and email='$email' and slot_date='$date'";
$res=mysqli_query($con,$query);
if(mysqli_num_rows($res) > 0 )
{
 $q="delete from book where bid=$bid";
$q1="INSERT INTO cancel values('$bid','$date','$email')";
$result1=mysqli_query($con,$q1);
 $result=mysqli_query($con,$q);
 if($result == 1){
 header("location:dashboard.php");
 }
 else{
 echo '<h1>failed to cancel<h1>';
 echo '<br>';
 }
}
else{
 echo '<h1> enter a valid booking id and date </h1>';
 echo '<br>';
}
}
?>
</div>
<body>
</html>