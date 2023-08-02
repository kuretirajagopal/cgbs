<html>
<?php include 'session.php' ?>
<head>
<link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
<link rel="stylesheet" href="table.css" media="screen" type="text/css" />
</head>
<body>
<a href="logout.php">logout</a>
<a href="admin_dashboard.php">dashboard</a>
<div class="form">
<form action="enable_book.php" method="post">
<h3> ENABLE OR DISABLE BOOKINGS</h3>
<select name="mode" required>
<option>select</option>
<option value="enable">enable</option>
<option value="disable">disable</option>
</select>
PASSWORD <input type="password" name="password" placeholder="admin password"
required>
<button>submit</button>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $mode=$_POST["mode"];
 $password=$_POST["password"];
 $email=$_SESSION["email"];
 $con=mysqli_connect("localhost","root","","ground");
 if(!$con)
{
 die('connection failed');
}
else{
$query="select * from admin where email='$email' and password='$password'";
 $result=mysqli_query($con,$query);
 if(mysqli_num_rows($result) == 1 ){
 $q="update admin set accept='$mode'";
 $res=mysqli_query($con,$q);
 if($res == 1)
 {
 echo '<h1>successful</h1>';
 }
 else {
 echo '<h1> failed</h1>';
}}
else{
 echo '<h1>wrong password</h1>';
}
}}
?>
</div>
</body>
</html> 
