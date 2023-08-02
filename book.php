<html>
<?php
 include 'session.php' ?>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="table.css" media="screen" type="text/css" />
 <style>
 mark{
 background-color:orange;
 }
 </style>
 </head>
 <body>
 <a href="logout.php">logut</a>
 <div id="c"><br><br>
 <h1 >BOOK NOW PAY AT GROUND</h1>
 <h1> <mark>GIVEN BELOW ARE THE SLOTS AVAILABLE FOR THE NEXT 15
DAYS</mark> </h1>
 <?php
$n=1;
$con=mysqli_connect("localhost","root","","ground");
if(!$con){
 die('connection failed');
}
else{
$temp=array();
$d = date('Y-m-d');
$n=1;
while($n!=15){
 array_push($temp,$d);
$d=date("Y-m-d",strtotime('+ 1days',strtotime($d)));
$n++;
}
$query="select slot_date from book";
$res=mysqli_query($con,$query);
$temp1=array();
while($row=mysqli_fetch_assoc($res)){
 array_push($temp1,$row["slot_date"]);
}
$result=array_diff($temp,$temp1);
}
?>
<div class="form">
<form action="book.php" method="post">
<select name="date" required>
<option>select</option>
<?php
foreach($result as $x){
 echo "<option value='$x'>$x</option>";
}
?>
</select>
<br><br>
 <button>submit</button>
 </form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $date=$_POST["date"];
$email=$_SESSION["email"];
$con=mysqli_connect("localhost","root","","ground");
 if(!$con)
{
 die('connection failed');
}
else{
 $q="select * from book where slot_date='$date'";
 $r=mysqli_query($con,$q);
 if(mysqli_num_rows($r) > 0)
 { echo '<div id="c">';
 echo '<h1> SORRY SLOT WAS ALREADY BOOKED</h1><br>';
 }
 else{
 $query="INSERT INTO book(email,slot_date,status,payment) VALUES('$email' ,'$date','booked','not paid')";
 $res=mysqli_query($con,$query);
 if($res == 1)
 {
 header('location: dashboard.php');
}
else{
 echo '<div id="c">';
 echo '<h1> failed to book</h1>';
 }}}
}
?>
</div>
 </body>
 </html>