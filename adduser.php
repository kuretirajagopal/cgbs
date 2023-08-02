<hmtl>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
a:link, a:visited {
 background-color: #f44336;color: white; padding: 14px 25px; text-align: center;
 text-decoration: none; display: inline-block;}
a:hover, a:active {
 background-color: green;
}
#c{
 text-align:center;
}
</style>
</head>
<body>
<?php
$uname=$_POST["uname"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","ground");
if(!$con){
 die('Could not Connect My Sql:' .mysql_error());
 }
else{
 $q="SELECT * from user_info where email='$email'";
 $res=mysqli_query($con,$q);
 $row=mysqli_num_rows($res);
 if($row > 0)
 { echo '<div id="c">';
 echo '<h1> user already registered with given mail</h1>';
 echo '<br>';
 echo '<a href="signup.html">signup again</a>';
echo '</div>';
}
else{
 $con=mysqli_connect("localhost","root","","ground");
 $query="INSERT INTO user_info VALUES('$uname','$email','$mobile','$password')";
$result=mysqli_query($con,$query);
 if($result == 1)
 {echo '<div id="c">';
 echo '<h1 align="center">successfully registered</h1>';
 echo '<br>';
echo '<a href="login.html">login</a>';
 echo '<br>';
 echo '<br>';
 echo '<a href="index.html">home</a>';
 echo '</div>';
 }
 else{
 echo "failed to register";
 }}}
 ?>
 </body>
 </html>