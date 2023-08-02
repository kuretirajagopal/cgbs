<html>
<?php
session_start()?>
<head>
<title>admin</title>
<link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
</head>
<body>
<div class="login-page">
<h2>ADMIN LOGIN</h2>
 <div class="form">
<form class="login-form" action="admin.php" method="post">
<input type="text" placeholder="email" name="email" required>
<input type="password" placeholder="password" name="password" required>
<button>login</button>
</form>
</div></div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email=$_POST["email"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","ground");
if(!$con){
die('connecton failed');
}
else{
 $query="select * from admin where email='$email' and password='$password'";
 $result=mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0){
$_SESSION["email"]=$email;
header('location:admin_dashboard.php');
}
else{
 echo '<h1>invalid login credentials</h1>';
}
}}?>
</body>
</html>