<html>
<?php include 'session.php' ?>
<head>
<link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
<link rel="stylesheet" href="table.css" media="screen" type="text/css" />
 </head>
<body>
<a href="logout.php">logout</a>
<a href="admin_dashboard.php">dashboard</a>
<br><br>
<div class="payment">
<h2>PAYMENT</h2>
 <div class="form">
 <form class="payment" action="payments.php" method="post">
 BOOKING ID <BR>
 <input type="text" placeholder="booking id" name="bid" required>
 <br><br>
 MODE OF PAYMENT
 <br>
 <select name="mode" required>
 <option>select</option>
 <option value="cash">CASH</option>
 <option value="card">CARD</option>
 <option value="UPI">UPI</option>
 </select>
 <BR>
 <button>submit</button>
 </form>
 </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $bid=$_POST["bid"];
$mode=$_POST["mode"];
$con=mysqli_connect("localhost","root","","ground");
if(!$con)
{
 die('connecton failed');
}
else{
 $query="select email,slot_date from book where NOT payment='paid' and bid='$bid'
";
 $result=mysqli_query($con,$query);
 if(mysqli_num_rows($result) > 0){
 while($row=mysqli_fetch_assoc($result))
 {
 $b_email=$row["email"];
 $date=$row["slot_date"];
 }
 echo $bid;
 echo $b_email;
 echo $date;
 echo $mode;
 $q="insert into payment values('$bid','$b_email','$date','$mode')";
$q1="update book set payment='paid' where bid='$bid'";
$res=mysqli_query($con,$q);
$res1=mysqli_query($con,$q1);
 if($res1 == 1){
 header("location:admin_dashboard.php");
 }
 else{
 echo '<h1>payment failed</h1>';
 }}
else{
 echo '<h1>invalid booking id</h1>';
}
}}?>
</html> 