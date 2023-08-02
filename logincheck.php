<?php session_start() ?>
<html>
<head>
<style>
a:link, a:visited {
 background-color: #f44336; color: white;padding: 14px 25px;text-align: center;
 text-decoration: none;display: inline-block;
}
a:hover, a:active {
 background-color: green;
}
#c{
text-align:center;
}
</style>
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
$email=$_POST["email"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","ground");
if(!$con){
 die('Could not Connect My Sql:' .mysql_error());
 }
else{
$q="SELECT * from user_info where email='$email' and password='$password'";
$res=mysqli_query($con,$q);
$row=mysqli_num_rows($res);
if($row ==1)
{
$_SESSION["email"]=$email;
$_SESSION["name"]=$name;
header("location:dashboard.php");
}
else{
echo '<div id="c">';
echo '<h1>invalid username or password</h1>';
echo '<br>';
echo '<a href="login.html">login again</a>';echo '<br>';
echo '<h1>go to home page</h1>';
echo '<a href="index.html">home</a>';
echo '</div>';
}}
?>
</body>
</html> 