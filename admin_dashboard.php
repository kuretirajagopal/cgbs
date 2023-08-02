<html>
<?php include 'session.php' ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="table.css" media="screen" type="text/css" />
</head>
<style>
body{
 background-image: url("book.jpg");background-repeat: no-repeat;background-position:
center;background-size: cover;
 }</style>
<body>
<a href='logout.php'>logout</a>
<a href="payments.php">payments</a>
<a href="enable_book.php">enable or disable bookings</a>
<br><br>
<?php
$con=mysqli_connect("localhost","root","","ground");
if(!$con){
 die('connection failed');
}
else{
 $query="select book.bid,book.slot_date,
book.status,book.email,name,mobile,payment from user_info inner join book on
book.email=user_info.email order by slot_date ";
 $result=mysqli_query($con,$query);
 if(mysqli_num_rows($result) == 0)
 {
 echo '<h1>NO BOOKINGS YET</h1>';
}
 else{
 echo '<h1> UPCOMING BOOKED SLOTS</h1>';
 echo '<div id="c">';
 echo '<table id="customers">';
 echo '<th> booking id</th>';
 echo '<th> slot_date</th>';
 echo '<th> status</th>';
 echo '<th> email</th>';
 echo '<th> name</th>';
 echo '<th> mobile</th>';
 echo '<th> payment</th>';
 while($row = mysqli_fetch_assoc($result))
 {
 echo '<tr>';
 echo '<td>';echo $row["bid"];echo '</td>';
 echo '<td>';echo $row["slot_date"];echo '</td>';
 echo '<td>';echo $row["status"];echo '</td>';
 echo '<td>';echo $row["email"];echo '</td>';
 echo '<td>';echo $row["name"];echo '</td>';
 echo '<td>';echo $row["mobile"];echo '</td>';
 echo '<td>';echo $row["payment"];echo '</td>';
 echo '</tr>';
 }
 echo '</table>';
 echo '</div>';
 }
 echo '<h1>CANCELLED SLOTS</h1>';
$q="select cancel.bid,cancel.slot_date,cancel.email,name,mobile from user_info inner join
cancel on cancel.email=user_info.email order by slot_date";
 $res=mysqli_query($con,$q);
 if(mysqli_num_rows($res) == 0)
 {
 echo '<h1>NO BOOKINGS YET</h1>';
 }
 else{
 echo '<div id="d">';
 echo '<table id="customers">';
 echo '<th> booking id</th>';
 echo '<th> slot_date</th>';
 echo '<th> email</th>';
 echo '<th> name</th>';
 echo '<th> mobile</th>';
 while($row = mysqli_fetch_assoc($res))
 {
 echo '<tr>';
 echo '<td>';echo $row["bid"];echo '</td>';
 echo '<td>';echo $row["slot_date"];echo '</td>';
 echo '<td>';echo $row["email"];echo '</td>';
 echo '<td>';echo $row["name"];echo '</td>';
 echo '<td>';echo $row["mobile"];echo '</td>';
 echo '</tr>';
 }
 echo '</table>';
 echo '</div>';
}}
?>
</body>
</html>